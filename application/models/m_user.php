<?php

class m_user extends CI_Model{
  private $table = "user";

  function auth_login($username,$password){
    $sql = $this->db->query("SELECT * FROM user WHERE no_identitas = '$username' AND password = md5('$password') LIMIT 1");
    return $sql;
  }
  function auth_registrasi($data_insert){
    $sql = $this->db->insert('user', $data_insert);
  }
  function tmpl_user(){
		return $this->db->get('user');
	}
  function update_user($id,$data){
    $this->db->where($id);
		$this->db->update('user',$data);
	}
}
?>
