<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    // melakukan pengalihan
    header("location:../login/login.php");
}
include "../config/koneksi.php";
 
 $id_jns_ekskul = $_POST['id_jns_ekskul'];
 $id_pengasuh = $_POST['id_pengasuh'];
 $jadwal = $_POST['jadwal'];
 $keterangan = $_POST['keterangan'];

 $insert_data = mysqli_query($koneksi, "INSERT INTO tbl_ekskul ( id_jns_ekskul, id_pengasuh,jadwal,keterangan) VALUES ( '$id_jns_ekskul','$id_pengasuh','$jadwal','$keterangan')");
 if ($insert_data){
 	header('location:data_ekskul.php?pesan=Data Berhasil Di Simpan');
 } else{
    echo mysqli_error($koneksi);
 	//header('location:data_ekskul.php?pesan=Data Gagal Di Simpan');
 }

 