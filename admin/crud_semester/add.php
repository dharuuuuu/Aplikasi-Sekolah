<html>
<head>
    <title>Tambah Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
	<div class="container mx-auto my-3 mx-2">
		<a class="btn btn-secondary btn-lg " href="crud_semester.php">Kembali</a><br/><br/>
		
		<form action="add.php" method="post" name="form1">
		<div class="row gy-5">
	    		<div class="col-6">
					<div class="row g-0">
	  					<div class="col-sm-6">ID Semester</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="ID_SEMESTER"></div>
					</div>

					<div class="row g-0">
	  					<div class="col-sm-6">Masukkan Nilai</div>
	  					<div class="col-6">
						  	<select class="form-select form-select-sm" name="MASUKKAN_NILAI">
	                                <option value=1>Ya</option>
	                                <option value=0>Tidak</option>
	                        </select>
						</div>
					</div>
					
					<div class="row g-0">
	  					<div class="col-sm-6">Membagi Raport</div>
	  					<div class="col-6">
						  	<select class="form-select form-select-sm" name="MEMBAGI_RAPORT">
	                                <option value=1>Ya</option>
	                                <option value=0>Tidak</option>
	                        </select>
						</div>
					</div>
	
					<div class="row  col-6 mx-auto">
	  					<div  class="col-12"><input class="btn btn-primary mt-2 w-100"  type="submit" name="Submit" value="Add"></div>
					</div>
	    		</div>	
	  		</div>
		</form>
	</div>	
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $ID_SEMESTER = $_POST['ID_SEMESTER'];
        $MASUKKAN_NILAI = $_POST['MASUKKAN_NILAI'];
        $MEMBAGI_RAPORT = $_POST['MEMBAGI_RAPORT'];
        // include database connection file
        include_once("../../config/config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO semester(ID_SEMESTER, MASUKKAN_NILAI, MEMBAGI_RAPORT) VALUES('$ID_SEMESTER','$MASUKKAN_NILAI', '$MEMBAGI_RAPORT')");
        
        // Show message when user added
        echo "<div class='alert alert-success' role='alert'>
				Semester Berhasil Ditambah. <a href='crud_semester.php'>Kembali</a>
	  		</div>";
    }
    ?>

</body>
</html>