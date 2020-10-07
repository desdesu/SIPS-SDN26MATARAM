<title>Agenda Surat Keluar</title>
<?php
	include 'koneksi.php';
	include 'function_tanggal.php';
?>
	<style type="text/css">
		body {
			font-size: 12px!important;
			color: #212121;
		}
		.header {
			text-align: center;
			margin: -.5rem 0;
		}
		.logo1 {
			float: left;
			position: relative;
			width: 80px;
			height: 80px;
			margin: 0 0 0 1.2rem;
		}
		.logo2 {
			float: right;
			position: relative;
			width: 80px;
			height: 80px;
			margin: 0 0 0 1.2rem;
		}
		.text {
			font-size: 15px!important;
			font-weight: bold;
			text-transform: uppercase;
		}
		#table tr th {
			font-size: 11px;
		}
		#table {
			font-size: 10px
		}
	</style>

	<div class="row" align="center">
			<?php
				if (isset($_POST['cetak'])) {
					$dari_tanggal = InggrisTgl($_POST['dari_tanggal']);
					$sampai_tanggal= InggrisTgl($_POST['sampai_tanggal']);

					//indonesia Tgl
					$dari_tanggal_indo = IndonesiaTgl($dari_tanggal);
					$sampai_tanggal_indo= IndonesiaTgl($sampai_tanggal);

					if ($_REQUEST['dari_tanggal']=="" || $_REQUEST['sampai_tanggal']=="") {
						echo '<script>
								window.location.href="./index.php?page=agd_surat_masuk";
						 	 </script>';
						die();
					}else{
						$query	= "SELECT * FROM surat_keluar WHERE tanggal_surat BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
						$sql 	= mysqli_query($connect, $query);
			?>
			<div class="col-md-10">
				<h4><strong>AGENDA SURAT KELUAR DARI TANGGAL <?php echo $dari_tanggal_indo;?> SAMPAI TANGGAL <?php echo $sampai_tanggal_indo;?></strong></h4>
			</div>
				<table id="table" border="1" cellspacing="0" cellpadding="5" width="100%">
					<thead>
						<tr>
							<th width="1">No</th>
							<th>No Surat</th>
							<th>Perihal</th>
							<th>Tujuan</th>
							<th>Tanggal Surat</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if (mysqli_num_rows($sql) > 0) {
								$no=1;
								while ($data = mysqli_fetch_array($sql)) {
						?>
						<td width="1"><?php echo $no++; ?></td>
						<td><?php echo $data['no_surat'] ?></td>
						<td><?php echo $data['perihal'] ?></td>
						<td><?php echo $data['tujuan'] ?></td>
						<td><?php echo $data['tanggal_surat'] ?></td>
					</tbody>
					<?php 
								}
							}else{
								echo '<tr><td colspan="9"><center><h2><strong>Tidak ada Agenda surat Keluar</></strong></h2></center></td></tr>';
							}
							}
						}	
					?>
				</table>
	</div>
	<script type="text/javascript">
		window.print();
	</script>