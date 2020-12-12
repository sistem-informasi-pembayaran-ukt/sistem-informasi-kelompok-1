<!doctype html>
<html lang="en">

<head>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>Bukti Pembayaran</title>
  </head>
  <?php 
   include "navbar.php";
  ?>
  <body class="bg-dark">
    <?php 
if (isset($_SESSION['idAdmin'])){
    //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
    else {
    ?>
    <h1 class="text-center mt-5" style="color: white">Gambar Bukti</h1>

    <div class="ml-5 mr-5 mt-3">
    <?php
        require "../database/proses-sql.php";
        if(isset($_POST['lihatBukti'])) {
            if(isset($_POST['nama'])&& isset($_POST['nim'])&&isset($_POST['bukti'])){
    ?>
    <div class="card mx-auto" style="width:80%">
        <h5 class="card-header  bg-dark text-center" style="color: white;">Bukti pembayaran</h5>
         <div class="card-body">
            <h5 class="card-title text-center">Berikut adalah bukti pembayaran dari <?=$_POST['nama'];?></h5>
            <div class="row justify-content-center">
            <img class="align-item" src="../gambar-bukti/<?= $_POST['bukti']; ?> "/>
            
            </div>
            <div class="row justify-content-center">
            <button onclick="window.location.href='verifikasi-pembayaran.php'" class="btn btn-lg btn-primary mt-5 center">Close Preview</button>
            </div>
        </div>
    </div>
           
            
            
        <?php
            }
        }}
        ?>
    </body>
</html>
