<?php $this->load->view('Pemesanan/header'); ?>


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Pesanan Hari Ini</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					 
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
							Cek Bukti Pembayaran Dengan teliti 😁
						</p>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>No Invoice</th>
									<th>Total Harga</th>
									<th>Bukti Transfer</th>
									<th>Verifikasi</th>
								</tr>
							</thead>

							<tbody id="intabel">
								<!-- isi  -->
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
				<label class="col-md-3">Invoice Transaksi</label> <span>:</span>
				<label id="inv_v"></label>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Nama</label> <span>:</span>
				<label id="name_v"></label>
			</div> 
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Total Harga</label> <span>:</span>
				<label id="total_v"></label>
			</div>
			<div class="form-group" style="margin-left: 5%; margin-right: 5%;">
				<label class="col-md-3">Bukti Transfer</label> <span>:</span>
				<img id="img_v" class="img-responsive" src=" "> 
			</div>
			<div class="modal-footer">
				<center>
				<button type="submit" class="btn btn-danger waves-effect waves-light m-r-10" style="margin-right: 10px" id="nonvalid">Tidak Valid</button> 

				<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="isvalid">Valid</button> 
				</center>
			</div>
		</div>

	</div>
</div>
 


<?php $this->load->view('Pemesanan/footer'); ?>