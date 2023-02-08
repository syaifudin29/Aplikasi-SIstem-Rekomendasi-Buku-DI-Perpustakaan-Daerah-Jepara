<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('login');
	}
	public function daftar()
	{
		$this->load->view('daftar');
		
	}

	public function prosesDaftar(){
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');
			$nama = $this->input->post('nama');
			$query = $this->db->query("INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `username`, `password`) VALUES (NULL, '$nama', '$user', '$pass')");
			if ($query) {
			$this->session->set_flashdata('notif', '1');
			redirect(base_url("login"));
			}
	}

	public function prosesLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin = $this->db->query("select * from admin where username = '$username' and password = '$password'");
		if ($admin->num_rows()) {
			$id_admin = $admin->row();
			$this->session->set_userdata('id_admin', $id_admin->id_admin);
			redirect(base_url("admin/beranda"));
		}else{
			$anggota = $this->db->query("select * from anggota where username = '$username' and password = '$password'");
			if ($anggota->num_rows()) {
				$id_anggota = $anggota->row();
				$this->session->set_userdata('id_anggota', $id_anggota->id_anggota);
				redirect(base_url("anggota/beranda"));
			}else{
				$this->session->set_flashdata('notif', '0');
				redirect(base_url("login"));
			}
		}
	}
	public function keluar(){
		session_destroy();
		redirect(base_url("login"));

	}
}