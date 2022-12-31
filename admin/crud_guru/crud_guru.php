<?php
// Create database connection using config file
include_once("../../config/config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM guru");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../assets/dashboard_admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Dashboard Admin</title>
</head>
<body>
	<section class="sidebar close">
		<!-- Judul Sidebar -->
		<section class="click-close">
			<i class="fas fa-bars"></i><p>Admin</p>
		</section>

		<!-- Menu Sidebar -->
		<ul class="list-menu">
			<li>
				<a href="../dashboard_admin.php"><i class="fas fa-home"></i><p>Home</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Home</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_siswa/crud_siswa.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="crud_guru.php"><i class="fas fa-user-check"></i><p>Daftar Guru</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Guru</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_kelas/crud_kelas.php"><i class="fas fa-school"></i><p>Daftar Kelas</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Kelas</a></li>
        		</ul>
			</li>

			<li>
				<a href="../daftar_nilai/semester.php"><i class="fas fa-envelope-open-text"></i><p>Daftar Nilai</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Nilai</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_mapel/crud_mapel.php"><i class="fas fa-book"></i><p>Daftar Mapel</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Mapel</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_semester/crud_semester.php"><i class="fas fa-address-book"></i><p>Daftar Semester</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Semester</a></li>
        		</ul>
			</li>

			<li>
				<a href="../daftar_absen/semester.php"><i class="fas fa-clipboard"></i><p>Daftar Absen</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Absen</a></li>
        		</ul>
			</li>
			
			<li>
				<a href="../crud_belajar/crud_belajar.php"><i class="fas fa-book-reader"></i><p >Daftar Pembelajaran</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Pembelajaran</a></li>
        		</ul>
			</li>

			<li>
				<a href="../login_admin.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
		
		<div class="content">
			<h2>Daftar Guru</h2>

			<div class="container mx-auto my-3 mx-2" >
        		<a class="btn btn-success btn-lg " href="add.php">Tambah Guru</a><br/><br/>

        		<div class="table-responsive col-md-12 my-3 mx-2" style="overflow-x: auto">
        		    <table class="table table-striped table-hover table-bordered">

					<tr>
	 					<th>Id Guru</th> 
						<th>Username</th> 
						<th>Password</th> 
						<th>Nama</th> 
						<th>Kelamin</th> 
						<th>No. Hp</th> 
						<th>Update</th>
 					</tr>
					 <?php  
 						while($user_data = mysqli_fetch_array($result)) {         
							 echo "<tr>";
							 echo "<td>".$user_data['ID_GURU']."</td>";
							 echo "<td>".$user_data['USERNAME_GURU']."</td>";
							 echo "<td>".$user_data['PASSWORD_GURU']."</td>";
							 echo "<td>".$user_data['NAMA_GURU']."</td>";
							 echo "<td>".$user_data['JK_GURU']."</td>";
							 echo "<td>".$user_data['HP_GURU']."</td>";     
							 echo "<td><a class='btn btn-success' href='edit.php?ID_GURU=$user_data[ID_GURU]'>Edit</a> | <a class='btn btn-danger' href='delete.php?ID_GURU=$user_data[ID_GURU]'>Delete</a></td></tr>";        
 						}
 					?>
        		    </table>
        		</div>
					
    		</div>
	
    	</div>

	</section>

	<script>
  	let arrow = document.querySelectorAll(".arrow");
  	for (var i = 0; i < arrow.length; i++) { 
  		arrow[i].addEventListener("click", (e)=>{
  			let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   			arrowParent.classList.toggle("showMenu");
    		});
  	}
  	let sidebar = document.querySelector(".sidebar");
  	let sidebarBtn = document.querySelector(".fa-bars");
  	console.log(sidebarBtn);
  	sidebarBtn.addEventListener("click", ()=>{
    	sidebar.classList.toggle("close");
  	});
  </script>
		
</body>
</html>