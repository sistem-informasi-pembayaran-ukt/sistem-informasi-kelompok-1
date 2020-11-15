<?php
require_once "pdo.php";
session_start();

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
function dataPembayaran($pdo){
        $sql = "SELECT pembayaran.nim,pembayaran.idPembayaran,pembayaran.tanggalPembayaran, pembayaran.bukti, pembayaran.status,mahasiswa.nama,  jurusan.namaJurusan,ukt.tarifUKT
                FROM (((pembayaran
                INNER join mahasiswa on pembayaran.nim = mahasiswa.nim)
                INNER JOIN jurusan ON mahasiswa.kodeJurusan = jurusan.kodeJurusan)
                INNER JOIN ukt ON pembayaran.golonganUKT= ukt.golonganUKT)";
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows; 
    }
function verifikasi($pdo,$nim){
        $sql = "UPDATE pembayaran set status ='Sudah Terverifikasi' where nim = :nim";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute(array(':nim' => $nim));
}
function tidakTerverifikasi($pdo,$nim){
        $sql = "UPDATE pembayaran set status ='Tidak Terverifikasi' where nim = :nim";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute(array(':nim' => $nim));
}

?>