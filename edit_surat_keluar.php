	<?php 
		if (isset($_REQUEST['edit'])) {
			$no_surat		= $_POST['no_surat'];
			$tanggal_surat	= InggrisTgl($_POST['tanggal_surat']);
			$perihal		= $_POST['perihal'];
			$tujuan 		= $_POST['tujuan'];
			$file 			= $_FILES['file']['name'];
			$tmp			= $_FILES['file']['tmp_name'];
			$path			= "upload/surat_keluar/".$file;

			//proses update
			if (move_uploaded_file($tmp, $path)) {
				$query 	= "SELECT * FROM surat_keluar WHERE id_keluar='$_GET[id]'";
				$sql	= mysqli_query($connect, $query);
				$data 	= mysqli_fetch_array($sql);
			//jika filenya ada, hapus filenya
				if(is_file("upload/surat_keluar/".$data['file'])){
				unlink("upload/surat_keluar/".$data['file']);
				}
			//jika mengubah file
				$query 	= "UPDATE surat_keluar SET no_surat='$no_surat', tanggal_surat='$tanggal_surat', perihal='$perihal', tujuan='$tujuan', file='$file' WHERE id_keluar='$_GET[id]'";
				$sql	= mysqli_query($connect, $query);
				if ($sql) {
					echo '<script> 
						 	window.alert("Data berhasil di ubah");
						 	window.location.href="./index.php?page=surat_keluar";
						 </script>';
				}else{
					echo '<script> 
							window.alert("Data gagal di ubah");
						  </script>';
				}		
			}else{
			//jika tidak mengubah file
				$query 	="UPDATE surat_keluar SET no_surat='$no_surat', tanggal_surat='$tanggal_surat', perihal='$perihal', tujuan='$tujuan', file='$file' WHERE id_keluar='$_GET[id]'";
				$sql	= mysqli_query($connect, $query);
				if($sql){
					echo '<script>
							window.alert("Data berhasil di ubah");
							window.location.href="./index.php?page=surat_keluar";
						  </script>';
				}else{
					echo '<script>
							window.alert("Data gagal di ubah");
						 </script>';
				}	
			}
		}
	?>
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Edit Surat Keluar</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Edit Surat Keluar</h2>
						<ul class=" nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!-- Form edit surat keluar -->
						<?php 
							$query	= "SELECT * FROM surat_keluar WHERE id_keluar='$_GET[id]'";
							$sql	= mysqli_query($connect, $query);
							while ($data = mysqli_fetch_array($sql)) {
						?>
						<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
						
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">No Surat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="no_surat" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['no_surat']; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Tanggal Kirim<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="tanggal_surat" class="form-control has-feedback-left" id="tanggal" required="required" value="<?php echo IndonesiaTgl($data['tanggal_surat']);?> ">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								</div>	
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Tujuan<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="tujuan" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['tujuan']; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Perihal<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="perihal" class="form-control col-md-7 col-xs-12" required="required"><?php echo $data['perihal']; ?></textarea>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">File<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="file" class="form-control col-md-7 col-xs-12" value="<?php echo $data['file'] ?>">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Reset</button>
									<input type="submit" class="btn btn-success" value="Simpan" name="edit">
								</div>
							</div>
						</form>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>