<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userdata');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tb_user.nisn]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|is_unique[tb_user.no_hp]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run()) {
            $data = [
                'nisn' => $this->input->post('nisn', true),
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_hp' => $this->input->post('no_hp', true),
                'alamat' => $this->input->post('alamat', true),
                'level' => "User"
            ];
            $this->m_userdata->saveUserdata($data);
            $this->session->set_flashdata('flash', 'Didaftarkan');
            redirect('front');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('register');
        }
    }
}
