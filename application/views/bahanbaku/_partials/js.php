<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/admin_bahanbaku/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_bahanbaku/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/admin_bahanbaku/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/admin_bahanbaku/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_bahanbaku/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_bahanbaku/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/admin_bahanbaku/js/sb-admin.min.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('assets/admin_bahanbaku/js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_bahanbaku/js/demo/chart-area-demo.js') ?>"></script>


<script type="text/javascript">
    $(document).ready(function(){ 
    	let id_product=null;
    	let jumlah=null;
    	let idreq=null;

    	$('#show_datareq').on('click','.btn_belikan',function(){
          // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
          id_product = $(this).data('id_product');
          var nama = $(this).data('nama');
          jumlah = $(this).data('jml');  
          idreq = $(this).data('id_req');  

          document.getElementById("name_v").innerHTML = nama;
          document.getElementById("jumlah_req").innerHTML = jumlah; 

          $('#belikanModal').modal('show');
        });

        $('#mulaibeli').on('click',function(){ 
        		// alert(id_product+":"+jumlah+":"+idreq);
                $.ajax({ 
                    async : false,
                    url : "<?php echo base_url();?>index.php/AdminProduksi/tambahbahanbaku",
                    method : "POST",
                    data : {
                            id_bahan : idreq,
                            sisa : jumlah, 
                            id_req : id_product, 
                        },
                    success :function(data){
                        alert("sukses");
                        setTimeout(' window.location.href = "<?php echo site_url('AdminBahanBaku'); ?>" ');
                    }
                });

            });


	});
</script>