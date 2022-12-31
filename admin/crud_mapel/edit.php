<?php
// include database connection file
include_once("../../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_MAPEL = $_POST['ID_MAPEL'];
    $MAPEL = $_POST['MAPEL'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE mapel SET MAPEL='$MAPEL' WHERE ID_MAPEL='$ID_MAPEL'");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud_mapel.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_MAPEL = $_GET['ID_MAPEL'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mapel WHERE ID_MAPEL = '$ID_MAPEL'");
 
while($user_data = mysqli_fetch_array($result))
{
    $MAPEL = $user_data['MAPEL'];
}
?>
<html>
<head>	
    <title>Ubah Data Mapel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mx-auto my-3 mx-2">
        <a class="btn btn-success btn-lg " href="crud_mapel.php">Kembali</a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            
                <div class="row g-0">
  			    	<div class="col-sm-6">Mapel</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="MAPEL" value="<?php echo $MAPEL ?>"></div>
			    </div>

                <div class="row  g-0">
					<div class="col-sm-6"><input class="form-control" type="hidden" name="ID_MAPEL" value="<?=$_GET['ID_MAPEL'];?>"></div>
                    <div  class="col-sm-6"><input class="btn btn-primary mt-2 w-100"  type="submit" name="update" value="update"></div>
				</div>
			    
           
        </form>

    </div>
</body>
</html>