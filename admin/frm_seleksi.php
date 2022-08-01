<?php
session_start();
if ($_SESSION['status'] !="sudah_login") {
	// melakukan pengakihan
	header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$id =$_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT id_pendaftaran,nama_lengkap,nama_ibu,alamat_rumah,no_tlp FROM tbl_pendaftaran where id_pendaftaran=$id");
$query_2 = mysqli_query($koneksi, 'SELECT * FROM tbl_jns_seleksi');
$rs_1 = mysqli_fetch_assoc($query_1);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">From Seleksi Calon Santri</h1>
	</div>
	<div class="row">
		<div class="table-responsive">
			<form action="simpan_sleksi.php" method="POST">
				<div class="mb-3">
					<div class="table-responsive"></div>
						<table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
							<tr>
								<td>Nama Lengkap</td>
								<td><?= $rs_1['nama_lengkap'];?></td>
							</tr>
							<tr>
								<td>Nama Ibu</td>
								<td><?= $rs_1['nama_ibu'];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?= $rs_1['no_tlp'];?></td>
							</tr>
							<tr>
								<td>No Tlp</td>
								<td><?= $rs_1['no_tlp'];?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="mb-6">
					<div class="table-responsive">
						<table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
							<tr>
								<th>Nama Seleksi</th>
								<th>Skor</th>
								<th>Keterangan</th>
							</tr>
							<?php while ($rs_2 = mysqli_fetch_assoc($query_2)) : ?> 
								<tr>
									<td><?= $rs_2['nama_seleksi'];?></td>
									<td><input type="text" name="skor[]" class="form-control"></td>
									<td> <input type="text" name="keterangan[]" class="form-control"></td>
									<input type="hidden" name="id_jns_seleksi[]" value="<?= $rs_2['id_jns_seleksi'];?>">
									<input type="hidden" name="id_pendaftaran[]" value="<?= $rs_1['id_pendaftaran'];?>">
								</tr>
								<?php
							endwhile;
							?>
						</table>
					</div>
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</main>
<?php
	include "../layout/footer.php";
?>