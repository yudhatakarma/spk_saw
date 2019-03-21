<?php

// Koneksi Ke Database
require_once('config.php');

// mengambil Data id Dari User
$id = $_GET['id'];

// menghapus Data User Berdasarkan ID
$result = mysqli_query($koneksi, "DELETE FROM tbl_alternatif WHERE id=$id") or die('Gagal menghapus Data..');
header("location:index.php");