<?php

require_once "../database/pdo.php";
require "../database/proses-sql.php";
$rows=dataPembayaran($pdo);
if(isset($_POST['update'])&&isset($_POST['nim'])){
    updateStatus($pdo,$_POST['nim']);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>Pembayaran</title>
</head>
<body>
<h3>Data Mahasiswa </h3>
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
                        <td><?= ($row['bukti']) ?></td>
                        <td><?= ($row['status']) ?></td>
                       
                        
                        <td>
                            <form method="post" action="verifikasi-pembayaran.php?update=<?= $row['nim'] ?>">
                                <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Update status" name="update">
                            </form>
                        </td>
                       
                    </tr>
                </tbody>
            
            <?php
            $inew+=1;
            }
            ?>
        </table>



        

</body>

</html>