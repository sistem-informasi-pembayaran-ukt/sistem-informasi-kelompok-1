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
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="css/profil.css">
  <!--Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
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
  <H1>Profil</H1> <br>
  <table class="table table-hover">
  <tbody>
    <tr>
      <th>Nim</th>
      <td><?php echo $nim?></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td><?php echo $nama?></td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td><?php echo $alamat?></td>
    </tr>
    <tr>
      <th>Nomor Telepon</th>
      <td><?php echo $noTelp?></td>
    </tr>
    <tr>
      <th>Departemen</th>
      <td><?php echo $kodeJurusan?></td>
    </tr>
    <tr>
      <th>Semester</th>
      <td><?php echo $kodeSemester?></td>
    </tr>
    <tr>
      <th>Golongan UKT</th>
      <td><?php echo $golonganUKT?></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td><?php echo $nama?></td>
    </tr>

  </tbody> 
    
  </table>
<form action="edit-profil.php?edit=<?php echo $_SESSION['nim'];?>" method="post">
    <input type="submit" class="btn btn-lg" value="Edit Profil" name="edit" />
    <input type="hidden" name="nim" value="<?=$_SESSION['nim']?>">
</form>
</div> <br><br>
<div class="footer-copyright text-center py-3">
        <a>&copy; Copyright
            <a href="#">unhas.com</a>
        </a>
        <br>Designed By Group 1</br>
    </div>   
</body>
</html>