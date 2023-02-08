<?php $id = $this->input->get('id');
				$judul = $this->input->get('judul');
				$rating = $this->input->get('rating');
				$desk = $this->input->get('desk');
				$gmbr = $this->input->get('gmbr');
				 ?>
	<div class="row">
		<div class="col-md-4" style="background-color: black;">
			<img style="height: 400px; width: 600px; object-fit: cover;" src=" <?php echo base_url('gambar/'.$gmbr); ?>" class="img-fluid" alt="Responsive image">
		</div>
		<div class="col-md-6">
			<div class="konten" style="color: white; padding: 10px">
				<h3><?php echo $judul ?></h3>
				<h6>ID : <?php echo $id; ?></h6>
				<br>
				<p><?php echo $desk; ?></p>
			<h5>Rating : <?php echo $rating ?> <i class="fa fa-star"></i></h5>
			</div>
		</div>
	</div>
	<div class="col-12">
		<h4 style="text-align: center;">Buku yang mirip (Similarity)</h4>
		<div class="row">
			<?php 
			$dataSimilarity = $this->db->query("select similarity.buku_2, buku.deskripsi, buku.gambar, buku.judul, similarity.nilai_similarity from similarity INNER JOIN buku on buku.id_buku = similarity.buku_2 where similarity.buku_1 = $id ORDER BY similarity.nilai_similarity DESC limit 5;");
			foreach ($dataSimilarity->result() as $key) {
				# code...
			?>
			 <div class="card" style="width: 14rem; background-color:#2F8F9D;margin:10px">
	            <img src="<?php echo base_url('gambar/'.$key->gambar); ?>" class="card-img-top img-card" alt="...">
	            <div class="card-body text-white">
	                <h5 class="card-title"><?php echo $key->judul; ?></h5>
	                <p style="color: #FEF9A7">ID: <?php echo $key->buku_2;?></p>
	                <p style="font-size:15px;" class="card-text"><?php echo $key->deskripsi;?></p>
	               </i></p>
	            </div>
	        </div>
	    <?php } ?>
		</div>
	</div>
	<div style="padding: 20px">
		<h4>Nilai Similarity</h4>
		<?php
		$nom = 1;
		foreach ($dataSimilarity->result() as $keys) {
			echo "<p>".$nom.". Buku (".$id.") dengan Buku (".$keys->buku_2.") : ".$keys->nilai_similarity."</p>";
		$nom++;} 
		 ?>
	</div>
