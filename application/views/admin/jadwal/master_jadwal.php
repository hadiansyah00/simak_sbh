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
							<h1>Tabel Jadwal</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Jadwal"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Jadwal'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
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
										<th data-field="matakuliah">Matakuliah</th>
										<th data-field="semester">Semester</th>
										<th data-field="sks">SKS</th>
										<th data-field="koordinator">Koordinator</th>
										<th data-field="dosen">Pengajar</th>
										<th data-field="hari">Hari</th>
										<th data-field="jam">Jam</th>
										<th data-field="ruangan">Ruangan</th>
										<?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($jd as $row) { ?>
										<?php if ($row->semester == $tahun['semester']) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row->matakuliah; ?></td>
												<td><?php echo $row->smt; ?></td>
												<td><?php echo $row->sks; ?></td>
												<td><?php echo $row->koordinator; ?></td>
												<td><?php echo $row->nama_dosen; ?>
													<hr>
													<?php echo $row->koordinator_2; ?>
													<hr>
													<?php echo $row->koordinator_3; ?>
												</td>
												<td><?php echo $row->hari; ?>
													<hr>
													<?php echo $row->hari_2; ?>
												</td>
												<td><?php echo $row->jam; ?>
													<hr>
													<?php echo $row->jam_2; ?>
												</td>
												<td><?php echo $row->ruangan; ?></td>

												<td>
												<!--<a class="btn-sm btn-info" data-toggle="modal" data-target="#modal-edit"> <i class="fa fa-pencil"></i>-->
												<!--		</a>-->
												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
														<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Jadwal/delete/' . $row->id_jadwal); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
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
				<h4 class="modal-title">Form Tambah Jadwal</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Jadwal/insert/' . $row->kd_jurusan . '/'); ?>" method="post">
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
														<option value="<?php echo $row->kd_mk; ?>">SMT <?php echo $row->smt; ?> - <?php echo $row->matakuliah; ?> - SKS <?php echo $row->sks; ?></option>
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
												<option> --Dosen Pengajar 1-- </option>
												<?php
												$dosen = $this->MatkulModel->getDosen()->result();
												foreach ($dosen as $ds) : ?>
													<option value="<?php echo $ds->id_dosen; ?>"><?php echo $ds->nama_dosen; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
									<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Koordinator</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator" class="form-control">
												<option value=""> --Dosen Koordinator-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen 2</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator_2" class="form-control">
												<option value=""> --Dosen Pengajar 3-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen 3</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator_3" class="form-control">
												<option value=""> --Dosen Pengajar 3-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Hari</label>
										</div>
										<div class="col-lg-8">
											<select name="hari" class="form-control">
												<option></option>
												<option value="Senin"> Senin </option>
												<option value="Selasa"> Selasa </option>
												<option value="Rabu"> Rabu </option>
												<option value="Kamis"> Kamis </option>
												<option value="Jumat"> Jumat </option>
												<option value="Sabtu"> Sabtu </option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jam</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="jam" placeholder="08.30 - 09.10">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Hari ke-2</label>
										</div>
										<div class="col-lg-8">
											<select name="hari_2" class="form-control">
												<option></option>
												<option value="Senin"> Senin </option>
												<option value="Selasa"> Selasa </option>
												<option value="Rabu"> Rabu </option>
												<option value="Kamis"> Kamis </option>
												<option value="Jumat"> Jumat </option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jam ke-2</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="jam_2" placeholder="08.30 - 09.10">

										</div>
									</div>
								</div>


								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Ruangan</label>
										</div>
										<div class="col-lg-8">
											<select name="ruangan" class="form-control">
												<option> --Ruangan-- </option>
												<option value="1.1"> Ruang 01 </option>
												<option value="1.2"> Ruang 02 </option>
												<option value="1.3"> Ruang 03</option>
												<option value="1.4 "> Ruang 04 </option>
												<option value="1.5"> Ruang 05 </option>
												<option value="1.6"> Ruang 06 </option>
												<option value="Caregiver"> Caregiver </option>
												<option value="1.1/1.4"> Ruang 1.1/1.4 </option>
												<option value="2.2"> Ruang 2.2 </option>
												<option value="Daring "> Daring </option>
											</select>
										</div>
									</div>
								</div>

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

<div id="modal-edit" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Edit Jadwal</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Jadwal/insert/' . $row->kd_jurusan . '/'); ?>" method="post">
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
														<option value="<?php echo $row->kd_mk; ?>">SMT <?php echo $row->smt; ?> - <?php echo $row->matakuliah; ?> - SKS <?php echo $row->sks; ?></option>
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
												<option> --Dosen Pengajar 1-- </option>
												<?php
												$dosen = $this->MatkulModel->getDosen()->result();
												foreach ($dosen as $ds) : ?>
													<option value="<?php echo $ds->id_dosen; ?>"><?php echo $ds->nama_dosen; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
									<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Koordinator</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator" class="form-control">
												<option value=""> --Dosen Koordinator-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen 2</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator_2" class="form-control">
												<option value=""> --Dosen Pengajar 3-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen 3</label>
										</div>
										<div class="col-lg-8">
											<select name="koordinator_3" class="form-control">
												<option value=""> --Dosen Pengajar 3-- </option>
												<option value="Mukhlisiana Ahmad,SST.,M.Kes"> Mukhlisiana Ahmad,SST.,M.Kes</option>
												<option value="Yuanita Viva AD., SST., S Pd.,M.Kes"> Yuanita V. AD., SST., S Pd.,M.Kes</option>
												<option value="Lia Indria Sari, SST., M.Kes"> Lia Indria Sari, SST., M.Kes</option>
												<option value="Riana Ulfah, S SiT., M.KM"> Riana Ulfah, S SiT., M.KM</option>
												<option value="Lala Jamilah, M.Keb"> Lala Jamilah, M.Keb</option>
												<option value="Nunik H., S SiT., M.Kes"> Nunik H., S SiT., M.Kes</option>
												<option value="Lussy Citra Resmi, M.Pd"> Lussy Citra Resmi, M.Pd</option>
												<option value="apt. Anna Uswatun, M.Farm"> apt. Anna Uswatun, M.Farm</option>
												<option value="apt. Rahmadhani Tyas, M.Farm"> apt. Rahmadhani Tyas, M.Farm</option>
												<option value="Ilham Maulana, M.Farm"> Ilham Maulana, M.Farm</option>
												<option value="Aden Dhana Rizkita, M.Si"> Aden Dhana Rizkita, M.Si</option>
												<option value="apt. Delviza Syari, M.Farm"> apt. Delviza Syari, M.Farm</option>
												<option value="dr. Martinasari Lubis, MARS"> dr. Martinasari Lubis, MARS</option>
												<option value=" Ahmad Hisbullah, M.Si"> Ahmad Hisbullah, M.Si</option>
												<option value="Rahmi Dzulhijjah, M.Gz"> Rahmi Dzulhijjah, M.Gz</option>
												<option value="Dendy Widianto, M.Kes"> Dendy Widianto, M.Kes </option>
												<option value="Ksatria Widya Dwinugraha, M.Si"> Ksatria Widya Dwinugraha, M.Si</option>
												<option value="Ezria Ekafadhina Adyas, M.Sc"> Ezria Ekafadhina Adyas, M.Sc</option>
												<option value="Dwikani Oklita Anggiruling, M.Si"> Dwikani Oklita Anggiruling, M.Si</option>
												<option value="R. Andriadi Achmad, M.IP"> R. Andriadi Achmad, M.IP</option>
												<option value="Dr. Jeffry Rustandi, M.KM"> Dr. Jeffry Rustandi, M.KM</option>
												<option value="Sutisna, M.Ag"> Sutisna, M.Ag</option>
												<option value=" Rahmatul Qadriah, M.Farm"> Rahmatul Qadriah, M.Farm</option>
												<option value="Dr. Mega Safithri, M.Si"> Dr. Mega Safithri, M.Si</option>
												<option value=" Dr. Dimas Andrianto, M.Si"> Dr. Dimas Andrianto, M.Si</option>
												<option value="Febriani Sabatini, M.Psi"> Febriani Sabatini, M.Psi</option>
												<option value="Sandi Hardiansyah, S.Kom"> Sandi Hardiansyah, S.Kom</option>
												<option value="Sulistyawati, S.KM., M.KM"> Sulistyawati, S.KM., M.KM</option>
												<option value="Dr. H. Riadi Yanto, M.M">Dr. H. Riadi Yanto, M.M</option>
												<option value="Adhy Winawan, M.H"> Adhy Winawan, M.H</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Hari</label>
										</div>
										<div class="col-lg-8">
											<select name="hari" class="form-control">
												<option></option>
												<option value="Senin"> Senin </option>
												<option value="Selasa"> Selasa </option>
												<option value="Rabu"> Rabu </option>
												<option value="Kamis"> Kamis </option>
												<option value="Jumat"> Jumat </option>
												<option value="Sabtu"> Sabtu </option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jam</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="jam" placeholder="08.30 - 09.10">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Hari ke-2</label>
										</div>
										<div class="col-lg-8">
											<select name="hari_2" class="form-control">
												<option></option>
												<option value="Senin"> Senin </option>
												<option value="Selasa"> Selasa </option>
												<option value="Rabu"> Rabu </option>
												<option value="Kamis"> Kamis </option>
												<option value="Jumat"> Jumat </option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jam ke-2</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="jam_2" placeholder="08.30 - 09.10">

										</div>
									</div>
								</div>


								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Ruangan</label>
										</div>
										<div class="col-lg-8">
											<select name="ruangan" class="form-control">
												<option> --Ruangan-- </option>
												<option value="Ruang 01"> Ruang 01 </option>
												<option value="Ruang 02"> Ruang 02 </option>
												<option value="Ruang 03"> Ruang 03</option>
												<option value="Ruang 04 "> Ruang 04 </option>
												<option value="Ruang 05 "> Ruang 05 </option>
												<option value="Ruang 06"> Ruang 06 </option>
												<option value="Lab. Komputer"> Lab. Komputer </option>
												<option value="Lab. Bahasa Inggris"> Lab. Bahasa Inggris </option>
												<option value="Lahan Praktik"> Lahan Praktik </option>
												<option value="Daring "> Daring </option>
											</select>
										</div>
									</div>
								</div>

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
