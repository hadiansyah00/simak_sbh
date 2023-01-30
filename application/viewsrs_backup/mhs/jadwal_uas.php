<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">
		<div class="col-lg-3" data-aos="fade-right">
			<img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">

		</div>
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">
                               
			<h3>Tahun Akademik - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama </th>
							<td>:</td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Program Studi </th>
							<td>:</td>
							<td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Semester </th>
							<td>:</td>
							<td><?php echo $mhs['semester']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama Dospem </th>
							<td>:</td>
							<td><?php echo $mhs['nama_dosen']; ?></td>
						</tr>
						<tr>
							<th width="180px"><i class="icofont-rounded-right"></i> Tahun Akademik </th>
							<td>:</td>
							<td>
								<?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>



<p> <a href="<?php echo base_url('mhs/Transkrip/printUAS/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print UAS</a>
</p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Hari</td>
						<td>Waktu</td>
						<td>Ruang</td>
					</tr>
				</thead>

				<tbody>
						<?php
						$i = 1;
						$sksk = 0;
						foreach ($getUas as $row) { ?>
							<?php if ($row->semester == $tahun['semester']) { ?>
								<?php if ($row->smt == $mhs['semester']) {
									$sksk = $sksk + $row->sks; ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row->matakuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->hari_uas; ?>
								<td><?php echo $row->tgl_uas; ?> <?php echo $row->jam_uas; ?></td>
								<td><?php echo $row->ruang_uas; ?></td>
							</tr>
						<?php } ?>
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<br>
	<hr>
	<h4 align="center"> Nilai UAS - <?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></h3>
	<h5 align="center">Tahun Akademik - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>
	<hr>
	
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<th align="center" rowspan="2" align="center">NO</th>
						<th rowspan="2">KODE</th>
						<th rowspan="2">MATAKULIAH</th>
						<th rowspan="2">SKS</th>
						<th rowspan="2">Nilai UAS</th>
						<th rowspan="2">Nilai Akhir</th>


					</tr>
				</thead>

				<tbody>
						<?php
					error_reporting(0);
					$i = 1;
					$sks = 0;
					foreach ($viewKrs as $row) {
						$sks = $sks + $row->sks; ?>
						<?php if ($row->semester == $tahun['semester']) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row->kd_mk; ?></td>
								<td><?php echo $row->matakuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nilai_uas; ?></td>
								<td><?php echo $row->nilai_akhir; ?></td>
							
							</tr>
							<?php

					
							$tot_bobot = $row->sks * $bobot;
							$grand_tot = $grand_tot + $tot_bobot;
							?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<p>
		<b>Jumlah SKS : <?php echo $sks; ?></b>
		<br>
		<!-- <b>Jumlah Total Nilai SKS X AM: <?php echo number_format($tot_bobot2, 2); ?></b> -->
	</p>

</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->


</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
