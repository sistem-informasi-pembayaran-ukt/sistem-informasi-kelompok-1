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
    <title>Verifikasi Pembayaran</title>
  </head>
  <?php 
   include "navbar.php";
  ?>
<?php
if (!isset($_SESSION['idAdmin'])){
    //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
    else {
        
        $rows=dataPembayaran($pdo);
        
        
?>
<body>
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
                        <td><?=$inew;?></td>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['bukti']; ?>
                            <br>
                            <form method="post" action="lihat-bukti.php?show=<?= $row['bukti']; ?>">
                                <input type="hidden" name="bukti" value="<?= $row['bukti']; ?>">
                                <input type="hidden" name="nama" value="<?= $row['nama']; ?>">
                                <input type="hidden" name="nim" value="<?= $row['nim']; ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Lihat Bukti" name="lihatBukti">
                            </form>
                        </td>
                        <td><?= $row['status']; ?></td>
                       
                        <?php 
                            if($row['status']!= "Belum Terverifikasi"){
                        ?>
                            <td></td>
                        <?php
                            }
                            else {

                           
                        ?>
                        <td>
                            <form method="post" action="proses-verifikasi.php?update=<?= $row['idPembayaran']; ?>">
                
                                <input type="hidden" name="idPembayaran" value="<?= $row['idPembayaran']; ?>">
                                <input type="hidden" name="status" value="Verifikasi Sesuai">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Verifikasi" name="update">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="proses-verifikasi.php?update=<?= $row['idPembayaran']; ?>">
                
                                <input type="hidden" name="idPembayaran" value="<?= $row['idPembayaran']; ?>">
                                <input type="hidden" name="status" value="Tidak Terverifikasi">
                                <input type="submit" class=" btn btn-sm  btn-danger" value="Tidak Terverikasi" name="updateTidak">
                            </form>
                        </td>
                        <?php
                            }
                        ?>
                     
                       
                    </tr>
                </tbody>
            
            <?php
            $inew+=1;
            }}
            ?>
        </table>

</body>
</html>