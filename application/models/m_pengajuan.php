<?php
class m_pengajuan extends CI_model
{

	public function getAllPengajuan()
	{
		return $this->db->query("SELECT * FROM tb_pengajuan JOIN tb_user on tb_user.uid = tb_pengajuan.uid")->result_array();
	}

	public function cekPengajuan(){
		$tes = $this->db->select('p.*,u.*')
		->from('tb_pengajuan p')
		->join('tb_user u', 'u.uid = p.uid')
		->where(['p.uid' => $this->session->userdata('uid')])
		->get();
		$tes->num_rows();
	}

	public function getMyPengajuan(){
		$tes = $this->db->select('p.*,u.*')
		->from('tb_pengajuan p')
		->join('tb_user u', 'u.uid = p.uid')
		->where(['p.uid' => $this->session->userdata('uid')])
		->order_by('id_pengajuan', 'DESC')
		->get()
		->result_array();
		var_dump($tes);
		return $tes;
	}

	public function cekStatusPengajuan(){
		$tes = $this->db->select('p.*,u.*')
		->from('tb_pengajuan p')
		->join('tb_user u', 'u.uid = p.uid')
		->where(['p.uid' => $this->session->userdata('uid')])
		->where('status', 'Sudah Dikirim')
		->get()->result_array();
		return $tes;
	}

  // public function updateStatuss($uid){
  //   // $this->db->where('uid',$uid);
  //   // $this->db->update('tb_user',$data);
  //   $this->db->query("UPDATE `tb_pengajuan` SET `biaya` = '2' WHERE `uid` = '$uid'");
  // }

	public function savePengajuan($data){
		$this->db->insert('tb_pengajuan',$data);
	}

	public function updateStatus($id_pengajuan,$data){
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->update('tb_pengajuan',$data);
	}

	public function autoId(){
		$today = date('Ymd');

				$data = $this->db->query("SELECT MAX(id_pengajuan) AS last FROM tb_pengajuan ")->row_array();

				$lastNo = $data['last'];

				$lastNoUrut   = substr($lastNo,8,3);

				$nextNoUrut   = $lastNoUrut+1;

				$nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);

				return $nextNoTransaksi;
	}

}
