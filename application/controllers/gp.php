<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gp extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Official Website.
	 * ver 1.0.0
	 *
	 * gp controller ( internal gapura angkasa version )
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
		$this->load->model('web_management_model','', TRUE);
		
		# user access restriction
		if ( ! $this->session->userdata('logged_in'))
    	{ 
        	# function allowed for access without login
			$allowed = array('index');
        
			# other function need login
			if (! in_array($this->router->method, $allowed)) 
			{
    			redirect('user/login');
			}
   		 }
    }
	
	
	
	public function index()
	{
		# redirect to dashboard
		$nav['view_dashboard'] = 'class="active"';
		$this->load->view('gp/header', $nav);
		$this->load->view('gp/home/dashboard');
		$this->load->view('gp/footer');
	}
	
	function cleanup_nicedit($string)
	{
		$search = array('<div>','</p>','<span>');
		$replace = array('<br><div>','<br><br /></p>','<br><span>');
		$string = str_replace($search, $replace, $string);
		$string = strip_tags($string,'<br><a><i><em><b><u><strong>');
		return $string;
	}
	
	# news -------------------------------------------------------------
	function news_management()
	{
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category = $this->input->post('wc_sub_category');
		
		redirect('gp/news_display/' . $wc_lang . '/' . $wc_sub_category . '/');
	}
	
	function news_display()
	{
		$wc_lang = $this->uri->segment(3, 'en');
		$data['wc_lang'] = $wc_lang;
		$wc_sub_category = $this->uri->segment(4, 'update');
		$data['wc_sub_category'] = $wc_sub_category;
		
		$config = array();
        $config['base_url'] = site_url() . '/gp/news_display/' .$wc_lang. '/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 5;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
        $config['total_rows'] = $this->web_management_model->total_content($wc_lang, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
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
		  
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->web_management_model->get_content($wc_lang, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		$this->load->view('gp/header');
		$this->load->view('team/news_management', $data);
		$this->load->view('gp/footer');
	}

	function add_news()
	{
		$data['wc_type'] = $this->uri->segment(3, 'news');
		$data['wc_category'] = $this->uri->segment(4, 'general');
		$data['wc_sub_category'] = $this->uri->segment(5, 'update');
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$wc_lang = 'en';
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('team/header');
		$this->load->view('team/news-form', $data);
	}
	
	function save_news()
	{
		$wc_type = 'news';
		$wc_category = $this->input->post('wc_category');
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category = $this->input->post('wc_sub_category');
		$wc_title = $this->input->post('wc_title');
		$wg_tagline = '';
		$wg_tagline_1 = $this->input->post('wc_title');
		$wg_tagline_2 = $this->input->post('wc_title');
		
		$wc_content = $this->cleanup_nicedit($this->input->post('wc_content'));
		$this->content_model->add_service($wc_type, $wc_category, $wc_sub_category, $wc_lang, $wc_title, $wc_content);
		
		#get latest id
		$query = $this->content_model->get_latest_id($wc_sub_category, $wc_lang, $wc_title, $wc_content);
		foreach ($query as $row) : 
			$wc_id = $row->wc_id;
		endforeach;
		
		# upload image
	  	$config['upload_path'] = './images/big/';
	  	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	  	$config['max_size']	= '99999';
	  	$config['max_width']  = '99999';
	  	$config['max_height']  = '99999';
	
	   $this->load->library('upload', $config);
	   
	   if ( ! $this->upload->do_upload('wg_image_name'))
	   {
			# if no image to upload
			redirect('gp/news_management/');
	   }
	   else
	   {
		# DO UPLOAD
		$upload_data = $this->upload->data();
		
		# GET REAL DATA FOR DB
		$wg_image_name	= date('YmdHis') . '_' . $upload_data['file_name'];
		$file_ext	= $upload_data['file_ext'];	 	 	 	 	 	 	
		$file_path = $upload_data['file_path'];
		$file_width = $upload_data['image_width'];
		$file_height = $upload_data['image_height'];
		
		# rename file after upload
		rename($upload_data['full_path'], $upload_data['file_path'] . $wg_image_name);
		
		# resize to width 600
		$config['image_library'] = 'gd2';
		$config['source_image']	= './images/big/' . $wg_image_name .'';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width']	 = 600;

		$this->load->library('image_lib', $config); 
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		# crop
		$config['x_axis'] = 0;
		$config['y_axis'] = ($file_height / 2 ) - 175;
		$config['image_library'] = 'gd2';
		$config['source_image']	= './images/big/' . $wg_image_name .'';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width']	 = 600;
		$config['height']	= 350;
		
		$this->load->library('image_lib', $config); 
		$this->image_lib->initialize($config);
		$this->image_lib->crop();
		
		# resize to width 235
		$config['image_library'] = 'gd2';
		$config['source_image']	= './images/big/' . $wg_image_name .'';
		$config['new_image'] = './images/medium/' . $wg_image_name .'';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width']	 = 235;
		$config['height']	 = 90;

		$this->load->library('image_lib', $config); 
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		# resize to width 160
		$config['image_library'] = 'gd2';
		$config['source_image']	= './images/big/' . $wg_image_name .'';
		$config['new_image'] = './images/small/' . $wg_image_name .'';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width']	 = 150;
		$config['height']	 = 60;

		$this->load->library('image_lib', $config); 
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		# call model
		$this->content_model->save_image_data($wc_type, $wc_category, $wc_id, $wc_sub_category, $wg_image_name, $wg_tagline_1, $wg_tagline_2);
		
		# call view
		redirect('gp/news_management/');
		}
	}

	
	public function news_list()
	{
		$wc_lang = 'gp';
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
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('gp/header');
		$this->load->view('gp/page/page', $data);
		$this->load->view('gp/footer');
	}
	
	
	public function news()
	{
		$wc_lang = 'gp';
		$wc_type = 'news';
		$wc_category = 'general';
		$wc_sub_category = $this->uri->segment(3, 'update');
		$wc_id = $this->uri->segment(4, 0);
				
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('gp/header');
		$this->load->view('gp/page/single', $data);
		$this->load->view('gp/footer');
	}
	
	
	function page_management()
	{
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category = $this->input->post('wc_sub_category');
		
		redirect('gp/page_display/' . $wc_lang . '/' . $wc_sub_category . '/');
	}
	
	function page_display()
	{
		$wc_lang = $this->uri->segment(3, 'en');
		$data['wc_lang'] = $wc_lang;
		$wc_sub_category = $this->uri->segment(4, 'achievement');
		$data['wc_sub_category'] = $wc_sub_category;
		
		$config = array();
        $config['base_url'] = site_url() . '/team/page_display/' .$wc_lang. '/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 5;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
        $config['total_rows'] = $this->web_management_model->total_content($wc_lang, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
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
		  
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->web_management_model->get_content($wc_lang, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		
		$this->load->view('gp/header');
		$this->load->view('team/page_management', $data);
		$this->load->view('gp/footer');
	}
#-------------------------------------------------------

#-------- content -------------------------------------
	function content()
	{
		$wc_lang = $this->uri->segment(3, 'en');
		$wc_type = $this->uri->segment(4, 'page');
		$wc_category = $this->uri->segment(5, 'corporate');
		$wc_sub_category = $this->uri->segment(6, 'achievement');
		
		$config = array();
        $config['base_url'] = site_url() . '/team/content/' .$wc_lang. '/'.$wc_type. '/' . $wc_category . '/' . $wc_sub_category . '/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
		$offset = $page;
        $config['total_rows'] = $this->content_model->total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category);
        $data['total'] = $config['total_rows'];
          
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
		  
        $this->pagination->initialize($config);
		  
		$data['query'] = $this->content_model->get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset);
        $data['link'] = $this->pagination->create_links();
		
		# call view
		$this->load->view('gp/header');
		$this->load->view('team/dashboard', $data);
		$this->load->view('gp/footer');
	}
	
	function add_content()
	{
		
		$data['wc_type'] = $this->uri->segment(3, 'page');
		$data['wc_category'] = $this->uri->segment(4, 'corporate');
		$data['wc_sub_category'] = $this->uri->segment(5, 'achievement');
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		//$wc_lang = $this->uri->segment(3, 'en');
		//$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('team/header');
		$this->load->view('team/content-form', $data);
	}
#-------- content -------------------------------------	
	function delete()
	{
		$wc_id = $this->uri->segment(3, 0);
		$this->content_model->delete_content($wc_id);
		$query = $this->content_model->get_gallery($wc_id);
		
		foreach ( $query as $row) :
			if(! $row->wg_image_name == '')
			{
				$big_dir = FCPATH . 'images/big/' . $row->wg_image_name;
				$med_dir = FCPATH . 'images/medium/' . $row->wg_image_name;
				$small_dir = FCPATH . 'images/small/' . $row->wg_image_name;
				
				unlink($big_dir);
				unlink($med_dir);
				unlink($small_dir);
			}
		endforeach;
		
		$this->content_model->delete_gallery($wc_id);
		
		
		# call view
		if($this->uri->segment(4) == 'page')
		{
			redirect('gp/page_display');
		}
		elseif($this->uri->segment(4) == 'news')
		{
			redirect('gp/news_display');
		}
	}
	
	
	function edit()
	{
		$wc_lang = $this->uri->segment(3, 0);
		$wc_type = $this->uri->segment(4, 0);
		$wc_category = $this->uri->segment(5, 0); 
		$wc_sub_category = $this->uri->segment(6, 0);
		$wc_id = $this->uri->segment(7, 0);
		
		$data['query'] = $this->content_model->content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id);
		
		$this->load->view('gp/header');
		$this->load->view('team/edit-form', $data);
		$this->load->view('gp/footer');
	}
	
	function update()
	{
		# upload image
			$config['upload_path'] = './images/big/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size']	= '99999';
			$config['max_width']  = '99999';
			$config['max_height']  = '99999';
		
		   $this->load->library('upload', $config);
		   
			
		$wc_id = $this->input->post('wc_id');
		$wg_image_name = $this->input->post('wg_image_name');
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category  = $this->input->post('wc_sub_category');
		$wc_title   = $this->input->post('wc_title');
		
		$wc_type   = $this->input->post('wc_type');
		$wc_category   = $this->input->post('wc_category');
		$wc_content = $this->cleanup_nicedit($this->input->post('wc_content'));
		
		if ( ! $this->upload->do_upload('wg_image_name'))
		{
    		# update content db
			$this->content_model->update_content($wc_id, $wc_lang, $wc_sub_category, $wc_title, $wc_content);
		}   
		else
		{
			# update content db
			$this->content_model->update_content($wc_id, $wc_lang, $wc_sub_category, $wc_title, $wc_content);
			
			# get image data by wc_id
			$query = $this->content_model->get_gallery($wc_id);
		
			# delete images files
			foreach ( $query as $row) :
				$big_dir = FCPATH . 'images/big/' . $row->wg_image_name;
				$med_dir = FCPATH . 'images/medium/' . $row->wg_image_name;
				$small_dir = FCPATH . 'images/small/' . $row->wg_image_name;
				
				unlink($big_dir);
				unlink($med_dir);
				unlink($small_dir);
			endforeach;
		
			# delete image data on db
			$this->content_model->delete_gallery($wc_id);
		   
		   # get upload data
			$upload_data = $this->upload->data();
			
			# get file data
			$wg_image_name	= date('YmdHis') . '_' . $upload_data['file_name'];
			$file_ext	= $upload_data['file_ext'];	 	 	 	 	 	 	
			$file_path = $upload_data['file_path'];
			$file_width = $upload_data['image_width'];
			$file_height = $upload_data['image_height'];
			
			# rename file after upload
			rename($upload_data['full_path'], $upload_data['file_path'] . $wg_image_name);
			
			# resize to width 600
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width']	 = 600;
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			# crop
			$config['x_axis'] = 0;
			$config['y_axis'] = ($file_height / 2 ) - 175;
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width']	 = 600;
			$config['height']	= 350;
			
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			
			# resize to width 235
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['new_image'] = './images/medium/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width']	 = 235;
			$config['height']	 = 90;
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			# resize to width 160
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['new_image'] = './images/small/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width']	 = 150;
			$config['height']	 = 60;
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$wg_tagline_1 = $wc_title;
			$wg_tagline_2 = $wc_sub_category;
			# call model
			$this->content_model->save_image_data($wc_type, $wc_category, $wc_id, $wc_sub_category, $wg_image_name, $wg_tagline_1, $wg_tagline_2);
			
		}
		redirect('team/content');
	}
			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */