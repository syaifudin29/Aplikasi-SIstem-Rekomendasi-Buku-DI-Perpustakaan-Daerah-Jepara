<div class="col-md-8">
    <h4 style="margin-left:15px">Rekomendasi Untuk Anda</h4>
    <div class="row">
        <?php
        $jumlahRating = 0;
        if (empty($buku)) {
            $dataBuku = $this->db->query("select * from buku limit 5")->result();
            // print_r($dataBuku);
            foreach ($dataBuku as $keyBuku) {
                   $id = $keyBuku->id_buku; 

                    $queryUlangs = $this->db->query("SELECT rating FROM `rating` WHERE id_buku = $id and rating != 0");
                    foreach ($queryUlangs->result() as $keyas) {
                        $jumlahRating=$keyas->rating+$jumlahRating;
                    }
                    $jml = $queryUlangs->num_rows();
             ?>
             <div class="card" style="width: 14rem; background-color:#2F8F9D;margin:10px">
                <img src="<?php echo base_url('gambar/'.$keyBuku->gambar); ?>" class="card-img-top img-card" alt="...">
                <div class="card-body text-white">
                    <h5 class="card-title"><a class="judulBuku" href="<?php echo base_url('berandaAnggota/detail?id='.$keyBuku->id_buku.'&judul='.$keyBuku->judul.'&rating='.round($jumlahRating/$jml,1).'&desk='.$keyBuku->deskripsi.'&gmbr='.$keyBuku->gambar); ?>" ><?php echo $keyBuku->judul; ?></a></h5>
                    <p style="color: #FEF9A7">ID: <?php echo $keyBuku->id_buku;?></p>
                    <p style="font-size:15px;" class="card-text"><?php echo $keyBuku->deskripsi;?></p>
                    <p style="color:white;"><?php echo round($jumlahRating/$jml,1); ?> <i class="fa fa-star"></i></p>
                </div>
            </div>
             <?php
         } }
        foreach ($buku as $key) {
            $id_buku = $key->id_buku;
             $queryUlang = $this->db->query("SELECT rating FROM `rating` WHERE id_buku = $id_buku and rating != 0");
            foreach ($queryUlang->result() as $keya) {
                $jumlahRating=$keya->rating+$jumlahRating;
            }
            $jml = $queryUlang->num_rows();
         ?>
        <div class="card" style="width: 14rem; background-color:#2F8F9D;margin:10px">
            <img src="<?php echo base_url('gambar/'.$key->gambar); ?>" class="card-img-top img-card" alt="...">
            <div class="card-body text-white">
                <h5 class="card-title"><a class="judulBuku" href="<?php echo base_url('berandaAnggota/detail?id='.$key->id_buku.'&judul='.$key->judul.'&rating='.round($jumlahRating/$jml,1).'&desk='.$key->deskripsi.'&gmbr='.$key->gambar); ?>" ><?php echo $key->judul; ?></a></h5>
                <p style="color: #FEF9A7">ID: <?php echo $key->id_buku;?></p>
                <p style="font-size:15px;" class="card-text"><?php echo $key->deskripsi;?></p>
                <p style="color:white;"><?php echo round($jumlahRating/$jml,1); ?> <i class="fa fa-star"></i></p>
            </div>
        </div>
        <?php $jumlahRating = 0; } ?>
    </div>
</div>   
<div class="col-md-4">
  <div class="konten" style="padding:10px; margin-bottom: 12px;">
    <?php
    $iduser = $_SESSION['id_user'];
    $dataanggota = $this->db->query("select id_anggota, nama_anggota from anggota where id_anggota = $iduser")->row(); 
     ?>
    <p>ID   : <?php echo $dataanggota->id_anggota; ?></p>
    <p>Nama : <?php echo $dataanggota->nama_anggota; ?></p>
  </div>
    <div class="konten" style="padding:10px">
        <h5>Nilai Prediksi</h5>
          <?php 
          $no=1;
          foreach ($buku as $keys) { 
            echo "<p>".$no.". Buku (".$keys->id_buku.") : ".$keys->nilai."</p>";
           $no++;} ?>
    </div>
</div> 
