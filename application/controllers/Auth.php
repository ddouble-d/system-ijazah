<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userdata');
        $this->load->library('form_validation');
        is_exist();
    }

    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            $this->load->view('v_auth');
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
        $nisn = $this->input->post('nisn');
        $password = $this->input->post('password');
        $cek = $this->db->get_where('tb_user', ['nisn' => $nisn])->row_array();
        if (password_verify($password, $cek['password'])) {
            $data = [
                'uid' => $cek['uid'],
                'nisn' => $cek['nisn'],
                'nama' => $cek['nama'],
                'email' => $cek['email'],
                'no_hp' => $cek['no_hp'],
                'tahun_lulus' => $cek['tahun_lulus'],
                'alamat' => $cek['alamat'],
                'scan_ijazah' => $cek['scan_ijazah'],
                'level' => $cek['level']
            ];
            $this->session->set_userdata($data);
            if ($cek['level'] == "Admin") {
                redirect('dashboard');
            } else {
                redirect('pengajuan');
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
            redirect('auth');
        }
    }

    public function kembali()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
