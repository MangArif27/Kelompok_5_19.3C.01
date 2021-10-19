<?php

class m_user extends CI_Model{
  function auth_login($username,$password){
        $sql = $this->db->query("SELECT * FROM user WHERE no_identitas = '$username' AND password = md5('$password') LIMIT 1");
        return $sql;
    }
}
?>
