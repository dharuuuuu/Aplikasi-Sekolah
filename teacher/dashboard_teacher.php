<?php
// Create database connection using config file
include_once("../config/config.php");
 
// Fetch all users data from database
$guru = mysqli_query($mysqli, "SELECT * FROM guru");
$jlh_guru = mysqli_num_rows($guru);

$siswa = mysqli_query($mysqli, "SELECT * FROM siswa");
$jlh_siswa = mysqli_num_rows($siswa);

$kelas = mysqli_query($mysqli, "SELECT * FROM kelas");
$jlh_kelas = mysqli_num_rows($kelas);

$daftar_kelas ="";
$daftar_jlhsiswa ="";


while($user_data = mysqli_fetch_array($kelas)) {         
	//array_push($daftar_kelas, $user_data["KELAS"] );
	$daftar_kelas = $daftar_kelas . '"' . $user_data['KELAS'] . '",';
	
	$daftar_siswa = mysqli_query($mysqli, "SELECT * FROM siswa where ID_KELAS = '$user_data[ID_KELAS]'");
	$jlh = mysqli_num_rows($daftar_siswa);

	//array_push($daftar_jlhsiswa, $jlh );
	$daftar_jlhsiswa = $daftar_jlhsiswa . '"' . $jlh . '",';
}

$js_daftar_kelas =json_encode($daftar_kelas);
$js_daftar_jlhsiswa =json_encode($daftar_jlhsiswa);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/dashboard_teacher.css">
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
				<a href="#"><i class="fas fa-home"></i><p>Home</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Home</a></li>
        		</ul>
			</li>

			<li>
				<a href="../teacher/daftar_siswa/daftar_semester.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="crud_absen/semester.php"><i class="fas fa-book"></i><p>Daftar Absen</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Absen</a></li>
        		</ul>
			</li>
			
			<li>
				<a href="crud_nilai/semester.php"><i class="fas fa-mail-bulk"></i><p>Input Nilai</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Input Nilai</a></li>
        		</ul>
			</li>

			<li>
				<a href="login_teacher.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
	<div class="content container-fluid justify-content-center">
      		<h2 class="mb-5">Selamat datang guru</h2>
			
			
			  <div class="row justify-content-center mb-5">
              <div class="col-sm-10  col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-primary py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>JUMLAH KELAS</span></div>
                        <div class="text-dark fw-bold h5 mb-0"><span id="jlh_matkul"><?php echo $jlh_kelas ?></span></div>
                      </div>
                      <div class="col-auto"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-10 col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>JUMLAH SISWA</span></div>
                        <div class="text-dark fw-bold h5 mb-0"><span id="jlh_mahasiswa"><?php echo $jlh_siswa ?></span></div>
                      </div>
                      <div class="col-auto"><i class="fas fas fa-users fa-2x text-gray-300"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-10 col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-warning py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>JUMLAH GURU</span></div>
                        <div class="text-dark fw-bold h5 mb-0"><span id="jlh_dosen"><?php echo $jlh_guru ?></span></div>
                      </div>
                      <div class="col-auto"><i class="fas fa-user-tie fa-2x text-gray-300"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row justify-content-center mb-5 "   >
              <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0 ms-5">Jumlah Siswa Tiap Kelas</h3>
              </div>
              <div class="col-sm-11 col-lg-6 col-xl-7"  >
                <div class="card shadow mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Diagram Batang</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="grafik_batang" style="height:300px;"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-11 col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Diagram Lingkaran</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="grafik_lingkaran" style="height:300px;"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    	</div>
	</section>

	<script src="../js/Chart.js"></script>
	<script src="../js/chart.min.js"></script>
    <script src="../js/bs-init.js"></script>
    <script src="../js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	
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

		//MEMBUAT GRAFIK
		const color = [];
		var chartBar, chartPie;

		var dynamicColors = function () {
		    var r = Math.floor(Math.random() * 255);
		    var g = Math.floor(Math.random() * 255);
		    var b = Math.floor(Math.random() * 255);
		    return "rgb(" + r + "," + g + "," + b + ")";
		  };
		
	  
		for(let i=0; i< <?php echo mysqli_num_rows($kelas); ?>; i++){
		  color.push(dynamicColors());
		}
		  
		
		// Mendapatkan config chart batang
		const getConfig = (data, type) => {
		const config = {
			type: type,
			data: data,
			options: {
			responsive: true,
			maintainAspectRatio: false,

			scales: {
				yAxes: [
				{
					ticks: {
					beginAtZero: true,
					},
				},
				],
			},
			},
		};
		return config;
		};

		// Mendapatkan config chart lingkaran
		const getConfig2 = (data, type) => {
		const config2 = {
			type: type,
			data: data,
			options: {
			responsive: true,
			maintainAspectRatio: false,
			},
		};
		return config2;
		};

		let setDataChart = (value1, value2, id_lingkaran, id_batang, color, label, chartPie, chartBar) => {
		const data = {
			labels: value1,
			datasets: [
			{
				label: value1,
				backgroundColor: color,
				borderColor: "rgba(200, 200, 200, 0.75)",
				data: value2,
			},
			],
		};

		if (chartBar) chartBar.destroy();
		if (chartPie) chartPie.destroy();

		// Atur data chart
		chartPie = new Chart($(id_lingkaran), getConfig2(data, "pie"));
		// Ubah legend menjadi jumlah mahasiswa
		//data.datasets[0].label = label;
		chartBar = new Chart($(id_batang), getConfig(data, "bar"));
		};
		
		setDataChart([<?php echo $daftar_kelas?>],[ <?php echo $daftar_jlhsiswa?>], "#grafik_lingkaran", "#grafik_batang", color, "Jumlah Matkul yang Diampu", chartPie, chartBar);
    
	</script>
		
</body>
</html>