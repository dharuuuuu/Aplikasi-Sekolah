<?php
// include database connection file
include_once("../../config/config.php");
 
// Get id from URL to delete that user
$ID_SEMESTER = $_GET['ID_SEMESTER'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM semester WHERE ID_SEMESTER='$ID_SEMESTER'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:crud_semester.php");
?>