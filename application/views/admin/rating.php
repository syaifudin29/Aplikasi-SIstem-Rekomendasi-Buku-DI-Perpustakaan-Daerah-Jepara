<?php 
$rata = 0;
    $juml =0;
    $item = 0;
    $dataAnggota = $this->db->query("select id_anggota from anggota");
    foreach ($dataAnggota->result() as $keyAng) {
        
        $data_rating = $this->db->query("select * from rating where id_anggota = $keyAng->id_anggota and rating != 0");
        foreach ($data_rating->result_array() as $key) {    

            $us = $key['id_anggota'];
            $ib = $key['id_buku'];

            $n_prediksi = $this->db->query("select * from prediksi where id_anggota = $us and id_buku = $ib ")->row();
            $prdik_rating = $n_prediksi->nilai-$key['rating']; 
            $juml = abs($prdik_rating)+$juml;
            $item++;
        }
        }
 ?>
<div class="col-md-12">
    <h4 style="margin-bottom:20px; color:#2F8F9D;"><i class="fa fa-star"></i>Daftar Rating Buku</h4> 
</div>
<div class="col-md-12">
    <div class="konten" style="padding:10px; margin-top:10px;">
        <h4>Nilai MAE</h4>
        <h5><?php echo $juml/$item; ?></h5>
    </div>
</div>
<div class="col-md-12">
<div class="konten" style="padding:10px; margin-top:10px;">
        <p>Daftar rating buku yang diberikan anggota.</p>
        <div class="table-responsive-sm">
            <table class="table" style="background-color:white;color:black">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $jumlahRating = 0;
                $query = $this->db->query("SELECT * from buku order by id_buku asc");
                foreach ($query->result() as $key) {
                    $nobuk = $key->id_buku;
                    $queryUlang = $this->db->query("SELECT rating FROM `rating` WHERE id_buku = $nobuk and rating != 0");
                    foreach ($queryUlang->result() as $keys) {
                        $jumlahRating=$keys->rating+$jumlahRating;
                    }
                    $jml = $queryUlang->num_rows();
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$nobuk."</td>";
                    echo "<td>".$key->judul."</td>";
                     echo "<td>".round($jumlahRating/$jml,1)."</td>";
                    echo "</tr>";
                    $jumlahRating = 0;
                $no++;
                } 
                 ?>
            </tbody>
            </table>
        </div>
    </div>
</div>