<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="register.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, then local JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/showpass.js"></script>
    <!-- Title -->
    <title>Register</title>
</head>
<body>
    <div class="col-md-4 col-md-offset-4 form-login"></div>
    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form action="register.php" class="inner-register" method="post">
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
                } elseif ($_POST['ukt'] == "" || $_POST['ukt'] == "" ) {
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
            }
            if ($message != "") {
                echo '<div class="alert alert-danger" role="alert">Register failed, ' . $message . '</div>';
            }
            ?>
            <h3 class="text-center title-login">REGISTRATION</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="nim" placeholder="NIM">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <input type="checkbox" onclick="showPassword()"> Show/Hide Password
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phonenum" placeholder="Nomor Telepon">
            </div>
            <div class="form-group">
            <select id="department" name="department" class="form-control">
              <option>--- Pilih Jurusan ---</option>
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
            <div class="form-group">
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
            <div class="form-group">
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
            <input type="submit" class="btn btn-block btn-custom-green" value="Register" name="register" />
            <div class="text-center forget">
                <p>Already have an account? Please <a href="login.php">Login</a></p>
            </div>
        </form>

    </div>
    </div>
</body>
</html>