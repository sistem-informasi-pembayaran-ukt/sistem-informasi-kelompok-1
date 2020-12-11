<?php
require_once "database/pdo.php";
require_once "proses-pembayaran.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/pembayaran.css">

    <title>Pembayaran</title>
</head>

<body class="col mt-5 ml-5 mr-5">

<?php
include "navbar.php";
?>
<?php
    if (!isset($_SESSION['nim'])){
        //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
    }
    else {   
?>
<div class="container">
<h1>Data Mahasiswa </h3>
<?php   

        if (!isset($_POST['detail']) || isset($_POST['sembunyikanDetail'])){
?> 
            <form method="post">
                <input class="btn btn-sm" type="submit" name="detail"  value="Tampilkan Detail" /> 
            </form>
<?php
        }
        else {
            if ( isset($_SESSION['nim']) ) {
        
?>
                <p>Nama : <?= dataMahasiswa('nama',$pdo);?></p>
                <p>NIM :<?= dataMahasiswa('nim',$pdo);?></p>
                <p>Golongan UKT :<?= dataMahasiswa('golonganUKT',$pdo);?><br>
                <p>Semester :<?= dataMahasiswa('namaSemester',$pdo);?><br>
                <p>Jurusan :<?= dataMahasiswa('namaJurusan',$pdo);?><br>
                <p>Tarif ukt :<?= dataMahasiswa('tarifUKT',$pdo);?><br>
                <form method="post">
                    <input class="btn btn-sm" type="submit" name="sembunyikanDetail"  value="Sembunyikan Detail" /> 
                </form>
<?php
            }
        }
    
?>
    <br>    <h6>Jika data anda sudah sesuai, silahkan lanjutkan untuk pelaporan pembayaran</h6>
        <hr>
        <form method="post" class="inner-login" action="proses-pembayaran.php" enctype="multipart/form-data">
       
                
            <h5>Tambahkan bukti pembayaran dalam bentuk gambar ataupun pdf, maksimal ukuran 1 MB</h5>
            <div class="form-group">
                <input type="file" name="bukti"accept="*/image" >
            </div>
            <input type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal">
            <input class="btn btn-sm" type="submit" value="Submit" name="submit">
        </form>
        
<?php

}
?>    
</div>
</body>
</html>