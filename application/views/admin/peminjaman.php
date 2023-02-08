<div class="col-md-12">
    <h4 style="margin-bottom:20px; color:#2F8F9D;"><i class="fa fa-arrow-down-wide-short"> </i> Transaksi Peminjaman Buku</h4> 
</div>
<div class="col-md-12">
    <div class="konten" style="padding:10px; width:350px">
        <form method="POST" action="<?php echo base_url('peminjamanAdmin/addList'); ?>">
        <div class="form-row">
            <div class="col-auto">
            <input type="number" name="id" class="form-control mb-2" id="inlineFormInput" placeholder="masukkan kode buku" required>
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="col-md-8">
    <div class="konten" style="padding:10px; margin-top:10px;">
        <p>Daftar Buku yang ingin dipinjam anggota.</p>
        <div class="table-responsive-sm">
            <table class="table" style="background-color:white;color:black">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dataBuku = $this->session->userdata('dataBuku'); 
                if (empty($dataBuku)) {
                     
                 }else{
                    $nom = 1; 
                    foreach ($dataBuku as $bukuList) {
                       ?>
                       <tr>
                           <td scope="row"><?php echo $nom; ?></td>
                           <td><?php echo $bukuList['id_buku']; ?></td>
                           <td><?php echo $bukuList['judul']; ?></td>
                           <td><a href="<?php echo base_url('peminjamanAdmin/deleteList?id='.$nom); ?>"><i style="color:red;" class="fas fa-trash-alt"></i></a></td>
                       </tr>
                       <?php
                       $nom++;
                    }
                    }
                 ?>
            </tbody>
            </table>
        </div>
        <a href="<?php echo base_url('peminjamanAdmin/prosesData')?>" class="btn btn-warning text-white"><i class="fa fa-angles-right"></i> Proses peminjaman </a>
         <a href="<?php echo base_url('peminjamanAdmin/clearData')?>" class="btn btn-light">Clear </a>
    </div>
</div>
<div class="col-md-4">
    <div class="konten" style="padding:10px; margin-top:10px;">
        <form method="POST" action="<?php echo base_url('peminjamanAdmin/cariAnggota')?>">
            <div class="form-row">
                <div class="col-auto">
                <input type="text" class="form-control mb-2"  name="id" id="cariAnggota" placeholder="masukkan id anggota" required>
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-"></i> Cari</button>
                </div>
            </div>
        </form>
        <div style="padding:10px">
            <table  class="text-white">
                <tr>
                    <td>ID Anggota</td>
                    <td></td>
                    <td>: <?php $datas = $this->session->userdata('dataAnggota');
                    echo $datas['id_anggota']; ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="width:20px"></td>
                    <td>: <?php $datas = $this->session->userdata('dataAnggota');
                    echo $datas['nama']; ?></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</div>