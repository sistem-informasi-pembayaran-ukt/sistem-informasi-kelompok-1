<?php
require_once "database/pdo.php";
require_once "proses-pembayaran.php";

$nim=$_SESSION['nim'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>Pembayaran</title>
</head>

<h3>Data Mahasiswa </h3>
<?php
    if (isset($_POST['detail']) ){
        if ( isset($nim) ) {
?>
        <p>Nama : <?= dataMahasiswa('nama',$pdo);?></p>
        <p>NIM :<?= dataMahasiswa('nim',$pdo);?></p>
        <p>Golongan UKT :<?= dataMahasiswa('golonganUKT',$pdo);?><br>
        <p>semester :<?= dataMahasiswa('namaSemester',$pdo);?><br>
        <p>jurusan :<?= dataMahasiswa('namaJurusan',$pdo);?><br>
        <p>tarif ukt :<?=dataMahasiswa('tarifUKT',$pdo);?><br>
        <form method="post">
            <input type="submit" name="sembunyikanDetail"  value="Sembunyikan Detail" /> 
        </form>
<?
        }
    }
    else if (!isset($_POST['detail']) || isset($_POST['sembunyikanDetail'])){
    ?> <form method="post">
    <input type="submit" name="detail"  value="Tampilkan Detail" /> 
</form><?
    }
    
?>
<h3>Jika data anda sudah sesuai, silahkan lanjutkan untuk pelaporan pembayaran</h3>
    
<form method="post" class="inner-login" action="proses-pembayaran.php" enctype="multipart/form-data">
       
                
        <h5>Tambahkan bukti pembayaran dalam bentuk gambar ataupun pdf, maksimal ukuran 1 MB</h5>
        <div class="form-group">
            <input type="file" name="bukti"accept="*/image"></p>
        </div>
        <input type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal"/></p>
        <input type="submit" value="Submit" name="submit"/></p>
</form>

<body>

        

</body>

</html>