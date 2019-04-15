        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin-template/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/admin-template/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script> 
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/admin-template/build/js/custom.min.js')?>"></script> 

    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/admin-template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            show();

            function show(){
                $.ajax({
                    async : true,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/AdminPemesanan/getTransaksinow',
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i; 
                        for(i=0; i<data.length; i++){   
                        html +=     
                            '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].kd_trans+'</td>'+
                                '<td>Rp. '+data[i].total+'</td>'+
                                '<td><img class="img-responsive" style="height: 100px;" src="<?php echo base_url("/assets/images/'+data[i].bukti+'")?>"></td>';
                                if (data[i].status==1) {
                                    html +=
                                     '<td><button type="button" class="btn btn-info" data-id_inv="'+data[i].kd_trans+'" data-nama="'+data[i].nama+'" data-total="'+data[i].total+'" data-bukti="'+data[i].bukti+'">Verifikasi</button></td>';
                                }else if (data[i].status==2) {
                                    html +=
                                     '<td><button type="button" class="btn btn-danger disabled" >Ditolak</button></td>';
                                }else if (data[i].status==3) {
                                    html +=
                                     '<td><button type="button" class="btn btn-success disabled">Diteruskan</button></td>';
                                }
                        html += 
                            '</tr>';    
                        }
                        $('#intabel').html(html);              
                    } 
              });
            } 
            

            // detail modal
            $('#intabel').on('click','.btn-info',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
              var id_inv = $(this).data('id_inv');
              var nama = $(this).data('nama');
              var total = $(this).data('total');
              var bukti = $(this).data('bukti');

              document.getElementById("name_v").innerHTML = nama;
              document.getElementById("inv_v").innerHTML = id_inv;
              document.getElementById("total_v").innerHTML = "Rp. "+total;
              document.getElementById("img_v").src = '<?php echo base_url("/assets/images/'+bukti+'")?>';

              $('#myModal').modal('show');
                
            });


            $('#isvalid').on('click',function(){ 
                var inv = document.getElementById("inv_v").innerHTML;

                $.ajax({ 
                    async : false,
                    url : "<?php echo base_url();?>index.php/AdminPemesanan/setValid",
                    method : "POST",
                    data : {inv : inv},
                    success :function(data){
                        alert("sukses");
                        setTimeout(' window.location.href = "<?php echo site_url('AdminPemesanan'); ?>" ');
                    }
                });
            });

            $('#nonvalid').on('click',function(){ 
                var inv = document.getElementById("inv_v").innerHTML;

                $.ajax({ 
                    async : false,
                    url : "<?php echo base_url();?>index.php/AdminPemesanan/setInvalid",
                    method : "POST",
                    data : {inv : inv},
                    success :function(data){
                        alert("sukses");
                        setTimeout(' window.location.href = "<?php echo site_url('AdminPemesanan'); ?>" ');
                    }
                });
            });



        });
    </script>

  </body>
  </html>
