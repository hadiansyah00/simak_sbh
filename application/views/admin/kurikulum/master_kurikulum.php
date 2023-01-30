<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-1">
				<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
			</div>
			<div class="box-body col-md-5">
				<table class="table">
					<tbody>
						<?php foreach ($detil as $row) : ?>
							<tr>
								<th>Kode Jurusan</th>
								<td> : </td>
								<td><?php echo $row->kd_jurusan; ?> - <?php echo $row->singkat; ?></td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td> : </td>
								<td><?php echo $row->jenjang; ?> - <?php echo $row->jurusan; ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<th>Tahun Akademik</th>
							<td> : </td>
							<td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
						</tr>
					</tbody>

				</table>
			</div>
		</div>

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Tabel Matakuliah</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Kurikulum"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Kurikulum'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th data-field="no">No</th>
										<th data-field="tahun akademik">Tahun Akademik</th>
											<th data-field="kd_mk">Kode MK</th>
										<th data-field="matakuliah">Matakuliah</th>
										<th data-field="semester">Semester</th>
										<th data-field="sks">SKS</th>
										<th data-field="dosen">Dosen Pengampuh</th>
										<!--<th data-field="hari">Hari</th>-->
										<!--<th data-field="jam">Jam</th>-->
										<!--<th data-field="ruangan">Ruangan</th>-->
										<?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($kurikulum as $row) { ?>
										<?php if ($row->semester == $tahun['semester']) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row->ta; ?></td>
												<td><?php echo $row->kd_mk; ?></td>
												<td><?php echo $row->matakuliah; ?></td>
												<td><?php echo $row->smt; ?></td>
												<td><?php echo $row->sks; ?></td>
												<td><?php echo $row->nama_dosen; ?></td>
												<!--<td><?//php echo $row->hari; ?>-->
												<!--	<hr>-->
												<!--	<?//php echo $row->hari_2; ?>-->
												<!--</td>-->
												<!--<td><?//php echo $row->jam; ?>-->
												<!--	<hr>-->
												<!--	<?//php echo $row->jam_2; ?>-->
												<!--</td>-->
												<!--<td><?//php echo $row->ruangan; ?></td>-->

												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<td>
														<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Kurikulum/delete/' . $row->id_kurikulum); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
													</td>
												<?php } ?>
											</tr>
										<?php } ?>
									
								
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data table area End-->










<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah Kurikulum</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Kurikulum/insert/' . $row->kd_jurusan . '/'); ?>" method="post">
								<?php } ?>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Matakuliah</label>
										</div>
										<div class="col-lg-8">
											<select name="matkul" id="matkul" class="form-control">
												<option> --Pilih Matakuliah-- </option>
												<?php
												foreach ($matkul as $row) { ?>
													<?php if ($row->semester == $tahun['semester']) { ?>
														<option value="<?php echo $row->kd_mk; ?>">SMT <?php echo $row->smt; ?> - <?php echo $row->kd_mk; ?> - <?php echo $row->matakuliah; ?> - SKS <?php echo $row->sks; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen</label>
										</div>
										<div class="col-lg-8">
											<select name="nama_dosen" class="form-control">
												<option> --Dosen Pengajar-- </option>
												<?php
												$dosen = $this->MatkulModel->getDosen()->result();
												foreach ($dosen as $ds) : ?>
													<option value="<?php echo $ds->id_dosen; ?>"><?php echo $ds->nama_dosen; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<!--<div class="form-group-inner">-->
								<!--	<div class="row">-->
								<!--		<div class="col-lg-4">-->
								<!--			<label class="login2 pull-left pull-left-pro">Hari</label>-->
								<!--		</div>-->
								<!--		<div class="col-lg-8">-->
								<!--			<select name="hari" class="form-control">-->
								<!--				<option> --Pilih Hari-- </option>-->
								<!--				<option value="Senin"> Senin </option>-->
								<!--				<option value="Selasa"> Selasa </option>-->
								<!--				<option value="Rabu"> Rabu </option>-->
								<!--				<option value="Kamis"> Kamis </option>-->
								<!--				<option value="Jumat"> Jumat </option>-->
								<!--			</select>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->


								<!--<div class="form-group-inner">-->
								<!--	<div class="row">-->
								<!--		<div class="col-lg-4">-->
								<!--			<label class="login2 pull-left pull-left-pro">Jam</label>-->
								<!--		</div>-->
								<!--		<div class="col-lg-8">-->
								<!--			<select name="jam" class="form-control">-->
								<!--				<option> --Pilih Jam-- </option>-->
								<!--				<option value="08.00 - 08.50"> 08.00 - 08.50 </option>-->
								<!--				<option value="08.50 - 09.40"> 08.50 - 09.40 </option>-->
								<!--				<option value="10.30 - 11.20"> 10.30 - 11.20</option>-->
								<!--				<option value="11.20 - 12.10"> 11.20 - 12.10 </option>-->
								<!--				<option value="13.00 - 13.50"> 13.00 - 13.50 </option>-->
								<!--				<option value="13.50 - 14.40"> 13.50 - 14.40 </option>-->
								<!--				<option value="14.40 - 15.30"> 14.40 - 15.30</option>-->
								<!--				<option value="15.30 - 16.20"> 15.30 - 16.20 </option>-->
								<!--				<option value="16.20 - 17.10"> 16.20 - 17.10</option>-->
								<!--				<option value="18.30 - 19.20"> 18.30 - 19.20 </option>-->
								<!--				<option value="19.20 - 20.10"> 19.20 - 20.10 </option>-->
								<!--				<option value="20.10 - 21.00"> 20.10 - 21.00</option>-->
								<!--			</select>-->


								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->

								<!--<div class="form-group-inner">-->
								<!--	<div class="row">-->
								<!--		<div class="col-lg-4">-->
								<!--			<label class="login2 pull-left pull-left-pro">Hari ke-2</label>-->
								<!--		</div>-->
								<!--		<div class="col-lg-8">-->
								<!--			<select name="hari_2" class="form-control">-->
								<!--				<option> --Pilih Hari-- </option>-->
								<!--				<option value="Senin"> Senin </option>-->
								<!--				<option value="Selasa"> Selasa </option>-->
								<!--				<option value="Rabu"> Rabu </option>-->
								<!--				<option value="Kamis"> Kamis </option>-->
								<!--				<option value="Jumat"> Jumat </option>-->
								<!--			</select>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="form-group-inner">-->
								<!--	<div class="row">-->
								<!--		<div class="col-lg-4">-->
								<!--			<label class="login2 pull-left pull-left-pro">Jam ke-2</label>-->
								<!--		</div>-->
								<!--		<div class="col-lg-8">-->
								<!--			<select name="jam_2" class="form-control">-->
								<!--				<option> --Pilih Jam-- </option>-->
								<!--				<option value="08.00 - 08.50"> 08.00 - 08.50 </option>-->
								<!--				<option value="08.50 - 09.40"> 08.50 - 09.40 </option>-->
								<!--				<option value="10.30 - 11.20"> 10.30 - 11.20</option>-->
								<!--				<option value="11.20 - 12.10"> 11.20 - 12.10 </option>-->
								<!--				<option value="13.00 - 13.50"> 13.00 - 13.50 </option>-->
								<!--				<option value="13.50 - 14.40"> 13.50 - 14.40 </option>-->
								<!--				<option value="14.40 - 15.30"> 14.40 - 15.30</option>-->
								<!--				<option value="15.30 - 16.20"> 15.30 - 16.20 </option>-->
								<!--				<option value="16.20 - 17.10"> 16.20 - 17.10</option>-->
								<!--				<option value="18.30 - 19.20"> 18.30 - 19.20 </option>-->
								<!--				<option value="19.20 - 20.10"> 19.20 - 20.10 </option>-->
								<!--				<option value="20.10 - 21.00"> 20.10 - 21.00</option>-->
								<!--			</select>-->


								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->


								<!--<div class="form-group-inner">-->
								<!--	<div class="row">-->
								<!--		<div class="col-lg-4">-->
								<!--			<label class="login2 pull-left pull-left-pro">Ruangan</label>-->
								<!--		</div>-->
								<!--		<div class="col-lg-8">-->
								<!--			<select name="ruangan" class="form-control">-->
								<!--				<option> --Ruangan-- </option>-->
								<!--				<option value="Ruang 01"> Ruang 01 </option>-->
								<!--				<option value="Ruang 02"> Ruang 02 </option>-->
								<!--				<option value="Ruang 03"> Ruang 03</option>-->
								<!--				<option value="Ruang 04 "> Ruang 04 </option>-->
								<!--				<option value="Ruang 05 "> Ruang 05 </option>-->
								<!--				<option value="Ruang 06"> Ruang 06 </option>-->
								<!--				<option value="Lab. Komputer"> Lab. Komputer </option>-->
								<!--				<option value="Lab. Bahasa Inggris"> Lab. Bahasa Inggris </option>-->
								<!--				<option value="Daring "> Daring </option>-->
								<!--			</select>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->

						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
					<div class="col-lg-4">
					</div>
				</div>
				<br><br>
			</div>
			</form>
		</div>
	</div>
</div>