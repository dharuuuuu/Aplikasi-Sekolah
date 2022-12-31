<?php
// Create database connection using config file
include_once("../../config/config.php");
$ID_KELAS = $_GET["ID_KELAS"];

$kelas = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE ID_KELAS = '$ID_KELAS'");
$KELAS = mysqli_fetch_array($kelas);
// Fetch all users data from database
$mapel = mysqli_query($mysqli, "SELECT ID_MAPEL FROM `belajar` where ID_KELAS = '$ID_KELAS'");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../assets/dashboard_admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Mata Pelajaran</title>
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
				<a href="../crud_guru/crud_guru.php"><i class="fas fa-user-check"></i><p>Daftar Guru</p></a>
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
				<a href="#"><i class="fas fa-envelope-open-text"></i><p>Daftar Nilai</p></a>
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
				<a href="crud_belajar.php"><i class="fas fa-book-reader"></i><p >Daftar Pembelajaran</p></a>
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
      		<h2>Daftar Mapel kelas <?php echo $KELAS['KELAS']?></h2>

			  	<div class="container mx-auto my-3 mx-2" >

        			<div class="table-responsive col-md-12 my-3 mx-2" style="overflow-x: auto">
					<?php
					$add = mysqli_query($mysqli, "SELECT ID_KELAS FROM `kelas` where ID_KELAS = '$ID_KELAS'");
					while($user = mysqli_fetch_array($add)) { 
					echo "<a class='btn btn-success btn-lg' href='add.php?ID_KELAS=$user[ID_KELAS]'>Tambah Mapel</a>";
					}
					?>
					<br/><br/>   
					<table class="table table-striped table-hover table-bordered">

							<tr>
	 							<th>Id Mapel</th> 
								<th>Keterangan</th>
 							</tr>

							<?php  
 								while($user_data = mysqli_fetch_array($mapel)) {       
									 echo "<tr>";
									 echo "<td>".$user_data['ID_MAPEL']."</td>";
									 echo "<td><a class='btn btn-danger' href='delete.php?ID_MAPEL=$user_data[ID_MAPEL]&ID_KELAS=$ID_KELAS'>Delete</a></td>";        
 								}
 							?>
        			    </table>
						<div class="row  col-6 mx-auto">
						
	  					<div  class="col-12">
							<a class='btn btn-primary mt-2 w-100' href='crud_belajar.php'>Kembali</a>
						</div>
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