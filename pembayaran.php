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

<body >
<div class="container">
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

    <h1 class="text-center">Pembayaran</h3>
    <div class="card mt-5">
        <h5 class="card-header text-center" style="background-color: rgb(219, 205, 205);">Data Mahasiswa</h5>
        <div class="card-body">
            <p class="card-text">Data Mahasiswa yang akan dicatat di laporan pembayaran.</p>
        </div>
<?php   

        if (!isset($_POST['detail']) || isset($_POST['sembunyikanDetail'])){
?> 
        <form method="post">
            <input class="btn btn-sm ml-3 mb-5" type="submit" name="detail"  value="Tampilkan Detail" /> 
        </form>
            
<?php
        }
        else {
            if ( isset($_SESSION['nim']) ) {
        
?>
        <table class="table table-hover">
        <tbody>
        <tr>
            <th>Nama</th>
            <td><?= dataMahasiswa('nama',$pdo);?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= dataMahasiswa('nim',$pdo);?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= dataMahasiswa('nim',$pdo);?></td>
        </tr>
        <tr>
            <th>Golongan UKT </th>
            <td><?= dataMahasiswa('golonganUKT',$pdo);?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?= dataMahasiswa('namaSemester',$pdo);?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td><?= dataMahasiswa('namaJurusan',$pdo);?></td>
        </tr>
        <tr>
            <th>Tarif UKT</th>
            <td><?= dataMahasiswa('tarifUKT',$pdo);?></td>
        </tr>

    </tbody>
    </table>
                
               
    <form method="post">
        <input class="btn btn-sm ml-3 mb-5" type="submit" name="sembunyikanDetail"  value="Sembunyikan Detail" /> 
    </form>
                
              
<?php
            }
        }
        
    
?>
    </div>

    <div class="alert alert-info card-title mt-5 mb-3" role="alert">
        <h6>Pastikan data anda sudah sesuai. Lalu silahkan lanjutkan untuk pelaporan pembayaran. </h6>
    </div>
    <hr>
    <div class="card mt-5 mb-5">
        <h5 class="card-header text-center" style="background-color: rgb(219, 205, 205);">Upload Bukti Pembayaran</h5>
        <div class="card-body">  
            <p class="card-text">Silahkan upload bukti pembayaran dalam format pdf, jpg, jpeg, atau png dengan ukuran maksimal 1 MB</p>
   
        </div>
        <form method="post" class="inner-login" action="proses-pembayaran.php" enctype="multipart/form-data">  
            <input class="ml-3 mb-3"type="file" name="bukti"accept="*/image" > 
            <input type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal">
            <input class="btn btn-sm ml-3 mb-5" type="submit" value="Submit" name="submit">
        </form>
        
<?php

}
?>    
    </div>
</div>

<div class="footer-copyright text-center py-3">
    <p>&copy; Copyright
        <a href="#">unhas.com</a>
    </p>
    <p>Designed By Group 1</p>
</div>

</body>
</html>