<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
        if ($this->session->userdata('nisn') && $this->session->userdata('aktif') == 1) {
            redirect('auth');
        } else if ($this->session->userdata('email') == NULL) {
            $this->load->view('v_register');
        } else {
            if ($this->session->userdata('level') == "Admin") {
                redirect('dashboard');
            } else {
                redirect('pengajuan');
            }
        }
    }

    public function daftar()
    {
        $this->load->library('upload');
        $nisn = $this->session->userdata('nisn');
        $nama = $this->session->userdata('nama');
        $tahun_lulus = $this->session->userdata('tahun_lulus');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tb_user.email]');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|is_unique[tb_user.no_hp]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if (isset($_FILES['scan_ijazah']['name'])) {
            $config['upload_path']    = './upload/scan_ijazah/';
            $config['allowed_types']  = 'pdf';
            $config['overwrite']            = true;
            $config['max_size']       = 5120; // 5MB
            $config['file_name']        = $tahun_lulus . '' . $nisn . '' . $nama;
            $this->upload->initialize($config);
        }
        if (!$this->upload->do_upload('scan_ijazah')) {
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('front');
        } else {
            if ($this->form_validation->run()) {
                $uid = $this->session->userdata('uid');
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'no_hp' => $this->input->post('no_hp', true),
                    'tahun_lulus' => $this->input->post('tahun_lulus', true),
                    'alamat' => $this->input->post('alamat', true),
                    'scan_ijazah' => $this->upload->data('file_name'),
                    'level' => "User",
                    'aktif' => 1
                ];
                $this->m_userdata->updateUserdata($data, $uid);
                $this->session->set_flashdata('flash', 'Didaftarkan');
                redirect('front');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal');
                redirect('register');
            }
        }
    }

    public function reset()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
