<?php
class Admin_model extends CI_Model
{
	
# constructor ------------------------------------------------------------------------------	
	function __construct()
	{
        parent::__construct();
    }
# constructor ------------------------------------------------------------------------------

# get all user --------------------------------------------------------
	function get_all_user()
	{
		$this->db->order_by("ui_cabang", "asc"); 
		$this->db->order_by("ui_unit", "asc");
		$query_all_user = $this->db->get('user_identity');
		return $query_all_user->result();	
	}
# get all user --------------------------------------------------------

# get user by id -----------------------------------------------------
	function get_user_by_id($id)
	{
		$query_user = $this->db->get_where('user_identity', array('ui_id' => $id));
		return $query_user->result();	
	}
# get user by id -----------------------------------------------------

# update user ------------------------------------------------------
	function update_user($id, $hp, $jabatan, $level)
	{
		$data = array(
               'ui_hp' => $hp,
               'ui_jabatan' => $jabatan,
               'ui_app_level' => $level
            );

		$this->db->where('ui_id', $id);
		$this->db->update('user_identity', $data); 
	}
# update user ------------------------------------------------------

# update user ------------------------------------------------------
	function delete_user($id)
	{
		$this->db->delete('user_identity', array('ui_id' => $id)); 
	}
# update user ------------------------------------------------------


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
		 $this->db-> select('ui_id, ui_nama, ui_nipp, ui_hp, ui_email, ui_cabang, ui_unit, ui_jabatan, ui_app_level, ui_app_role, ui_verification, ui_ver_date');
	     $this->db-> from('user_identity');
	     $this->db-> where('ui_email', $email);
	     $this->db-> limit(1);
	     $query = $this->db->get();
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


}