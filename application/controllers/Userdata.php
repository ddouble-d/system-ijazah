<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_userdata');
		$this->load->library('form_validation');
		// $this->load->helper(array('form', 'url'));
		is_loggedin();
		is_admin();
	}

	public function index()
	{
		// $data['info'] = $this->db->get_where('tb_user',['username'=>$this->session->userdata('username')])->row_array();
		$data['userdata'] = $this->m_userdata->getAllUser();
		// $data['autoid'] 	= $this->m_gejala->autoNumber();
		$this->load->view('template/v_header',$data);
		$this->load->view('v_userdata');
		$this->load->view('template/v_footer');
	}
  // 
	public function tambah(){
		$this->form_validation->set_rules('nisn','NISN','required|is_unique[tb_user.nisn]');
		$this->form_validation->set_rules('email','Email','required|is_unique[tb_user.email]');
		$this->form_validation->set_rules('no_hp','No HP','required|is_unique[tb_user.no_hp]');
		if($this->form_validation->run()){
			$data = [
				'nisn' => $this->input->post('nisn',true),
				'nama' => $this->input->post('nama',true),
				'email' => $this->input->post('email',true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'no_hp' => $this->input->post('no_hp',true),
				'alamat' => $this->input->post('alamat',true),
				'level' => $this->input->post('level',true)
			];
			$this->m_userdata->saveUserdata($data);
			// $this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('Userdata');
		} else {		
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('Userdata');			
		}				
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
