<?php
  Class m_book extends CI_Model
  {
    function show_book(){
      return $this->db->get('tb_book');
    }

    function detail_book($id){
      $this->db->where('book_id',$id);
      $query = $this->db->get('tb_book');
      return $query;
    }

  }
?>