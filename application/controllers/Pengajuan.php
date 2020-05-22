<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengajuan');
		$this->load->library('email');
		$this->load->library('form_validation');
		// $this->load->helper(array('form', 'url'));
		// is_admin();
		is_loggedin();
	}

	public function index()
	{
		$data['info'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('level') == "Admin") {
			$data['userdata'] = $this->m_pengajuan->getAllPengajuan();
		} else {
			$data['cek'] = $this->m_pengajuan->cekPengajuan();
			$data['userdata'] = $this->m_pengajuan->getMyPengajuan();
			$data['cekstatus'] = $this->m_pengajuan->cekStatusPengajuan();
		}
		$data['autoId'] = $this->m_pengajuan->autoId();
		// $data['autoid'] 	= $this->m_gejala->autoNumber();
		$this->load->view('template/v_header', $data);
		$this->load->view('v_pengajuan');
		$this->load->view('template/v_footer');
	}

	public function tambah()
	{
		date_default_timezone_set("Asia/Jakarta");
		$nisn = $this->input->post('nisn');
		$nama = $this->input->post('nama');
		$tanggal = date('YmdHis');
		// $this->form_validation->set_rules('scan_ijazah', 'Scan Ijazah', 'required');
		$this->load->library('upload');
		if (isset($_FILES['scan_ijazah']['name'])) {
			$config['upload_path']    = './upload/scan_ijazah/';
			$config['allowed_types']  = 'pdf';
			$config['overwrite']			= true;
			$config['max_size']       = 5120; // 5MB
			$config['file_name']		= $tanggal . '_' . $nisn . '' . $nama;
		}
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('scan_ijazah')) {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('pengajuan');
		} else {
			// if ($this->form_validation->run()) {
			$data = [
				'uid' => $this->session->userdata('uid'),
				'scan_ijazah' => $this->upload->data('file_name'),
				'log_pengajuan' => date('Y-m-d H:i:s'),
				'status' => "Belum Diproses"
			];
			$this->m_pengajuan->savePengajuan($data);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('pengajuan');
			// } else {
			// 	$this->session->set_flashdata('gagal', 'Gagal');
			// 	redirect('pengajuan');
			// }
		}
	}

	public function prosesStatus()
	{
		date_default_timezone_set("Asia/Jakarta");
		$this->form_validation->set_rules('no_resi', 'No. Resi', 'required');
		$id_pengajuan = $this->input->post('id_pengajuan');
		$email = $this->input->post('email');
		$resi = $this->input->post('no_resi');
		if ($this->form_validation->run()) {
			$data = [
				'log_kirim' => date('Y-m-d H:i:s'),
				'no_resi' => $resi,
				'keterangan' => $this->input->post('keterangan', true),
				'status' => "Sudah Dikirim"
			];
			$this->m_pengajuan->updateStatus($id_pengajuan, $data);
			// $no_hp = $this->input->post('no_hp');		
			// $this->m_pengajuan->sendEmail($email, $resi);
			$this->session->set_flashdata('flash', 'Diproses');
			redirect('pengajuan');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('pengajuan');
		}
	}

	// public function edit(){
	// 	$uid = $this->input->post('uid');
	// 	$data = [
	//     'nama' => $this->input->post('nama',true),
	// 		'alamat' => $this->input->post('alamat',true)
	// 	];
	// 	$this->m_userdata->updateUserdata($data,$uid);
	// 	// $this->session->set_flashdata('flash', 'Diubah');
	// 	redirect('Userdata');
	// }
	//
	// public function delete($uid){
	// 	$this->m_userdata->deleteUserdata($uid);
	// 	// $this->session->set_flashdata('flash', 'Dihapus');
	// 	redirect('Userdata');
	// }


}
