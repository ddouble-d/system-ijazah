<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_userdata');
		$this->load->library('form_validation');
		// $this->load->helper(array('form', 'url'));
		// is_admin();
		is_loggedin();
	}

	public function index()
	{
		// $data['active1'] = "";
		// $data['active2'] = "nav-item active";
		// $data['active3'] = "";
		$this->load->view('template/v_header');
		$this->load->view('v_profil');
		$this->load->view('template/v_footer');
	}

	public function edit()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		if ($this->form_validation->run()) {
			$uid = $this->input->post('uid');
			$data = [
				'nama' => $this->input->post('nama', true),
				'tahun_lulus' => $this->input->post('tahun_lulus', true),
				'alamat' => $this->input->post('alamat', true)
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		}
	}

	public function ubah_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run()) {
			$uid = $this->input->post('uid');
			$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect(base_url());
	}
}
