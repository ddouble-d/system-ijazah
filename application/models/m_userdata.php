<?php
class m_userdata extends CI_model
{

	public function getAllUser()
	{
		return $this->db->get('tb_user')->result_array();
	}

	public function getUserId()
	{
		return $this->db->where('uid',$uid);
	}

	// public function autoNumber(){
	// 	$kode = "G";
  //
	// 	$data = $this->db->query("SELECT MAX(kd_gejala) AS last FROM tb_gejala ")->row_array();
  //
	// 	$lastNo = $data['last'];
  //
	// 	$lastNoUrut   = substr($lastNo,1,3);
  //
	// 	$nextNoUrut   = $lastNoUrut+1;
  //
	// 	$nextNoUrut = $kode.sprintf('%03s',$nextNoUrut);
  //
	// 	return $nextNoUrut;
  //
	// }
  //
	// public function get_list_by_id($id){
	// 	$kd=  "'" . str_replace(",", "','", $id) . "'";
  //        $sql = "select id,kd_gejala,nama_gejala from tb_gejala where kd_gejala in (".$kd.")";
  //        return $this->db->query($sql);
  //    }
  //
	public function saveUserdata($data){
		$this->db->insert('tb_user',$data);
	}

	public function updateUserdata($data,$uid){
		$this->db->where('uid',$uid);
		$this->db->update('tb_user',$data);
	}

	public function deleteUserdata($uid){
		$this->db->where('uid',$uid);
		$this->db->delete('tb_user');
	}

	public function nisn($nisn){
		$this->db->where('nisn', $nisn);
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

	public function email($email){
		$this->db->where('email', $email);
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

	public function hp($no_hp){
		$this->db->where('no_hp', $no_hp);
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

}
