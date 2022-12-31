<?php
// include database connection file
include_once("../../config/config.php");
 
// Get id from URL to delete that user
$ID_MAPEL = $_GET['ID_MAPEL'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM mapel WHERE ID_MAPEL='$ID_MAPEL'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:crud_mapel.php");
?>