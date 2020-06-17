<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    // is_loggedin();
  }

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

  public function loginAdmin()
  {
    $this->load->view('v_loginAdmin');
  }

  public function konfirmasiNISN()
  {
    $nisn = $this->input->post('nisn');
    $cek = $this->db->get_where('tb_user', ['nisn' => $nisn])->row_array();
    if ($cek) {
      $data = [
        'uid' => $cek['uid'],
        'nisn' => $cek['nisn'],
        'aktif' => $cek['aktif'],
        'nama' => $cek['nama']
      ];
      $this->session->set_userdata($data);
      if ($cek['aktif'] == 1) {
        redirect('auth');
      } else {
        redirect('register');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible" role="alert">
      NISN tidak terdaftar!
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
      </button>
      </div>'
      );
      redirect(base_url());
    }
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $cek = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    if ($cek) {
      if (password_verify($password, $cek['password'])) {
        if ($cek['level'] == "Admin") {
          $data = [
            'nama' => $cek['nama'],
            'email' => $cek['email'],
            'level' => $cek['level'],
            'uid' => $cek['uid']
          ];
          $this->session->set_userdata($data);
          redirect('dashboard');
        } else {
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible" role="alert">
          Akun bukan admin!
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
          </button>
          </div>'
          );
          redirect('front');
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
        redirect(base_url());
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
      redirect(base_url());
    }
  }

  public function cekNisn()
  {
    $this->load->model('m_userdata');
    if ($this->m_userdata->nisn($this->input->post('nisn'))) {
      echo '<label class="text-danger">
            NISN Sudah Terdaftar <span class="fa fa-times">
            </span></label>';
    }
  }

  public function cekEmail()
  {
    $this->load->model('m_userdata');
    if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      echo '<label class="text-danger">
            Format Email Tidak Sesuai <span class="fa fa-times">
            </span></label></label>';
    } else {
      if ($this->m_userdata->email($this->input->post('email'))) {
        echo '<label class="text-danger">
                Email Sudah Terdaftar <span class="fa fa-times">
                </span></label></label>';
      }
    }
  }

  public function cekHp()
  {
    $this->load->model('m_userdata');
    if ($this->m_userdata->hp($this->input->post('no_hp'))) {
      echo '<label class="text-danger">
            No. HP Sudah Terdaftar <span class="fa fa-times">
            </span></label></label>';
    }
  }

  public function cekPassword()
  {
    $this->load->model('m_userdata');
    if ($this->input->post('password2') != $this->input->post('password')) {
      echo '<label class="text-danger">
            Password Tidak Sesuai <span class="fa fa-times">
            </span></label></label>';
    }
  }
}
