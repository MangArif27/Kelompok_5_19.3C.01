<?php

class m_datawbp extends CI_Model{
  private $table = "datawbp";

  function upload_datawbp($data){
		$insert = $this->db->insert_batch($this->table, $data);
		if($insert){
			return true;
		}
	}
  function insert_datawbp($data){
    $this->db->truncate($this->table);
    $this->db->insert_batch($this->table, $data);
    if($this->db->affected_rows()>0)
    {
      return 1;
    }
    else {
      return 0;
    }
  }
  function tmpl_datawbp(){
    return $this->db->get($this->table);
  }
  function update_datawbp($NoInduk,$data){
    $this->db->where($NoInduk);
    $this->db->update($this->table,$data);
  }
  function search_datawbp($NoInduk){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE  no_induk = '$NoInduk'");
    return $sql;
  }
  function delete_datawbp($NoInduk){
    $this->db->where($NoInduk);
    $this->db->delete($this->table, $NoInduk);
  }
}
?>
