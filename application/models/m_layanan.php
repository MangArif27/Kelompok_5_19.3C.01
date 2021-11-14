<?php

class m_layanan extends CI_Model{
  private $table = "layanan";

  function insert_pendaftaran($data){
    $sql = $this->db->insert($this->table, $data);
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
  function search_datapendaftaran($tiket){
    $sql = $this->db->query("SELECT * FROM $this->table WHERE  tiket = '$tiket'");
    return $sql;
  }
  function delete_datapendaftaran($Tiket){
    $this->db->where($Tiket);
    $this->db->delete($this->table, $Tiket);
  }
  function seacrh_tiket($tiket){
    $this->db->select('*');
    $this->db->where('tiket', $tiket);
    $this->db->from('layanan');
    $this->db->join('datawbp', 'datawbp.no_induk=layanan.no_induk', 'LEFT');
    $this->db->join('user', 'user.no_identitas=layanan.no_identitas', 'LEFT');
    $query = $this->db->get();
    return $query;
  }
  function update_tiket($tiket,$data){
    $this->db->where('tiket',$tiket);
    $this->db->update($this->table,$data);
  }
}
?>
