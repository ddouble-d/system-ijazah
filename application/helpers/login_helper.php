<?php
function is_loggedin()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('Front');
	} else {
		$menu = $ci->uri->segment(1);
	}
}

function is_exist()
{
	$ci = get_instance();
	if (!$ci->session->userdata('nisn')) {
		redirect('Front');
	} else {
		$menu = $ci->uri->segment(1);
	}
}

function is_admin()
{
	$ci = get_instance();
	if ($ci->session->userdata('level') == "Admin") {
		$menu = $ci->uri->segment(1);
	} else {
		redirect('Error404');
	}
}

function getUserData()
{
	$ci = get_instance();
	$Userdata = $this->session->userdata();
	return $Userdata;
}
