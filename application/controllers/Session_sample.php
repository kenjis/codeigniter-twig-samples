<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_sample extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('twig');
		$this->load->helper('url');
	}

	public function index()
	{
		$datasession = array(
			'nick' => 'Mike',
			'login_ok' => true
		);
		$this->session->set_userdata($datasession);
		$this->twig->addGlobal('session', $this->session);

		$this->twig->display('session_sample/index', []);
	}

	public function flash()
	{
		$this->session->set_flashdata('test_sess', 'Hello Session');
		$this->twig->addGlobal('session', $this->session);
		$this->twig->display('session_sample/flash');
	}
}
