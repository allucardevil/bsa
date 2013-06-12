<?php
class Content_model extends CI_Model
{
	
# CONSTRUCTOR ---------------------------	
	function __construct()
	{
        parent::__construct();
    }
# CONSTRUCTOR ---------------------------

	function get_3_service($wc_lang)
	{
		$this->db->where('wc_type', 'page'); 
		$this->db->where('wc_category', 'service'); 
		$this->db->where('wc_lang', $wc_lang); 
		$this->db->order_by('wc_id', 'RANDOM');
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
    	$this->db->limit(3);
		$query_3_service = $this->db->get('web_content');
		return $query_3_service->result();
	}
	
	# get splash news for footer
	function get_spalash_news($wc_lang)
	{
		$this->db->where('wc_type', 'news'); 
		$this->db->where('wc_lang', $wc_lang);
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->order_by('wc_id', 'DESC');
		$query_splash_news = $this->db->get('web_content');
		return $query_splash_news->result();
	}

	# corporate page 
	function total_content($wc_lang, $wc_type, $wc_category, $wc_sub_category)
	{
		$this->db->where('wc_lang', $wc_lang);
		$this->db->where('wc_type', $wc_type);
		$this->db->where('wc_category', $wc_category);
		$this->db->where('wc_sub_category', $wc_sub_category);
		$this->db->from('web_content');
		return $this->db->count_all_results();
	}
	
	function get_content($wc_lang, $wc_type, $wc_category, $wc_sub_category, $limit, $offset)
	{
		$this->db->where('wc_lang', $wc_lang);
		$this->db->where('wc_type', $wc_type);
		$this->db->where('wc_category', $wc_category);
		$this->db->where('wc_sub_category', $wc_sub_category);
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->order_by('wc_id', 'DESC');
		$this->db->limit($limit, $offset); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	
	function content_by_id($wc_lang, $wc_type, $wc_category, $wc_sub_category, $wc_id)
	{
		$this->db->where('wc_lang', $wc_lang);
		$this->db->where('wc_type', $wc_type);
		$this->db->where('wc_category', $wc_category);
		$this->db->where('wc_sub_category', $wc_sub_category);
		$this->db->where('wc_id', $wc_id);
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->limit(1); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	# corporate page 
	
	# get page 
	function get_page($wc_sub_category)
	{
		$this->db->where('wc_type', 'page');
		$this->db->where('wc_category', 'corporate');
		$this->db->where('wc_sub_category', $wc_sub_category);
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->order_by('wc_id', 'DESC'); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	# get page
	
	function get_service($service_id)
	{
		$this->db->where('wc_id', $service_id);
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->limit(1); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	
	function get_image_gallery($wg_sub_category)
	{
		$this->db->where('wg_sub_category', $wg_sub_category);
		$query = $this->db->get('web_gallery');
		return $query->result();
	}
	
	function total_customer()
	{
		$this->db->where('wc_category', 'customer');
		$this->db->from('web_content');
		return $this->db->count_all_results();
	}
	
	function total_gallery($wg_type)
	{
		$this->db->where('wg_type', $wg_type);
		$this->db->from('web_gallery');
		return $this->db->count_all_results();
	}
	
	function get_customer($limit, $offset)
	{
		$this->db->where('wc_category', 'customer'); 
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->limit($limit, $offset); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	
	function content_list($wc_category)
	{
		$this->db->where('wc_category', $wc_category); 
		$this->db->join('web_gallery', 'web_gallery.wg_wc_id = web_content.wc_id', 'left');
		$this->db->limit($limit, $offset); 
		$query = $this->db->get('web_content');
		return $query->result();
	}
	
	function add_service($wc_type, $wc_category, $wc_sub_category, $wc_lang, $wc_title, $wc_content)
	{
		$session_data = $this->session->userdata('logged_in');
		$user = $session_data['ui_email'];
		
		$data = array(
			'wc_type' => $wc_type,	
			'wc_category'	=> $wc_category,
			'wc_sub_category' => $wc_sub_category,
			'wc_lang' => $wc_lang,	
			'wc_title'	 => $wc_title,
			'wc_content' => $wc_content,
			'wc_upload_by' => $user,
		);
		$this->db->insert('web_content', $data);
	}
	
	function get_latest_id($wc_sub_category, $wc_lang, $wc_title, $wc_content)
	{
		$this->db->where('wc_sub_category', $wc_sub_category);
		$this->db->where('wc_lang', $wc_lang); 
		$this->db->where('wc_title', $wc_title);
		$this->db->order_by("wc_id", "desc"); 
		$this->db->limit(1); 
		$query = $this->db->get('web_content');
		return $query->result(); 
	}
	
	function save_image_data($wc_type, $wc_category, $wg_wc_id,	 $wc_sub_category, $wg_image_name, $wg_tagline_1, $wg_tagline_2)
	{
		$session_data = $this->session->userdata('logged_in');
		$user = $session_data['ui_email'];
		
		$data = array(
			'wg_wc_id' => $wg_wc_id,
			'wg_type' => $wc_type,	
			'wg_category'	=> $wc_category,
			'wg_sub_category' => $wc_sub_category,
			'wg_tagline' => $wg_tagline_1,
			'wg_tagline_2' => $wg_tagline_2,
			'wg_image_name' => $wg_image_name,	
			'wg_upload_by'	 => $user,
		);
		$this->db->insert('web_gallery', $data);
	}
	
	function delete_content($wc_id)
	{
		# delete data from web content
		$this->db->delete('web_content', array('wc_id' => $wc_id)); 
	}
	
	function get_gallery($wc_id)
	{
		# delete image files
		$this->db->where('wg_wc_id', $wc_id);
		$query = $this->db->get('web_gallery');
		return $query->result(); 
	}
	
	function get_id_gallery($wg_id)
	{
		# delete image files
		$this->db->where('wg_id', $wg_id);
		$query = $this->db->get('web_gallery');
		return $query->result(); 
	}
	
	function delete_gallery($wc_id)
	{
		# delete image db
		$this->db->delete('web_gallery', array('wg_wc_id' => $wc_id)); 
	}
	
	function delete_image_gallery($wg_id)
	{
		# delete image db
		$this->db->delete('web_gallery', array('wg_id' => $wg_id)); 
	}
	
	function update_content($wc_id, $wc_lang, $wc_sub_category, $wc_title, $wc_content)
	{
		if (($wc_sub_category == 'ground-handling') OR ($wc_sub_category == 'non-ground-handling'))
		{
			$wc_category = 'service';
		} 
		elseif (($wc_sub_category == 'about-us') OR ($wc_sub_category == 'network') OR ($wc_sub_category == 'achievement')) 
		{
			$wc_category = 'corporate';
		}
		
		$session_data = $this->session->userdata('logged_in');
		$user = $session_data['ui_email'];
		
		$data = array(
               'wc_id' => $wc_id,
               'wc_lang' => $wc_lang,
               'wc_sub_category' => $wc_sub_category,
			   'wc_title' => $wc_title,
			   'wc_content' => $wc_content,
			   'wc_upload_by' => $user,
            );

		$this->db->where('wc_id', $wc_id);
		$this->db->update('web_content', $data);	
	}
	
}