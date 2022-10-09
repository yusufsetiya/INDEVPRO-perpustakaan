<?php

class ModelUser extends CI_Model
{

  public function getData()
  {
    $query = $this->db->query("SELECT * FROM databuku")->result();
    return $query;
    // return $this->db->get('tb_petugas')->result();
  }
  public function getDetail($where, $table)
  {
    return $this->db->get_where($table, $where);
  }
}
