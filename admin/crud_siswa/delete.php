<?php
// include database connection file
include_once("../../config/config.php");
 
// Get id from URL to delete that user
$NISN = $_GET['NISN'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM siswa WHERE NISN='$NISN'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:crud_siswa.php");
?>