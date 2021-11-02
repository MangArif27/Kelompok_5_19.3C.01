<?php

class m_layanan extends CI_Model{
  private $table = "layanan";

  function insert_pendaftaran($data_insert){
    $sql = $this->db->insert($this->table, $data_insert);
  }
  function tmpl_datapendaftaran(){
    $this->db->select('*');
    $this->db->from('layanan');
    $this->db->join('datawbp', 'datawbp.no_induk=layanan.no_induk', 'LEFT');
    $this->db->join('user', 'user.no_identitas=layanan.no_identitas', 'LEFT');
    $query = $this->db->get();
    return $query;
  }
  function update_datapendaftaran($Tiket,$data){
    $this->db->where($NoInduk);
    $this->db->update($this->table,$data);
  }
  function search_datapendaftaran($Tiket){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE  tiket = '$Tiket'");
    return $sql;
  }
  function delete_datapendaftaran($Tiket){
    $this->db->where($Tiket);
    $this->db->delete($this->table, $Tiket);
  }
}
?>
