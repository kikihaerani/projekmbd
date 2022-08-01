  <?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	//melakukan pengalihan
	header("location:../login/login.php");
}
include "../config/koneksi.php";
//error_reporting();
$id = $_POST['id_pengasuh'];
$nama = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];
$kompetensi = $_POST['kompetensi'];

//$petugas = $_SESSION['id_[petugas'];

$update_data = mysqli_query($koneksi, "UPDATE `tbl_pengasuh` SET `nama_lengkap` = '$nama', `alamat` = '$alamat', `email` = '$email', `no_tlp` = '$no_tlp', `kompetensi` = '$kompetensi' WHERE `tbl_pengasuh`.`id_pengasuh` = '$id'");
if ($update_data){
	header('location:data_pengasuh.php?pesan=Data Berhasil Di Ubah');
} else {
	//echo ('ERROR' . mysqli_error($koneksi));
	header('location:data_pengasuh.php?pesan=Data Gagal Di Ubah');
}

//UPDATE `tbl_pengasuh` SET `nama_lengkap` = '$nama', `alamat` = '$alamat', `email` = '$email', `no_tlp` = '$no_tlp', `kompetensi` = '$kompetensi' WHERE `tbl_pengasuh`.`id_pengasuh` = '$id'