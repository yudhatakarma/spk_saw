<?php 

require_once('config.php'); // Koneksi Ke Database

// Mengambil Data Yang Dikirim Dari Form
$nama 		= $_POST['nama'];
$pendidikan = $_POST['pendidikan'];
$pengalaman = $_POST['pengalaman'];
$keahlian 	= $_POST['keahlian'];
$umur 		= $_POST['umur'];


// Proses Menambahkan Data Ke Database
$query = "INSERT INTO tbl_alternatif (nama, pendidikan, pengalaman, keahlian, umur) VALUES ('$nama','$pendidikan','$pengalaman','$keahlian','$umur')";
if(mysqli_query($koneksi, $query)){
	header("location:index.php");
}else{
	echo $query;
}