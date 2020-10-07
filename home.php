	<?php
		//menghitung jumlah surat masuk
		$query 	= "SELECT * FROM surat_masuk";
		$sql   	= mysqli_query($connect, $query);
		$count1	= mysqli_num_rows($sql); 

		//menghitung jumlah surat keluar
		$query 	= "SELECT * FROM surat_keluar";
		$sql   	= mysqli_query($connect, $query);
		$count2	= mysqli_num_rows($sql);  
 
	?>
	<!-- Info Box -->
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Dashboard</h3>
			</div>
		</div>	
		<div class="clearfix"></div>
		<div class="row top_tiles">
			<a href="index.php?page=surat_masuk">
				<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-envelope-o"></i></div>
						<div class="count"><?php echo $count1 ?></div>
						<h3>Surat Masuk</h3>
					</div>
				</div>
			</a>
			<a href="index.php?page=surat_keluar">
				<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-envelope-o"></i></div>
						<div class="count"><?php echo $count2 ?></div>
						<h3>Surat Keluar</h3>
					</div>
				</div>
			</a>

		</div>
	</div>

	<!-- <div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Wellcome</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"> <i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"> <i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-8 col-lg-8 col-sm-7">
							<blockquote>
								<span class="info-box-number">SELAMAT DATANG DI SISTEM INFORMASI PENGARSIPAN SURAT (SIPS) SDN 26 MATARAM.</span>
								<p>Silahkan pilih menu navigator untuk mempermudah anda dalam bekerja.</p>
							</blockquote>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grafik Data <small>Persentase</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <div class="chart" id="chart" style="height: 100%; width: 100%"></div>
                </div>
            </div>
        </div>

		<div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  	<h2>Log activity <small>Lates Update</small></h2>
                  	<ul class="nav navbar-right panel_toolbox">
                    	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    	<li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  	</ul>
                  	<div class="clearfix"></div>
                </div>
                <div class="x_content bs-example-popovers">
                	<?php
                		$query = "SELECT * FROM surat_masuk ORDER BY id_masuk DESC LIMIT 1";
                		$sql   = mysqli_query($connect, $query);
                		while ($data1 = mysqli_fetch_array($sql)) {
                	?>
                  	<div class="alert alert-success alert-dismissible fade in" role="alert">
                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    	Perihal <strong><u><?php echo $data1['perihal'] ?></u></strong> telah di tambahkan ke Data Surat Masuk pada tanggal <u><?php echo IndonesiaTgl($data1['tanggal_surat']); ?></u>.
                  	</div>
                  	<?php } ?>

					<?php
                		$query = "SELECT * FROM surat_keluar ORDER BY id_keluar DESC LIMIT 1";
                		$sql   = mysqli_query($connect, $query);
                		while ($data2 = mysqli_fetch_array($sql)) {
                	?>                  	
                 	 <div class="alert alert-info alert-dismissible fade in" role="alert">
                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    	Perihal <strong><u><?php echo $data2['perihal']; ?></u></strong> Telah ditambahkan ke Data Surat Keluar pada tanggal <u><?php echo IndonesiaTgl($data2['tanggal_surat']); ?></u>.
                  	</div>
                  	<?php } ?>
				</div>
            </div>
        </div>
	</div>
	