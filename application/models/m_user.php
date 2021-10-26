<?php

class m_user extends CI_Model{
  private $table = "user";

  function auth_login($username,$password){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE no_identitas = '$username' AND password = md5('$password') LIMIT 1");
    return $sql;
  }
  function auth_registrasi($data_insert){
    $sql = $this->db->insert($this->table, $data_insert);
  }
  function tmpl_user(){
    return $this->db->get($this->table);
  }
  function update_user($NoInduk,$data){
    $this->db->where($NoInduk);
    $this->db->update($this->table,$data);
  }
  function search_user($NoIdentitas){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE  no_identitas = '$NoIdentitas'");
    return $sql;
  }
  function delete_user($NoInduk){
    $this->db->where($NoInduk);
    $this->db->delete($this->table, $NoInduk);
  }
}
?>
