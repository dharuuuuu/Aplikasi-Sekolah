<?php
// include database connection file
include_once("../../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_KELAS = $_POST['ID_KELAS'];
    $KELAS = $_POST['KELAS'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE kelas SET KELAS='$KELAS' WHERE ID_KELAS='$ID_KELAS'");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud_kelas.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_KELAS = $_GET['ID_KELAS'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kelas WHERE ID_KELAS = '$ID_KELAS'");
 
while($user_data = mysqli_fetch_array($result))
{
    $KELAS = $user_data['KELAS'];
}
?>
<html>
<head>	
    <title>Ubah Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mx-auto my-3 mx-2">
        <a class="btn btn-success btn-lg " href="crud_mapel.php">Kembali</a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            
                <div class="row g-0">
  			    	<div class="col-sm-6">Kelas</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="KELAS" value="<?php echo $KELAS ?>"></div>
			    </div>

                <div class="row  g-0">
					<div class="col-sm-6"><input class="form-control" type="hidden" name="ID_KELAS" value="<?=$_GET['ID_KELAS'];?>"></div>
                    <div  class="col-sm-6"><input class="btn btn-primary mt-2 w-100"  type="submit" name="update" value="update"></div>
				</div>
			    
           
        </form>

    </div>
</body>
</html>