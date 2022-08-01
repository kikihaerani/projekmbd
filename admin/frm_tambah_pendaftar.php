<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
	//melakukan pengalihan
	header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Form Pendaftaran</h1>

	</div>

	<!--<canvas class="my-4 w-100" id="myChart" width="900" heigt="380"</canvas> -->

	<!-- <h4>Data Jadwal Kegiatan</h4> -->
	<div class="table-responsive">
	<form action="simpan_pendaftaran.php" method="POST">
		<div class="col-6">
			<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap..">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Tempat Lahir</label>
			<input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Tanggal Lahir</label>
			<input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Alamat Rumah</label>
			<input type="text" name="alamat_rumah" class="form-control" placeholder="Alamat Rumah">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">No Tlp/Hp</label>
			<input type="text" name="no_tlp" class="form-control" placeholder="No Tlp/Hp">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Nama Ibu Kandung</label>
			<input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Nama Ayah Kandung</label>
			<input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
			</div>

			<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Pekerjaan Ayah</label>
			<select name="pekerjaan ayah" class="form-control" id="">
			<option value="">Pilih Pekerjaan Ayah</option>
			<option value="Petani">Petani</option>
			<option value="Pekebun">Pekebun</option>
			<option value="Guru ASN">Guru ASN</option>
			<option value="Guru Non ASN">Guru Non ASN</option>
			<option value="ASN">ASN</option>
			<option value="Honorer">Honorer</option>
			<option value="TNI">TNI</option>
			<option value="polri">Polri</option>
			</select>
			</div>


			<div class="mb-3">
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

			</div>
			</div>
			</form>
			</div>
			</main>
		<?php
		include "../layout/footer.php";
		?>





