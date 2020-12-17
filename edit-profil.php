<?php
require_once "database/pdo.php";
session_start(); 

  if (isset($_POST['update'])){
      $sql = "UPDATE mahasiswa SET nama = :nama, alamat=:alamat, noTelp = :noTelp, kodeSemester = :kodeSemester, golonganUKT = :golonganUKT WHERE nim = :nim ";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':nim'=> $_POST['nim'],
        ':nama'=>$_POST['nama'],
        ':alamat' => $_POST['alamat'],
        ':noTelp' => $_POST['noTelp'],
        ':kodeSemester' => $_POST['kodeSemester'],
        ':golonganUKT' => $_POST['golonganUKT']
      ));
      if ($pdo){
        echo  "<script> alert('Berhasil');</script>";
        header("Location: profil.php");
      }
    }
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
  <link rel="stylesheet" type="text/css" href="css/editprofil.css">
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
<?php 
if (isset($_POST['edit']) ){
  if (isset($_GET['edit'])){
 
    $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.alamat, mahasiswa.noTelp, mahasiswa.kodeSemester, jurusan.namaJurusan, semester.namaSemester, ukt.golonganUKT, ukt.tarifUKT
            FROM (((mahasiswa
            INNER JOIN jurusan ON mahasiswa.kodeJurusan = jurusan.kodeJurusan)
            INNER JOIN semester ON mahasiswa.kodeSemester = semester.kodeSemester)
            INNER JOIN ukt ON mahasiswa.golonganUKT= ukt.golonganUKT)
            WHERE nim = :nim";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(array(':nim' => $_GET['edit']));
    
    $ambildata=$stmt->fetch();
    $nama=$ambildata['nama'];
    $alamat=$ambildata['alamat'];
    $noTelp=$ambildata['noTelp'];
    $kodeSemester=$ambildata['kodeSemester'];
    $namaSemester=$ambildata['namaSemester'];
    $golonganUKT=$ambildata['golonganUKT'];
    $tarifUKT=$ambildata['tarifUKT'];
    $nim= $ambildata['nim'];
?>     
    <div class="outter-form-login">
      <form method="post" class="inner-login">
        <input type="hidden" name="nim" value="<?php echo $nim;?>">
        <p>Nama
        <input type="text" name="nama" class="form-control col-4" value="<?php echo $nama;?>">  
        <p>Alamat
        <input type="text" name="alamat" class="form-control" size="40" value="<?php echo $alamat;?>"></p>
        <p>No Telepon
        <input type="text" name="noTelp" class="form-control" value="<?php echo $noTelp;?>"></p>
        <p>Semester
        <select class="custom-select" id="semester" name="kodeSemester">          
          <?php
          $sql = "SELECT * FROM semester"; 
          $stmt = $pdo->prepare($sql); //menyiapkan query hasil select
          $stmt->execute(); //menjalankan query
          $stmt->setFetchMode(PDO::FETCH_ASSOC); //memetakan
          foreach($stmt->fetchAll() as $k=>$r){
            echo "<option value=\"$r[kodeSemester]\">$r[namaSemester]</option>";
          }
          ?>
          <option selected="selected" value="<?php echo $kodeSemester;?>"><?php echo $namaSemester;?></option>
        </select>
        <p>Tarif UKT
        <select class="custom-select" id="ukt" name="golonganUKT">          
        <?php
          $sql = "SELECT * FROM ukt"; 
          $stmt = $pdo->prepare($sql); //menyiapkan query hasil select
          $stmt->execute(); //menjalankan query
          $stmt->setFetchMode(PDO::FETCH_ASSOC); //memetakan
          foreach($stmt->fetchAll() as $k=>$r){
            echo "<option value=\"$r[golonganUKT]\">Rp$r[tarifUKT]</option>";
          }
          ?>
          <option selected="selected" value="<?php echo $golonganUKT;?>">Rp<?php echo number_format($tarifUKT, 2, ",", ".");?></option>
        </select>
        <div class="row mx-5">
          <div class="col">
            <input type="submit" class="btn " value="Cancel" name="cancel"/>
          </div>
          <div class="col">
            <input type="submit" class="btn float-right" value="Update" name="update"/> 
          </div>
        </div>
      </form>
    </div>
  <?php
    }
}
  ?>  
</div>
</body>
</html>