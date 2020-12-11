<?php
require_once "database/pdo.php";
session_start(); 

$session_nim = $_SESSION['nim'];
$sql="SELECT * FROM mahasiswa INNER JOIN jurusan ON jurusan.kodeJurusan = mahasiswa.kodeJurusan INNER JOIN semester ON semester.kodeSemester = mahasiswa.kodeSemester INNER JOIN ukt ON ukt.golonganUKT = mahasiswa.golonganUKT WHERE nim = '$session_nim'";
$stmt = $pdo->prepare($sql); 
$stmt -> execute(array('$session_nim'));
                
$ambildata=$stmt->fetch();
$nim=$ambildata['nim'];
$nama=$ambildata['nama'];
$alamat=$ambildata['alamat'];
$noTelp=$ambildata['noTelp'];
$kodeJurusan=$ambildata['namaJurusan'];
$kodeSemester=$ambildata['namaSemester'];
$golonganUKT=$ambildata['tarifUKT'];
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/profil.css">
  <!--Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="css/.css">
  <!-- Optional JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/alert.js"></script>
</head>
<body>
<?php
include "navbar.php";
?>
<div class="container">
<h1>Profile</h1>
<div class="profile">
  <div class="data">
    <p class="field">NIM
    <p class="showdata text-gray"><?php echo $nim?>
  </div>
  <div class="data">
    <p class="field">Nama
    <p class="showdata text-gray"><?php echo $nama?></p>
  </div>
  <div class="data">
    <p class="field">Alamat
    <p class="showdata text-gray"><?php echo $alamat?></p>
  </div>
  <div class="data">
    <p class="field">Nomor Telepon
    <p class="showdata text-gray"><?php echo $noTelp?></p>
  </div>
  <div class="data">
    <p class="field">Jurusan
    <p class="showdata text-gray"><?php echo $kodeJurusan?></p>
  </div>
  <div class="data">
    <p class="field">Semester
    <p class="showdata text-gray"><?php echo $kodeSemester?></p>
  </div>
  <div class="data">
    <p class="field">Golongan UKT
    <p class="showdata text-gray">Rp<?php echo $golonganUKT?></p>
  </div>
</div>
<form action="edit-profil.php?edit=<?php echo $_SESSION['nim'];?>" method="post">
    <input type="submit" class="btn btn-success btn-lg" value="Edit Profil" name="edit" />
    <input type="hidden" name="nim" value="<?=$_SESSION['nim']?>">
</form>
</div>

</body>
</html>