<?php
// include database connection file
include_once("../../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $NISN = $_POST['NISN'];
    $USERNAME_SISWA = $_POST['USERNAME_SISWA'];
    $PASSWORD_SISWA = $_POST['PASSWORD_SISWA'];
    $NAMA_SISWA = $_POST['NAMA_SISWA'];
    $JK_SISWA = $_POST['JK_SISWA'];
    $HP_SISWA = $_POST['HP_SISWA'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE siswa SET USERNAME_SISWA='$USERNAME_SISWA',PASSWORD_SISWA='$PASSWORD_SISWA',NAMA_SISWA='$NAMA_SISWA',JK_SISWA='$JK_SISWA',HP_SISWA='$HP_SISWA' WHERE NISN='$NISN'");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud_siswa.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$NISN = $_GET['NISN'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM siswa WHERE NISN = '$NISN'");
 
while($user_data = mysqli_fetch_array($result))
{
    $USERNAME_SISWA = $user_data['USERNAME_SISWA'];
    $PASSWORD_SISWA = $user_data['PASSWORD_SISWA'];
    $NAMA_SISWA = $user_data['NAMA_SISWA'];
    $JK_SISWA = $user_data['JK_SISWA'];
    $HP_SISWA = $user_data['HP_SISWA'];
}
?>
<html>
<head>	
    <title>Ubah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mx-auto my-3 mx-2">
        <a class="btn btn-success btn-lg " href="crud_SISWA.php">Kembali</a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            
                <div class="row g-0">
  			    	<div class="col-sm-6">Username</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="USERNAME_SISWA" value="<?php echo $USERNAME_SISWA ?>"></div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">Password</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="PASSWORD_SISWA" value="<?php echo $PASSWORD_SISWA ?>"></div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">Nama</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="NAMA_SISWA" value="<?php echo $NAMA_SISWA ?>"></div>
			    </div>

                <div class="row g-0">
  			    	<div class="col-sm-6">Jenis Kelamin</div>
  			    	<div class="col-6 d-flex">
			    	  	<div class="form-check me-2">
  			    			<input class="form-check-input" type="radio" name="JK_SISWA" id="flexRadioDefault1"value="P" <?= $JK_SISWA == 'P' ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault1">
    		    				P
  			    			</label>
			    		</div>

			    		<div class="form-check">
  			    			<input class="form-check-input" type="radio" name="JK_SISWA" id="flexRadioDefault2" value="L" <?= $JK_SISWA == 'L' ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault2">
    		    				L
  			    			</label>
			    		</div>
			    	</div>
			    </div>

			    <div class="row g-0">
  			    	<div class="col-sm-6">No. HP</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="HP_SISWA" value="<?php echo $HP_SISWA; ?>"></div>
			    </div>

                <div class="row  g-0">
					<div class="col-sm-6"><input class="form-control" type="hidden" name="NISN" value="<?=$_GET['NISN'];?>"></div>
                    <div  class="col-sm-6"><input class="btn btn-primary mt-2 w-100"  type="submit" name="update" value="update"></div>
				</div>
			    
           
        </form>

    </div>

    
</body>
</html>