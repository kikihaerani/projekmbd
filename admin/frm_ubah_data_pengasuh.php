<?php
session_start();
if($_SESSION['pesan'] !="sudah_login") {
	header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pengasuh where id_pengasuh=$id");
$rs = mysqli_fetch_assoc($query);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">From Data Pengasuh</h1>
	</div>

	<div class="table-responsive">
		<form action="simpan_ubah_data_pengasuh.php" method="POST">
			<div class="col-6">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
					<input type="text" name="nama_lengkap"  value="<?=$rs['nama_lengkap'];?>" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
					<input type="text" name="alamat" value="<?=$rs['alamat'];?>" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">e-mail</label>
					<input type="text" name="email"  value="<?=$rs['email'];?>class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">No Tlp/Hp</label>
					<input type="text" name="no_tlp" value="<?=$rs['no_tlp'];?> class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label" id="">Kompetensi</label>
					<select name="Kompetensi" class="form-control" id="">
						<option value="<?=$rs['kompetensi'];?>"><?=$rs['kompetensi'];?></option>
						<option value=" Baca Kitab"> Baca Kitab</option>
						<option value=" Tahfiz"> Tahfiz</option>
						<option value=" Olah Raga">Olah Raga</option>
						<option value=" Englis"> Englis</option>
					</select>
				</div>
				<input type="hidden"  value="<?=$id; ?>" name="id_pengasuh" id="">
				<div class="mb-3">
					<button type="submit" class="btn btn-sm btn-primary"> Simpan</button>
				</div>
			</div>
		</form>
	</div>
</main>
<?php
	include "../layout/footer.php";
?>