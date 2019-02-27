<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css"> 

     <!-- FONTAWESOME STYLES-->
    <link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
     
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu"> 
                    <li class="active-link">
                        <a href="#" id="transaksi" ><i class="fa fa-desktop "></i>Transaksi Pemesanan</a>
                    </li>
                    <li>
                        <a href="#" id="pemesanan"><i class="fa fa-table "></i>Pemesanan</a>
                    </li>
                    <li>
                        <a href="#" id="barang"><i class="fa fa-edit "></i>Barang</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>Transaksi</a>
                    </li>
                      
                </ul>
            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2 id="selectmenu">...</h2>   
                    </div>
                </div>               
                <hr> 
                <div id="maincontainer"> 

                </div> 
                <hr>
            </div>
        </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
    
    <script type="text/javascript">

		$(document).ready(function(){
			
            $("li").click(
                function(event) {
                $('li').removeClass('active-link');
                $(this).addClass('active-link');
                event.preventDefault()
                }
            );

            main();
            function main() {
                document.getElementById("selectmenu").innerHTML = "Transaksi Baru"; 
                $("#maincontainer").load('<?php echo site_url(); ?>/Admin/newtransaksi');
            }

            $("#transaksi").click(function(){
                main();
            });

            $("#pemesanan").click(function(){
                document.getElementById("selectmenu").innerHTML = "Pemesanan"; 
                $("#maincontainer").load('<?php echo site_url(); ?>/Admin/pemesanan'); 
            });

            $("#barang").click(function(){
                document.getElementById("selectmenu").innerHTML = "Barang"; 
                $("#maincontainer").load('<?php echo site_url(); ?>/Admin/barang'); 
            });

        });
    </script>

</body>
</html>
