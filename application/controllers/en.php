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
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 4, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 4, 0);
		$data['ead_info'] = $this->content_model->content_list('shopping_and_eating', 4, 0);
		
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
		
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
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
		
		# call model for splash news on footer
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/home/home', $data);
		$this->load->view('en/footer', $data);
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
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
	
	
	public function service()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'service';
		$wc_sub_category = $this->uri->segment(3, 'non-ground-handling');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		# form for gapura hospitality service
		if ($this->uri->segment(6) != NULL)
		{
			$data['hs_name'] = $this->input->post('hs_name');
			$data['hs_email'] = $this->input->post('hs_email');
			$data['hs_phone'] = $this->input->post('hs_phone');
			$data['hs_type'] = $this->input->post('hs_type');
		}
		
		$this->load->view('en/header', $data);
		//$this->load->view('en/slideshow');
		$this->load->view('en/page/page', $data);
		//$this->load->view('en/page/sidebar');
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
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
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
		$data['page'] = 'news';
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
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
		$data['content'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header', $data);
		//$this->load->view('en/slideshow');
		$this->load->view('en/page/page', $data);
		//$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function news()
	{
		$wc_lang = 'en';
		$wc_type = 'news';
		$wc_category = 'general';
		$wc_sub_category = $this->uri->segment(3, 'update');
		$wc_id = $this->uri->segment(4, 0);
				
		//$data['fas'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, 'airport_info', 'facilities_and_services' );
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$data['page'] = 'news';
		$data['title'] = 'Bali Airport Service News';
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		
		$this->load->view('en/header', $data);
		//$this->load->view('en/slideshow');
		$this->load->view('en/page/page', $data);
		//$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
			
				
	//  Function BASA
	public function flight_details()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'flight_detail';
		$wc_sub_category = $this->uri->segment(3, 'flight_schedule');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/flight_details/' . $wc_sub_category . '/';
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
		
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="flight_detail";
		$data['title']="Flight Detail";
		$data['flight_detail']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
		
	}
	
	
	
	public function flight_detail()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'flight_detail';
		$wc_sub_category = $this->uri->segment(3, 'flight_schedule');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="flight_detail";
		$data['title']="Flight Detail";
		$data['flight_detail']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}			
	
	
	public function expertises()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'expertise';
		$wc_sub_category = $this->uri->segment(3, 'ground_handling_service');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/expertises/' . $wc_sub_category . '/';
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
		  
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
		//$data['ghs'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'ground_handling_service');
		//$data['nghs'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'non_ground_handling_service');
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="expertise";
		$data['title']="Expertise";
		$data['expertise']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
	
	public function expertise()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'expertise';
		$wc_sub_category = $this->uri->segment(3, 'ground_handling_service');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		//$data['ghs'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'ground_handling_service');
		//$data['nghs'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'non_ground_handling_service');
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="expertise";
		$data['title']="Expertise";
		$data['expertise']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}	
	
	public function passengers_info()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'passenger_info';
		$wc_sub_category = $this->uri->segment(3, 'pre_flight_check');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/passengers_info/' . $wc_sub_category . '/';
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
		$data['content'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		/*$data['pfc'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'pre_flight_check' );
		$data['si'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'security_information' );
		$data['lgg'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'luggage' );
		$data['arr'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'arrivals' );
		$data['dep'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'departures' );*/
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="passenger_info";
		$data['title']="Passenger Info";
		$data['passenger_info']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
		
	public function passenger_info()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'passenger_info';
		$wc_sub_category = $this->uri->segment(3, 'luggage');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		/*$data['pfc'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'pre_flight_check' );
		$data['si'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'security_information' );
		$data['lgg'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'luggage' );
		$data['arr'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'arrivals' );
		$data['dep'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'departures' ); */
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="passenger_info";
		$data['title']="Passenger Info";
		$data['passenger_info']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}	
	
	public function travel_list()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'travels';
		$wc_sub_category = $this->uri->segment(3, 'go_and_to_the_airport');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/travel_list/' . $wc_sub_category . '/';
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
		$data['content'] = $this->content_model->content_list('travels', 3, 0);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		/*$data['gta'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'go_and_to_the_airport' );
		$data['dopu'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'dropping_off_and_picking_up' );
		$data['tt'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'transfer_terminal' );
		$data['am'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'airport_maps' ); */
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="travels";
		$data['title']="Travels";
		$data['travels']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
	
	public function travels()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'travels';
		$wc_sub_category = $this->uri->segment(3, 'go_and_to_the_airport');
		$wc_id = $this->uri->segment(4, 0);
			
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		/*$data['gta'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'go_and_to_the_airport' );
		$data['dopu'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'dropping_off_and_picking_up' );
		$data['tt'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'transfer_terminal' );
		$data['am'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'airport_maps' ); */
		
		$data['page']="travels";
		$data['title']="Travels";
		$data['travels']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}	
	
	public function airports_info()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'airport_info';
		$wc_sub_category = $this->uri->segment(3, 'facilities_and_services');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/airports_info/' . $wc_sub_category . '/';
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
		$data['content'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		//$data['fas'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'facilities_and_services' );
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="airport_info";
		$data['title']="Airport Info";
		$data['airport_info']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
	
	public function airport_info()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'airport_info';
		$wc_sub_category = $this->uri->segment(3, 'facilities_and_services');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		//$data['fas'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'facilities_and_services' );
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="airport_info";
		$data['title']="Airport Info";
		$data['airport_info']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}	

	public function shopping_and_eating_list()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'shopping_and_eating';
		$wc_sub_category = $this->uri->segment(3, 'shopping');
		
		$config = array();
        $config['base_url'] = site_url() . '/' . $wc_lang . '/shoping_and_eating_list/' . $wc_sub_category . '/';
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
		$data['content'] = $this->content_model->content_list('shopping_and_eating', 3, 0);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		/*$data['shp'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'shopping' );
		$data['ead'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'eating_and_drinking' );
		$data['sf'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'store_finder' );
		$data['so'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'special_offers' );*/
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="shopping_eating";
		$data['title']="Shopping And Eating";
		$data['shopping_eating']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}
	
	public function shopping_and_eating()
	{
		$wc_lang = 'en';
		$wc_type = 'page';
		$wc_category = 'shopping_and_eating';
		$wc_sub_category = $this->uri->segment(3, 'shopping');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['content'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		$data['serv'] = $this->content_model->get_3_service($wc_lang);
		$data['airport_info'] = $this->content_model->content_list('passenger_info', 3, 0);
		$data['pax_info'] = $this->content_model->content_list('travels', 3, 0);
		/*$data['shp'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'shopping' );
		$data['ead'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'eating_and_drinking' );
		$data['sf'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'store_finder' );
		$data['so'] = $this->content_model->get_content_unlimited($wc_lang, $wc_type, $wc_category, 'special_offers' );*/
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$data['page']="shopping_eating";
		$data['title']="Shopping And Eating";
		$data['shopping_eating']='class="active"';
		
		$this->load->view('en/header', $data);
		#$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/footer', $data);
	}	
			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */