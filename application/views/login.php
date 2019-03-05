
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIK || Barang Shop</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/foundation.css" />
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr.js"></script>
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
          <li><a href="<?php echo site_url('Home/cart')?>">View Cart</a></li>
          <?php
              if(isset($_SESSION['username'])){
                echo '<li><a href="orders.php">My Orders</a></li>';
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="'.site_url('Account/logout').'">Log Out</a></li>';
              }
              else{
                echo '<li class="active"><a href="'.site_url('Account/login').'">Log In</a></li>'; 
              }
          ?>
        </ul>
      </section>
    </nav>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        
        <form method="POST" action="verify.php" style="margin-top:30px;">
          <div class="row">
            <div class="small-8">

              <div class="row">
                <div class="small-4 columns">
                  <label for="right-label" class="right inline">Email</label>
                </div>
                <div class="small-8 columns">
                  <input type="email" id="right-label" placeholder="nayantronix@gmail.com" name="username">
                </div>
              </div>
              <div class="row">
                <div class="small-4 columns">
                  <label for="right-label" class="right inline">Password</label>
                </div>
                <div class="small-8 columns">
                  <input type="password" id="right-label" name="pwd">
                </div>
              </div>

              <div class="row">
                <div class="small-4 columns">

                </div>
                <div class="small-8 columns">
                  <input type="submit" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;"> 
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; BOLT Sports Shop. All Rights Reserved.</p>
        </footer>
      </div>
    </div>

    <script src="<?php echo base_url() ?>assets/js/vendor/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
