<?php 
$this->db->query("DELETE FROM `prediksi`");
$dataAnggota = $this->db->query("select DISTINCT a.id_anggota from anggota a,  rating b where b.id_anggota = a.id_anggota and b.rating != 0")->result();

$dataBuku = $this->db->query("select id_buku from buku");

$nom = 0;
$jumlahAtas=0;
$jumlahBawah=0;

foreach ($dataAnggota as $keyAng) {

	foreach ($dataBuku->result() as $keyBuk) {
		$no = 0;
		$dataSimBuku = $this->db->query("select buku_2 as buku, buku_1, nilai_similarity from similarity where buku_1 =  $keyBuk->id_buku and nilai_similarity >= 0.005 order by nilai_similarity desc");
		$jumSimBu = $dataSimBuku->num_rows();
		// echo "User ".$keyAng->id_anggota." buku ".$keyBuk->id_buku."<br>";

		foreach ($dataSimBuku->result() as $keySimBu ) {

			$dataRating = $this->db->query("select rating from rating where id_anggota = $keyAng->id_anggota and id_buku = $keySimBu->buku")->row();
			if ($dataRating) {
		
			$dataBukuSim = $this->db->query("select nilai_similarity from similarity where buku_1 = $keyBuk->id_buku and buku_2 = $keySimBu->buku")->row();

			$jumlahAtas = ($dataRating->rating*$dataBukuSim->nilai_similarity)+$jumlahAtas;
			$jumlahBawah = abs($dataBukuSim->nilai_similarity)+$jumlahBawah;
				
		$no++;} }
		
		
		if ($jumlahAtas == 0 AND $jumlahBawah == 0) {
			$jumlah = 0;
		}else{
			$jumlah = $jumlahAtas/$jumlahBawah;
		}
		
		$this->db->query("INSERT INTO `prediksi` (`id_prediksi`, `id_anggota`, `id_buku`, `nilai`) VALUES (NULL, $keyAng->id_anggota, $keyBuk->id_buku, $jumlah)");
		
		$jumlahAtas = 0;
		$jumlahBawah = 0;
		

	}

}


 ?>