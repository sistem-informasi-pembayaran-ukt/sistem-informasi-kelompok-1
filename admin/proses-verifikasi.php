<?php
require "verifikasi-pembayaran.php";
if(isset($_POST['update']) && isset($_POST['idPembayaran']) && $_POST['status']) 
{
            verifikasi($pdo,$_POST['idPembayaran'],$_POST['status']);
            echo  "<script> alert('Status : Sudah Terverifikasi');
                    window.location='verifikasi-pembayaran.php';
                   </script>";
         
}

else if (isset($_POST['updateTidak']) && isset($_POST['idPembayaran']) && $_POST['status']) 
{
            verifikasi($pdo,$_POST['idPembayaran'],$_POST['status']);
            echo  "<script> alert('Status : Tidak Terverifikasi');
                    window.location='verifikasi-pembayaran.php';
                   </script>"; 
}
        
?>