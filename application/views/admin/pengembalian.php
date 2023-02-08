<div class="col-md-12">
    <h4 style="margin-bottom:20px; color:#2F8F9D;"><i class="fa fa-arrow-up-wide-short"> </i> Transaksi Pengembalian Buku</h4> 
</div>
<div class="col-md-12">
    <div class="konten" style="padding:10px; width:350px">
        <form  method="POST">
        <div class="form-row">
            <div class="col-auto">
            <input type="text" name="id" class="form-control mb-2" id="inlineFormInput" placeholder="masukkan id anggota" required>
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-magnifying-glass"></i></i> Cari</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="col-md-8">
    <div class="konten" style="padding:10px; margin-top:10px;">
        <p>Daftar Buku yang dipinjam anggota.</p>
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
                $nom = 1; 
                foreach ($buku->result() as $key) {
               
                     $id_anggota = $key->id_anggota;
                     $nama = $key->nama_anggota;
                ?>
                <tr>
                    <th scope="row"><?php echo $nom; ?></th>
                    <td><?php echo $key->id_buku; ?></td>
                    <td><?php echo $key->judul; ?></td>
                </tr>
                <?php
                $nom++;}
                if ($buku->num_rows() == 0) {
                     $id_anggota = "";
                     $nama = ""; 
                }
                ?>
              
            </tbody>
            </table>
        </div>
        <a href="<?php echo base_url('pengembalianAdmin/prosesData?id='.$id_anggota); ?>" class="btn btn-warning text-white"><i class="fa fa-angles-right"></i> Proses pengembalian </a>
    </div>
</div>
<div class="col-md-4">
    <div class="konten" style="padding:10px; margin-top:10px;">
        <div style="padding:10px">
            <h4>Data Diri Anggota</h4>
            <table>
                <tr>
                    <td>ID Anggota</td>
                    <td></td>
                    <td>: <?php echo $id_anggota; ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="width:20px"></td>
                    <td>: <?php echo $nama; ?> </td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</div>