<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuAdmin extends CI_Controller {

 	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('Modelku');
  	}

	public function index()
	{	
		$queryBuku = $this->db->query("SELECT * FROM buku order by id_buku desc;")->result();
		//Halaman update
		$action = $this->input->get('action');
		if ($action == 'update') {
			$id = $this->input->get('id');
			$tampilData = $this->db->query("SELECT * FROM `buku` where id_buku = $id")->row();
		}else{
			$tampilData = 0;
		}
		//pencarian
		$cari = $this->input->post('pencarian');
		if ($cari) {
			$data = $this->db->query("SELECT * FROM buku where judul like '%$cari%' order by id_buku desc;")->result();
		}else{
			$data = $queryBuku;
		}

		$data = array(
			'buku' => $data,
			'action' => $action,
			'dataUpdate' => $tampilData
		);
		$this->load->view('header', $data);
		$this->load->view('admin/buku');
		$this->load->view('footer');
	}

	public function tambahData(){
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$jmlBuku = $this->Modelku->jmlData('buku')+1;

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$data = $this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			redirect(base_url("admin/buku"));
		}else{
			$data = array('upload_data' => $this->upload->data());
			$gambar = $data['upload_data']['file_name'];
			//query tambah data
			$query = $this->db->query("INSERT INTO `buku` (`id_buku`, `judul`, `deskripsi`, `gambar`) VALUES (0620220+$jmlBuku, '$judul', '$deskripsi', '$gambar')");
			if ($query) {
				$this->session->set_flashdata('notif', '1');
			}else{
				$this->session->set_flashdata('notif', '0');
			}
			redirect(base_url("admin/buku"));
		}
	}

	public function updateData(){
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$id_buku = $this->input->post('id');

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$data = $this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$query = $this->db->query("UPDATE `buku` SET `judul` = '$judul', `deskripsi` = '$deskripsi' WHERE `buku`.`id_buku` = $id_buku;");
			
			if ($query) {
				$this->session->set_flashdata('notif', '1');
			}else{
				$this->session->set_flashdata('notif', '0');
			}
			redirect(base_url("admin/buku"));
		}else{
			$data = array('upload_data' => $this->upload->data());
			$gambar = $data['upload_data']['file_name'];
			//query tambah data
			$query = $this->db->query("UPDATE `buku` SET `judul` = '$judul', `deskripsi` = '$deskripsi', `gambar` = '$gambar' WHERE `buku`.`id_buku` = $id_buku;");

			if ($query) {
				$this->session->set_flashdata('notif', '1');
			}else{
				$this->session->set_flashdata('notif', '0');
			}
			redirect(base_url("admin/buku"));
		}
	}

	public function deleteUpdate(){
		$id = $this->input->get('id');
		$query = $this->db->query("DELETE FROM `buku` WHERE `buku`.`id_buku` = $id");
		if ($query) {
				$this->session->set_flashdata('notif', '1');
			}else{
				$this->session->set_flashdata('notif', '0');
			}
		redirect(base_url("admin/buku"));
	}


}
