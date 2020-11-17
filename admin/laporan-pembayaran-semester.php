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

    <title>Laporan Pembayaran</title>
  </head>
 
  <body>
    <h1>Laporan Pembayaran</h1>
    <form method="POST" action="">
<h2> Pilih Semester </h2>
<h4>
  <select name="kodeSemester">
    <option value=1>Semester Awal 2014/2015</option>
    <option value=2>Semester Akhir 2014/2015</option>
    <option value=3>Semester Awal 2015/2016</option>
    <option value=4>Semester Akhir 2015/2016</option>
    <option value=5>Semester Awal 2016/2017</option>
    <option value=6>Semester Akhir 2016/2017</option>
    <option value=7>Semester Awal 2017/2018</option>
    <option value=8>Semester Akhir 2017/2018</option>
    <option value=9>Semester Awal 2018/2019</option>
    <option value=10>Semester Akhir 2018/2019</option>
    <option value=11>Semester Awal 2019/2020</option>
    <option value=12>Semester Akhir 2019/2020</option>
    <option value=13>Semester Awal 2020/2021</option>
    <option value=14>Semester Akhir 2020/2021</option>
    <option value=15>Semester Awal 2021/2022</option>
    <option value=16>Semester Akhir 2021/2022</option>
  </select>
  <input class="btn btn-success" type="submit" name="submitKodeSemester" value="Submit"/>
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
  if(isset($_POST['submitKodeSemester'])){
    $kodeSemester = $_POST['kodeSemester'];
    $rows=tampilDataSemester($pdo,$kodeSemester);
 
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