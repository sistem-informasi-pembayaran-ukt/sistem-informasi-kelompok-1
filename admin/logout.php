<?php
session_start(); //memmulai kembali session
$_SESSION['idAdmin'] = ''; // Set nilai session menjadi kosong
/*hapus session*/
session_unset(); 
session_destroy();
header("Location: ../index.php"); //redirect ke hlmn index.php
?>