<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">

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
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>




		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped ">
				<thead class="table-dark">
			
									<tr>
										<th data-field="no">No</th>
										<th data-field="tgl_bayar">Tanggal Pembayaran</th>
										<th data-field="angsuran">Pembayaran</th>
								
										
									</tr>
								</thead>
								<tbody>
								    
									<?php $i = 1;
									    $sisa = 0;
                                	error_reporting(0);
									   $total_cicilan = 0;
									foreach ($viewAdm as $row) { 
									    
								    	$total_cicilan = $total_cicilan + $row->angsuran;
								    	?>
									
											<tr>
												<td><?php echo $i++; ?></td>
											
												<td><?php echo format_indo($row->tgl_bayar, date('Y-m-d')); ?></td>
												<td>Rp. <?php echo number_format($row->angsuran,0,',','.'); ?>,-</td>
										
											
												<?php 
											
												$sisa = $row->total - $total_cicilan 
												?>
											
											    
											<?php } ?>
											 
											</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Total Pembayaran</strong></td>
							      <td colspan="2"> <strong>Rp. <?php echo number_format($total_cicilan,0,',','.'); ?>,-</strong></td>
								</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Jumlah Pembayaran</strong></td>
							      <td colspan="2"> <strong>Rp. <?php  echo number_format($row->total,0,',','.'); ?>,-</strong></td>
								</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Sisa Pembayaran</strong></td>
							      <td colspan="2"> <strong>Rp. <?php echo number_format($sisa ,0,',','.'); ?>,-</strong></td>
								</tr>

								</tbody>
			</table>
		</div>
	</div>
<br>
	

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
