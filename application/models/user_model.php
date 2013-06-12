<?php
class User_model extends CI_Model
{
	
# constructor ------------------------------------------------------------------------------	
	function __construct()
	{
        parent::__construct();
    }
# constructor ------------------------------------------------------------------------------

# save data on user identity table -------------------------------------
	function save_user($nama, $nipp, $hp, $full_email, $cabang, $unit, $jabatan)
	{
		$data = array(
		'ui_nama' => $nama,
		'ui_hp' => $hp,
		'ui_nipp' => $nipp,
		'ui_email' => $full_email,
		'ui_cabang' => $cabang,
		'ui_unit' => $unit,
		'ui_jabatan' => $jabatan,
		'ui_app_level' => 'user',
		'ui_app_role' => '0000000000000',
		'ui_verification' => 'n',
		'ui_ver_date' => '0000-00-00 00:00:00',
		);
		
		$this->db->insert('user_identity', $data);
	}
# save data on user identity table -------------------------------------


# check user on user indetity table ------------------------------------
	function check_reg_email($email)
	{
		 $this -> db -> select('ui_id, ui_nama, ui_nipp, ui_hp, ui_email, ui_cabang, ui_unit, ui_jabatan, ui_app_level, ui_app_role, ui_verification, ui_ver_date');
	     $this -> db -> from('user_identity');
	     $this -> db -> where('ui_email', $email);
	     $this -> db -> limit(1);
	     $query = $this -> db -> get();
		 return $query->result();	
	}
# check user on user indetity table ------------------------------------


# del previous unverify data on user identity table -------------------		
	function del_dup_prev_user_unver_data($full_email)
	{
		$this->db->delete('user_identity', array('ui_email' => $full_email)); 
	}
# del previous unverify data on user identity table -------------------


# get all stn available  ----------------------------------------------		
	function get_cabang()
	{
		 $this->db->select('uc_id,	uc_code, uc_name');
	     $this->db->from('user_cabang');
	     $this->db->where('uc_code !=', 'all');
		 $this->db->order_by('uc_name', 'asc');
	     $query_cabang_combo = $this->db->get();
		 #return $query_cabang_combo->result();
		 if ($query_cabang_combo->num_rows() > 0 )
		 {
			 return $query_cabang_combo->result_array();
		 }
		 else
		 {
			 return array();
		 }
	}
# get all stn available  ----------------------------------------------	


# get all unit available  ----------------------------------------------		
	function get_unit($cabang)
	{
	     $this->db->where('uu_uc_code', $cabang);
		 $this->db->where('uu_code !=', 'all');
		 $this->db->order_by('uu_name', 'asc');
		 
		 $query_unit_combo = $this->db->get('user_unit');

		 if ($query_unit_combo->num_rows() > 0 )
		 {
			 return $query_unit_combo->result_array();
		 }
		 else
		 {
			 return array();
		 }
	}
# get all unit available  ----------------------------------------------	

# do verification --------------------------------------------------------
	function do_verification($email, $pin)
 	{
	   $this->db->select('uv_email, uv_pin, uv_link');
	   $this->db->from('user_verification');
	   $this->db->where('uv_email', $email);
	   $this->db->where('uv_pin', $pin);
	   /*$this->db->where('uv_expired  >', date("Y-m-d H:i:s"));*/
	   
	   $this->db->limit(1);
	
	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
		 # update verification field on user identity table
		 $data = array(
               'ui_verification' => 'y',
               'ui_ver_date' => date("Y-m-d H:i:s"),
            );
		 $this->db->where('ui_email', $email);
		 $this->db->update('user_identity', $data);
		 
		 # remove verification data on verification table
		 $this->db->delete('user_verification', array('uv_email' => $email)); 
		 
		 # autologin verified user
		 $this -> db -> select('ui_id, ui_nama, ui_nipp, ui_hp, ui_email, ui_cabang, ui_unit, ui_jabatan, ui_app_level, ui_app_role, ui_verification, ui_ver_date');
	     $this -> db -> from('user_identity');
	     $this -> db -> where('ui_email', $email);
		 $this -> db -> where('ui_verification', 'y');
	     $this -> db -> where('ui_verification  !=', '0000-00-00 00:00:00');
	     $this -> db -> limit(1);
	     $query = $this -> db -> get();
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	   
 	}
# do verification --------------------------------------------------------

# del previous data on verification table ------------------------------	
	function del_dup_prev_ver_data($full_email)
	{
		$this->db->delete('user_verification', array('uv_email' => $full_email)); 
	}
# del previous data on verification table ------------------------------	

# save data on user verification table ---------------------------------
	function save_verification($email, $hp, $pin, $link, $request, $expired)
	{
		$data = array(
		'uv_email' => $email,
		'uv_hp' => $hp,
		'uv_type' => 'register',
		'uv_pin' => $pin,
		'uv_link' => $link,
		'uv_date' => $request,
		'uv_expired' => $expired,
		);
		
		$this->db->insert('user_verification', $data);
	}
# save data on user verification table ---------------------------------

#get user identity
	function get_user_identity($email){
		#$query="SELECT ui_nama, ui_nipp, ui_hp, ui_email, ui_cabang, ui_unit, ui_jabatan, ui_app_level FROM user_identity WHERE ui_email LIKE " \'. $email . \'"
		#";
		#$query=$this->db->query($query);
		#return $query->result();
		$this -> db -> select('ui_nama, ui_nipp, ui_hp, ui_email, ui_cabang, ui_unit, ui_jabatan, ui_app_level');
		$this -> db -> from('user_identity');
		$this -> db -> where('ui_email', $email);
		$query = $this -> db -> get();
		return $query->result();
	}
#get user identity

#get all user identity
	function get_all_ui(){
		$query="SELECT * FROM user_identity";
		$query=$this->db->query($query);
		return $query->result();
	}
	function del_user($id_user){
		$query="DELETE FROM user_identity WHERE ui_id=$id_user
		";
		$this->db->query($query);
	}
	function get_user_by_id($id_user){
		$this->db->where('ui_id', $id_user);
		return $this->db->get('user_identity')->result();
	}
	function update_user($id_user){
		$data = array(
				  'ui_nama'=>$this->input->post('nama'),
				  'ui_nipp'=>$this->input->post('nipp'),
				  'ui_email'=>$this->input->post('email'),
				  'ui_hp'=>$this->input->post('hp'),
				  'ui_cabang'=>$this->input->post('cabang'),
				  'ui_unit'=>$this->input->post('unit'),
				  'ui_jabatan'=>$this->input->post('jabatan'),
				  'ui_app_level'=>$this->input->post('level'),
				);
		$this->db->where('ui_id',$id_user);
		$this->db->update('user_identity',$data); 
	}
}