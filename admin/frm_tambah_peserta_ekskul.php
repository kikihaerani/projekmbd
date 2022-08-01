<?php
//session_start();
//if ($_SESSION['pesan'] != "sudah_login") {
//	header("location:../login/login.php");
//}
include "../layout/header.php";
include "../config/koneksi.php";
$id = $_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT a.nama_ekskul, b.nama_lengkap, c.* FROM tbl_ekskul c inner join tbl_jns_ekskul a on a.id_jns_ekskul=c.id_jns_ekskul inner join tbl_pengasuh b on c.id_pengasuh=b.id_pengasuh WHERE id_ekskul=$id");
$query_2 = mysqli_query($koneksi, 'SELECT * FROM tbl_santri');
$rs_1 = mysqli_fetch_assoc($query_1);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Tambah Peserta ekskul</h1>
	</div>
	<div class="row">
	<div class="table-responsive">
		<form action="simpan_peserta_ekskul.php" method="POST">
			<div class="mb-3">
				<div class="table-responsive">
					<table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
						<tr>
							<td> Nama Ekskl</td>
							<td><?= $rs_1['nama_ekskul']; ?></td>
						</tr>
						<tr>
							<td>Pembimbing</td>
							<td><?= $rs_1['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<td>Jadwal</td>
							<td><?= $rs_1['jadwal']; ?></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td><?= $rs_1['keterangan'];?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="mb-6">
				<div class="table-responsive">
					<table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
						<tr>
							<th style="width:1%;">#</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Tlp</th>
						</tr>
						<?php while ($rs_2 = mysqli_fetch_assoc($query_2)): ?>
						<tr>
							<td>
								<input type="checkbox" name="id_santri[]" value="<?= $rs_2['id_santri']; ?>" class="form-check-input">
							</td>
							<td><?= $rs_2['nama_lengkap']; ?></td>
							<td><?= $rs_2['alamat_rumah']; ?></td>
							<td><?= $rs_2['no_tlp']; ?></td>
							<input type="hidden" name="id_ekskul[]" value="<?= $rs_1['id_ekskul']; ?>">
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
</main>
<?php
	include "../layout/footer.php";
?>