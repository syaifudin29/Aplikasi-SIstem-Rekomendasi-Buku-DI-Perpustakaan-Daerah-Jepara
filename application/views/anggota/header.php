<?php 
if (isset($_SESSION['id_anggota'])) {
  
}else{
redirect(base_url("login"));
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
          }
          .rate:not(:checked) > label:before {
              content: '★ ';
          }
          .rate > input:checked ~ label {
              color: #ffc700;    
          }
          .rate:not(:checked) > label:hover,
          .rate:not(:checked) > label:hover ~ label {
              color: #deb217;  
          }
          .rate > input:checked + label:hover,
          .rate > input:checked + label:hover ~ label,
          .rate > input:checked ~ label:hover,
          .rate > input:checked ~ label:hover ~ label,
          .rate > label:hover ~ input:checked ~ label {
              color: #c59b08;
          }

    </style>
    <title>SISTEM REKOMENDASI BUKU</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="badan">
<nav class="navbar navbar-expand-lg" >
  <a class="navbar-brand" href="#" style="color: white;">Perpustakaan Jepara</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i style="color:white;" class="fas fa-align-justify"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('anggota/beranda'); ?>">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('anggota/infopeminjaman'); ?>" >Info Peminjaman</a>
      </li>
      <li class="nav-item dropdown">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
      <a class="btn btn-danger" href="<?php echo base_url('login/keluar'); ?>"> <i class="fas fa-sign-out"></i> Keluar</a>
  </div>
</nav>
<div class="row">