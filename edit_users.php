	<?php
		if (isset($_REQUEST['edit'])) {
			$username 		= $_POST['username'];
			$fullname 		= $_POST['fullname'];
			$foto 			= $_FILES['foto']['name'];
			$tmp 			= $_FILES['foto']['tmp_name'];

			$path			= "upload/user/".$foto;

			//proses update
			if (move_uploaded_file($tmp, $path)) {
				$query 		= "SELECT * FROM user WHERE id_user='$_GET[id]'";
				$sql		= mysqli_query($connect, $query);
				$data 		= mysqli_fetch_array($sql);
			//jika ada foto nya ada, hapus filenya
				if (file_exists("upload/user/".$data['foto'])) {
					unlink("upload/user/".$data['foto']);
				}
			//jika mengubah foto
				$query2 	  	= "UPDATE user SET username='$username', fullname='$fullname', foto='$foto' WHERE id_user='$_GET[id]'";
				$sql2		= mysqli_query($connect, $query2);

				if ($sql2) {
					echo '<script>
							window.alert("Data berhasil di ubah");
							window.location.href="./index.php?page=profil_user";
						  </script>';
				}else{
					echo '<script>
							window.alert("Data gagal di ubah");
						 </script>';
				}
		}else{
			//jika tidak mengubah foto
				$query3 	= "UPDATE user SET username='$username', fullname='$fullname' WHERE id_user='$_GET[id]'";
				$sql3     	= mysqli_query($connect, $query3);
				if ($sql3) {
					echo '<script>
							window.alert("Data berhasil di ubah");
							window.location.href="./index.php?page=profil_user";
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
				<h3>Edit Users</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Edit Users</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!-- Form Edit Users -->
						<?php
							$query	= "SELECT * FROM user WHERE id_user='$_GET[id]'";
							$sql 	= mysqli_query($connect, $query);
							while ($data = mysqli_fetch_array($sql)) {
						?>
						<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="username" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['username'] ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Fullname<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="fullname" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['fullname'] ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="foto" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Reset</button>
									<input type="submit" class="btn btn-success" name="edit" value="Simpan">
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