<!DOCTYPE html>
<html lang="">
    <head 1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin|🛩Pengiriman</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">  
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css">  
    </head>


    <body>
        <nav  class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background: #424242">
            <a class="navbar-brand" style="color: #ffffff" href="<?php echo site_url() ?>/AdminPengiriman">Adm🛩 <font color="#FF9739">Pengiriman</font></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminPengiriman">Home</a>
                    </li> 
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/AdminPengiriman/riwayat">Riwayat</a>
                    </li>
                </ul>
                <div class="btn-group" role="group" aria-label="Data baru">
                    <a class="btn-group btn btn-outline-danger " data-toggle="modal" href="#modal_keluar" >Keluar</a>
                </div> 
            </div>
        </nav>
        <br>


        <div class="container-fluid">
            <div class="card">
            <br>
            <div class="card-title" align="center"><h4>Riwayat Pengiriman</h4></div> 
            <div class="card-body">
                <table class="table table-striped table-responsive-md" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Invoice</th> 
                      <th>Total Product</th>  
                      <th>Proses</th> 
                      <th>Status</th>  
                    </tr>
                  </thead>
                  <tbody id="show_data">

                  </tbody>
                </table>

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
        <!-- Modal Keluar End -->
 
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
                    url   : '<?php echo base_url();?>index.php/AdminPengiriman/getRiwayat',
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i; 
                        var jml,selsai;
                        for(i=0; i<data.length; i++){

                            // cek jumlah produk dibeli
                            $.ajax({
                                  async : false,
                                  type  : 'POST',
                                  url   : '<?php echo base_url();?>index.php/HomeCustomer/getInvoiceJumlah',
                                  dataType : 'JSON',
                                  data : {
                                      inv_id:data[i].kd_trans 
                                  },
                                  success : function(data){ 
                                      jml=data[0].jml;
                                  } 
                            });
                            $.ajax({
                                  async : false,
                                  type  : 'POST',
                                  url   : '<?php echo base_url();?>index.php/AdminPengiriman/getInvProduksi',
                                  dataType : 'JSON',
                                  data : {
                                      inv:data[i].kd_trans 
                                  },
                                  success : function(data){ 
                                      selsai=data[0].selesai;
                                  } 
                            });

                        html +=    
                            '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].tgl_trans+'</td>'+
                                '<td>'+data[i].kd_trans+'</td>'+
                                '<td align="center">'+selsai+'/'+jml+'</td>';
                            if (selsai==jml && data[i].status==6) {
                        html += 
                                    '<td>'+data[i].keterangan+'</td>'+ 
                                    '<td><button type="button" class="btn btn-outline-success disabled">selesai</button></td>'+
                                '</tr>';
                            }else{
                                
                                if (data[i].status==7) {
                                html += 
                                    '<td>'+data[i].keterangan+'</td>'+ 
                                    '<td><button type="button" class="btn btn-outline-success" disabled>Selesai</button></td>'+
                                '</tr>';  
                                }else{
                                  html += 
                                      '<td>'+data[i].keterangan+'</td>'+ 
                                      '<td><button type="button" class="btn btn-outline-danger" disabled>menunggu</button></td>'+
                                  '</tr>';
                                    
                                 } 
                            }
                        } 
                        $('#show_data').html(html);    
                        $("#mydata").DataTable({
                            "lengthMenu": [[7,10,15,25,-1],[7,10,15,25,"Semua"]]
                        });             
                    } 
              });
            } 
 


        });
        </script>


    </body>
</html>