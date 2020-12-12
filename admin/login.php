<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!--Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <!-- Optional JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/alert.js"></script>
	<!-- Title -->
<title>Login Admin Page</title>   
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Login Admin</h3>
			</div>
			<div class="card-body">
			<?php
				require_once "../database/pdo.php"; //koneksi db
				session_start(); //memulai session
				if (isset($_POST['login'])) //mengecek jika tombol masuk ditekan
				 {
					if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) //mengecek apabila tdk kosong
					 {
						$user = $_POST['username']; // isi variabel dengan mengambil data username pada form
						$pass = $_POST['password']; // isi variabel dengan mengambil data password pada form
						$stmt = $pdo->prepare("SELECT * FROM admin WHERE username = '$user' AND password = '$pass'"); //menyiapkan query select
						$stmt->execute();//menjalankan query
						$count = $stmt->rowCount();
						if($count > 0) {
            $idAdmin = $stmt->fetch();
            $_SESSION['idAdmin'] = $idAdmin;
            header("location:admin.php");
    				} else {
						?>
						<div class="alert alert-danger" role="alert">Failed to login, please check your username or password again!</div>
						<?php
					}
				}
				else {
					?>
					<div class="alert alert-danger" role="alert">Failed to login, please fill out all the field!</div>
					<?php
				}
			}
				?>
				<form action="login.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Masuk" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>