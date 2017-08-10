<?php
  Class m_main extends CI_Model
  {
    function login($email, $pass)
    {
      $this->db->where("email",$email);
      $this->db->where("pass",$pass);
      
      //$this->db->where("name",$email);
      $check = $this->db->get("tb_user");
      return $check;
    }
  }
?>