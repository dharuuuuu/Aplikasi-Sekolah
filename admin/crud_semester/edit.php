<?php
// include database connection file
include_once("../../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_SEMESTER = $_POST['ID_SEMESTER'];
    $MASUKKAN_NILAI = $_POST['MASUKKAN_NILAI'];
    $MEMBAGI_RAPORT = $_POST['MEMBAGI_RAPORT'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE semester SET ID_SEMESTER='$ID_SEMESTER',MASUKKAN_NILAI='$MASUKKAN_NILAI',MEMBAGI_RAPORT='$MEMBAGI_RAPORT'");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud_semester.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_SEMESTER = $_GET['ID_SEMESTER'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM semester WHERE ID_SEMESTER = '$ID_SEMESTER'");
 
while($user_data = mysqli_fetch_array($result))
{
    $ID_SEMESTER = $user_data['ID_SEMESTER'];
    $MASUKKAN_NILAI = $user_data['MASUKKAN_NILAI'];
    $MEMBAGI_RAPORT = $user_data['MEMBAGI_RAPORT'];
}
?>
<html>
<head>	
    <title>Ubah Data Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mx-auto my-3 mx-2">
        <a class="btn btn-success btn-lg " href="crud_guru.php">Kembali</a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            
                <div class="row g-0">
  			    	<div class="col-sm-6">ID Semester</div>
  			    	<div class="col-6"><input class="form-control my-1" type="text" name="ID_SEMESTER" value="<?php echo $ID_SEMESTER ?>"></div>
			    </div>

                <div class="row g-0">
  			    	<div class="col-sm-6">Masukkan Nilai</div>
  			    	<div class="col-6 d-flex">
			    	  	<div class="form-check me-2">
  			    			<input class="form-check-input" type="radio" name="MASUKKAN_NILAI" id="flexRadioDefault1"value=1 <?= $MASUKKAN_NILAI == 1 ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault1">
    		    				Ya
  			    			</label>
			    		</div>

			    		<div class="form-check">
  			    			<input class="form-check-input" type="radio" name="MASUKKAN_NILAI" id="flexRadioDefault2" value=0 <?= $MASUKKAN_NILAI == 0 ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault2">
    		    				Tidak
  			    			</label>
			    		</div>
			    	</div>
			    </div>

				<div class="row g-0">
  			    	<div class="col-sm-6">Membagi Raport</div>
  			    	<div class="col-6 d-flex">
			    	  	<div class="form-check me-2">
  			    			<input class="form-check-input" type="radio" name="MEMBAGI_RAPORT" id="flexRadioDefault1"value=1 <?= $MEMBAGI_RAPORT == 1 ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault1">
    		    				Ya
  			    			</label>
			    		</div>

			    		<div class="form-check">
  			    			<input class="form-check-input" type="radio" name="MEMBAGI_RAPORT" id="flexRadioDefault2" value=0 <?= $MEMBAGI_RAPORT == 0 ? "checked" : ""?>>
  			    			<label class="form-check-label" for="flexRadioDefault2">
    		    				Tidak
  			    			</label>
			    		</div>
			    	</div>
			    </div>

                <div class="row  g-0">
					<div class="col-sm-6"><input class="form-control" type="hidden" name="ID_SEMESTER" value="<?=$_GET['ID_SEMESTER'];?>"></div>
                    <div  class="col-sm-6"><input class="btn btn-primary mt-2 w-100"  type="submit" name="update" value="update"></div>
				</div>
			    
           
        </form>

    </div>

    
</body>
</html>