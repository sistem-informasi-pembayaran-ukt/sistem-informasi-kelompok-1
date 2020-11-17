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

    <title>Laporan Pembayaran Per Jurusan</title>
  </head>
 
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

    <table class="table">
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
  if(isset($_POST['submitKodeJurusan'])){
    $kodeJurusan= $_POST['kodeJurusan'];
    $rows=tampilDataJurusan($pdo,$kodeJurusan);
 
    $inew = 1;
    foreach ($rows as $row) {
  ?>

  <tbody>
    <tr>
      <td> <?= $inew ?>.</th>
      <td><?= ($row['nim'])?></td>
      <td><?= ($row['nama'])?></td>
      <td><?= ($row['namaJurusan'])?></td>
      <td><?= ($row['namaSemester'])?></td>
      <td><?= ($row['tanggalPembayaran'])?></td>
    </tr>
    
  </tbody>
</table>

<?
$inew+=1;
  }
}
  ?>
  </body>
</html>