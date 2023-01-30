<div class="income-order-visit-user-area">
	<div class="container-fluid">
		<div class="sparkline8-list shadow-reset">
			<div class="sparkline8-hd">
				<div class="row">
					<div class="col-lg-12">

						<a href="<?php echo base_url('admin/mahasiswa')?>">
							<div class="col-lg-6">
								<div class="income-dashone-total shadow-reset nt-mg-b-30">
									<div class="income-title">
										<div class="main-income-head">
											<h2>Jumlah Mahasiswa</h2>
											<div class="main-income-phara">

											</div>
										</div>
									</div>
									<div class="income-dashone-pro">
										<div class="income-rate-total">
											<div class="price-adminpro-rate">
												<h2><span class="counter">
														<?php echo $this->db->get('mahasiswa')->num_rows(); ?>
													</span></h2>
											</div>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa</p>
											</div>


											<br>
											<h2><span class="counter">
													<?php echo $bidan; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Bidan</p>
											</div>

											<br>
											<h2><span class="counter">
													<?php echo $farmasi; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Farmasi</p>
											</div>

											<br>
											<h2><span class="counter">
													<?php echo $gizi; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Gizi</p>
											</div>



											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<div class="col-lg-6">
							<div class="income-dashone-total shadow-reset nt-mg-b-30">
								<div class="income-title">
									<div class="main-income-head">
										<h2> Status Mahasiswa</h2>
										<div class="main-income-phara">

										</div>
									</div>
								</div>
								<div class="income-dashone-pro">
									<div class="income-rate-total">
										<div class="price-adminpro-rate">
											<h2><span class="counter">
													<?php echo $aktif; ?>
												</span></h2>
										</div>
										<div class="price-graph">
											<span><i class="fa fa-users fa-4x"></i></span>
										</div>
										<div class="income-range order-cl">
											<p>Total Mahasiswa</p>
										</div>
										<div class="clear"></div>


										<br>
										<h2><span class="counter">
												<?php echo $status; ?>
											</span></h2>
										<div class="price-graph">
											<span><i class="fa fa-users fa-4x"></i></span>
										</div>
										<div class="income-range order-cl">
											<p>Total Mahasiswa Tidak Akfif</p>
										</div>

										<br>
										<h2><span class="counter">
												<?php echo $aktif; ?>
											</span></h2>
										<div class="price-graph">
											<span><i class="fa fa-users fa-4x"></i></span>
										</div>
										<div class="income-range order-cl">
											<p>Total Mahasiswa Akfif</p>
										</div>





										<br>
										<h2>
											<font color="white"><span class="counter"></font>

									</div>
								</div>
							</div>
						</div>
					</div>
			



			<!-- comand baris 2 -->
			<div class="row">

					<a href="<?php echo base_url('admin/dosen')?>">
					<div class="col-lg-4">
						<div class="income-dashone-total shadow-reset nt-mg-b-30">
							<div class="income-title">
								<div class="main-income-head">
									<h2>Dosen</h2>
									<div class="main-income-phara">

									</div>
								</div>
							</div>
							<div class="income-dashone-pro">
								<div class="income-rate-total">
									<div class="price-adminpro-rate">
										<h2><span class="counter">
												<?php echo $this->db->get('dosen')->num_rows(); ?>
											</span></h2>
									</div>
									<div class="price-graph">
										<span><i class="fa fa-users fa-4x"></i></span>
									</div>
									<div class="income-range order-cl">
										<p>Total Dosen</p>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
					<a href="<?php echo base_url('admin/matakuliah')?>">
					<div class="col-lg-4">
						<div class="income-dashone-total shadow-reset nt-mg-b-30">
							<div class="income-title">
								<div class="main-income-head">
									<h2>Matakuliah</h2>
									<div class="main-income-phara">

									</div>
								</div>
							</div>
							<div class="income-dashone-pro">
								<div class="income-rate-total">
									<div class="price-adminpro-rate">
										<h2><span class="counter">
												<?php echo $this->db->get('matakuliah')->num_rows(); ?>
											</span></h2>
									</div>
									<div class="price-graph">
										<span><i class="fa fa-file fa-4x"></i></span>
									</div>
									<div class="income-range order-cl">
										<p>Total Matakuliah</p>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
					<a href="<?php echo base_url('admin/jurusan')?>">
					<div class="col-lg-4">
						<div class="income-dashone-total shadow-reset nt-mg-b-30">
							<div class="income-title">
								<div class="main-income-head">
									<h2>Jurusan</h2>
									<div class="main-income-phara">

									</div>
								</div>
							</div>
							<div class="income-dashone-pro">
								<div class="income-rate-total">
									<div class="price-adminpro-rate">
										<h2><span class="counter">
												<?php echo $this->db->get('jurusan')->num_rows(); ?>
											</span></h2>
									</div>
									<div class="price-graph">
										<span><i class="fa fa-university fa-4x"></i></span>
									</div>
									<div class="income-range order-cl">
										<p>Total Jurusan</p>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>




		</div>
	</div>
</div>

</div>
</div>

<script>
	// DATA DASHBOARD
</script>

<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>