<?php
require_once "../database/pdo.php";
require_once "../database/proses-sql.php";
$session_admin = $_SESSION['idAdmin'];
?>
<!DOCTYPE html>
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
    <title>Cetak Laporan per Semester</title>
</head>
<body>
  <center>
    <h2 class="font-weight-bold h2">Fakultas Teknik Universitas Hasanuddin</h2>
    <h4 class="font-weight-bold h4">Jl. Malino No.KM 6, Bontomarannu, Kec. Somba Opu, Kabupaten Gowa, Sulawesi Selatan 92171</h4>
  </center>
  <h5 class="font-italic mt-5">Print Date: <?php echo date('l, d-m-yy'); ?></h5>
  <?php 
  $timezone = time() + (60 * 60 * 7);
  ?>
  <h5 class="font-italic">Print Time: <?php echo date('H:i:s a', $timezone); ?></h5>
    <table class="table mr-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nim</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Semester</th>
          <th scope="col">Tanggal Pembayaran</th>
        </tr>
      </thead>
  <?php    
  if (isset($_POST['print'])) { 
    $kodeSemester = $_POST['kodeSemester'];
    $rows=tampilDataSemester($pdo,$kodeSemester);   
  ?>
     <tbody>
        <?php
            $inew = 0;
            foreach ($rows as $row) {
            $inew+=1;
        ?>
          
        <tr>
          <td scope="col" style="width:3%"> <?= $inew; ?>.</th>
          <td scope="col"style="width: 10%"><?= $row['nim'];?></td>
          <td scope="col"style="width: 15%"><?= $row['nama'];?></td>
          <td scope="col"style="width: 10%"><?= $row['namaJurusan'];?></td>
          <td scope="col"style="width: 13%"><?= $row['namaSemester'];?></td>
          <td scope="col"style="width: 10%"><?= $row['tanggalPembayaran'];?></td>

        </tr>
  <?php
  
        }?>
  </tbody>
  </table>
  <?php
  }?>
  <hr class="feature-divider">
<script>
  window.print();
</script>
</body>
</html>