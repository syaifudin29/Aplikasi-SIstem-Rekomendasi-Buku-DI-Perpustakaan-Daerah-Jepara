<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BerandaAnggota extends CI_Controller {

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
		$this->session->set_userdata('id_user', $_SESSION['id_anggota']);
		$id = $this->session->userdata('id_user');
		$queryBuku = $this->db->query("SELECT prediksi.id_prediksi, buku.id_buku, buku.judul, buku.deskripsi, buku.gambar, prediksi.nilai FROM prediksi inner join buku on buku.id_buku = prediksi.id_buku WHERE id_anggota = $id ORDER BY nilai desc limit 10")->result();

		$data = array(
			'buku' => $queryBuku,
		);
		$this->load->view('anggota/header', $data);
		$this->load->view('anggota/beranda');
		$this->load->view('footer');
		
	}
	public function detail()
	{
		$this->load->view('anggota/header');
		$this->load->view('anggota/detailBuku');
		$this->load->view('footer');
	}
}
