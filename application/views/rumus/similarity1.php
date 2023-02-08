<?php 
		$this->db->query("DELETE from similarity");
		$noRata = 1;
		$no = 0;
		//cari rata-rata
		$dataAnggotaRata = $this->db->query("select DISTINCT a.id_anggota from anggota a,  rating b where b.id_anggota = a.id_anggota and b.rating != 0")->result();
		foreach ($dataAnggotaRata as $keyAngRat) {
			$dataRatingRata = $this->db->query("select rating from rating where id_anggota = $keyAngRat->id_anggota and rating != 0");

			$jmlDataRat = 0;
			foreach ($dataRatingRata->result() as $keyRat) {
				 $jmlDataRat = $keyRat->rating+$jmlDataRat;
			}
				
				 $rata[$keyAngRat->id_anggota] = $jmlDataRat/$dataRatingRata->num_rows();
				 $noRata++;

		}

		//hitung similarity
		$noData = 0;
		$jumlah_atas = 0;
		$jumlah_bawah = 0;
		$nilaiPow1 = 0;
		$nilaiPow2 = 0; 

		$jmlBuku = $this->db->query("select id_buku from buku order by id_buku asc");
		
		$tolbuk = 0;
		foreach ($jmlBuku->result() as $keyBuk) {
			$buk1[$tolbuk] = $keyBuk->id_buku;
			$buk2[$tolbuk] = $keyBuk->id_buku; 
			$tolbuk++;
		}

		$nom=0;
		//buku1
		for ($i=0; $i < 10; $i++) {
			//buku2
			for ($k=0; $k < $jmlBuku->num_rows(); $k++) {
			
			if ($i!=$k) {
			
			foreach ($dataAnggotaRata as $key) {
				$idAnggota = $key->id_anggota;

				// $buk1=$jmlBuku->result()[$i]->id_buku;
				// $buk2=$jmlBuku->result()[$k]->id_buku;
				$b1 = $buk1[$i];
				$b2 = $buk2[$k];
				$buku1 = $this->db->query("select rating from rating where id_anggota = $idAnggota and id_buku = $b1")->row();
				$buku2 = $this->db->query("select rating from rating where id_anggota = $idAnggota and id_buku = $b2")->row();
				if ($buku1->rating != 0) {
					if ($buku2->rating != 0) {
						// echo "b".$i." dan b".$k."<br>";
							//inisialisasi buku 1 dan 2	
							$nilaiRatBu1 = $buku1->rating-$rata[$idAnggota];
							$nilaiRatBu2 = $buku2->rating-$rata[$idAnggota];
							//hitung rumus atas
							$jumlahRating = $nilaiRatBu1*$nilaiRatBu2;
							//hitung rumus bawah
							//hitung jumlah buku1 kuadrat 2
							$nilaiPow1 = pow($nilaiRatBu1,2)+$nilaiPow1;
							$nilaiPow2 = pow($nilaiRatBu2,2)+$nilaiPow2;
						
							$jumlah_atas=$jumlahRating+$jumlah_atas;
					}
				}

			$nom++;
			}

			$hasil =  $jumlah_atas/(sqrt($nilaiPow1)*sqrt($nilaiPow2));
			// echo "Buku ".$b1." dan Buku ".$b2." = ".$hasil."<br>"; 

			$this->db->query("INSERT INTO `similarity` (`id_similarity`, `buku_1`, `buku_2`, `nilai_similarity`) VALUES (NULL, $b1, $b2, $hasil)");
			$jumlah_atas=0;
			$nilaiPow1 = 0;
			$nilaiPow2 = 0;
				}
			}

			}
 ?>