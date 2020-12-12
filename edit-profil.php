<?php
require_once "database/pdo.php";
session_start(); 

  if (isset($_POST['update'])){
    $session_nim = $_SESSION['nim'];
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $noTelp=$_POST['noTelp'];
    $kodeJurusan=$_POST['kodeJurusan'];
    $kodeSemester=$_POST['kodeSemester'];
    $golonganUKT= $_POST['golonganUKT'];

    $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama' , alamat = '$alamat', noTelp = '$noTelp', kodeJurusan= '$kodeJurusan', kodeSemester='$kodeSemester', golonganUKT='$golonganUKT' WHERE nim = '$session_nim'";
    $stmt = $pdo->prepare($sql);
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
  if ( isset($_GET['edit']) ) {
    $session_nim = $_SESSION['nim'];
    $sql="SELECT * FROM mahasiswa INNER JOIN jurusan ON jurusan.kodeJurusan = mahasiswa.kodeJurusan INNER JOIN semester ON semester.kodeSemester = mahasiswa.kodeSemester INNER JOIN ukt ON ukt.golonganUKT = mahasiswa.golonganUKT WHERE nim = '$session_nim'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(array('$session_nim' => $_GET['edit']));
                    
    $ambildata=$stmt->fetch();
    $nim=$ambildata['nim'];
    $nama=$ambildata['nama'];
    $alamat=$ambildata['alamat'];
    $noTelp=$ambildata['noTelp'];
    $kodeJurusan=$ambildata['namaJurusan'];
    $kodeSemester=$ambildata['namaSemester'];
    $golonganUKT=$ambildata['tarifUKT'];
?>     
    <div class="outter-form-login">
      <form method="post" class="inner-login" action="profil.php?update=<?php echo $nim?> ">
        <p>Nama
<input type="text" name="nama" class="form-control col-4" value="<?php echo $nama;?>">  
        <p>Alamat
        <input type="text" name="alamat" class="form-control" size="40" value="<?php echo $alamat;?>"></p>
        <p>No Telepon
        <input type="text" name="noTelp" class="form-control" value="<?php echo $noTelp;?>"></p>
        <p>Semester
        <select class="custom-select" id="semester" name="kodeSemester">
						<option><?php echo $kodeSemester?></option>
                <?php
                $sql = "SELECT * FROM semester"; 
                $stmt = $pdo->prepare($sql); //menyiapkan query hasil select
                $stmt->execute(); //menjalankan query
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //memetakan
                ?>
                <?php
                  foreach($stmt->fetchAll() as $k=>$r){
                    echo "<option value=\"$r[kodeSemester]\">$r[namaSemester]</option>";
                  }
                ?>
            </select>
        <p>Golongan UKT
        <select class="custom-select" id="golonganUKT" name="golonganUKT">
						<option>Rp<?php echo $golonganUKT?></option>
                <?php
                $sql = "SELECT * FROM ukt"; 
                $stmt = $pdo->prepare($sql); //menyiapkan query hasil select
                $stmt->execute(); //menjalankan query
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //memetakan
                ?>
                <?php
                  foreach($stmt->fetchAll() as $k=>$r){
                    echo "<option value=\"$r[golonganUKT]\">Rp$r[tarifUKT]</option>";
                  }
                ?>
            </select> <br><br>
        <input type="submit" class="btn " value="Update" name="update"/> <br>
        <input type="submit" class="btn "value="Cancel" name="cancel"/>
      </form>
    </div>
  <?php
    }
  }
  ?>  
</div>

</body>
</html>