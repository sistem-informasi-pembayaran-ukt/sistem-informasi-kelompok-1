<?php
require_once "../database/pdo.php";
require "../database/proses-sql.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Pembayaran</title>
</head>
<?php
/*  if (!isset($_SESSION['idadmin'])){
    //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
    else {*/
        
        $rows=dataPembayaran($pdo);
        
        
?>
<body class="col mt-5 ml-5 mr-5">
<h3>Data Mahasiswa </h3>

<div class="col mr-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th></th>
                    
                </tr>
            </thead>
            <?php
            $inew = 1;
            foreach ($rows as $row) {
                
            ?>
                <tbody>
                    <tr>
                        <td><?=$inew?></td>
                        <td><?= ($row['nim']) ?></td>
                        <td><?= ($row['nama']) ?></td>
                        <td><?= ($row['bukti']) ?>
                            <br>
                        
                            <form method="post" action="lihat-bukti.php?show=<?= $row['bukti'] ?>">
                                <input type="hidden" name="bukti" value="<?= $row['bukti'] ?>">
                                <input type="hidden" name="nama" value="<?= $row['nama'] ?>">
                                <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Lihat Bukti" name="lihatBukti">
                            </form>
                            </td>

                        
                        <td><?= ($row['status']) ?></td>
                       
                        <?php 
                            if($row['status']!= "Belum Terverifikasi"){
                        ?>
                            <td></td>
                        <?php
                            }
                            else {

                           
                        ?>
                        <td>
                            <form method="post" action="proses-verifikasi.php?update=<?= $row['idPembayaran'] ?>">
                
                                <input type="hidden" name="idPembayaran" value="<?= $row['idPembayaran'] ?>">
                                <input type="hidden" name="status" value="Verifikasi Sesuai">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Verifikasi" name="update">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="proses-verifikasi.php?update=<?= $row['idPembayaran'] ?>">
                
                                <input type="hidden" name="idPembayaran" value="<?= $row['idPembayaran'] ?>">
                                <input type="hidden" name="status" value="Tidak Terverifikasi">
                                <input type="submit" class=" btn btn-sm  btn-danger" value="Tidak Terverikasi" name="updateTidak">
                            </form>
                        </td>
                        <?
                            }
                        ?>
                     
                       
                    </tr>
                </tbody>
            
            <?php
            $inew+=1;
            }
            ?>
        </table>

</body>
<?
?>
</html>