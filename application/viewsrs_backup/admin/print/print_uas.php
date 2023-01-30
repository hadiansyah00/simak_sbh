<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Transkrip</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace.min.css" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<?php error_reporting(0); ?>
	<br>
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="center"><img style="width: 170px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>"></div>
				<!-- <h3 class="text-center">STIKES BOGOR HUSADA</h3> -->
				<h4 class="text-center">Kartu Ujian Akhir Semester  - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h4>
				<table class="table">
					<tbody>
						<!-- <tr>
							<td rowspan="6" style="width: 210px;">\
								<img style="width: 170px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
							</td>
						</tr> -->
						<tr>
							<th style="width: 110px;">Nama</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">NIM</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nim']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Jurusan</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Semester</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['semester']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Tahun Akademik</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?></td>
						</tr>
					</tbody>
				</table>


			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th align="center" rowspan="2" align="center">NO</th>
							<th rowspan="2">Kode MK</th>
							<th rowspan="2">Matakuliah</th>
							<th rowspan="2">SKS</th>
							<th rowspan="2">Ruangan</th>
							<th rowspan="2">Tanggal</th>
							<th rowspan="2">Pengawas</th>
							<th rowspan="2">Paraf</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$sksk = 0;
						foreach ($getUts as $row) { ?>
							<?php if ($row->semester == $tahun['semester']) { ?>
								<?php if ($row->smt == $mhs['semester']) {
									$sksk = $sksk + $row->sks; ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row->kd_mk; ?></td>
										<td><?php echo $row->matakuliah; ?></td>
										<td><?php echo $row->sks; ?></td>
										<td><?php echo $row->ruang_uas; ?></td>
										<td><?php echo $row->tgl_uas; ?> <?php echo $row->hari_uas; ?><hr> <?php echo $row->jam_uas; ?>
										<td></td>
										<td></td>

									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				<p>
					<b>Jumlah SKS : <?php echo $sksk; ?></b>
				</p>
				<p>

				</p>
			</div>
		</div>
	</div>


</body>
<script type="text/javascript">
	window.print();
</script>

</html>
