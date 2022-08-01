<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	// melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
$id = $_GET['id_registrasi'];
$query = mysqli_query($koneksi, "DELETE FROM registerasi where id_registrasi=$id");
if ($query) {
	header('location:data_pengasuh.php?pesan=Data Berhasil Di Hapus');
} else {
	header('location:data_pengasuh.php?pesan=Data Gagal Di Hapus');
}