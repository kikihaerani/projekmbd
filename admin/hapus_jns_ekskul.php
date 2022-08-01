<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	header("location:../login/login.php");
}

include "../config/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_jns_ekskul where id_jns_ekskul=$id");

if ($query) {
	header('location:data_jns_ekskul.php?pesan=Data Berhasil Di Hapus');
} else {
	header('location:data_jns_ekskul.php?pesan=Data Gagal Di Hapus');
}