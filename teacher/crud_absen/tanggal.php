<?php
// Create database connection using config file
include_once("../../config/config.php");
session_start();
$ID_KELAS = $_GET["ID_KELAS"];
$ID_MAPEL = $_GET["ID_MAPEL"];
$CRUD=$_GET["CRUD"];
$ID_SEMESTER = $_SESSION['ID_SEMESTER'];
// Fetch all users data from database
$kelas = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE ID_KELAS = '$ID_KELAS'");
$KELAS = mysqli_fetch_array($kelas);
$siswa = mysqli_query($mysqli, "SELECT NISN, NAMA_SISWA FROM `siswa` WHERE siswa.ID_KELAS = '$ID_KELAS'");

$data_found= mysqli_query($mysqli, "SELECT absen.ID_ABSEN, absen.NISN, siswa.NAMA_SISWA, absen.KETERANGAN, absen.TANGGAL_ABSEN FROM `absen` INNER JOIN siswa ON absen.NISN = siswa.NISN WHERE siswa.ID_KELAS = '$ID_KELAS' && absen.ID_MAPEL ='$ID_MAPEL'&& absen.ID_SEMESTER = '$ID_SEMESTER' GROUP BY absen.TANGGAL_ABSEN");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../assets/dashboard_teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="../../js/jquery.min.js"></script>  
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
				<a href="../daftar_siswa/daftar_semester.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="semester.php"><i class="fas fa-book"></i><p>Daftar Absen</p></a>
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
				<a class="btn btn-primary " href="mapel.php?ID_SEMESTER=<?php echo$ID_SEMESTER;?>&CRUD=<?php echo$CRUD;?>" role="button"><</a>
				<h2 class="my-auto">Daftar Absen kelas <?php echo $KELAS['KELAS']?></h2>
			</div>


			<div class="container mx-auto my-3 mx-2" >
        		<div class="table-responsive col-md-12 my-3 mx-2" style="overflow-x: auto">
					<form action="crud_nilai.php?<?php echo "ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL" ?>" method="post" name="form1">
					<div id="tanggal_table">
						<table class="table table-striped table-hover table-bordered">
						
							<tr>
								<th class="col-4">Tanggal</th>
								<th class="col-2">Keterangan</th>
							</tr>
							<?php
								while($user_data = mysqli_fetch_array($data_found)) {         
									echo "<tr>";
									echo "<td class='col-4'>".$user_data['TANGGAL_ABSEN']."</td>";
									if($CRUD==1){
										echo "<td><a class='btn btn-success' href='crud_absen.php?ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&TANGGAL_ABSEN=$user_data[TANGGAL_ABSEN]&CRUD=$CRUD'>Lihat Absen</a>|<a class='btn btn-danger' href='delete.php?ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&TANGGAL_ABSEN=$user_data[TANGGAL_ABSEN]&CRUD=$CRUD'>Hapus Absen</a></td></tr>";
									}else{
										echo "<td><a class='btn btn-success' href='crud_absen.php?ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&TANGGAL_ABSEN=$user_data[TANGGAL_ABSEN]&CRUD=$CRUD'>Lihat Absen</a></td></tr>";
								
									}
								}
							?>
						
					
        		    	</table>
					</div>

					<!-- Button trigger modal -->
					<?php 
						if($CRUD==1){
							echo "<button type='button' id='myModal' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
							Tambah Absen
							</button>";
						}
					?>
					

					</form>
        		</div>
					
    		</div>
	
    	</div>

	</section>

	
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Absen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form method="post" id="insert_form">
		<div class="modal-body">
				
			<label>Tanggal Absen</label>
			<input type="date" name="tanggal" id="tanggal" class="form-control" />
			<br />
				
				
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
	  </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>


<script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#staticBackdrop').on("submit", function(event){  
  event.preventDefault();  
  if($('#tanggal').val() == "")  
  {  
   alert("Mohon Isi Tanggal ");  
  }
  else  
  {  
   $.ajax({  
    url:"add.php?ID_KELAS=<?php echo $ID_KELAS; ?>&ID_MAPEL=<?php echo $ID_MAPEL; ?>&CRUD=<?php echo $CRUD; ?>",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#staticBackdrop').modal('hide');
     $('#tanggal_table').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert

}); 
//End Aksi Delete Data
 </script>




