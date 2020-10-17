<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<!-- Font -->
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
	<!-- Optional JavaScript -->
	<script src="js/showpass.js"></script>
	<!-- Title -->
	<title>Registrasi</title>
</head>
<body>
<!--header-->
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
		<form action="register.php" method="post">
		<?php
            require_once "database/pdo.php";
            $message = '';
            if (isset($_POST['register'])) {
                if ($_POST['nim'] == "") {
                    $message = 'NIM field is required!';
                } elseif ($_POST['password'] == "") {
                    $message = 'Password field is required!';
                } elseif ($_POST['name'] == "") {
                    $message = 'Name field is required!';
                } elseif ($_POST['address'] == "") {
                    $message = 'Address field is required!';
                } elseif ($_POST['phonenum'] == "") {
                    $message = 'Phone Number field is required!';
                } elseif ($_POST['department'] == "") {
                    $message = 'Department field is required!';
                } elseif ($_POST['semester'] == "") {
                    $message = 'Semester field is required!';
                } elseif ($_POST['ukt'] == "") {
                    $message = 'UKT field is required!';
                } else {
                    $sql = "INSERT INTO mahasiswa (nim,password,nama,alamat,noTelp,kodeJurusan,kodeSemester,golonganUKT) 
                      VALUES (:nim, :password, :nama, :alamat, :noTelp, :kodeJurusan, :kodeSemester, :golonganUKT)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                      ':nim' => $_POST['nim'],
                      ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                      ':nama' => $_POST['name'],
                      ':alamat' => $_POST['address'],
                      ':noTelp' => $_POST['phonenum'],
                      ':kodeJurusan' => $_POST['department'],
                      ':kodeSemester' => $_POST['semester'],
                      ':golonganUKT' => $_POST['ukt'],
                    ));
                    header("location:login.php");
                }
            if ($message != "") {
                echo '<div class="alert alert-danger" role="alert">Register failed, ' . $message . '</div>';
            }
        }
            ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						</div>
						<input type="text" name="nim" class="form-control" placeholder="NIM">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" type="password" class="form-control" name="password" id="password" placeholder="Password">
						<div class="input-group">
							<input type="checkbox" onclick="showPassword()"> Show/Hide Password
						</div>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-home"></i></span>
						</div>
						<input type="text" name="address" class="form-control" placeholder="Alamat">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-phone"></i></span>
						</div>
						<input type="text" name="phonenum" class="form-control" placeholder="No Hp">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Departemen</label>
						</div>
  					<select class="custom-select" id="department" name="department">
						<option>--- Pilih Departemen ---</option>
                <?php
                $sql = "SELECT * FROM jurusan";
                $stmt = $pdo->prepare($sql); 
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                ?>
                <?php
                  foreach($stmt->fetchAll() as $k=>$r){
                    echo "<option value=\"$r[kodeJurusan]\">$r[namaJurusan]</option>";
                  }
                ?>
            </select>
          </div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect02">Semester</label>
						</div>
            <select id="semester" name="semester" class="form-control">
              <option>--- Pilih Semester ---</option>
                <?php
                $sql = "SELECT * FROM semester";
                $stmt = $pdo->prepare($sql); 
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                ?>
                <?php
                  foreach($stmt->fetchAll() as $k=>$r){
                    echo "<option value=\"$r[kodeSemester]\">$r[namaSemester]</option>";
                  }
								?>
						</select>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect03">Tarif UKT</label>
						</div>
						<select id="ukt" name="ukt" class="form-control">
              <option>--- Pilih Tarif UKT ---</option>
                <?php
                $sql = "SELECT * FROM ukt";
                $stmt = $pdo->prepare($sql); 
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);             
                  foreach($stmt->fetchAll() as $k=>$r){
                    echo "<option value=\"$r[golonganUKT]\">Rp$r[tarifUKT]</option>";
                  }
                ?>
            </select>
					</div>
					<div class="form-group">
						<input type="submit" value="Daftar" name="register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>