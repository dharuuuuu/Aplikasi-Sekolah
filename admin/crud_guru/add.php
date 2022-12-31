<html>
<head>
    <title>Tambah Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
	<div class="container mx-auto my-3 mx-2">
		<a class="btn btn-secondary btn-lg " href="crud_guru.php">Kembali</a><br/><br/>
		
		<form action="add.php" method="post" name="form1">
		<div class="row gy-5">
	    		<div class="col-6">
					<div class="row g-0">
	  					<div class="col-sm-6">ID Guru</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="ID_GURU"></div>
					</div>
					
	                <div class="row g-0">
	  					<div class="col-sm-6">Username</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="USERNAME_GURU"></div>
					</div>
	
	                <div class="row g-0">
	  					<div class="col-sm-6">Password</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="PASSWORD_GURU"></div>
					</div>
	
	                <div class="row g-0">
	  					<div class="col-sm-6">Nama</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="NAMA_GURU"></div>
					</div>
					
					<div class="row g-0">
	  					<div class="col-sm-6">Jenis Kelamin</div>
	  					<div class="col-6">
						  	<select class="form-select form-select-sm" name="JK_GURU">
	                                <option value="L">L</option>
	                                <option value="P">P</option>
	                        </select>
						</div>
					</div>
					
					<div class="row g-0">
	  					<div class="col-sm-6">No. HP</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="HP_GURU"></div>
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
        $ID_GURU = $_POST['ID_GURU'];
        $USERNAME_GURU = $_POST['USERNAME_GURU'];
        $PASSWORD_GURU = $_POST['PASSWORD_GURU'];
        $NAMA_GURU = $_POST['NAMA_GURU'];
        $JK_GURU = $_POST['JK_GURU'];
        $HP_GURU = $_POST['HP_GURU'];
        // include database connection file
        include_once("../../config/config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO guru(ID_GURU, USERNAME_GURU, PASSWORD_GURU, NAMA_GURU, JK_GURU, HP_GURU) VALUES('$ID_GURU','$USERNAME_GURU', '$PASSWORD_GURU', '$NAMA_GURU', '$JK_GURU', '$HP_GURU')");
        
        // Show message when user added
        
		echo "<div class='alert alert-success' role='alert'>
				Akun Guru Berhasil Ditambah. <a href='crud_guru.php'>Kembali</a>
	  		</div>";
    }
    ?>

</body>
</html>