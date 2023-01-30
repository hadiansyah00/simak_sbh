<!-- setting krs-->

<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan1'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Aktivasi KRS Mahasiswa</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Tahun Akademik"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('bauk/mahasiswa'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
										<th>No</th>
										<th data-field="status">Status KRS</th>
										<th data-field="status_uts">Status UTS</th>
										<th data-field="status_uas">Status UAS</th>
										<th data-field="nim">NIM</th>
										<th data-field="nama_mhs">Nama Mahasiswa</th>
										<th>Aktivasi KRS</th>
											<th>Aktivasi UTS</th>
												<th>Aktivasi UAS</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($mhs as $row) :

									?>
										<tr>
										    <!--Aktivasi KRS-->
											<td><?php echo $i++; ?></td>
											<td>
												<?php if ($row->status == 0) {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} else {
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif KRS
                                                     </span>";
												} ?>
											</td>
											<!--Aktivasi UTS-->
											<td>
												<?php if ($row->status_uts == 0) {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} else {
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif UTS
                                                     </span>";
												} ?>
											</td>
											<!--Aktivasi UAS-->
												<td>
												<?php if ($row->status_uas == 0) {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} else {
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif UAS
                                                     </span>";
												} ?>
											</td>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs; ?></td>
											<td>
												<?php if ($row->status == 0) { ?>
													<a class="btn-sm btn-success" href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setKrs/' . $row->id_mahasiswa); ?>"><i class="fa fa-check"></i></a>
													</a>
													</a>
												<?php } else{  ?>
													<a href='<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setKrsN/' . $row->id_mahasiswa); ?>' class='btn-warning btn-sm'>
														<i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
														
													</a>
												<?php } ?>
												
												
											</td>
											<!--Status UTS-->
											<td>
												<?php if ($row->status_uts == 0) { ?>
													<a class="btn-sm btn-success" href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUts/' . $row->id_mahasiswa); ?>"><i class="fa fa-check"></i></a>
													</a>
													</a>
												<?php } else{  ?>
													<a href='<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUtsn/' . $row->id_mahasiswa); ?>' class='btn-warning btn-sm'>
														<i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
													
													</a>
												<?php } ?>
												
												
											</td>
											<!--Status UAS-->
											<td>
												<?php if ($row->status_uas == 0) { ?>
													<a class="btn-sm btn-success" href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUas/' . $row->id_mahasiswa); ?>"><i class="fa fa-check"></i> </a>
													</a>
													</a>
												<?php } else{  ?>
													<a href='<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUasn/' . $row->id_mahasiswa); ?>' class='btn-warning btn-sm'>
													<i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
														
													</a>
												<?php } ?>
												
												
											</td>
										
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">

									<div class="sparkline8-outline-icon">
										<span>Total Tahun Akademik : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>
									</div>
									<br>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
