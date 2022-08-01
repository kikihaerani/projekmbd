<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	//melakukan pengalihan
	header("location:../login/login.php");
}

include "../config/koneksi.php";

$nama = $_POST['nama_seleksi'];
$insert_data = mysqli_query($koneksi, "INSERT INTO tbl_jns_seleksi(nama_seleksi) values('$nama')");
if ($insert_data){
	header('location:data_jns_seleksi.php?pesan=Data Berhasil Di Simpan');
} else {
echo mysqli_error($koneksi);
	//header('location:data_jns_seleksi.php?pesan=Data Gagal Di Simpan');
}