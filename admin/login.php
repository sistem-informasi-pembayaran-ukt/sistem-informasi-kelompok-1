<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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