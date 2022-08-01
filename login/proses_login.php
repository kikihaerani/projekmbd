<?php
//mengaktifkan session php
session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$result = mysqli_query($koneksi, "SELECT * FROM tbl_petugas WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($result);

if ($cek > 0){
   $data = mysqli_fetch_assoc($result);
   $_SESSION['username'] = $username;
   $_SESSION['nama_petugas'] = $data['nama_petugas'];
   $_SESSION['status'] = "sudah_login";
   $_SESSION['id_petugas'] = $data['id_petugas'];
   header("location:../admin/dashboard.php");

} else {
   header("location:login.php?pesan=gagal Login data tidak ditemukan.");
}