
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIK || Barang Shop</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/foundation.css" />
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">SIK | Barang Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="<?php echo site_url('Home')?>">Home</a></li>
          <li class='active'><a href="<?php echo site_url('Home/cart')?>">View Cart</a></li>
          <li><a href="<?php echo site_url('Home/transaksi')?>">Transaksi</a></li>
          <li><a href="account.php">My Account</a></li>
          <li><a href="'.site_url('Account/logout').'">Log Out</a></li>
          ?>
        </ul>
      </section>
    </nav>

<div class="container">

    <div style="margin-top:10px;">
      <div class=""> 
        <h4>Shopping Cart</h4>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="detail_cart">
            <?php 
              $no = 0;
              foreach ($this->cart->contents() as $items) {
                  $no++;
                echo '<tr>
                          <td><h4><strong>'.$items['name'].'</strong></h4></td>
                          <td>'.number_format($items['price']).'</td>
                          <td>'.$items['qty'].'</td>
                          <td>'.number_format($items['subtotal']).'</td>
                          <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Hapus</button></td>
                      </tr>';
              }

              echo '
                  <tr>
                      <th colspan="3">Total</th>
                      <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
                  </tr>';
              ?>

            </tbody>
             
        </table>

        <div align="right"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open modal</button>
        </div>

      </div>
    </div>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; Barang Shop. All Rights Reserved.</p>
        </footer>
      </div>
    </div>


<!--MODAL Baru-->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <?php  ?>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label for="usr">Kode Transaksi:</label> 
              <input type="text" class="form-control" id="usr" readonly="">
            </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          
        </div>
      </div>
    </div>
<!--END MODAL baru-->


</div>

    <script src="<?php echo base_url() ?>assets/js/vendor/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/foundation.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
              
            //Hapus Item Cart
            $(document).on('click','.hapus_cart',function(){
                var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Home/hapus_cart",
                    method : "POST",
                    data : {row_id : row_id},
                    success :function(data){
                        setTimeout(' window.location.href = "<?php echo site_url('Home/cart'); ?>" ');
                    }
                });
            });
        });
    </script>
</body>
</html>
