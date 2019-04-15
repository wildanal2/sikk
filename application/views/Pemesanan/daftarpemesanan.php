<?php $this->load->view('Pemesanan/header'); ?>


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Daftar Pesanan</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					 
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
							DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
						</p>
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>No_Transaksi</th>
									<th>Total Harga</th>
									<th>Bukti Transfer</th>
									<th>Verifikasi</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>Dzulfadli</td>
									<td>2345323543234563</td>
									<td>Mbangil City</td>
									<td><img src="<?php echo base_url('/assets/img/download.jpg') ?>"></td>
									<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Verifikasi</button></td>
								</tr>
								<tr>
									<td>Siapa ya</td>
									<td>2345323543234563</td>
									<td>Cari Sendiri</td>
									<td><img src="<?php echo base_url('/assets/img/download.jpg') ?>"></td>
									<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Verifikasi</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-xs-12">
				
			</div>
		</div>	


<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Verifikasi Pemesanan</h4>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Nama</label> <span>:</span>
				<label >Wildhan</label>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">No_Transaksi</label> <span>:</span>
				<label >123455</label>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Total Harga</label> <span>:</span>
				<label >25000000</label>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Bukti Transfer</label> <span>:</span>
				<label><img src="<?php echo base_url('/assets/img/download.jpg')?>"></label>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="sa-success">Valid</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<?php $this->load->view('Pemesanan/footer'); ?>