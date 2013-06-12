<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Official Website.
	 * ver 1.0.0
	 *
	 * team controller ( english version )
	 *
	 * url : http://localhost/dps
	 * developer : www.studiokami.com
	 * phone : 0361 853 2400
	 * email : support@studiokami.com
	 */
	 
	 function __construct()
	{
        parent::__construct();
		
		# restrict all function access after log in
		$session_data = $this->session->userdata('logged_in');
		if(! $session_data['ui_app_level'] == 'admin')
        { 
            # non admin redirect to dashboard
			redirect('login');
        }
		
		# load model, library and helper
		$this->load->model('user_model','', TRUE);
		$this->load->model('admin_model','', TRUE);
		$this->load->model('content_model','', TRUE);
		$this->load->model('web_management_model','', TRUE);
    }
	
	public function index()
	{
		$nav['view_dashboard'] = 'class="active"';
		$this->load->view('team/header', $nav);
		$this->load->view('team/dashboard');
		$this->load->view('team/footer');
	}
	
	
	
	
	
	
	
	
	
	
	function slideshow_display()
	{		
		$config = array();
        $config['base_url'] = site_url() . '/team/slideshow_display/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 5;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
        $config['total_rows'] = $this->content_model->total_gallery('slideshow');
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
		  
		$data['query'] = $this->content_model->get_image_gallery('slideshow');
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$nav['view_gallery_manager'] = 'class="active"';
		$nav['view_slideshow_manager_start'] = '<b>';
		$nav['view_slideshow_manager_end'] = '</b>';
		
		# call model for splash news on footer
		#$data['query_splash_news'] = $this->web_menagement_model->get_spalash_news($wc_lang);
		
		$this->load->view('team/header', $nav);
		$this->load->view('team/slideshow_management', $data);
	}
	
	function client_display()
	{		
		$config = array();
        $config['base_url'] = site_url() . '/team/client_display/';
		$config['per_page'] = 4; 
		$config["uri_segment"] = 5;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$limit = $config["per_page"];
		$offset = $page;
	
        $config['total_rows'] = $this->content_model->total_gallery('client-logo');
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
		  
		$data['query'] = $this->content_model->get_image_gallery('client-logo');
        $data['link'] = $this->pagination->create_links();
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$nav['view_gallery_manager'] = 'class="active"';
		$nav['view_client_manager_start'] = '<b>';
		$nav['view_client_manager_end'] = '</b>';
		
		# call model for splash news on footer
		#$data['query_splash_news'] = $this->web_menagement_model->get_spalash_news($wc_lang);
		
		$this->load->view('team/header', $nav);
		$this->load->view('team/client_management', $data);
	}
	

	
	function add_gallery()
	{
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		$data['wg_sub_category'] = $this->uri->segment(3, 'slideshow');
		
		# call model for splash news on footer
		//$wc_lang = $this->uri->segment(3, 'en');
		//$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('team/header');
		$this->load->view('team/gallery-form', $data);
	}
	
	function save_content()
	{
		# prepare data
		$wc_type = 'page';
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category = $this->input->post('wc_sub_category');
		if (($wc_sub_category == 'ground-handling') OR ($wc_sub_category == 'non-ground-handling'))
		{
			$wc_category = 'service';
		} else {
			$wc_category = 'corporate';
		}
		$wc_title = $this->input->post('wc_title');
		$wg_tagline = $this->input->post('wc_title');
		$wg_tagline_2 = $this->input->post('wc_title');
		$wc_content = $this->cleanup_nicedit($this->input->post('wc_content'));
		
		# call model
		$this->content_model->add_service($wc_type, $wc_category, $wc_sub_category, $wc_lang, $wc_title, $wc_content);
		
		# get latest content id
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
		# if no image found
		redirect('team/page_display');
	   }
	   else
	   {
		# if image found then do upload
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
		
		# call model
		$wg_tagline_2 = '';
		$this->content_model->save_image_data($wc_type, $wc_category, $wc_id, $wc_sub_category, $wg_image_name, $wg_tagline, $wg_tagline_2);
		
		# call view
		redirect('team');
		}
	}
	
	function save_gallery()
	{
		# prepare data
		$wc_type = 'gallery';
		$wc_sub_category = $this->input->post('wc_sub_category');
		$wc_id = '';
		$wc_category = 'general';
		$wg_tagline_1 = $this->input->post('wc_title_1');
		$wg_tagline_2 = $this->input->post('wc_title_2');
		
		# upload image
	  	$config['upload_path'] = './images/big/';
	  	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	  	$config['max_size']	= '99999';
	  	$config['max_width']  = '99999';
	  	$config['max_height']  = '99999';
	
	   $this->load->library('upload', $config);
	   
	   if ( ! $this->upload->do_upload('wg_image_name'))
	   {
		# if no image found
		redirect('team/page_display');
	   }
	   else
	   {
		# if image found then do upload
		$upload_data = $this->upload->data();
		
		# get file data
		$wg_image_name	= date('YmdHis') . '_' . $upload_data['file_name'];
		$file_ext	= $upload_data['file_ext'];	 	 	 	 	 	 	
		$file_path = $upload_data['file_path'];
		$file_width = $upload_data['image_width'];
		$file_height = $upload_data['image_height'];
		
		# rename file after upload
		rename($upload_data['full_path'], $upload_data['file_path'] . $wg_image_name);
		
		
		if ($wc_sub_category == 'client-logo')
		{
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['new_image'] = './images/logo/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 120;
			#$config['height']	 = 40;

			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			# remove original image form big folder
			$big_dir = FCPATH . 'images/big/' . $row->wg_image_name;
			unlink($big_dir);
			
		}
		elseif ($wc_sub_category == 'slideshow')
		{
			# resize to width 160
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['new_image'] = './images/small/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 150;
			$config['height']	 = 60;
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		}
		else
		{
			# resize to width 600
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/big/' . $wg_image_name .'';
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = '600';
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			# crop to 600 x 350
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
			$config['maintain_ratio'] = TRUE;
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
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 150;
			$config['height']	 = 60;
	
			$this->load->library('image_lib', $config); 
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		}
		
		# call model
		$this->content_model->save_image_data($wc_type, $wc_category, $wc_id, $wc_sub_category, $wg_image_name, $wg_tagline_1, $wg_tagline_2);
		
		# call view
		redirect('team');
		}
	}
	
	function add_service()
	{
		$data['wc_type'] = $this->uri->segment(3, 'page');
		$data['wc_category'] = $this->uri->segment(4, 'service');
		$data['wc_sub_category'] = $this->uri->segment(5, 'non-ground-handling');
		
		# displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$wc_lang = 'en';
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);
		
		$this->load->view('en/header');
		$this->load->view('en/slideshow');
		$this->load->view('team/service-form', $data);
		$this->load->view('team/sidebar');
		$this->load->view('en/footer');
	}
	
	function save_service()
	{
		$wc_type = 'page';
		$wc_category = 'service';
		$wc_lang = $this->input->post('wc_lang');
		$wc_sub_category = $this->input->post('wc_sub_category');
		$wc_title = $this->input->post('wc_title');
		$wc_content = $this->cleanup_nicedit($this->input->post('wc_content'));
		
		$this->content_model->add_service($wc_type, $wc_category, $wc_sub_category, $wc_lang, $wc_title, $wc_content);
		
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
		 # displya airline logo on footer based on images on ./image/logo
		$this->load->helper('directory');
		$data['logo'] = directory_map('./images/logo/');
		
		# call model for splash news on footer
		$data['query_splash_news'] = $this->content_model->get_spalash_news($wc_lang);  
		 
		$this->load->view('en/header');
		$this->load->view('en/slideshow');
		$this->load->view('team/service-form');
		$this->load->view('team/sidebar');
		$this->load->view('en/footer');
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
		$this->content_model->save_image_data($wc_type, $wc_category, $wc_id, $wc_sub_category, $wg_image_name);
		
		# call view
		redirect('team/content');
		}
	}
	
	
	
	
	
	
	function delete_gallery()
	{
		$wg_id = $this->uri->segment(3, 0);
		$query = $this->content_model->get_id_gallery($wg_id);
		
		foreach ( $query as $row) :
			$big_dir = FCPATH . 'images/big/' . $row->wg_image_name;
			$med_dir = FCPATH . 'images/medium/' . $row->wg_image_name;
			$small_dir = FCPATH . 'images/small/' . $row->wg_image_name;
			if ($row->wg_sub_category == 'client-logo')
			{
				$logo_dir = FCPATH . 'images/logo/' . $row->wg_image_name;
				unlink($logo_dir);
			}
			else
			{
				unlink($big_dir);
				unlink($med_dir);
				unlink($small_dir);
			}
		endforeach;
		
		$this->content_model->delete_image_gallery($wg_id);
		
		
		# call view
		if($this->uri->segment(4) == 'slideshow')
		{
			redirect('team/slideshow_display');
		}elseif($this->uri->segment(4) == 'client-logo')
		{
			redirect('team/client_display');
		}
	}
	
}

/* End of file team.php */
/* Location: ./application/controllers/team.php */