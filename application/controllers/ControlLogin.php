<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlLogin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('ModelLogin');
  }

  public function index()
  {
    $this->load->view('login');
  }


  public function login()
  {
    $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

    $cek_akun = $this->ModelLogin->authentic($username, $password);

    if ($cek_akun->num_rows() > 0) {
      $data = $cek_akun->row_array();
      $this->session->set_userdata('masuk', TRUE);
      if ($data['Status'] == '1') { //administrator
        $this->session->set_userdata('admin', '1');
        $this->session->set_userdata('UserID', $data['UserID']);
        $this->session->set_userdata('Name', $data['Name']);
        redirect('ControlAdmin');
      } elseif ($data['Status'] == '2') { //petugas
        $this->session->set_userdata('User', '2');
        $this->session->set_userdata('UserID', $data['UserID']);
        $this->session->set_userdata('Name', $data['Name']);
        redirect('ControlUser');
      }
    } else { //petugas
      $url = base_url('ControlLogin/index');
      $this->session->set_flashdata('pwdSalah', 'berhasil');
      redirect($url);
    }
  }

  public function logout()
  {
    session_destroy();
    $this->session->unset_userdata('logged_in');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">anda telah logout</div>');
    redirect('ControlLogin');
  }
}
