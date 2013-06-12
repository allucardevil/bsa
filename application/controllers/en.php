<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class En extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Official Website.
	 * ver 1.0.0
	 *
	 * en controller ( english version )
	 *
	 * url : http://localhost/dps
	 * developer : www.studiokami.com
	 * phone : 0361 853 2400
	 * email : support@studiokami.com
	 */
	 
	 function __construct()
	{
        parent::__construct();
		
		# load model, library and helper
		$this->load->model('content_model','', TRUE);
		$this->load->helper('sigap_pdf');
    }
	
	
	
	public function index()
	{
		# get data
		$wc_lang = 'en';
		
		# call model for 3 random services
		$data['query'] = $this->content_model->get_3_service($wc_lang);
		$data['query_splash_news'] = $this->content_model->get_news($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		$data['slideshow'] = $this->content_model->get_image_gallery('slideshow');
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/home/home', $data);
		$this->load->view('en/footer', $data);
	}
	
	
	public function corporates()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'corporate';
		$wc_sub_category = $this->uri->segment(3, 'achievement');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/corporates/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
		$config['full_tag_open'] = '<ul class="pages">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a  class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '<li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<li>prev';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'next</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		  
        $config['total_rows'] = $this->content_model->total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer', $data);
	}
	
	
	public function corporate()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'corporate';
		$wc_sub_category = $this->uri->segment(3, 'achievement');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function services()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'service';
		$wc_sub_category = $this->uri->segment(3, 'non-ground-handling');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/services/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
		$config['full_tag_open'] = '<ul class="pages">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a  class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '<li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<li>prev';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'next</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		  
        $config['total_rows'] = $this->content_model->total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function service()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'service';
		$wc_sub_category = $this->uri->segment(3, 'non-ground-handling');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		# form for gapura hospitality service
		if ($this->uri->segment(6) != NULL)
		{
			$data['hs_name'] = $this->input->post('hs_name');
			$data['hs_email'] = $this->input->post('hs_email');
			$data['hs_phone'] = $this->input->post('hs_phone');
			$data['hs_type'] = $this->input->post('hs_type');
			if ($this->uri->segment(6) == 'last')
			{
				$data['hs_service_site'] = $this->input->post('hs_service_site');
				$data['hs_local_address'] = $this->input->post('hs_local_address');
				$data['hs_flight_book_code'] = $this->input->post('hs_flight_book_code');
				$data['hs_date'] = $this->input->post('hs_date');
				$data['hs_hour'] = $this->input->post('hs_hour');
				$data['hs_minute'] = $this->input->post('hs_minute');
				$data['hs_ampm'] = $this->input->post('hs_ampm');
				$data['hs_airline'] = $this->input->post('hs_airline');
				$data['hs_flight_number'] = $this->input->post('hs_flight_number');
				$data['hs_num_traveler'] = $this->input->post('hs_num_traveler');
				$data['hs_special_instructions'] = $this->input->post('hs_special_instructions');
			}
		}
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function customers()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'customer';
		$wc_sub_category = $this->uri->segment(3, 'non-airline');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/customers/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
		$config['full_tag_open'] = '<ul class="pages">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a  class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '<li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<li>prev';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'next</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		  
        $config['total_rows'] = $this->content_model->total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function customer()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'customer';
		$wc_sub_category = $this->uri->segment(3, 'non-airline');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function news_list()
	{
		$wc_lang = 'en';
		$wc_type = 'news';
		$wc_category = $this->uri->segment(3, 'general');
		$wc_sub_category = $this->uri->segment(4, 'update');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/news_list/' . $wc_category . '/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 5;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
		$config['full_tag_open'] = '<ul class="pages">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a  class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '<li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<li>prev';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'next</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		  
        $config['total_rows'] = $this->content_model->total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function news()
	{
		$wc_lang = 'en';
		$wc_type = 'news';
		$wc_category = 'general';
		$wc_sub_category = $this->uri->segment(3, 'update');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function contact()
	{
		$wc_lang = 'en';
		$wc_type = 'news';
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header');
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/contact',$data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function send_mail()
	{
		for($i=1;$i<=$this->input->post('hs_num_traveler');$i++){
			$data['traveller'][] = array(
				'name' => $this->input->post('hs_tr_name_'.$i),
				'place' => $this->input->post('hs_tr_place_birth_'.$i),
				'date' => $this->input->post('hs_tr_birth_'.$i),
				'nationality' => $this->input->post('hs_tr_nationality_'.$i),
				'gender' => $this->input->post('hs_tr_gender_'.$i),
				'occupation' => $this->input->post('hs_tr_occupation_'.$i),
				'passport' => $this->input->post('hs_tr_passport_'.$i),
				'issue' => $this->input->post('hs_tr_issue_'.$i),
				'expired' => $this->input->post('hs_tr_expired_'.$i),
				'residence' => $this->input->post('hs_tr_resident_'.$i),
				'last_port' => $this->input->post('hs_tr_last_port_'.$i),
				);
		}
		$data['contact'] = '
				<tr>
					<td colspan="5"><h3>Contact Detail</h3></td>
					<td colspan="4"><h3>Flight Detail</h3></td>
				</tr>
				<tr><td></td>
					<td width="150px"><b>Name</b></td><td width="10px">:</td><td colspan="2" width="300px">'.$this->input->post('hs_name').'</td>
					<td width="20px"></td><td><b>Flight Booking Code</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_flight_book_code').'</td></tr>
				<tr><td></td>
					<td><b>Email Address</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_email').'</td>
					<td></td><td><b>Flight Date</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_date').'</td>
				</tr>
				<tr><td></td>
					<td><b>Contact Number</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_phone').'</td>
					<td></td><td><b>Flight Time</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_hour').':'.$this->input->post('hs_minute').' '.$this->input->post('hs_ampm').'</td>
				</tr>
				<tr><td></td>
					<td><b>Local Address</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_local_address').'</td>
					<td></td><td><b>Airline</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_airline').' / '.$this->input->post('hs_flight_number').'</td>
				</tr>
				<tr><td></td>
					<td colspan="4"><b>Requesting for '.$this->input->post('hs_type').' Service at '.$this->input->post('hs_service_site').' Station </b></td></tr>
				<tr><td colspan="5"><h3>Travellers Detail</h3></td></tr>
				<tr><td></td><td><b>Number of Travellers</b></td><td>:</td><td colspan="2">'.$this->input->post('hs_num_traveler').'</b></td></tr>
			';
		//$traveller = $this->load->view('team/detail_traveler',$data);
		$this->load->view('team/detail_traveler',$data);
		
		//PDF Maker
		$stream = FALSE; 
		$papersize = 'legal'; 
		$orientation = 'landscape';
		$filename = 'webdps-hospitality-service-'. mdate("%d%m%Y%H%i%s", time());
		$stn = $this->input->post('hs_service_site');
		     
     	$html = $this->load->view('team/detail_traveler',$data, true);
     	pdf_create($html, $filename, $stream, $papersize, $orientation, $stn);
		$full_filename = $filename . '.pdf';
		
		
		//Email
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('admin@gapura.co.id', 'Team Sigap');
		$this->email->to('reservation@gapura.co.id'); 
		$this->email->cc('suartati@gapura.co.id'); 
		$this->email->cc('ketutlama@gapura.co.id'); 
		$this->email->cc('cokparsama@gapura.co.id'); 
		$this->email->subject('PT Gapura Angkasa Gapura Hospitality Service Inquiry');
		$this->email->message('
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>PT Gapura Angkasa Gapura Hospitality Service Inquiry</title>
			</head>
			<body>
			<p><b>There is a request for Gapura Hospitality Service with the following detail : </p>
			<table>
				<tr><td>Name</td><td>:</td><td>'.$this->input->post('hs_name').'</td></tr>
				<tr><td>Email Address</td><td>:</td><td>'.$this->input->post('hs_email').'</td></tr>
				<tr><td>Contact Number</td><td>:</td><td>'.$this->input->post('hs_phone').'</td></tr>
				<tr><td colspan="3">Requesting for '.$this->input->post('hs_type').' Service at '.$this->input->post('hs_service_site').' Station </td></tr>
				<tr><td>Local Address</td><td>:</td><td>'.$this->input->post('hs_local_address').'</td></tr>
				<tr><td colspan="3">Flight Detail</td></tr>
				<tr><td>Flight Booking Code</td><td>:</td><td>'.$this->input->post('hs_flight_book_code').'</td></tr>
				<tr><td>Flight Date</td><td>:</td><td>'.$this->input->post('hs_date').'</td></tr>
				<tr><td>Flight Time</td><td>:</td><td>'.$this->input->post('hs_hour').':'.$this->input->post('hs_minute').' '.$this->input->post('hs_ampm').'</td></tr>
				<tr><td>Airline</td><td>:</td><td>'.$this->input->post('hs_airline').'/'.$this->input->post('hs_flight_number').'</td></tr>
				<tr><td colspan="3">Travellers Detail</td></tr>
				<tr><td>Number of Travellers</td><td>:</td><td>'.$this->input->post('hs_num_traveler').'</td></tr>
			</table>
			
			</body>
			</html>
		');
		$this->email->attach('/home/gapurac/public_html/dps/pdf/' . $full_filename); 
		$this->email->send();
		
		# DELETE FILES AFTER SEND
		unlink('/home/gapurac/public_html/dps/pdf/' . $full_filename);
		redirect ('en/service/non-ground-handling/211/gapura-hospitality-service/');
	}
	
	function sending_mail()
	{
		//Email
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('admin@gapura.co.id', 'Team Sigap');
		$this->email->to('csdps@gapura.co.id'); 
		$this->email->subject('PT Gapura Angkasa Gapura Contact Us Form');
		$this->email->message('
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>PT Gapura Angkasa Gapura Contact Us Form</title>
			</head>
			<body>
			<p><b>There is a question(s) for PT Gapura Angkasa with the following detail : </p>
			<table>
				<tr><td>Name</td><td>:</td><td>'.$this->input->post('author').'</td></tr>
				<tr><td>Email Address</td><td>:</td><td>'.$this->input->post('email').'</td></tr>
				<tr><td>Website</td><td>:</td><td>'.$this->input->post('url').'</td></tr>
				<tr><td>Question</td><td>:</td><td></td></tr>
				<tr><td></td><td colspan="2">'.$this->input->post('comment').'</td></tr>
			</table>
			
			</body>
			</html>
		');
		
		$this->email->send(); 
		
		redirect ('en/');
	}
			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */