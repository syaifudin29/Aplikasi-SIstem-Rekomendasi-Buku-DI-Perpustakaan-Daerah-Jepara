
<div class="col-md-3" style="margin-bottom: 10px;">
  <?php if ($action != 'update') { 
    echo form_open_multipart('bukuAdmin/tambahData');?>
  <div class="konten" style="padding:10px">
      <h4 style="text-align:center;">Tambah Data</h4>
      <div class="form-group">
        <label for="judulBuku">Judul</label>
        <input type="text" class="form-control" name="judul" id="judulBuku" placeholder="masukkan judul buku">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Gambar</label>
        <input type="file" name="berkas" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <button type="submit" class="btn btn-light">Simpan</button>
    </form>
  </div>
  <?php }else{
     echo form_open_multipart('bukuAdmin/updateData');?>
     <div class="konten" style="padding:10px; background-color: #14C38E;">
      <h4 style="text-align:center;">Update Data</h4>
      <input type="hidden" name="id" value="<?php echo $dataUpdate->id_buku ?>">
      <div class="form-group">
        <label for="judulBuku">Judul</label>
        <input type="text" class="form-control" name="judul" value="<?php echo $dataUpdate->judul ?>" id="judulBuku" placeholder="masukkan judul buku">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"><?php echo $dataUpdate->deskripsi ?></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Gambar</label>
        <br>
         <img class="gambar_data" style="margin-bottom: 5px" src="<?php echo base_url('gambar/').$dataUpdate->gambar; ?>" alt="..." class="img-thumbnail">
        <input type="file" name="berkas" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <button type="submit" class="btn btn-light">Simpan</button>
      <a href="buku" class="btn btn-danger">BATAL</a>
    </form>
  </div>
  <?php } ?>
  </div>
  <div class="col-md-8">
    <div class="konten" style="padding:10px;">
      <h3><i style="color:white;" class="fas fa-book"></i> Data Buku </h3>
       <form class="form-inline float-right" method="POST">
          <input class="form-control mr-sm-2" type="search" name="pencarian" placeholder="Search" aria-label="Search">
          <button class="btn alert-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
        </form>
      <p style="margin-bottom:30px">Daftar buku yang ada di perpustakaan.</p>
      <div class="table-responsive" style="height: 500px">
      <table class="table" style="background-color:white;color:black">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Gambar</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($buku as $key) {
           ?>
            <tr>
            <th scope="row"><?php echo $key->id_buku; ?></th>
            <td><?php echo $key->judul; ?></td>
            <td><?php echo substr($key->deskripsi, 0, 100); ?></td>
            <td>
                <img class="gambar_data" src="<?php echo base_url('gambar/').$key->gambar; ?>" alt="..." class="img-thumbnail">
            </td>
            <td>
                <a href="?action=update&id=<?php echo $key->id_buku;?>"><i class="fas fa-edit"></i></a>
                <a href="../bukuAdmin/deleteUpdate?id=<?php echo $key->id_buku;?>"><i style="color:red;" class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
           <?php
          } ?>
         
        </tbody>
      </table>
        </div>
    </div>
  </div>