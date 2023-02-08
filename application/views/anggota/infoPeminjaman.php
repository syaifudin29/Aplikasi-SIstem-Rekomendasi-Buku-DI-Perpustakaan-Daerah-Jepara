
<div class="col-md-12">
    <div class="konten" style="padding:10px; margin-top:10px; background-color:#EFD345;">
           <h5>Buku sedang dipinjam.</h5>
           <p>Tabel yang menampilkan data buku yang sedang dipinjam oleh anggota</p>
            <div class="table-responsive-sm">
                <table class="table" style="background-color:white;color:black">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Judul Buku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; 
                    foreach ($sedang->result() as $key) { ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $key->id_buku; ?></td>
                        <td><?php echo $key->judul; ?></td>
                    </tr>
                    <?php $no++; } $no=0; ?>
                </tbody>
                </table>
            </div>
        </div>
</div>
<div class="col-md-12">
    <div class="konten" style="padding:10px; margin-top:10px;background-color:#EB5353;">
           <h5>Buku pernah dipinjam.</h5>
           <p>Tabel yang menampilkan data buku yang pernah dipinjam oleh anggota</p>
            <div class="table-responsive" style="height: 400px">
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
                    foreach ($selesai->result() as $keys) { ?>
                    
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $keys->id_buku; ?></td>
                        <td><?php echo $keys->judul; ?></td>
                        <td>
                            <?php
                            if ($keys->rating == 0) {
                            ?>
                            <form method="POST" action="<?php echo base_url('infoAnggota/prosesRating') ?>">
                             <div class="rate">
                                <input type="hidden" name="id_rating" value="<?php echo $keys->id_rating; ?>">
                                <input onchange="submit()" type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" onchange="submit()" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input onchange="submit()" type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input onchange="submit()" type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input onchange="submit()" type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                              </form>
                            <?php
                            }else{
                                echo $keys->rating;
                            } 
                             ?>
                        </td>
                    </tr>
                    <?php $no++; } $no=0; ?>
                </tbody>
                </table>
            </div>
        </div>
</div>
<script type="text/javascript">
    function myFunction(){

    }
</script>