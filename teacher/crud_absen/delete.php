<?php
// include database connection file
include_once("../../config/config.php");
session_start();
$ID_KELAS = $_GET["ID_KELAS"];
$ID_MAPEL = $_GET["ID_MAPEL"];
$TANGGAL_ABSEN = $_GET["TANGGAL_ABSEN"];
$CRUD = $_GET["CRUD"];
$ID_SEMESTER = $_SESSION['ID_SEMESTER'];


$data_found= mysqli_query($mysqli, "SELECT absen.ID_ABSEN, absen.NISN, siswa.NAMA_SISWA, absen.KETERANGAN FROM `absen` INNER JOIN siswa ON absen.NISN = siswa.NISN WHERE siswa.ID_KELAS = '$ID_KELAS' && absen.ID_MAPEL ='$ID_MAPEL'&& absen.ID_SEMESTER = '$ID_SEMESTER'&& absen.TANGGAL_ABSEN = '$TANGGAL_ABSEN'");

while($user_data = mysqli_fetch_array($data_found)) {         
    // Delete user row from table based on given id
    $result = mysqli_query($mysqli, "DELETE FROM absen WHERE ID_ABSEN='$user_data[ID_ABSEN]'");
} 

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:tanggal.php?ID_SEMESTER=$ID_SEMESTER&ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&CRUD=$CRUD");
?>