<?php

class ModelAdmin extends CI_Model
{
  public function CountUser()
  {
    $sql = "SELECT COUNT(UserID) AS jumlah FROM datauser";
    return $this->db->query($sql)->row_array();
  }

  public function CountBuku()
  {
    $sql = "SELECT COUNT(ID) AS buku FROM databuku";
    return $this->db->query($sql)->row_array();
  }

  public function getData()
  {
    $query = $this->db->query("SELECT * FROM datauser")->result();
    return $query;
    // return $this->db->get('tb_petugas')->result();
  }
  public function AddData($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function EditData($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function delete($id, $table)
  {
    $this->db->where($id);
    $this->db->delete($table);
  }

  public function get_idusers($iduser)
  {
    $sql = "SELECT UserID FROM datauser WHERE UserID = $iduser";
    $hasil = $this->db->query($sql)->row_array();

    if ($hasil >= 1) {
      $result = ['result' => '1'];
      return json_encode($result);
    } else {
      $result = ['result' => '0'];
      return json_encode($result);
    }
  }
}
