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
		// $data['active1'] = "nav-item active";
		// $data['active2'] = "";
		$this->load->view('template/v_header');
		$this->load->view('v_dashboard');
		$this->load->view('template/v_footer');
	}
}
