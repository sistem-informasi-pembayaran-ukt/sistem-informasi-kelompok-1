<?php

try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sistem-informasi-pembayaran-ukt";
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username , $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch(PDOException $error) {
        $error->getMessage();
}
?>
