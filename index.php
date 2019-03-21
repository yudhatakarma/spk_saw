<?php 

	require_once('config.php');
	$b_pendidikan=0.3;
	$b_pengalaman=0.3;
	$b_keahlian=0.2;
	$b_umur=0.2;

	$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SPK Metode SAW</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/all.min.css">
</head>
<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<h3>SISTEM PENDUKUNG KEPUTUSAN MENGGUNAKAN METODE SAW</h3>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">

				<a href="add.php" class="btn btn-sm btn-outline-primary mb-3"><i class="fas fa-plus"></i>Tambah Data</a>

				<table class="table">
					<tr>
						<td width="30%">Bobot Pendidikan</td>
						<td>0,3</td>
					</tr>
					<tr>
						<td>Bobot Pengalaman</td>
						<td>0,3</td>
					</tr>
					<tr>
						<td>Bobot Keahlian</td>
						<td>0,2</td>
					</tr>
					<tr>
						<td>Bobot Umur</td>
						<td>0,2</td>
					</tr>
				</table>


				<div class="card">
					<div class="card-header bg-primary text-white">Data Alternatif</div>
					<div class="card-body table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Pendidikan</th>
									<th>Pengalaman</th>
									<th>Keahlian</th>
									<th>Umur</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id DESC");

									while($user_data = mysqli_fetch_array($result)){

										// Pendidikan
										if($user_data['pendidikan'] == "1"){
											$pendidikan = "SD-SMA";
										}elseif($user_data['pendidikan'] == "2"){
											$pendidikan = "D1-D2";
										}elseif($user_data['pendidikan'] == "3"){
											$pendidikan = "D3-S1";
										}elseif($user_data['pendidikan'] == "4"){
											$pendidikan = "S2";
										}elseif($user_data['pendidikan'] == "5"){
											$pendidikan = "S3";
										}

										// Pengalaman
										if($user_data['pengalaman'] == "1"){
											$pengalaman = "Belum Ada";
										}elseif($user_data['pengalaman'] == "2"){
											$pengalaman = "1 tahun";
										}elseif($user_data['pengalaman'] == "3"){
											$pengalaman = "2 Tahun";
										}elseif($user_data['pengalaman'] == "4"){
											$pengalaman = "> 2 Tahun";
										}

										// Keahlian
										if($user_data['keahlian'] == "1"){
											$keahlian = "Tidak Ada";
										}elseif($user_data['keahlian'] == "2"){
											$keahlian = "Ada";
										}

										// Umur
										if($user_data['umur'] == "1"){
											$umur = "0-18 Tahun";
										}elseif($user_data['umur'] == "2"){
											$umur = "19-25 Tahun";
										}elseif($user_data['umur'] == "3"){
											$umur = "26-30 Tahun";
										}elseif($user_data['umur'] == "4"){
											$umur = "31-50 Tahun";
										}


										// Menampilkan Data Ke Browser
										echo "<tr>";
										echo "<td>".$user_data['nama']."</td>";
										echo "<td>".$pendidikan."</td>";
										echo "<td>".$pengalaman."</td>";
										echo "<td>".$keahlian."</td>";
										echo "<td>".$umur."</td>";
										echo "<td> <a href='delete.php?id=$user_data[id]' class='btn btn-sm btn-outline-danger'><i class='fas fa-trash-alt'></i> Hapus</a></td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!-- Transformasi Data -->
		<div class="row justify-content-center mt-3">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-success text-white">Data Transformasi</div>
					<div class="card-body table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Pendidikan</th>
									<th>Pengalaman</th>
									<th>Keahlian</th>
									<th>Umur</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$result = mysqli_query($koneksi, "SELECT nama, pendidikan, pengalaman, keahlian, umur FROM tbl_alternatif ORDER BY id DESC");
									while($user_data = mysqli_fetch_array($result)){

										echo "<tr>";
										echo "<td>".$user_data['nama']."</td>";
										echo "<td>".$user_data['pendidikan']."</td>";
										echo "<td>".$user_data['pengalaman']."</td>";
										echo "<td>".$user_data['keahlian']."</td>";
										echo "<td>".$user_data['umur']."</td>";
									} 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!-- Data  -->
		<div class="row justify-content-center mt-3 mb-5">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-danger text-white"><caption>X<sub>ij</sub> <b>/</b> Max X<sub>ij</sub></caption></div>
					<div class="card-body table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Pendidikan</th>
									<th>Pengalaman</th>
									<th>Keahlian</th>
									<th>Umur</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$result= mysqli_query($koneksi, "SELECT max(pendidikan) as max_pendidikan, max(pengalaman) as max_pengalaman, max(keahlian) as max_keahlian, max(umur) as max_umur FROM tbl_alternatif ORDER BY id DESC");
										$user_data = mysqli_fetch_array($result);

										$max_pendidikan = $user_data['max_pendidikan'];
										$max_pengalaman = $user_data['max_pengalaman'];
										$max_keahlian 	= $user_data['max_keahlian'];
										$max_umur 		= $user_data['max_umur'];

										$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id DESC");

									while($user_data = mysqli_fetch_array($result)){
										echo "<tr>";
										echo "<td>".$user_data['nama']."</td>";
										echo "<td>".$user_data['pendidikan']."<b> / </b>".$max_pendidikan." = ".$user_data['pendidikan']/$max_pendidikan. "</td>";

										echo "<td>".$user_data['pengalaman']."<b> / </b>".$max_pengalaman." = ".$user_data['pengalaman']/$max_pengalaman. "</td>";

										echo "<td>".$user_data['keahlian']."<b> / </b>".$max_keahlian." = ".$user_data['keahlian']/$max_keahlian. "</td>";

										echo "<td>".$user_data['umur']."<b> / </b>".$max_umur." = ".$user_data['umur']/$max_umur. "</td>";
									} 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<hr>

		


	</div>
	
</body>
</html>