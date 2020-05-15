<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

  // public function __construct()
  // {
  // 	// parent::__construct();
  // 	// is_loggedin();
  // }

  public function index()
  {
    if ($this->session->userdata('email') == NULL) {
      $this->load->view('v_front');
    } else {
      if ($this->session->userdata('level') == "Admin") {
        redirect('dashboard');
      } else {
        redirect('pengajuan');
      }
    }
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $cek = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    if ($cek) {
      if (password_verify($password, $cek['password'])) {
        $data = [
          'email' => $cek['email'],
          'level' => $cek['level'],
          'uid' => $cek['uid']
        ];
        $this->session->set_userdata($data);
        if ($cek['level'] == "Admin") {
          redirect('Dashboard');
        } else {
          redirect('Pengajuan');
        }
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible" role="alert">
				Password salah!
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
				</button>
				</div>'
        );
        redirect('Front');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible" role="alert">
      Email belum terdaftar!
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
      </button>
      </div>'
      );
      redirect('Front');
    }
  }
}
