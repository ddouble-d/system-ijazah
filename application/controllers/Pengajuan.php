<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengajuan');
		$this->load->library('email');
		// $this->load->library('form_validation', 'Pdf');
		// $this->load->helper(array('form', 'url'));
		// is_admin();
		is_loggedin();
	}

	public function index()
	{
		$data['info'] = $this->db->get_where('tb_user',['email'=>$this->session->userdata('email')])->row_array();
		if($this->session->userdata('level') == "Admin"){
			$data['userdata'] = $this->m_pengajuan->getAllPengajuan();
		} else {
		$data['cek'] = $this->m_pengajuan->cekPengajuan();
		$data['userdata'] = $this->m_pengajuan->getMyPengajuan();
		$data['cekstatus'] = $this->m_pengajuan->cekStatusPengajuan();
		}
		$data['autoId'] = $this->m_pengajuan->autoId();
		// $data['autoid'] 	= $this->m_gejala->autoNumber();
		$this->load->view('template/v_header',$data);
		$this->load->view('v_pengajuan');
		$this->load->view('template/v_footer');
	}

	public function tambah(){
		date_default_timezone_set("Asia/Jakarta");
		$nisn = $this->input->post('nisn');
		$nama = $this->input->post('nama');
		$tanggal = date('Y-m-d H:i:s');
		$this->load->library('upload');
			if(isset($_FILES['scan_ijazah']['name']))
			{ 
			$config['upload_path']    	= './upload/scan_ijazah/';
			$config['allowed_types']  	= 'pdf';
			$config['overwrite']		= true;
			$config['max_size']       	= 5120; // 5MB
			$config['file_name']		= $tanggal.'_'.$nisn.''.$nama;
			$this->upload->initialize($config);
			$this->upload->do_upload('scan_ijazah');
			$namafile = $this->upload->data('file_name');
			}
			$data = [
				'uid' => $this->session->userdata('uid'),
				'scan_ijazah' => $namafile,
				'log_pengajuan' => $tanggal,
				'status' => "Belum Diproses"
			];
  	$this->m_pengajuan->savePengajuan($data);
  	// $this->session->set_flashdata('flash', 'Diubah');
  	redirect('Pengajuan');
	}

	public function notifikasiEmail(){
		// $config = [
		// 	'protocol' => 'smtp',
		// 	'smtp_crypto' => 'ssl',
		// 	'smtp_host' => 'smtp.gmail.com',
		// 	'smtp_port' => 465,
		// 	'smtp_user' => 'legalisirijazah48@gmail.com',
		// 	'smtp_pass' => 'yupihime',
		// 	'mailtype' => 'html',
		// 	'charset' => 'utf-8',
		// 	'crlf'    => "\r\n",
    //   'newline' => "\r\n"
		// ];
		// $this->load->library('email', $config);
		// $this->email->from('legalisirijazah48@gmail.com','SMA X');
		// $this->email->to('adeth.slipz@gmail.com');
		// $this->email->subject('Legalisir Ijazah');
		// $this->email->message('tes');
		// return $this->email->send();

		$to_email = "legalisirijazah48@gmail.com";
		$subject = "Simple Email Test via PHP";
		$body = "Hi,nn This is test email send by PHP Script";

		if (mail($to_email, $subject, $body)) {
		    echo "Email successfully sent to $to_email...";
		} else {
		    echo "Email sending failed...";
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

  public function prosesStatus(){
		date_default_timezone_set("Asia/Jakarta");
		$id_pengajuan = $this->input->post('id_pengajuan');
		$data = [
				'log_kirim' => date('Y-m-d H:i:s'),
				'no_resi' => $this->input->post('no_resi',true),
				'keterangan' => $this->input->post('keterangan',true),
				'status' => "Sudah Dikirim"
			];
  		$this->m_pengajuan->updateStatus($id_pengajuan,$data);
		$no_hp = $this->input->post('no_hp');
		$resi = $this->input->post('no_resi');
		$this->m_pengajuan->sendWhatsapp($no_hp, $resi);
  	// $this->session->set_flashdata('flash', 'Diubah');
  	redirect('Pengajuan');
  }

}
