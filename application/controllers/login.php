<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Online Document System.
	 * ver 1.0.0
	 *
	 * login controller
	 *
	 * url : http://192.168.1.150/ods/
	 * developer : www.studiokami.com
	 * phone : 0361 853 2400
	 * email : support@studiokami.com
	 */
	 
	 function __construct()
	{
        parent::__construct();
		
		if ( ! $this->session->userdata('logged_in'))
    	{ 
        	# function allowed for access without login
			$allowed = array('index', 'request_verification', 'verification_pin', 'verification_link');
        
			# other function need login
			if (! in_array($this->router->method, $allowed)) 
			{
    			redirect('login');
			}
   		 }
		
		# load model, library and helper
		$this->load->model('login_model','', TRUE);
		$this->load->model('user_model','', TRUE);
		$this->load->model('content_model','', TRUE);
    }
	
	public function index()
	{
		$nav['view_dashboard'] = 'class="active"';
		$this->load->view('team/header', $nav);
		$this->load->view('login/login_page_view');
		$this->load->view('team/footer');
	}
	
	
	public function request_verification()
	{
		# get email data from form		
		$user_email = $this->input->post('email');	
		
		#validate data
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|alpha_dash|xss_clean');
		$this->form_validation->set_message('alpha_dash', 'Email yang anda masukan salah !!!');

		if ($this->form_validation->run() == FALSE)
		{
			# if fail, force fill login form
			$nav['view_dashboard'] = 'class="active"';
			$this->load->view('team/header', $nav);
			$this->load->view('login/login_page_view');
			$this->load->view('team/footer');
			
		}
		else
		{
			# get username & generate email address
			$email = $user_email . '@gapura.co.id';
			
			# check email on database 
			$result = $this->user_model->check_reg_email($email);
			
			if($result)
			{
				# if email found on database
				foreach($result as $row)
			 	{
					 $nama = $row->ui_nama; 
					 $nipp = $row->ui_nipp; 
					 $hp = $row->ui_hp; 
					 $email = $row->ui_email; 
					 $cabang = $row->ui_cabang; 
					 $unit = $row->ui_unit; 
					 $jabatan = $row->ui_jabatan; 
					 $app_level = $row->ui_app_level; 
					 $app_role = $row->ui_app_role; 
					 $verification = $row->ui_verification; 
					 $ver_date = $row->ui_ver_date;
				}
			 	
					# split data to get username only		
					$email_result = explode("@", $email);
					$user_email  = $email_result[0];
				    $full_email = $email;
					
					# encrypt username before send to view as ads_code
					$email = $this->encrypt->encode($user_email, 'liame');
					$data['ads_code'] = $email;
					
					# call models to delete previous verification duplicate data
					$this->login_model->del_dup_prev_ver_data($full_email);
					
					# create random pin
					$this->load->helper('pin');
					$pin = get_pin();
					$email_link = $full_email . '+' . $pin ;
					
					# encrypt email link to send via email
					$email_link = base64_encode($email_link);
					$email_link = urlencode($email_link);
					
					# call models to save new pin and verification link
					$this->login_model->save_verification($full_email, $hp, $pin, $email_link);
					
					# send pin and link via email
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('admin@gapura.co.id', 'Team Sigap');
					$this->email->to($full_email); 
					$this->email->subject('PT Gapura Angkasa Official Website System Registration Verification');
					$this->email->message('
					
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<title>PT Gapura Angkasa Official Website System Registration Verification</title>
					</head>
					
					<body>
					<p>Your verification code : ' . $pin . '</p>
					<p>or</p>
					<p>Please click link below to verify your request :</p>
					<p>{unwrap}' . anchor("login/verification_link/" . $email_link, 'http://dps.gapura.co.id/login/verification_link/' . $email_link) . '{/unwrap}</p>
					<p>Thank you</p>
					<p>Best regards</p>
					<p>SIGAP Team</p>
					<p>&nbsp;</p>
					</body>
					</html>
					
					');
					$this->email->send();
					
					# show link for develope mode only, please disable on run mode
					#echo $email_link;
					
					# call views
					$data['user_email'] = $user_email;
					$data['success_message'] = 'masukan kode verifikasi yang anda terima di inbox email.';
					$nav['view_dashboard'] = 'class="active"';
					$this->load->view('team/header', $nav);
					$this->load->view('login/login_verification_view', $data);
					$this->load->view('team/footer');
					
			}
			else
			{
				# not register user redirect to register page
				redirect('user/register_form/' . $user_email);
			}
		}
	}
	

	
	
	
	public function verification_pin()
	{
		# get data
		$email = $this->input->post('ads_code');
		$email = $this->encrypt->decode($email, 'liame');
		$email = $email . '@gapura.co.id';
		$pin = $this->input->post('kode');
		
		# later : check previous verification request and delete it
		
		# call model
		$result = $this->login_model->do_verification($email, $pin);
		
		# check pin to verify
		if($result)
		   {
			 # if pin sucess prepare session
			 $sess_array = array();
			 foreach($result as $row)
			 {
			   $sess_array = array(
			     'ui_id' => $row->ui_id,
				 'ui_nama' => $row->ui_nama, 
				 'ui_nipp' => $row->ui_nipp, 
				 'ui_hp' => $row->ui_hp, 
				 'ui_email' => $row->ui_email, 
				 'ui_cabang' => $row->ui_cabang, 
				 'ui_unit' => $row->ui_unit, 
				 'ui_jabatan' => $row->ui_jabatan, 
				 'ui_app_level' => $row->ui_app_level, 
				 'ui_app_role' => $row->ui_app_role, 
				 'ui_verification' => $row->ui_verification, 
				 'ui_ver_date' => $row->ui_ver_date
			   );
			   # set session for auto login
			   $this->session->set_userdata('logged_in', $sess_array);
			 }
			 # redirect to dashboard after logged in
			 redirect('team');
			 return TRUE;
		   }
		   else
		   {
			 # verification pin fail, force to try again
			 $data['ads_code'] = $this->input->post('ads_code');
			 $data['success_message'] = 'link yang anda klik salah, masukan kode verifikasi yang anda terima di inbox email.';
			 
			 $nav['view_dashboard'] = 'class="active"';
			 $this->load->view('team/header', $nav);
			 $this->load->view('login/login_page_view', $data);
			 $this->load->view('team/footer');
			 
			 return FALSE;
		   }
		
	}
	
	public function verification_link()
	{
		# get data
		$email_link= $this->uri->segment(3, 0);
		$email_link = urldecode($email_link);
		$email_link = base64_decode($email_link);
		
		# split data			
		$url_result = explode("+", $email_link);
		$email = $url_result[0];
		$pin = $url_result[1];
		
		# call model
		$result = $this->login_model->do_verification($email, $pin);
		
		# check verification link
		if($result)
		   {
			 # if success prepare session
			 $sess_array = array();
			 foreach($result as $row)
			 {
			   $sess_array = array(
			     'ui_id' => $row->ui_id, 
				 'ui_nama' => $row->ui_nama, 
				 'ui_nipp' => $row->ui_nipp, 
				 'ui_hp' => $row->ui_hp, 
				 'ui_email' => $row->ui_email, 
				 'ui_cabang' => $row->ui_cabang, 
				 'ui_unit' => $row->ui_unit, 
				 'ui_jabatan' => $row->ui_jabatan, 
				 'ui_app_level' => $row->ui_app_level, 
				 'ui_app_role' => $row->ui_app_role, 
				 'ui_verification' => $row->ui_verification, 
				 'ui_ver_date' => $row->ui_ver_date
			   );
			   # set session
			   $this->session->set_userdata('logged_in', $sess_array);
			   
			 }
			 # logged in and redirect user to dashboard
			 redirect('team');
			 return TRUE;
		   }
		   else
		   {
			 # verification fail force user to input pin from email
			 $data['success_message'] = 'link yang anda klik salah, masukan kode verifikasi yang anda terima di inbox email.';
			 $nav['view_dashboard'] = 'class="active"';
			 $this->load->view('team/header', $nav);
			 $this->load->view('login/login_verification_view', $data);
			 $this->load->view('team/footer');
			 
			 
			 return FALSE;
		   }
		   
	}
	
	
	public function log_out()
	{
		session_start();
		$this->session->unset_userdata('logged_in');
   		session_destroy();
		redirect('gp', 'refresh');
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */