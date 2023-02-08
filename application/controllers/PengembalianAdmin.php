<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembalianAdmin extends CI_Controller {

 	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('Modelku');
  	}

	public function index()
	{
		$id = $this->input->post('id');
		if (isset($id)) {	
			$id = $id;
		}else{
			$id = 0;
		}
		$queryList = $this->db->query("SELECT peminjaman.id_peminjaman, buku.judul, buku.id_buku, anggota.id_anggota, anggota.nama_anggota FROM `peminjaman` INNER join buku on buku.id_buku = peminjaman.id_buku INNER JOIN anggota on anggota.id_anggota = peminjaman.id_anggota where peminjaman.id_anggota = $id and peminjaman.status = '0'");	
		$data = array(
			'buku' => $queryList,
		);
		$this->load->view('header', $data);
		$this->load->view('admin/pengembalian');
		$this->load->view('footer');
	}

	public function prosesData(){
		$id =  $this->input->get('id');
		$date = date('Y-m-d');
		$query = $this->db->query("UPDATE `peminjaman` SET `tanggal_kembali` = '$date', `status` = '1' WHERE `id_anggota` = $id;");
		if ($query) {
			$this->session->set_flashdata('notif', '1');
		}else{
			$this->session->set_flashdata('notif', '0');
		}
		redirect(base_url("admin/pengembalian"));
	}
}
