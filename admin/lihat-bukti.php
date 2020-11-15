<?php
require "../database/proses-sql.php";
if(isset($_POST['lihatBukti'])){
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/lihat-bukti.css">
    <title>Pembayaran</title>
</head>
<body>
    <h1>Gambar Bukti dari</h1>
    <?
        if(isset($_POST['nama'])&& isset($_POST['nim'])&&isset($_POST['bukti'])){
    ?>
            <h1>Bukti Pembayaran dari <?=$_POST['nama'];?></h1>
            <img src="../gambar-bukti/<?= $_POST['bukti']; ?> "/>
            <button onclick="window.location.href='verifikasi-pembayaran.php'">Close Preview</button>
<?php
}}
?>
    
    </body>
</html>