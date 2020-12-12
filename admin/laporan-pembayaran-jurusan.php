<?php
require_once "../database/pdo.php";
require "../database/proses-sql.php";
if (!isset($_SESSION['idAdmin'])){
  //Tampilan maaf halaman ini tidak bisa diakses
      echo "<h3>Maaf Halaman Ini Tidak Bisa Diakses";
}
  else {
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="side-navbar.css">
    <link rel="stylesheet" href="admin.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>Laporan Pembayaran</title>
  </head>
  <?php 
   include "navbar.php";
  ?>
  <body>
    <h1>Laporan Pembayaran</h1>
    <form method="POST" action="">
      <h2> Pilih Jurusan </h2>
      <h4>
        <select name="kodeJurusan">
        <option value=1>Teknik Sipil</option>
        <option value=2>Teknik Mesin</option>
        <option value=3>Teknik Perkapalan</option>
        <option value=4>Teknik Elektro</option>
        <option value=5>Teknik Arsitektur</option>
        <option value=6>Teknik Geologi</option>
        <option value=7>Teknik Industri</option>
        <option value=8>Teknik Kelautan</option>
        <option value=9>Teknik Sistem Perkapalan</option>
        <option value=10>Teknik Perencanaan Wilayah dan Kota</option>
        <option value=11>Teknik Pertambangan</option>
        <option value=12>Teknik Informatika</option>
        <option value=13>Teknik Lingkungan</option>

        </select>
        <input class="btn btn-success" type="submit" name="submitKodeJurusan" value="Submit"/>
      </h4>
    </form>

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
  <tbody>

  <?php
  if(isset($_POST['submitKodeJurusan'])){
    $kodeJurusan= $_POST['kodeJurusan'];
    $rows=tampilDataJurusan($pdo,$kodeJurusan);
 
    $inew = 0;
    foreach ($rows as $row) {
      $inew+=1;
  ?>

 
    <tr>
      <td> <?= $inew; ?>.</th>
      <td><?= $row['nim'];?></td>
      <td><?= $row['nama'];?></td>
      <td><?= $row['namaJurusan'];?></td>
      <td><?= $row['namaSemester'];?></td>
      <td><?= $row['tanggalPembayaran'];?></td>
    </tr>
    <?php

  }?>
  </tbody>
</table>
<form action="cetak-jurusan.php" method="post">
    <input type="submit" class="btn btn-success btn-lg" value="Print" name="print" formtarget="_blank" />
</form>
<?php
}}?>

</body>
</html>