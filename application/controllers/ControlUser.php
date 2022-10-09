<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlUser extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('ModelUser');
    if (empty($this->session->userdata('UserID') && $this->session->userdata('User'))) {
      echo "<script>
            alert('Anda Tidak Memiliki Akses Ke Halaman Tersebut');
            window.location.href = '" . base_url('ControlLogin') . "';
        </script>";
      $this->session->sess_destroy();
    }
  }

  public function index()
  {
    $data['title'] = "Home";
    $data['buku'] = $this->ModelUser->getData();
    $this->load->view('admin/header', $data);
    $this->load->view('user/sidebar', $data);
    $this->load->view('user/home', $data);
    $this->load->view('admin/footer');
  }

  public function Detail($id)
  {
    $data['title'] = "User";
    $where = array('ID' => $id);
    $data['detail'] = $this->ModelUser->getDetail($where, 'databuku')->result();
    $this->load->view('admin/header', $data);
    $this->load->view('user/sidebar', $data);
    $this->load->view('user/detail', $data);
    $this->load->view('admin/footer');
  }
}
