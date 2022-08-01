<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	// melakukan pengalihan
	header("location:../login/login.php");
}
include "../config/koneksi.php";
$id_pendaftaran = $_POST['id_pendaftaran'];
$id_jns_seleksi = $_POST['id_jns_seleksi'];
$skor = $_POST['skor'];
$keterangan = $_POST['keterangan'];
//$count= count(array)
//$data = array();
for ($i=0; $i <count($id_pendaftaran) ; $i++) { 
	$insert_data = mysqli_query($koneksi, "INSERT INTO tbl_seleksi (id_jns_seleksi,id_pendaftaran,skor,keterangan) VALUES ('$id_jns_seleksi[$i]','$id_pendaftaran[$i]','$skor[$i]','$keterangan[$i]')");
}
if ($insert_data) {
	header( 'location:data_seleksi.php?pesan=Data Berhasil Di Simpan');
} else{
echo mysqli_error($koneksi);
	//header('location:data_seleksi.php?pesan=Data Gagal Di Simpan'); 
}