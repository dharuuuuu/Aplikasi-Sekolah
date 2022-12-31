<?php
// Create database connection using config file
include_once("../../config/config.php");

session_start();
$ID_GURU = $_SESSION['ID_GURU'];
$_SESSION['ID_SEMESTER'] = $_GET["ID_SEMESTER"];

// Fetch all users data from database
$mapel = mysqli_query($mysqli, "SELECT * FROM `mapel` where ID_GURU = '$ID_GURU' ");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../assets/dashboard_teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Dashboard Guru</title>
</head>
<body>
	<section class="sidebar close">
		<!-- Judul Sidebar -->
		<section class="click-close">
			<i class="fas fa-bars"></i><p>Guru</p>
		</section>

		<!-- Menu Sidebar -->
		<ul class="list-menu">
			<li>
				<a href="../dashboard_teacher.php"><i class="fas fa-home"></i><p>Home</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Home</a></li>
        		</ul>
			</li>

			<li>
				<a href="daftar_semester.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_absen/semester.php"><i class="fas fa-book"></i><p>Daftar Absen</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Absen</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_nilai/semester.php"><i class="fas fa-mail-bulk"></i><p>Input Nilai</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Input Nilai</a></li>
        		</ul>
			</li>

			<li>
				<a href="../login_teacher.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
		
		<div class="content">
			<div class="d-flex align-items-center justify-content-center">
				<a class="btn btn-primary " href="daftar_semester.php" role="button"><</a>
				<h2 class="my-auto">Daftar Mapel</h2>
			</div>
			

					 <?php
                        echo "</br></br>";
                        
 						while($user_data = mysqli_fetch_array($mapel)) {   
							 $ID_MAPEL = $user_data["ID_MAPEL"];
							 $MAPEL = $user_data["MAPEL"];
							 echo"<h4  >$MAPEL</h4>

							 		<div class='container mx-auto my-3 mx-2' >
							 			<div class='table-responsive col-md-10  my-3 mx-auto' style='overflow-x: auto'>
								 			<table class='table table-striped table-hover table-bordered'>
							 	 				<tr>
							 						<th class='col-5'>ID Kelas</th> 
													<th>Keterangan</th>
						 						</tr>
							 	";
							 
							 	$result = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE ID_KELAS IN (SELECT ID_KELAS FROM `belajar` WHERE ID_MAPEL = '$ID_MAPEL')");
							 	while($id_kelas = mysqli_fetch_array($result)){
											echo "<tr>";
							 				echo "<td class='col-5'>".$id_kelas['KELAS']."</td>";
											echo "<td><a class='btn btn-success' href='daftar_siswa.php?ID_KELAS=$id_kelas[ID_KELAS]&ID_MAPEL=$ID_MAPEL&JENIS=PENGETAHUAN'>Lihat</a></td></tr>";
											
							 	
							 	}
							 	      
							 	echo"
							 				</table>
							 			</div>
								 
						 			</div>
							 		</br></br></br>";
							      
 						}
 					?>
	
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