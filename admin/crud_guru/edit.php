<?php
// include database connection file
include_once("../../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_GURU = $_POST['ID_GURU'];
    $USERNAME_GURU = $_POST['USERNAME_GURU'];
    $PASSWORD_GURU = $_POST['PASSWORD_GURU'];
    $NAMA_GURU = $_POST['NAMA_GURU'];
    $JK_GURU = $_POST['JK_GURU'];
    $HP_GURU = $_POST['HP_GURU'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE guru SET USERNAME_GURU='$USERNAME_GURU',PASSWORD_GURU='$PASSWORD_GURU',NAMA_GURU='$NAMA_GURU',JK_GURU='$JK_GURU',HP_GURU='$HP_GURU' WHERE ID_GURU='$ID_GURU'");
    
    // Redirect to homepage to display updated user in list
  
	header("Location: crud_guru.php");

	
  
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_GURU = $_GET['ID_GURU'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM guru WHERE ID_GURU = '$ID_GURU'");
 
while($user_data = mysqli_fetch_array($result))
{
    $USERNAME_GURU = $user_data['USERNAME_GURU'];
    $PASSWORD_GURU = $user_data['PASSWORD_GURU'];
    $NAMA_GURU = $user_data['NAMA_GURU'];
    $JK_GURU = $user_data['JK_GURU'];
    $HP_GURU = $user_data['HP_GURU'];
}
?>
<html>
<head>	
    <title>Ubah Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mx-auto my-3 mx-2">
        <a class="btn btn-success btn-lg " href="crud_guru.php">Kembali</a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            
                <div class="row g-0">
  			    	<div class="col-sm-6">Username</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="USERNAME_GURU" value="<?php echo $USERNAME_GURU ?>"></div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">Password</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="PASSWORD_GURU" value="<?php echo $PASSWORD_GURU ?>"></div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">Nama</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="NAMA_GURU" value="<?php echo $NAMA_GURU ?>"></div>
			    </div>

                <div class="row g-0">
  			    	<div class="col-sm-6">Jenis Kelamin</div>
  			    	<div class="col-6 d-flex">
			    	  	<div class="form-check me-2">
  			    			<input class="form-check-input" type="radio" name="JK_GURU" id="flexRadioDefault1"value="P" <?= $JK_GURU == 'P' ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault1">
    		    				P
  			    			</label>
			    		</div>

			    		<div class="form-check">
  			    			<input class="form-check-input" type="radio" name="JK_GURU" id="flexRadioDefault2" value="L" <?= $JK_GURU == 'L' ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault2">
    		    				L
  			    			</label>
			    		</div>
			    	</div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">No. HP</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="HP_GURU" value="<?php echo $HP_GURU; ?>"></div>
			    </div>

                <div class="row  g-0">
					<div class="col-sm-6"><input class="form-control" type="hidden" name="ID_GURU" value="<?=$_GET['ID_GURU'];?>"></div>
                    <div  class="col-sm-6"><input class="btn btn-primary mt-2 w-100"  type="submit" name="update" value="update"></div>
				</div>
			    
           
        </form>

    </div>

    
</body>
</html>