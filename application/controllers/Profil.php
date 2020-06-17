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
		is_loggedin();
	}

	public function index()
	{
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
			$this->session->set_userdata($data);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		}
	}

	public function ubahPassword()
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

	public function ubahIjazah()
	{
		$this->load->library('upload');
		$nisn = $this->session->userdata('nisn');
		$nama = $this->session->userdata('nama');
		$tahun_lulus = $this->session->userdata('tahun_lulus');
		if (isset($_FILES['scan_ijazah']['name'])) {
			$config['upload_path']    = './upload/scan_ijazah/';
			$config['allowed_types']  = 'pdf';
			$config['overwrite']            = true;
			$config['max_size']       = 5120; // 5MB
			$config['file_name']        = $nisn . '' . $tahun_lulus . '' . $nama;
			$this->upload->initialize($config);
		}
		if (!$this->upload->do_upload('scan_ijazah')) {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		} else {
			$uid = $this->session->userdata('uid');
			$data = [
				'scan_ijazah' => $this->upload->data('file_name')
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('flash', 'Didaftarkan');
			redirect('profil');
		}
	}

	public function ubahEmail()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run()) {
			$uid = $this->input->post('uid');
			$data = [
				'email' => $this->input->post('email')
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		}
	}

	public function ubahHP()
	{
		$this->form_validation->set_rules('no_hp', 'No. HP', 'trim|required');
		if ($this->form_validation->run()) {
			$uid = $this->input->post('uid');
			$data = [
				'no_hp' => $this->input->post('no_hp')
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('profil');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
