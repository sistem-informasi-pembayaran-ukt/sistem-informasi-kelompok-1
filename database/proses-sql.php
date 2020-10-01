<?php
require_once "pdo.php";
$_SESSION['nim']='D121181508';
$nim = $_SESSION['nim'];

function dataMahasiswa($kolom,$pdo){
    $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.alamat, mahasiswa.noTelp, mahasiswa.kodeSemester, jurusan.namaJurusan, semester.namaSemester, ukt.golonganUKT, ukt.tarifUKT
            FROM (((mahasiswa
            INNER JOIN jurusan ON mahasiswa.kodeJurusan = jurusan.kodeJurusan)
            INNER JOIN semester ON mahasiswa.kodeSemester = semester.kodeSemester)
            INNER JOIN ukt ON mahasiswa.golonganUKT= ukt.golonganUKT)
            WHERE nim = :nim";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(array(':nim' => $_SESSION['nim']));
    $ambil = $stmt->fetch();   
    return $ambil[$kolom]; 
}
function tambahPembayaran($pdo,$bukti,$tanggal,$status){
    $sql = "INSERT INTO pembayaran (nim, kodeSemester, golonganUKT, bukti, tanggalPembayaran, status)
            VALUES (:nim, :kodeSemester, :golonganUKT, :bukti,:tanggal, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
            ':nim'=>dataMahasiswa('nim',$pdo),
            ':kodeSemester' => dataMahasiswa('kodeSemester',$pdo),
            ':golonganUKT' => dataMahasiswa('golonganUKT',$pdo),
            ':bukti'=> $bukti,
            ':tanggal' => $tanggal,
            ':status' => $status
    ));
}

?>