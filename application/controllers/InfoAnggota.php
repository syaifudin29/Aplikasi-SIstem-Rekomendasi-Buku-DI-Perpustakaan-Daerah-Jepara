<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfoAnggota extends CI_Controller {

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
		$id = $this->session->userdata('id_user');
		$querySedang = $this->db->query("select peminjaman.id_buku, buku.judul from peminjaman inner join buku on buku.id_buku = peminjaman.id_buku where status = '0' and id_anggota = $id");

		$querySelesai = $this->db->query("select rating.id_rating, peminjaman.id_buku, buku.judul, rating.rating from peminjaman inner join buku on buku.id_buku = peminjaman.id_buku inner join rating on rating.id_buku = peminjaman.id_buku where peminjaman.id_anggota = $id and rating.id_anggota = peminjaman.id_anggota and peminjaman.status != '0'");
		$data = array(
			'sedang' => $querySedang,
			'selesai' => $querySelesai
		);
		$this->load->view('anggota/header', $data);
		$this->load->view('anggota/infoPeminjaman');
		$this->load->view('footer');
	
	}
	public function prosesRating(){
		$id = $this->input->post('id_rating');
		$rate = $this->input->post('rate');

		$query = $this->db->query("UPDATE `rating` SET `rating` = $rate WHERE id_rating = $id");
		redirect(base_url("similarity"));

	}
}
