<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("bahanbaku/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("bahanbaku/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("bahanbaku/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("bahanbaku/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Kode Produksi</th>
										<th>Kode Bahan</th>
										<th>Request</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody id="show_datareq">
									<?php foreach ($pemesanan as $pemesanan): ?>
									<tr>
										<td width="150">
											<?php echo $pemesanan->tanggal_req ?>
										</td>
										<td>
											<?php echo $pemesanan->kd_produksi ?>
										</td>
										<td>
											<?php echo $pemesanan->nama ?>
										</td>
                                        <td>
											<?php echo $pemesanan->request ?>
										</td>
                                        <td> 
                                        	<button class="btn btn-outline-success btn-block btn_belikan" 
                                        	data-id_product="<?php echo $pemesanan->id ?>"
                                        	data-nama="<?php echo $pemesanan->nama ?>" data-jml="<?php echo $pemesanan->request ?>" data-id_req="<?php echo $pemesanan->kd_bahan ?>">Belikan</button>
										</td> 
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("bahanbaku/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("bahanbaku/_partials/scrolltop.php") ?>
	<?php $this->load->view("bahanbaku/_partials/modal.php") ?>

	<?php $this->load->view("bahanbaku/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
