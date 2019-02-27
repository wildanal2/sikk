<form>
    <!-- form inputan nama kegiatan -->
    <div class="form-group col-lg-6">
        <label>Kode Transaksi</label>
        <input type="text" id="namain" class="form-control" placeholder="Masukkan Kode Transaksi" minlength="8" required>
    </div>
    <!-- form inputan date picker -->
    <div class="form-group col-lg-4">
        <label>Tanggal Transaksi</label> 
        <div class="input-daterange input-group" id="datepickerss">
        <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>
    <!-- Read date estimasi -->
    <div class="form-group col-lg-4">
        <label>Tanggal Mulai Produksi</label> 
        <div class="input-daterange input-group" >
        <input type="text" class="form-control" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>
    <div class="form-group col-lg-4">
        <label>Tanggal Selesai Produksi</label> 
        <div class="input-daterange input-group" >
        <input type="text" class="form-control" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>

    <!-- Read date pengiriman -->
    <div class="form-group col-lg-4">
        <label>Tanggal Pengiriman</label> 
        <div class="input-daterange input-group" >
        <input type="text" class="form-control" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>
    <div class="form-group col-lg-4">
        <label>Tanggal Penagihan</label> 
        <div class="input-daterange input-group" >
        <input type="text" class="form-control" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>

    <div class="form-group col-lg-4">
        <label>Tanggal Penerima Pembayaran</label> 
        <div class="input-daterange input-group" >
        <input type="text" class="form-control" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>  
    </div>

    <!-- form inputan pilihan level kegiatan -->
    <div class="form-group col-lg-6">
        <label>Customers</label>
        <select class="form-control" id="level" required="">
                <option disabled selected> Pilih Customers</option>
            <?php foreach ($level as $key) { ?>
                <option value="<?php  echo $key->id ?>"> <?php  echo $key->nama ?> </option>
            <?php }  ?>
        </select>
    </div>

    <hr>
    <div class="form-group col-lg-12">
        <button type="submit" id="btn_push" class="btn btn-success col-md-2">Go</button>
    </div>
    
</form>

<script type="text/javascript">

		$(document).ready(function(){
			 // fungsi date picker tanggal mulai
			var datepickerss= $("#datepickerss");
	        datepickerss.datepicker({ 
                autoclose: true,
			    startDate: "today",  
			    todayHighlight: true
	        }) 

        });
</script>