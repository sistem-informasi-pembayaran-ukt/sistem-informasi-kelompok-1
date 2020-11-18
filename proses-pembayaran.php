<?php
require "database/proses-sql.php";

$status ="Belum Terverifikasi";

if (isset($_POST['submit']) && isset($_POST['tanggal'])) {
    
    if ( isset($_FILES['bukti'])) {

        $namaFile = $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];
        $ukuranFile=$_FILES['bukti']['size'];
        $valid_extensions = array('jpeg','jpg','png','pdf');

        $ext=explode('.',$namaFile);//pecah nama file dan ekstensi
        $extfix=strtolower(end($ext));

        $rand = rand(1,5000);
        $namaFileTersimpan = $_POST['tanggal']."_".$rand.".".$extfix;

        //cek file belum diupload
        if ($_FILES['bukti']['error'] == 4){ 
            echo  "<script> alert('Silahkan masukkan file anda dulu');
                  window.location='pembayaran.php' </script>"; 
        }
        //cek jika ekstensi file tidak sesuai 
        else if (!in_array($extfix, $valid_extensions)){
            echo  "<script> alert('Silahkan masukkan file dengan ekstensi jpeg, jpg, png, pdf');
                  window.location='pembayaran.php' </script>"; 
        }
        //cek jika ukuran file lebih besar
        else if($ukuranFile > 1048576){ //1 MB = 1048576 Byte
            echo  "<script> alert('Silahkan masukkan file dengan ukuran < 1 MB');
            window.location='pembayaran.php' </script>"; 

        }
        //pindahkan file 
        else if (move_uploaded_file($tmp, 'gambar-bukti/' . $namaFileTersimpan)){
            tambahPembayaran($pdo,$namaFileTersimpan,$_POST['tanggal'],$status);
            echo  "<script> alert('File berhasil ditambahkan');
                  window.location='pembayaran.php' </script>"; 
           
        }
        else{
            echo  "<script> alert('File gagal ditambahkan');
                  window.location='pembayaran.php' </script>"; 
        }
    }
    
}
?>