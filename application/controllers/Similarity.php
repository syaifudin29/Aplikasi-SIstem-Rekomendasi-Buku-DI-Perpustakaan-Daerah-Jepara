<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Similarity extends CI_Controller {

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
		$this->load->view('rumus/similarity1');
		redirect(base_url("Similarity/similardua"));
	}
	public function similardua(){
		$this->load->view('rumus/similarity2');
		redirect(base_url("Similarity/prediksi"));
	}
	public function prediksi(){
		$this->load->view('rumus/prediksi');
		$this->session->set_flashdata('notif', '1');
		// redirect(base_url("infoAnggota"));

	}
		
}

 ?>