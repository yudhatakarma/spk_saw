<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Data Alternatif</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/all.min.css">
</head>
<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h3 class="text-center">Tambah Data</h3>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-5">
				<form method="post" action="add_proses.php">
					<div class="form-group">
						<input type="input" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
					</div>

					<div class="form-group">
						<select name="pendidikan" class="form-control custom-select" required>
							<option value="">-- Pendidikan --</option>
							<option value="1">SD-SMA</option>
							<option value="2">D1-D2</option>
							<option value="3">D3-S1</option>
							<option value="4">S2</option>
							<option value="5">S3</option>
						</select>
					</div>

					<div class="form-group">
						<select name="pengalaman" class="form-control custom-select" required>
							<option value="">-- Pengalaman --</option>
							<option value="1">Belum Ada</option>
							<option value="2">1 Tahun</option>
							<option value="3"> 2 Tahun</option>
							<option value="4">> 2 Tahun</option>
						</select>
					</div>

					<div class="form-group">
						<select name="keahlian" class="form-control custom-select" required>
							<option value="">-- Keahlian --</option>
							<option value="1">Tidak Ada</option>
							<option value="2">Ada</option>
						</select>
					</div>

					<div class="form-group">
						<select name="umur" class="form-control custom-select" required>
							<option value="">-- Umur --</option>
							<option value="1">0 - 18 Tahun</option>
							<option value="2">19 - 25 Tahun</option>
							<option value="3">26 - 30 Tahun</option>
							<option value="4">31 - 50 Tahun</option>
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus"></i> Tambah</button>
					</div>


				</form>
			</div>
		</div>
	</div>
	
</body>
</html>