<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kost.ku</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styleku.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- GOOGLE FONTS--> 
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
     
</head>
<body style="background-color: #5a5050">
  
    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 20px;background-color: #FFF">
            <div class="card">
                <img class="img-responsive" src="<?=base_url()?>assets/img/logo.png">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <span style="color: #27AB27;font-weight: 700">Rp. 40.000/bln</span>
                </div>
                <div style="margin-left: 8px;">
                    <button class="tagcampur btn">Campur</button>
                </div>

                <div style="font-weight: 700; font-size: 18px; margin-left: 10px; margin-top: 5px ">
                    <a href="" style="color: #3e5168;">Asdd</a>
                </div>
                <br><br>
                <a style="text-decoration: none; color: #2d2d2d;" href="<?php echo site_url('/Kostku/lihat_kost/')?>'+data[i].id_k+'">
                    <button class="btn btn-group-justified">Hubungi Kost Ini</button>
                </a>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>