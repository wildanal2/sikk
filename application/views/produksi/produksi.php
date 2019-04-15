<!DOCTYPE html>
<html lang="">
    <head 1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin|🧩Produksi</title>

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->
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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminProduksi/produksi">Produksi</a>
                    </li>
                    <li class="nav-item">
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
            <br>
            <div class="card-title" align="center"><h4>Daftar Produksi</h4></div> 
            <div class="card-body">
                <table class="table table-striped table-responsive-md" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>tanggal</th> 
                      <th>product</th>  
                      <th>jumlah</th> 
                      <th>status</th>  
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody id="show_data">

                  </tbody>
                </table>

            </div>
            </div>

            <div class="card" id="mdetail" style="display: none;">
            <br>
            <div class="row">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h4 align="center">Detail Produksi</h4>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <button type="button" align="center" class="btn btn-outline-danger" id="bclose">X</button> 
                </div>  
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-text" align="center" style="margin-top: 5px"><h5 id="judulformula"></h5></div>
                        <hr style="margin-top: -2px; margin-bottom: -10px">
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bahan</th>
                                        <th>kebutuhan</th>
                                    </tr>
                                </thead>
                                <tbody id="show_detailformula"> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-2">Id Product</label><span>:</span>
                                <label id="dtl_idp"></label> <br>
                                <label class="col-sm-2">Product</label><span>:</span>
                                <label id="dtl_prod"></label> <br>
                                <label class="col-sm-2">Jumlah Produksi</label><span>:</span>
                                <label id="dtl_jmlah"></label> <br>

                            </div>
                            <table class="table table-hover table-bordered table-responsive-sm">
                              <thead>
                                <tr align="center">
                                  <th>No</th>
                                  <th>Bahan</th> 
                                  <th>keperluan</th>
                                  <th>stok</th>  
                                  <th>status</th>
                                  <th>keterangan</th>  
                                </tr>
                              </thead>
                              <tbody id="show_detailkebutuhan" align="center">

                              </tbody>
                            </table>
 
                            <div align="right">
                            Status Produksi  :  &nbsp&nbsp&nbsp 
                            <button style="display: none;" class="btn btn-info" id="mulaiprod">Mulai Produksi</button>
                            <button class="btn btn-danger" id="mulaiprod_f" disabled>Mulai Produksi</button>
                            </div>
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
                        <h4 class="modal-title" align="center">Mulai Produksi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    </div>
                    <div class="form-group" style="margin-left: 5%; margin-top: 10px;">
                        <label class="col-md-3">Product</label> <span>:</span>
                        <label id="nama_p"></label><br>
                        <label class="col-md-3">jumlah</label> <span>:</span>
                        <label id="jumlah_p"></label> 
                    </div> 
                    <div class="modal-footer" align="center">
                        <center>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-r-10" style="margin-right: 10px" data-dismiss="modal">batal</button> 

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="mulaiupload">mulai produksi</button> 
                        </center>
                    </div>
                </div>

            </div>
        </div>
        <!-- end Modal Mulaiprod -->
        
        <!-- modal request bahan -->
        <div id="myreq" class="modal fade" role="dialog">
            <div class="modal-dialog"> 
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h4 class="modal-title" align="center">Request Bahan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    </div>
                    <div class="form-group" style="margin-left: 5%; margin-top: 10px;">
                        <label class="col-md-3">Bahan Baku</label> <span>:</span>
                        <label id="nama_bb"></label><br>
                        <label class="col-md-3">jumlah Dibutuhkan</label> <span>:</span>
                        <input type="text" name="jumlah_bb" id="jumlah_bb"></input>
                    </div> 
                    <div class="modal-footer" align="center">
                        <center>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-r-10" style="margin-right: 10px" data-dismiss="modal">batal</button> 

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="requpload">Request Bahan</button> 
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- end mod req -->

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

        <nav class="navbar navbar-fixed-bottom navbar-light bg-faded">
          <a class="navbar-brand" href="#"></a>
        </nav>
 <!-- Bootstrap core & jQuery JavaScript
        ================================================== -->
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script>  
        
        <script type="text/javascript">
        $(document).ready(function(){ 
            show();
            let datai =null;
            let sisa =[];
            let id_product = null;
            let kur =false;
            let id_req = null;
            let name_req = null;
            let juml= null;

            function show(){
                $.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/AdminProduksi/getProcessProduksi',
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i; 
                        for(i=0; i<data.length; i++){   
                        html +=     
                            '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].tgl_produksi+'</td>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>'+data[i].jumlah+'</td>'+
                                '<td>'+data[i].keterangan+'</td>'+
                                '<td><button type="button" class="btn btn-info" '+
                                    'data-idproduk="'+data[i].id_produk+'"'+
                                    'data-nama="'+data[i].nama_barang+'"'+
                                    'data-jumlah="'+data[i].jumlah+'"'+ 
                                    'data-kdbarang="'+data[i].kd_barang+'"'+ 
                                    '>lihat</button></td>'+
                            '</tr>';    
                        } 
                        $('#show_data').html(html);    
                        $("#mydata").DataTable({
                            "lengthMenu": [[5,10,15,25,-1],[5,10,15,25,"Semua"]]
                        });            
                    } 
              });
            } 

            // detail modal show
            $('#show_data').on('click','.btn-info',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
              id_product = $(this).data('idproduk');
              var nama = $(this).data('nama');
              let jumlah = $(this).data('jumlah'); 
              var kd_barang = $(this).data('kdbarang');  
              let htmldetail=null;
              sisa =[]; //mengosongkan isi array sisa
              
              document.getElementById("judulformula").innerHTML="Formula ("+nama+")";
              document.getElementById("dtl_prod").innerHTML=nama;
              document.getElementById("nama_p").innerHTML=nama;
              document.getElementById("dtl_idp").innerHTML=id_product;
              document.getElementById("dtl_jmlah").innerHTML= jumlah;
              document.getElementById("jumlah_p").innerHTML= jumlah;

              // detail produk terpilih
              $.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/AdminProduksi/getDetailProduksi',
                    dataType : 'JSON',
                    data : {id: kd_barang},
                    success : function(data){
                        var html = '';
                        var i; 
                        for(i=0; i<data.length; i++){    
                        html +=  
                            '<tr>'+
                                '<td>'+(i+1) +'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].jumlah_bahan+'</td>'+  
                            '</tr>'; 
                        }
                        datai=data;
                        $('#show_detailformula').html(html);    
                    } 
              });

              // menampilkan  bahan baku di gudang
              for (let i = 0; i < datai.length; i++) {
                  // alert(datai[i].nama);
                  $.ajax({
                        async : false,
                        type  : 'POST',
                        url   : '<?php echo base_url();?>index.php/AdminProduksi/getBahanBaku',
                        dataType : 'JSON',
                        data : {id: datai[i].kd_bahan},
                        success : function(data){ 
                            for(ii=0; ii<data.length; ii++){    
                            htmldetail +=  
                                '<tr>'+
                                    '<td>'+(i+1) +'</td>'+
                                    '<td>'+data[ii].nama+'</td>'+
                                    '<td>'+(datai[i].jumlah_bahan*jumlah)+'('+datai[i].jumlah_bahan+'x'+jumlah+')</td>'+
                                    '<td>'+data[ii].stok+'</td>';
                                if ((datai[i].jumlah_bahan*jumlah)<=data[ii].stok) {
                            htmldetail +=  
                                    '<td><label style="color: #50C97E;">Pass</label></td>'+
                                    '<td>-</td>';
                                }else{
                            htmldetail +=  
                                    '<td><label style="color: #EF143E;">Kurang</label></td>'+
                                    '<td><button class="btn btn-outline-warning btn-block btn_req"'+
                                      'data-jumlreq="'+((datai[i].jumlah_bahan*jumlah)-data[ii].stok)+'"'+ 
                                      'data-idbhn="'+data[ii].id_bahan+'"'+
                                      'data-name_req="'+data[ii].nama+'"'+ 
                                    '>request</button></td>';
                                }
                            htmldetail +=  
                                    
                                '</tr>';
                            var si = (data[ii].stok-(datai[i].jumlah_bahan*jumlah));
                            // alert(si);
                            sisa.push([datai[i].id_bahan,si,data[ii].nama]); 
                            }      
                        } 
                  });
              }
              $('#show_detailkebutuhan').html(htmldetail);
              

              // Cek bila ada kurang
              kur =false;
              for (var i = 0; i < sisa.length; i++) {
                  if (sisa[i][1]<0) {
                      kur =true;
                  }
              }

              if (kur==true) { 
                document.getElementById("mulaiprod").style.display = 'none';
                document.getElementById("mulaiprod_f").style.display = 'block';
              }else{
                document.getElementById("mulaiprod_f").style.display = 'none';
                document.getElementById("mulaiprod").style.display = 'block';
              }


              // tampilan
              document.getElementById("mainn").style.display = 'none';
              document.getElementById("mdetail").style.display = 'block';
            });//end

            
            // Request modal show
            $('#show_detailkebutuhan').on('click','.btn_req',function(){
              id_req = $(this).data('idbhn');
              name_req = $(this).data('name_req'); 
              juml = $(this).data('jumlreq'); 

              document.getElementById("nama_bb").innerHTML = name_req;
              document.getElementById("jumlah_bb").value = juml;
              $('#myreq').modal('show');
            });//end requpload
            $('#requpload').on('click',function(){ 
                $.ajax({
                      async : false,
                      type  : 'POST',
                      url   : '<?php echo base_url();?>index.php/AdminProduksi/reqBahanBaku',
                      dataType : 'JSON',
                      data : {
                          kd_bahan:id_req,
                          kd_produksi:id_product,
                          jumlah:juml,
                      },
                      success : function(data){ 
                          alert("selesai");
                          setTimeout(' window.location.href = "<?php echo site_url('AdminProduksi/produksi'); ?>" ');
                      } 
                });
            });


            $('#bclose').on('click',function(){
                document.getElementById("mdetail").style.display = 'none';
                document.getElementById("mainn").style.display = 'block'; 
                $(".table").DataTable().destroy();
                show();
            });


            $('#mulaiprod').on('click',function(){ 
                $('#myModal').modal('show');
            });

            // upload bahanbaku
            $('#mulaiupload').on('click',function(){ 

                 for (let i = 0; i < sisa.length; i++) {    
                    $.ajax({
                        async : false,
                        type  : 'POST',
                        url   : '<?php echo base_url();?>index.php/AdminProduksi/gunakanbahanbaku',
                        dataType : 'JSON',
                        data : {
                            id_bahan: sisa[i][0],
                             sisa:sisa[i][1]
                        },
                        success : function(data){  
                        } 
                  });
                }

                $.ajax({
                      async : false,
                      type  : 'POST',
                      url   : '<?php echo base_url();?>index.php/AdminProduksi/produksiSelesai',
                      dataType : 'JSON',
                      data : {
                          id_p:id_product 
                      },
                      success : function(data){ 
                          alert("selesai");
                          setTimeout(' window.location.href = "<?php echo site_url('AdminProduksi/produksi'); ?>" ');
                      } 
                });

            });
 


        });
        </script>


    </body>
</html>