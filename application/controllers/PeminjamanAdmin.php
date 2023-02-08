<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeminjamanAdmin extends CI_Controller {

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
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('Modelku');
  	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('admin/peminjaman');
		$this->load->view('footer');	
		// print_r($_SESSION);	
	}
	public function addList()
	{

		$id = $this->input->post('id');
		$buku = [];
		$session_buku = $this->session->userdata('dataBuku');
		
		if (!empty($session_buku)) {
			$buku = $session_buku;
		}

		foreach ($session_buku as $key) {
			if ($key['id_buku'] == $id) {
				redirect(base_url("admin/peminjaman"));
			}
		}

		$query = $this->db->query("select * from buku where id_buku = $id")->row();
		if (!empty($query)) {
			array_push($buku, ['id_buku' => $query->id_buku, 'judul' => $query->judul]);
		
		$this->session->set_userdata('dataBuku', $buku);
		}
		redirect(base_url("admin/peminjaman"));
	}
	public function deleteList(){
		$id = $this->input->get('id')-1;
		$buku = [];
		$session_buku = $this->session->userdata('dataBuku');
		$buku = $session_buku;
		unset($buku[$id]);
		array_splice($buku, $id, $id); 
		$this->session->set_userdata('dataBuku', $buku);
		redirect(base_url("admin/peminjaman"));
	}
	public function cariAnggota(){
		$id = $this->input->post('id');
		$query = $this->db->query("select * from anggota where id_anggota = $id")->row();
		$anggota = array(
			'id_anggota' => $query->id_anggota,
			'nama' => $query->nama_anggota
		);
		$this->session->set_userdata('dataAnggota', $anggota);
		redirect(base_url("admin/peminjaman"));

	}
	public function prosesData(){
		$dataAnggota = $this->session->userdata('dataAnggota');
		$dataBuku = $this->session->userdata('dataBuku');
		if (empty($dataAnggota)) {
			redirect(base_url("admin/peminjaman"));
		}
		foreach ($dataBuku as $key) {
			$id_buku = $key['id_buku'];
			$id_anggota = $dataAnggota['id_anggota'];
			$date = date('Y-m-d');
			$query = $this->db->query("INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES (NULL, $id_buku, $id_anggota, '$date', '', '0')");
			$this->db->query("INSERT INTO `rating` (`id_rating`, `id_anggota`, `id_buku`, `rating`) VALUES (NULL, $id_anggota, $id_buku, '0')");
		
		}
		unset($_SESSION['dataBuku']);
		unset($_SESSION['dataAnggota']);
		if ($query) {
			$this->session->set_flashdata('notif', '1');
		}else{
			$this->session->set_flashdata('notif', '0');
		}
		redirect(base_url("admin/peminjaman"));
	} 

	public function clearData(){
		unset($_SESSION['dataBuku']);
		unset($_SESSION['dataAnggota']);
		redirect(base_url("admin/peminjaman"));
	}
	

}
