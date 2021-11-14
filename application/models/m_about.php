<?php

class m_about extends CI_Model{
  private $table = "about";

  function insert_about($data){
    $sql = $this->db->insert($this->table, $data);
  }
  function tmpl_about(){
    return $this->db->get($this->table);
  }
  function update_about($Id,$data){
    $this->db->where($Id);
    $this->db->update($this->table,$data);
  }
  function search_about(){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE  id_upt = '516'");
    return $sql;
  }
  function delete_about($Id){
    $this->db->where($Id);
    $this->db->delete($this->table, $Id);
  }
}
?>
