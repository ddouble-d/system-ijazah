<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_loggedin();
		is_admin();
	}
	public function index()
	{
		$data['user']    	= $this->db->query("SELECT uid FROM tb_user");
		$data['pengajuan_all'] = $this->db->query("SELECT id_pengajuan FROM tb_pengajuan");
		$data['pengajuan_belum'] = $this->db->query("SELECT id_pengajuan FROM tb_pengajuan WHERE status = 'Belum Diproses'");
		$data['pengajuan_sudah'] = $this->db->query("SELECT id_pengajuan FROM tb_pengajuan WHERE status = 'Sudah Dikirim'");
		$this->load->view('template/v_header', $data);
		$this->load->view('v_dashboard');
		$this->load->view('template/v_footer');
	}
}
