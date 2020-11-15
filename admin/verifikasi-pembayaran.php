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
  
    <title>Pembayaran</title>
</head>
<?php
/*  if (!isset($_SESSION['idadmin'])){
    //Tampilan maaf halaman ini tidak bisa diakses
        echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
    else {*/
        
        $rows=dataPembayaran($pdo);
        if(isset($_POST['update'])&&isset($_POST['nim'])){
            verifikasi($pdo,$_POST['nim']);
            echo  "<script> alert('Berhasil diupdate');
                   </script>"; 
         
        }
        if(isset($_POST['updateTidak'])&&isset($_POST['nim'])){
            tidakTerverifikasi($pdo,$_POST['nim']);
        }
        else{

        
        
?>
<body>
<h3>Data Mahasiswa </h3>
<button onclick="runPopUp()">Tombol Ini</button>
<div class="col mt-5 ml-5 mr-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Status</th>
                    
                    <th scope="col">Action</th>
                    
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
                       
                        
                        <td>
                            <form method="post" action="verifikasi-pembayaran.php?update=<?= $row['nim'] ?>">
                                <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Verifikasi Sesuai" name="update">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="verifikasi-pembayaran.php?update=<?= $row['nim'] ?>">
                                <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Tidak terverikasi" name="updateTidak">
                            </form>
                        </td>
                     
                       
                    </tr>
                </tbody>
            
            <?php
            $inew+=1;
            }}
            ?>
        </table>

</body>
<?
?>
</html>