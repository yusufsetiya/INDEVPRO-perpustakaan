<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlAdmin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('ModelAdmin');
    if (empty($this->session->userdata('UserID') && $this->session->userdata('admin'))) {
      echo "<script>
            alert('Anda Tidak Memiliki Akses Ke Halaman Tersebut');
            window.location.href = '" . base_url('ControlLogin') . "';
        </script>";
      $this->session->sess_destroy();
    }
  }

  public function index()
  {
    $data['title'] = "Index";
    $data['user'] = $this->ModelAdmin->getData();
    $user = $this->ModelAdmin->CountUser();
    $data['users'] = $user['jumlah'];
    $buku = $this->ModelAdmin->CountBuku();
    $data['bukus'] = $buku['buku'];
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/footer');
  }

  public function user()
  {
    $data['title'] = "User";
    $data['user'] = $this->ModelAdmin->getData();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/anggota', $data);
    $this->load->view('admin/footer');
  }

  public function get_iduser()
  {
    $iduser = $this->input->post('iduser');
    $hasil = $this->ModelAdmin->get_idusers($iduser);

    echo $hasil;
  }
  public function AddData()
  {
    $iduser = $this->input->post('iduser');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $level = $this->input->post('status');

    $data = array(
      'UserID' => $iduser,
      'Name' => $nama,
      'Password' => $password,
      'Status' => $level,
    );

    $this->ModelAdmin->AddData($data, 'datauser');
    $this->session->set_flashdata('tambah', 'berhasil');
    redirect('ControlAdmin/user');
  }

  public function EditData()
  {
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $status = $this->input->post('status');

    $data = array(
      'Name' => $nama,
      'password' => $password,
      'Status' => $status
    );

    $where = array(
      'UserID' => $id
    );

    $this->ModelAdmin->EditData($where, $data, 'datauser');
    $this->session->set_flashdata('update', 'berhasil');
    redirect('ControlAdmin/user');
  }

  public function Delete($id)
  {
    $where = array('UserID' => $id);
    $this->ModelAdmin->delete($where, 'datauser');
    $this->session->set_flashdata('hapus', 'berhasil');
    redirect('ControlAdmin/user');
  }
}
