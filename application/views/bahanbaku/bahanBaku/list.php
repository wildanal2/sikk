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
						<a href="<?php echo site_url('bahanbaku/bahanBaku/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Stock</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($bahanBakuu as $bahanbaku): ?>
									<tr>
										<td width="150">
											<?php echo $bahanbaku->nama ?>
										</td>
										<td>
											<?php echo $bahanbaku->stok ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('bahanbaku/bahanBaku/edit/'.$bahanbaku->id_bahan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('bahanbaku/products/delete/'.$bahanbaku->id_bahan) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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

</body>

</html>