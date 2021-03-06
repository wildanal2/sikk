<!DOCTYPE html>
<html lang="">
    <head 1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin|🧩Produksi</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">  
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css">  
    </head>


    <body>
        <nav  class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background: #333333">
            <a class="navbar-brand" style="color: #ffffff" href="<?php echo site_url() ?>/AdminProduksi">Admin🧩Produksi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminProduksi">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminProduksi/produksi">Produksi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminProduksi/formula">Formula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminProduksi/riwayat">Riwayat</a>
                    </li>
                </ul>
                <div class="btn-group" role="group" aria-label="Data baru">
                    <a class="btn-group btn btn-outline-danger " data-toggle="modal" href="#modal_keluar" >Keluar</a>
                </div> 
            </div>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="card" id="mainn"> 
            <div class="card-title" align="center" style="margin-top: 22px"><h4>Formula🧪Produk</h4></div> 
            <hr>
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive-md" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Produk</th> 
                      <th>deskripsi</th> 
                      <th>detail</th>  
                    </tr>
                  </thead>
                  <tbody id="show_data">

                  </tbody>
                </table>

            </div>
            </div>


            <div class="card" id="mdetail" style="display: none;">
            <br>
            <div class="card-title" align="center"><h4>Formula🧪Produk</h4></div> 
            <hr>
            <div class="card-body row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                   <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" id="img_selected"/>
                    </div>
                   </div> 
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                   <div class="card">
                    <div class="card-header">info</div>
                    <div class="card-body">
                       <label class="col-md-3">Nama Produk</label> <span>:</span>
                       <label id="nama_lprod"></label><br>
                       <label class="col-md-3">Deskripsi</label> <span>:</span>
                       <label id="desc_lprod"></label><br>

                    </div>
                   </div> 
                   <br>
                   <div class="card">
                    <div class="card-header">Daftar Bahan</div>
                    <div class="card-body">
                         <table class="table table-striped table-bordered table-responsive-md">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>bahan</th> 
                              <th>jumlah</th> 
                              <th>aksi</th>  
                            </tr>
                          </thead>
                          <tbody id="data_formula">

                          </tbody>
                        </table>
                    </div>
                   </div> 

                </div>

            </div>
            </div>

        </div>



        <!-- modal sure -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Verifikasi Produksi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    </div>
                    <div class="form-group" style="margin-left: 5%; margin-top: 10px;">
                        <label class="col-md-3">Product</label> <span>:</span>
                        <label id="nama_p"></label><br>
                        <label class="col-md-3">jumlah</label> <span>:</span>
                        <label id="jumlah_p"></label>
                        <input type="hidden" id="iddd" value="">
                        <input type="hidden" id="kd_brg" value="">
                    </div> 
                    <div class="modal-footer">
                        <center>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-r-10" style="margin-right: 10px" data-dismiss="modal">batal</button> 

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="mulaiupload">mulai produksi</button> 
                        </center>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Keluar -->
        <form id="form_keluar">
            <div class="modal fade" id="modal_keluar" style="background-color:currentColor; " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="judul_p"><b> Peringatan !! </b></h5> 
                  </div>

                  <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3" id="tanggal_m">Apakah yakin ingin keluar ?</label>    
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default col-md-3" data-dismiss="modal" aria-label="Close">Batal</button>
                    <?php echo anchor('account/logout', 'Keluar', array('class' => 'btn btn-danger col-md-3')); ?>
                  </div>
                  
                </div>
              </div>
            </div>  
        </form>

 <!-- Bootstrap core & jQuery JavaScript
        ================================================== -->
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script>  
        
        <script type="text/javascript">
        $(document).ready(function(){ 
            show(); 

            function show(){
                $.ajax({
                    async : true,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/AdminProduksi/produklist',
                    dataType : 'json',
                    success : function(data){
                        var html = ''; 
                        var i; 
                    for(i=0; i<data.length; i++){   
                            let datai =null;
                            // get detail formula item selected
                            $.ajax({
                                    async : false,
                                    type  : 'POST',
                                    url   : '<?php echo base_url();?>index.php/AdminProduksi/formulaProduk',
                                    dataType : 'JSON',
                                    data : {id: data[i].kd_barang},
                                    success : function(dataa){ 
                                        datai=dataa;    
                                    } 
                              });

                        html +=     
                            '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>';
                        for (var io = 0; io < datai.length; io++) {
                            html += ''+datai[io].nama+':'+datai[io].jumlah_bahan+' | ';
                        }
                        html += 
                                '</td>'+ 
                                '<td><button type="button" class="btn btn-info" '+
                                'data-id_p="'+data[i].kd_barang+'"'+
                                'data-nama="'+data[i].nama_barang+'"'+
                                'data-foto="'+data[i].foto+'"'+
                                'data-desk="'+data[i].deskripsi+'"'+
                                '>Detail Formula</button></td>'+
                            '</tr>';    
                    }
                        $('#show_data').html(html);  
                        $("#mydata").DataTable({
                            "lengthMenu": [[10,15,25,-1],[10,15,25,"Semua"]]
                        });            
                    } 
              });
            } 


            // detail modal show
            $('#show_data').on('click','.btn-info',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel
              document.getElementById("mdetail").style.display = 'block';
              document.getElementById("mainn").style.display = 'none';   
              
              var id_p = $(this).data('id_p'); 
              var nama = $(this).data('nama'); 
              var foto = $(this).data('foto'); 
              var desk = $(this).data('desk'); 
              
              document.getElementById("nama_lprod").innerHTML=nama;
              document.getElementById("desc_lprod").innerHTML=desk;
              document.getElementById("img_selected").src = '<?php echo base_url("/assets/images/products/'+foto+'")?>';
              $.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/AdminProduksi/formulaProduk',
                    dataType : 'JSON',
                    data : {id:id_p},
                    success : function(data){ 
                        var html = ''; 
                        var i; 
                        for(i=0; i<data.length; i++){ 
                            html +=     
                            '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].jumlah_bahan+'</td>'+
                                '<td><button class="btn btn-outline-warning">ubah</button></td>'+
                            '</tr>';
                        }
                        html +=    '<tr><td></td><td><button class="btn btn-outline-success">Bahan Baru</button></td></tr>'
                        $('#data_formula').html(html); 
                    }
              });


            });



        });
        </script>


    </body>
</html>