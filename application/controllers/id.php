<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Id extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Official Website.
	 * ver 1.0.0
	 *
	 * id controller ( indonesia version )
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
    }
	
	
	
	public function index()
	{
		# get data
		$wc_lang = 'id';
		
		# call model for 3 random services
		$data['query'] = $this->content_model->get_3_service($wc_lang);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
				
		$this->load->view('id/header', $data);
		$this->load->view('id/slideshow', $slide);
		$this->load->view('id/home/home', $data);
		$this->load->view('id/footer', $data);
	}
	
	
	public function corporates()
	{
		$wc_lang = 'id';
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
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer', $data);
	}
	
	
	public function corporate()
	{
		$wc_lang = 'id';
		$wc_type = 'page';
		$wc_category = 'corporate';
		$wc_sub_category = $this->uri->segment(3, 'achievement');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function services()
	{
		$wc_lang = 'id';
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
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function service()
	{
		$wc_lang = 'id';
		$wc_type = 'page';
		$wc_category = 'service';
		$wc_sub_category = $this->uri->segment(3, 'non-ground-handling');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function customers()
	{
		$wc_lang = 'id';
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
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function customer()
	{
		$wc_lang = 'id';
		$wc_type = 'page';
		$wc_category = 'customer';
		$wc_sub_category = $this->uri->segment(3, 'non-airline');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/single', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	public function news_list()
	{
		$wc_lang = 'id';
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
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('en/page/page', $data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
	
	
	public function news()
	{
		$wc_lang = 'id';
		$wc_type = 'news';
		$wc_category = 'general';
		$wc_sub_category = $this->uri->segment(3, 'update');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# display airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$slide['image'] = $this->content_model->get_image_gallery('slideshow');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('id/header', $data);
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
		
		$this->load->view('id/header', $data);
		$this->load->view('en/slideshow', $slide);
		$this->load->view('id/page/contact',$data);
		$this->load->view('en/page/sidebar');
		$this->load->view('en/footer');
	}
			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */