<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_userdata');
		// $this->load->library('form_validation', 'Pdf');
		// $this->load->helper(array('form', 'url'));
		is_loggedin();
		is_admin();
	}

	public function index()
	{
		// $data['info'] = $this->db->get_where('tb_user',['username'=>$this->session->userdata('username')])->row_array();
		// $data['judul'] = "Data Gejala";
		// $data['active1'] = "";
		// $data['active2'] = "";
		// $data['active3'] = "";
		// $data['active4'] = "active";
		// $data['active5'] = "";
		// $data['active6'] = "";
    // $data['active1'] = "";
		// $data['active2'] = "nav-item active";
		// $data['active3'] = "";
		$data['userdata'] = $this->m_userdata->getAllUser();
		// $data['level']  = ['Admin', 'User'];
		// $data['autoid'] 	= $this->m_gejala->autoNumber();
		$this->load->view('template/v_header',$data);
		$this->load->view('v_userdata');
		$this->load->view('template/v_footer');
	}
  //
	public function tambah(){
		$data = [
			'nisn' => $this->input->post('nisn',true),
			'nama' => $this->input->post('nama',true),
			'email' => $this->input->post('email',true),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'alamat' => $this->input->post('alamat',true),
			'level' => $this->input->post('level',true)
		];
		$this->m_userdata->saveUserdata($data);
		// $this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('Userdata');
	}
  //
	public function edit(){
		$uid = $this->input->post('uid');
		$data = [
      'nama' => $this->input->post('nama',true),
			'alamat' => $this->input->post('alamat',true)
		];
		$this->m_userdata->updateUserdata($data,$uid);
		// $this->session->set_flashdata('flash', 'Diubah');
		redirect('Userdata');
	}

	public function delete($uid){
		$this->m_userdata->deleteUserdata($uid);
		// $this->session->set_flashdata('flash', 'Dihapus');
		redirect('Userdata');
	}

}
