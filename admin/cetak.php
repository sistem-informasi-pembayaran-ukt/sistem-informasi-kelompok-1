<?php
require_once "../database/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2F33n5dQ81WUE00s/" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Passion+One&family=Staatliches&display=swap" rel="stylesheet">
    <title>Cetak per Jurusan</title>
</head>
<body>
  <center>
    <h2 class="font-weight-bold h2">Fakultas Teknik Universitas Hasanuddin</h2>
    <h4 class="font-weight-bold h4">Jl. Malino No.KM 6, Bontomarannu, Kec. Somba Opu, Kabupaten Gowa, Sulawesi Selatan 92171</h4>
  </center>
  <h5 class="font-italic mt-5">Print Date: <?php echo date('l, d-m-yy'); ?></h5>
  <h5 class="font-italic">Print Time: <?php echo date('H:i:s a'); ?></h5>
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
  if(isset($_POST['submitKodeJurusan'])){
    $kodeJurusan= $_POST['kodeJurusan'];
    $rows=tampilDataJurusan($pdo,$kodeJurusan);
    $inew = 1;
    foreach ($rows as $row) {
  ?>
      <tbody>
        <tr>
          <td><?= $inew; ?>.</th>
          <td><?= $row['nim'];?></td>
          <td><?= $row['nama'];?></td>
          <td><?= $row['namaJurusan'];?></td>
          <td><?= $row['namaSemester'];?></td>
          <td><?= $row['tanggalPembayaran'];?></td>
        </tr>
      </tbody>
    </table>
  <?php
  $inew+=1;
    }
  }
  ?>
  <hr class="feature-divider">
<script>
  window.print();
</script>
</body>
</html>