<?php
include 'koneksi.php';
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_surat_keluar.xls");
?>
	<center><h2>Data Surat Keluar</h2></center>
	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
			<tr>
				<th>No</th>
				<th>No Surat</th>
				<th>Perihal</th>
				<th>Tujuan</th>
				<th>Tanggal Surat</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no =1;
				$query	= "SELECT * FROM surat_keluar";
				$sql    = mysqli_query($connect, $query);
				while ($data = mysqli_fetch_array($sql)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['no_surat'] ?></td>
				<td><?php echo $data['perihal'] ?></td>
				<td><?php echo $data['tujuan'] ?></td>
				<td><?php echo $data['tanggal_surat'] ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>