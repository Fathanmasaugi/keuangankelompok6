<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from saldo where jenis='Masuk'");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['tot_masuk'];
  }
?>

<?php
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from saldo where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }
?>

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Jumlah Saldo </h5>
	<h5>Uang Masuk :
		<?php
  echo rupiah($masuk);
  ?>
	</h5>

	<h5>Uang Keluar :
		<?php
    echo rupiah($keluar);
    ?>
	</h5>
	<hr>

	<h3>Sisa Saldo Akhir :
		<?php
    $saldo= $masuk-$keluar;
    echo rupiah($saldo);
    ?>
	</h3>
</div>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> REKAP UANG MASUK</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Uraian</th>
						<th>Pemasukan</th>
						<th>Pengeluaran</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from saldo order by tgl_km asc");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_km']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<td>
							<?php echo $data['uraian_km']; ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['masuk']); ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['keluar']); ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->