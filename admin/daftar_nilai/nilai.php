<?php
// Create database connection using config file
include_once("../../config/config.php");
session_start();
$ID_KELAS = $_GET["ID_KELAS"];
$ID_MAPEL = $_GET["ID_MAPEL"];
$ID_GURU = $_GET["ID_GURU"];
$ID_SEMESTER = $_SESSION['ID_SEMESTER'];
// Fetch all users data from database
$mapel= mysqli_query($mysqli, "SELECT * FROM `mapel` WHERE ID_MAPEL = '$ID_MAPEL'");
$MAPEL=mysqli_fetch_array($mapel);

$guru= mysqli_query($mysqli, "SELECT * FROM `guru` WHERE ID_GURU = '$ID_GURU'");
$GURU= mysqli_fetch_array($guru);

$kelas = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE ID_KELAS = '$ID_KELAS'");
$KELAS = mysqli_fetch_array($kelas);
$data_found= mysqli_query($mysqli, "SELECT nilai.ID_NILAI, nilai.NISN, siswa.NAMA_SISWA, nilai.NILAI, nilai.JENIS FROM `nilai` INNER JOIN siswa ON nilai.NISN = siswa.NISN WHERE siswa.ID_KELAS = '$ID_KELAS' && nilai.ID_MAPEL ='$ID_MAPEL'&& nilai.ID_SEMESTER = '$ID_SEMESTER' ORDER BY nilai.NISN DESC");
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
				<a href="semester.php"><i class="fas fa-envelope-open-text"></i><p>Daftar Nilai</p></a>
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
			<div class="d-flex align-items-center justify-content-center">
				<h2 class="my-auto">Daftar Nilai kelas <?php echo $KELAS['KELAS']?></h2>
			</div>

			

			<div class="container mx-auto my-3 mx-2" >
				<div class="text-start ms-2">
					<h6><b>Mapel     : </b> <?php echo $MAPEL['MAPEL']?></h6>
					<h6><b>Guru      : </b><?php echo $GURU['NAMA_GURU']?></h6>
					<h6><b>Semester  : </b><?php echo $ID_SEMESTER?></h6>
				</div>
        		<div class="table-responsive col-md-12 my-3 mx-2" style="overflow-x: auto">
					
					<table class="table table-striped table-hover table-bordered">

					<tr>
	 					<th class="col-4">NISN</th> 
						<th class="col-4">Nama Siswa</th> 
						<th class="col-2">Pengetahuan</th>
                        <th class="col-2">Keterampilan</th>
 					</tr>
					 <?php
					 $i=1;
					 	while($user_data = mysqli_fetch_array($data_found)) { 
							if($i%2==1){
								if($user_data['JENIS']=="PENGETAHUAN"){
									echo "<tr>";
									echo "<td class='col-4'>".$user_data['NISN']."</td>";
									echo "<td class='col-4'>".$user_data['NAMA_SISWA']."</td>";
									echo "<td class='col-4'>".$user_data['NILAI']."</td>";
									
								}else if($user_data['JENIS']=="KETERAMPILAN"){
									echo "<tr>";
									echo "<td class='col-4'>".$user_data['NISN']."</td>";
									echo "<td class='col-4'>".$user_data['NAMA_SISWA']."</td>";
									echo "<td class='col-4'>-</td>";
									echo "<td class='col-4'>".$user_data['NILAI']."</td></tr>";
									
									$i=0;
								}
							}else{
								if($user_data['JENIS']=="KETERAMPILAN"){
									echo "<td class='col-4'>".$user_data['NILAI']."</td></tr>";
								}else if($user_data['JENIS']=="PENGETAHUAN"){
									echo "<td class='col-4'>-</td></tr>";
									echo "<tr>";

									echo "<td class='col-4'>".$user_data['NISN']."</td>";
									echo "<td class='col-4'>".$user_data['NAMA_SISWA']."</td>";
									echo "<td class='col-4'>".$user_data['NILAI']."</td>";
									echo "<td class='col-4'>-</td></tr>";
								}
							}
							
							$i +=1;
							
							
							
						}

					 	
					 	
 					?>
        		    </table>

					<div class="row  col-6 mx-auto">
						
	  					<div  class="col-12">
							<a class='btn btn-primary mt-2 w-100' href='mapel.php?<?php echo "ID_SEMESTER=$ID_SEMESTER" ?>'>Kembali</a>
						</div>
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