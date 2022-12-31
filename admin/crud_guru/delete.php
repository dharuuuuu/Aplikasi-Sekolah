<?php
// include database connection file
include_once("../../config/config.php");
 
// Get id from URL to delete that user
$ID_GURU = $_GET['ID_GURU'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM guru WHERE ID_GURU='$ID_GURU'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:crud_guru.php");
?>