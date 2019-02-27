
<div style="background: #DFF0D8;">
    <form>
    <!-- form inputan nama kegiatan -->
    <div class="col-lg-12">
        <div class="form-group col-lg-6">
            <label>Nama Barang</label>
            <input type="text" id="namain" class="form-control" placeholder="Masukkan Kode Transaksi" minlength="8" required>
        </div>   
    </div> 
    <div class="col-lg-12">
        <div class="form-group col-lg-4">
            <label>Harga Barang</label> 
                <div class="input-daterange input-group">
                <input type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group col-lg-12">
        <div class="col-lg-6">
        <button type="submit" id="btn_push" class="btn btn-success col-md-2">Simpan</button>
        </div>
    </div> 
    </form>
</div>

<div class="card-body">
    <div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Agenda</a></div>

    <table class="table table-striped table-bordered table-responsive-md tblcus" style="width:100%" id="barangcontainer">
        <thead>
            <tr style="background-color: #E8E8E8;">
                <th style="width: 5%;">No</th>
                <th style="text-align: center; width: 15%;">Kode barang</th>
                <th style="text-align: center; width: 30%;">nama</th> 
                <th style="text-align: center; width: 20%">harga</th>
                <th style="text-align: center; width: 10%">Edit</th>
                <th style="text-align: center; width: 10%">Hapus</th>
            </tr>
        </thead>
        <tbody id="tbl_barang" style="text-align: center;">
            
        </tbody> 
    </table>
</div>

<script type="text/javascript">

		$(document).ready(function(){
			mainm();

            function mainm() {
                $.ajax({
	            	async: false,
	                type : "ajax",
	                url   : '<?php echo site_url(); ?>/Admin/getbarang',
	                dataType : 'json', 
	                success : function(data){  
	                    var html=''; 
	                    for(i=0; i<data.length; i++){ 
	                    	a=i+1; 
		                    html +=	
                                '<tr>'+
                                    '<td>'+a+'</td>'+
		                            '<td>'+data[i].kd_barang+'</td>'+
		                            '<td>'+data[i].nama_barang+'</td>'+
		                            '<td>'+data[i].harga+'</td>'+ 
		                            '<td>'+
                            		'<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_k="'+data[i].kd_barang+'">Ubah</a>'+
                            		'</td>'+
                            		'<td>'+
                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_k="'+data[i].kd_barang+'">Hapus</a>'+
                            		'</td>'+
	                            '</tr>';
	                    }   
	                    $("#barangcontainer").DataTable().destroy();
            			$('tbody').empty();
	                    // memasukkan hatml agenda ke id tbl & set datatables
	                    $('#tbl_barang').html(html);
	                    $("#barangcontainer").DataTable({
	                    		destroy:true,
						        "lengthMenu": [[4,7, 14,-1], [4,7, 14, "Semua"]]
						    }); 
	                }
	            }); 
            }

        });
    </script>