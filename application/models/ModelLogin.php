<?php

class ModelLogin extends CI_Model
{
  public function authentic($username, $password)
  {
    $query = $this->db->query("SELECT * FROM datauser WHERE Name='$username' AND Password = '$password' LIMIT 1");
    return $query;
  }
}
