<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Online Document System.
	 * ver 1.0.0
	 *
	 * user controller
	 *
	 * url : http://192.168.1.150/ods/
	 * developer : www.studiokami.com
	 * phone : 0361 853 2400
	 * email : support@studiokami.com
	 */
	 
	 function __construct()
	{
        parent::__construct();
		
		# load model, library and helper
		$this->load->model('user_model','', TRUE);
		
		# user restriction
		if ( ! $this->session->userdata('logged_in'))
    	{ 
        	# function allowed for access without login
			$allowed = array('index', 'login', 'register', 'select_unit', 'select_jabatan', 'do_register', 'request_verification', 'verification_pin', 'verification_link', 'user_profile', 'manual_verification');
        
			# other function need login
			if (! in_array($this->router->method, $allowed)) 
			{
    			redirect('user/login');
			}
   		 }
		
		
    }
	
	
	public function index()
	{
		# redirect to login form
		redirect('user/login');
	}
	
	public function login()
	{
		# display login form
		$this->load->view('gp/header');
		$this->load->view('user/login_page_view');
		$this->load->view('gp/footer');
	}
	
	public function request_verification()
	{
		# get email data from form		
		$email = $this->input->post('email');	
		
		#validate data
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_message('email', 'Email yang anda masukan salah !!!');

		if ($this->form_validation->run() == FALSE)
		{
			# if fail, force fill login form
			$this->load->view('gp/header');
			$this->load->view('user/login_page_view');
			$this->load->view('gp/footer');
		}
		else
		{
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
					#$email_result = explode("@", $email);
					#$user_email  = $email_result[0];
				    #$full_email = $email;
					
					# encrypt username before send to view as ads_code
					#$email = $this->encrypt->encode($email, 'liame');
					$data['ads_code'] = $email;
					$data['email'] = $email;
					
					# call models to delete previous verification duplicate data
					$this->user_model->del_dup_prev_ver_data($email);
					
					# create random pin
					$this->load->helper('pin');
					$pin = get_pin();
					$email_link = $email . '+' . $pin ;
					
					# encrypt email link to send via email
					$email_link = base64_encode($email_link);
					$email_link = urlencode($email_link);
					
					# setting date
					$request = mdate("%Y-%m-%d %H:%i:%s", time());
					$expired = mdate("%Y-%m-%d %H:%i:%s", time()+3600);
					
					# call models to save new pin and verification link
					$this->user_model->save_verification($email, $hp, $pin, $email_link, $request, $expired);
					
					# get user ip & hostname
					$ip = $_SERVER['REMOTE_ADDR']; 
					$hostname = GetHostByName($_SERVER['REMOTE_ADDR']);
					$localip = $_SERVER['PHP_SELF'];
					
					# send pin and link via email
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('admin@gapura.co.id', 'Team Sigap');
					$this->email->to($email);
					$this->email->bcc('sigap@gapura.co.id');  
					$this->email->subject('PIN : ' . $pin . ' untuk LOGIN di Website Internal GP DPS');
					$this->email->message('
					
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<title>PT Gapura Angkasa Official Website System Registration Verification</title>
					</head>
					
					<body>
					<p>Anda melakukan permintaan login dengan data sbb :</p>
					<p>Nama : ' . $nama . '</p>
					<p>NIPP : ' . $nipp . '</p>
					<p>Email : ' . $email . '</p>
					<p>IP  : ' . $ip . '</p>
					
					<p>Permintaan akses login disetujui, berikut pin anda.</p>
					<p>PIN : ' . $pin . '</p>
					<p>atau</p>
					<p>klik link ini untuk login :</p>
					<p>{unwrap}' . anchor("user/verification_link/" . $email_link, 'http://dps.gapura.co.id/user/verification_link/' . $email_link) . '{/unwrap}</p>
					<p>Terima kasih</p>
					<p>SIGAP Team</p>
					<p>&nbsp;</p>
					</body>
					</html>
					
					');
					$this->email->send();
					
					# call views
					$data['user_email'] = $email;
					$data['success_message'] = '- masukan kode verifikasi yang anda terima di inbox email.<br />- check spam folder bila tidak ada di inbox<br />- verifikasi hanya berlaku 1 jam dari sekarang';
					$nav['view_dashboard'] = 'class="active"';
					$this->load->view('gp/header', $nav);
					$this->load->view('user/login_verification_view', $data);
					$this->load->view('gp/footer');
			}
			else
			{
				# not register user redirect to register page
				redirect('user/register/');
			}
		}
	}
	
	public function register()
	{
		# get stn available
		$data['query_cabang_combo'] = $this->user_model->get_cabang();
		
		# redirect to register form
		$nav['view_dashboard'] = 'class="active"';
		$this->load->view('gp/header', $nav);
		$this->load->view('user/user_register_view', $data);
		$this->load->view('gp/footer');
	}
	
	function select_unit()
	{
		# get cabang from previous combo
		$cabang = $this->input->post('cabang_id');
		
		# call model
		$data['query_unit_combo'] = $this->user_model->get_unit($cabang);
		
		# fetch data from model result then send to content
		foreach($data['query_unit_combo'] as $row_unit_combo) 
	   {
		$content .= "<option value='$row_unit_combo[uu_code]'>$row_unit_combo[uu_name]</option>\n";
		}
		
		echo $content;
    }
	
	function select_jabatan()
	{
		# get cabang from previous combo
		$cabang = $this->input->post('cabang_id');
		
		# call model
		$data['query_jabatan_combo'] = $this->user_model->get_jabatan($cabang);
		
		# fetch data from model result then send to content
		foreach($data['query_jabatan_combo'] as $row_jabatan_combo) 
	   {
		$content_jabatan .= "<option value='$row_jabatan_comboo[uj_code]'>$row_jabatan_combo[uj_name]</option>\n";
		}
		
		echo $content_jabatan;
    }
	
	public function do_register()
	{
		# scenario :
		# get data from register form
		# do data validation
		# do save data to db
		# send pin or url verification via email
		# do inline verification
		
		# get data from register form
		$nama = $this->input->post('nama');
		$nipp = $this->input->post('nipp');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$cabang = $this->input->post('cabang');
		$unit = $this->input->post('unit');
		$jabatan = $this->input->post('jabatan');
		
		# do validation rules
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]|alpha_dash|xss_clean');
		$this->form_validation->set_rules('hp', 'hp', 'trim|required|min_length[3]|numeric|xss_clean');
		$this->form_validation->set_rules('nipp', 'nipp', 'trim|required|min_length[3]|numeric|xss_clean');
		
		if ($this->input->post('submit')) 
			{
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('gp/header');
					$this->load->view('user/user_register_view');
					$this->load->view('gp/footer');
				}
				else
				{
					# prepare data
					$user_email = $email;
				    $full_email = $email . '@gapura.co.id';
					
					# encrypt data before save and send to view as ads_code
					#$email = $this->encrypt->encode($user_email, 'liame');
					$data['ads_code'] = $email;
					$data['email'] = $full_email;
					
					# call models to delete previous verification duplicate data
					$this->user_model->del_dup_prev_ver_data($full_email);
					
					# call models to delete unverify duplicate user data on user identity table
					$this->user_model->del_dup_prev_user_unver_data($full_email);
					
					# call models to save data
					$this->user_model->save_user($nama, $nipp, $hp, $full_email, $cabang, $unit, $jabatan);
					
					# create random pin
					$this->load->helper('pin');
					$pin = get_pin();
					$email_link = $full_email . '+' . $pin ;
					
					# encrypt email link to send via email
					$email_link = base64_encode($email_link);
					$email_link = urlencode($email_link);
					
					# setting date
					$request = mdate("%Y-%m-%d %H:%i:%s", time());
					$expired = mdate("%Y-%m-%d %H:%i:%s", time()+3600);
					
					# call models to save data
					$this->user_model->save_verification($full_email, $hp, $pin, $email_link, $request, $expired);
					
					# get user ip & hostname
					$ip = $_SERVER['REMOTE_ADDR']; 
					$hostname = GetHostByName($_SERVER['REMOTE_ADDR']);
					$localip = $_SERVER['PHP_SELF'];
					
					# send pin and link via email
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('admin@gapura.co.id', 'Team Sigap');
					$this->email->to($full_email);
					$this->email->bcc('sigap@gapura.co.id');  
					$this->email->subject('Registrasi Web Internal PT Gapura Angkasa Denpasar');
					$this->email->message('
					
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<title>Untitled Document</title>
					</head>
					
					<body>
					<p>Anda melakukan registrasi dengan data sbb :</p>
					<p>Nama : ' . $nama . '</p>
					<p>NIPP : ' . $nipp . '</p>
					<p>Email : ' . $full_email . '</p>
					<p>IP  : ' . $ip . '</p>
					
					<p>bila data ini benar, silahkan masukan PIN dibawah ini untuk verifikasi, namun bila anda tidak ada melakukan registrasi diatas, silahkan hubungi Tim SIGAP</p>
					<p>PIN : ' . $pin . '</p>
					<p>atau</p>
					<p>Klik link berikut untuk melakukan verifikasi :</p>
					<p>{unwrap}' . anchor("user/verification_link/" . $email_link, 'http://dps.gapura.co.id/user/verification_link/' . $email_link) . '{/unwrap}</p>
					<p>Terima kasih</p>
					<p>Tim SIGAP</p>
					<p>&nbsp;</p>
					</body>
					</html>
					
					');
					$this->email->send();
		
					# call views
					$data['success_message'] = 'masukan kode verifikasi yang anda terima di inbox email.';
					$nav['view_dashboard'] = 'class="active"';
					$this->load->view('gp/header', $nav);
					$this->load->view('user/login_verification_view', $data);
					$this->load->view('gp/footer');
				}
			}
			
	}

	public function manual_verification()
	{
		# call views
		$data['ads_code'] = '';
		$data['success_message'] = 'masukan kode verifikasi yang anda terima di inbox email.';
		$nav['view_dashboard'] = 'class="active"';
		$this->load->view('gp/header', $nav);
		$this->load->view('user/login_verification_view', $data);
		$this->load->view('gp/footer');
	}
	
	public function verification_pin()
	{
		# get data
		$email = $this->input->post('email');
		$pin = $this->input->post('kode');
		
		
		# later : check previous verification request and delete it
		
		# call model
		$result = $this->user_model->do_verification($email, $pin);
		
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
			 redirect('gp');
			 #echo 'sukses';
			 #return TRUE;
		   }
		   else
		   {
			 # verification pin fail, force to try again
			 $data['ads_code'] = $this->input->post('ads_code');
			 $data['success_message'] = 'link yang anda klik salah, masukan kode verifikasi yang anda terima di inbox email.';
			 
			 $nav['view_dashboard'] = 'class="active"';
			 $this->load->view('gp/header', $nav);
			 $this->load->view('user/login_page_view', $data);
			 $this->load->view('gp/footer');
			 
			 #return FALSE;
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
		$result = $this->user_model->do_verification($email, $pin);
		
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
			 redirect('gp');
			 return TRUE;
		   }
		   else
		   {
			 # verification fail force user to input pin from email
			 $data['success_message'] = 'link yang anda klik salah, masukan kode verifikasi yang anda terima di inbox email.';
			 $nav['view_dashboard'] = 'class="active"';
			 $this->load->view('gp/header', $nav);
			 $this->load->view('user/login_verification_view', $data);
			 $this->load->view('gp/footer');
			 
			 
			 return FALSE;
		   }
		   
	}
	
	public function logout()
	{
		session_start();
		$this->session->unset_userdata('logged_in');
   		session_destroy();
		
		redirect('gp', 'refresh');
	}
	
	public function user_profile()
	{
		$session_data=$this->session->userdata('logged_in');
		$email=$session_data['ui_email'];
		$data['profile']=$this->user_model->get_user_identity($email);
		$this->load->view('user/profile', $data);
	}
	
	public function get_user(){
		$data['all_ui']=$this->user_model->get_all_ui();
		$this->load->view('user/all_user', $data);
	}
	public function del_user(){
	 $id_user=$this->uri->segment(3);
	 $this->user_model->del_user($id_user);
	 redirect('user/get_user');
	}
	public function update_user(){
		$id_user=$this->uri->segment(3);
		if($this->input->post('submit')){
			$data['user']=$this->user_model->update_user($id_user);
			redirect('user/get_user');
		}else{
			$data['show_user']=$this->user_model->get_user_by_id($id_user);
			$this->load->view('user/update_user', $data);
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */