<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/lihat-bukti.css">
    <title>Pembayaran</title>
</head>
<body class="col mt-5 ml-5 mr-5">
    <?php 
if (!isset($_SESSION['idAdmin'])){
    //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
    else {
    ?>
    <h1>Gambar Bukti</h1>
    <?php
        require "../database/proses-sql.php";
        if(isset($_POST['lihatBukti'])) {
            if(isset($_POST['nama'])&& isset($_POST['nim'])&&isset($_POST['bukti'])){
    ?>
            <h1>Bukti Pembayaran dari <?=$_POST['nama'];?></h1>
            <img src="../gambar-bukti/<?= $_POST['bukti']; ?> "/>
            <br>
            <button onclick="window.location.href='verifikasi-pembayaran.php'" class="btn btn-lg btn-success mt-5">Close Preview</button>
        <?php
            }
        }}
        ?>
    </body>
</html>
