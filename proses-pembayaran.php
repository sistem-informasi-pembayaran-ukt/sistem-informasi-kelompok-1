<?php
require "database/proses-sql.php";

$status ="Belum Terverifikasi";

if (isset($_POST['submit']) && isset($_POST['tanggal'])) {
    if ( isset($_FILES['bukti'])) {

        $namaFile = $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];
        $ukuranFile=$_FILES['bukti']['size'];
        $valid_extensions = array('jpeg','jpg','png','pdf');

        $ext=explode('.',$namaFile);
        $extfix=strtolower(end($ext));

        $rand = rand(1,5000);
        $namaFileTersimpan = $_POST['tanggal']."_".$rand.".".$extfix;

        if (!in_array($extfix, $valid_extensions)){
            //alert "Gagal! Ekstensi file anda yaitu " .$extfix. ". Silahlan masukkan  jpeg, jpg, png or pdf file";
        }
        else if($ukuranFile > 1048576){
            //alert "Ukuran file anda : " .$ukuranFile. " terlalu besar. Silahkan masukkan ukuran < 1 MB";
        }
    
        
        else if (move_uploaded_file($tmp, 'gambar-bukti/' . $namaFileTersimpan)){
            tambahPembayaran($pdo,$namaFileTersimpan,$_POST['tanggal'],$status);
            //alert  "Berhasil ";
            header("location: pembayaran.php");
        }
        else{
            //alert error="Failed to move files";
        }
    }
    else{
        //alert= All fields are required";
    }
}
?>