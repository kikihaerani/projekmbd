<?php 
session_start();
if ($_SESSION['status'] != "sudah_login") {
	header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$sql = mysqli_query($koneksi, " SELECT a.nama_ekskul,b.nama_lengkap,c.*,count(d.id_santri) as jml FROM tbl_ekskul c inner join tbl_jns_ekskul a on a.id_jns_ekskul=c.id_jns_ekskul inner join tbl_pengasuh b on c.id_pengasuh=b.id_pengasuh left join tbl_detail_ekskul d on c.id_ekskul=d.id_ekskul group by c.id_ekskul");
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Data Ekskul</h1>
	</div>
	<?php if(isset($_GET['pesan'])) :?>
	<div class="alert alert-succses" role="alert">
		<?php echo $_GET['pesan']; ?>
	</div>
<?php endif; ?>

<a href="frm_tambah_data_ekskul.php" class="btn btn-sm btn-primary">Tambah Data</button></a>

<br><br>
<div class="table-responsive">
	<table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
		<thead class="table-light">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Ekskul</th>
				<th scope="col">Pembimbing</th>
				<th scope="col">jadwal</th>
				<th scope="col">Keterangan</th>
				<th scope="col"> Jumlah Peserta</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			while ($rs = mysqli_fetch_assoc($sql)) :?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $rs['nama_ekskul']; ?></td>
				<td><?= $rs['nama_lengkap']; ?></td>
				<td><?= $rs['jadwal']; ?></td>
				<td><?= $rs['keterangan']; ?></td>
				<td><?= $rs['jml']; ?></td>
				<td>
					<a href="frm_tambah_peserta_ekskul.php?id=<?= $rs['id_ekskul']; ?>" class="btn btn-success btn-sm">Peserta</a>
					<a href="frm_ubah_data_ekskul.php?id=<?= $rs['id_ekskul']; ?>" class="btn btn-info btn-sm">Ubah</a>
					<a href="hapus_data_ekskul.php?id=<?= $rs['id_ekskul']; ?>" class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			<?php
			$no++;
		endwhile;
		?>
		</tbody>
	</table>
</div>
</main>
<?php
	include "../layout/footer.php";
?>