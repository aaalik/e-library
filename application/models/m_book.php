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

    function add_book($data, $table)
    {
      $this->db->insert($table,$data);
    }

    function edit_book($data,$table,$id){
      $this->db->where("book_id",$id);
      $x = $this->db->update($table,$data);
    }

  }
?>