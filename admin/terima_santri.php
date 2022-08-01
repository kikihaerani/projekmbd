<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	header("location:../login/login.php");
}
include "../config/koneksi.php";
$id = $_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT id_pendaftaran,id_seleksi from tbl_seleksi WHERE id_seleksi='$id'");
$rs_1 = mysqli_fetch_assoc($query_1);
// $query_2 = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran where id_pendaftaran=$rs_1[id_pendaftaran]");
// $rs_2 =mysqli_fetch_assoc($query_2);
// $id_seleksi = $rs_1['id_seleksi'];
// $nama = $rs_2['nama_lengkap'];
// $tmpt_lahir = $rs_2['tmpt_lahir'];
// $tgl_lahir = $rs_2['tgl_lahir'];
// $alamat = $rs_2['alamat_rumah'];
// $tlp = $rs_2['no_tlp'];
// $nama_ibu = $rs_2['nama_ibu'];
// $nama_ayah = $rs_2['nama_ayah'];
// $pekerjaan_ayah = $rs_2['pekerjaan_ayah'];

$query_2 = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran where id_pendaftaran=$rs_1[id_pendaftaran]");
$rs_2 =mysqli_fetch_assoc($query_2);
$id_seleksi = $rs_1['id_seleksi'];
$nama = $rs_2['nama_lengkap'];
$tmpt_lahir = $rs_2['tmpt_lahir'];
$tgl_lahir = $rs_2['tgl_lahir'];
$alamat = $rs_2['alamat_rumah'];
$tlp = $rs_2['no_tlp'];
$nama_ibu = $rs_2['nama_ibu'];
$nama_ayah = $rs_2['nama_ayah'];
$pekerjaan_ayah = $rs_2['pekerjaan_ayah'];

$insert_data = mysqli_query($koneksi, "INSERT INTO tbl_santri(id_seleksi,nama_lengkap,tmpt_lahir,tgl_lahir,alamat_rumah,no_tlp,nama_ibu,nama_ayah,pekerjaan_ayah) VALUES ('$id_seleksi','$nama','$tmpt_lahir','$tgl_lahir','$alamat','$tlp','$nama_ibu','$nama_ayah','$pekerjaan_ayah')");
if ($insert_data) {
	header('location:data_seleksi.php?pesan=Data Berhasil Di Simpan');	
} else {
echo mysqli_error($koneksi);
	//header('location:data_seleksi.php?pesan=Data Gagal Di Simpan');
}
