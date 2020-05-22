<?php
class M_pengajuan extends CI_model
{

	public function getAllPengajuan()
	{
		return $this->db->query("SELECT * FROM tb_pengajuan JOIN tb_user on tb_user.uid = tb_pengajuan.uid")->result_array();
	}

	public function cekPengajuan()
	{
		$tes = $this->db->select('p.*,u.*')
			->from('tb_pengajuan p')
			->join('tb_user u', 'u.uid = p.uid')
			->where(['p.uid' => $this->session->userdata('uid')])
			->get();
		$tes->num_rows();
	}

	public function getMyPengajuan()
	{
		$tes = $this->db->select('p.*,u.*')
			->from('tb_pengajuan p')
			->join('tb_user u', 'u.uid = p.uid')
			->where(['p.uid' => $this->session->userdata('uid')])
			->get()->result_array();
		return $tes;
	}

	public function sendEmail($email, $resi)
	{
		$body = [
			'Messages' => [
				[
					'From' => [
						'Email' => "admin@legalisir-ijazahku.my.id",
						'Name' => "Legalisir Ijazah"
					],
					'To' => [
						[
							'Email' => $email,
							'Name' => "Nama"
						]
					],
					'Subject' => "Pengiriman Legalisir Ijazah",
					'HTMLPart' => "Fotocopy Legalisir Ijazah anda sudah dikirimkan dengan no.resi " . $resi . " menggunakan kurir J&T. <br>
					Silakan mengunjungi situs http://jet.co.id untuk tracking pengiriman"
				]
			]
		];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json'
			)
		);
		curl_setopt($ch, CURLOPT_USERPWD, "a653363ae22dd33cc8e52e0f562115d0:5e06c49932e31e693ed63a797031922a");
		$server_output = curl_exec($ch);
		curl_close($ch);

		$response = json_decode($server_output);
	}

	public function cekStatusPengajuan()
	{
		$tes = $this->db->select('p.*,u.*')
			->from('tb_pengajuan p')
			->join('tb_user u', 'u.uid = p.uid')
			->where(['p.uid' => $this->session->userdata('uid')])
			->where('status', 'Belum Diproses')
			->get()->result_array();
		return $tes;
	}

	public function savePengajuan($data)
	{
		$this->db->insert('tb_pengajuan', $data);
	}

	public function updateStatus($id_pengajuan, $data)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('tb_pengajuan', $data);
	}

	public function autoId()
	{
		$today = date('Ymd');

		$data = $this->db->query("SELECT MAX(id_pengajuan) AS last FROM tb_pengajuan ")->row_array();

		$lastNo = $data['last'];

		$lastNoUrut   = substr($lastNo, 8, 3);

		$nextNoUrut   = $lastNoUrut + 1;

		$nextNoTransaksi = $today . sprintf('%03s', $nextNoUrut);

		return $nextNoTransaksi;
	}

	// public function sendWhatsapp($no_hp, $resi)
	// {
	// 	$data = [
	// 		'phone' => $no_hp, // Receivers phone
	// 		'body' => "Fotocopy Legalisir Ijazah anda sudah dikirimkan dengan no.resi " . $resi . " menggunakan kurir J&T. 
	// Silakan mengunjungi situs http://jet.co.id untuk tracking pengiriman", // Message
	// 	];
	// 	$json = json_encode($data); // Encode data to JSON
	// 	// URL for request POST /message
	// 	$url = 'https://eu2.chat-api.com/instance125370/sendMessage?token=hzrzgps8ffcbjbcd';
	// 	// Make a POST request
	// 	$options = stream_context_create([
	// 		'http' => [
	// 			'method'  => 'POST',
	// 			'header'  => 'Content-type: application/json',
	// 			'content' => $json
	// 		]
	// 	]);
	// 	// Send a request
	// 	$result = file_get_contents($url, false, $options);
	// }
}
