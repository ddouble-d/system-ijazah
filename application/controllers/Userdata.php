<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userdata extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_userdata');
		$this->load->library('form_validation');
		is_loggedin();
		is_admin();
	}

	public function index()
	{		
		$data['userdata'] = $this->m_userdata->getAllUser();
		// $data['autoid'] 	= $this->m_gejala->autoNumber();
		$this->load->view('template/v_header', $data);
		$this->load->view('v_userdata');
		$this->load->view('template/v_footer');
	}
	// 
	public function tambah()
	{
		$this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tb_user.nisn]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run()) {
			$data = [
				'nisn' => $this->input->post('nisn', true),
				'nama' => $this->input->post('nama', true),
				'level' => "User"
			];
			$this->m_userdata->saveUserdata($data);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('userdata');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('userdata');
		}
	}

	public function edit()
	{		
		$uid = $this->input->post('uid');
		$original = $this->input->post('originalnisn');
		if($original == $this->input->post('nisn')){
			$this->form_validation->set_rules('nisn', 'NISN', 'required');						
		} else {
			$this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tb_user.nisn]');					
		}
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run()) {
			$data = [
				'nisn' => $this->input->post('nisn', true),
				'nama' => $this->input->post('nama', true)
			];
			$this->m_userdata->updateUserdata($data, $uid);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('userdata');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('userdata');
		}
		
	}

	public function delete($uid)
	{
		$this->m_userdata->deleteUserdata($uid);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('userdata');
	}
}
