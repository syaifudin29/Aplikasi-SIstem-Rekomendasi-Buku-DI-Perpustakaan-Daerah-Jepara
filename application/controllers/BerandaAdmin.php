<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BerandaAdmin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// session_destroy();
		// // $this->session->set_userdata('jmlData', 0);
		// print_r($_SESSION);
		
		$this->load->view('header');
		$this->load->view('admin/beranda');
		$this->load->view('footer');
	}
}
