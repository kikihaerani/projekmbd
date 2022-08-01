<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	//melakukan pengalihan
	header("location:../login/login.php");
}
include "../config/koneksi.php";
error_reporting();
$id = $_POST['id_jns_ekskul'];
$nama = $_POST['nama_ekskul'];

//$petugas = $_SESSION['id_[petugas'];

$update_data = mysqli_query($koneksi, "UPDATE tbl_jns_ekskul set nama_ekskul='$nama' where id_jns_ekskul=$id");
if ($update_data){
	header('location:data_jns_ekskul.php?pesan=Data Berhasil Di Ubah');
} else {
	//echo ('ERROR' . mysqli_error($koneksi));
	header('location:data_jns_ekskul.php?pesan=Data Gagal Di Ubah');
}