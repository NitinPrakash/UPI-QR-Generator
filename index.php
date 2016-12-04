<?php include_once('classes/UPI_QR_Generator.php'); 
      include_once('vendor/autoload.php');       
?>
<!DOCTYPE html>

<html>

<head>
  <title>NPCI UPI QR CODE GENERATOR - Coming Soon</title>
  <meta name="description" content="NPCI UPI QR CODE GENERATOR is a PHP Script and class to Generate UPI" />
  <meta name="keywords" content="NCPI CODE GENERATOR,UPI CODE GENERATOR,FREE NCPI CODE GENERATOR,FREE UPI CODE GENERATOR" />
  <meta name="copyright" content="Webcurries.com" />
  <meta name="distribution" content="Global" />
  <meta name="robots" content="INDEX,FOLLOW" />
  <meta name="country" content="IN" />
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile support -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Material Design fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery -->
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

</head>
<body>
          
<!-- main content -->

<div class="container">
    <div class="row" style="margin-top:20%">
        <div class="col-md-12 well text-center">
            <h1>NPCI UPI QR CODE GENERATOR - Coming Soon</h1>
            <h3>This is a work in progress!</h3>
            
            <?php
                $merchant['pn'] = 'Nitin Prakash';
                $merchant['pa'] = 'nitinprakash@icici';
                $qr_code = new UPI_QR_Generator( $merchant );                                                             
                
                $upi_text = $qr_code ->generate_upi_text();
                
                use Endroid\QrCode\QrCode;

                $qrCode = new QrCode();
                $qrCode->setText($upi_text);
                $qrCode->setSize(150);
                $qrCode->setPadding(5);
                $qrCode->setErrorCorrection('high');
                /*    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))*/
                //$qrCode    ->setLabel('Scan the code');
                //$qrCode    ->setLabelFontSize(16);
                //$qrCode->setImageType(QrCode::IMAGE_TYPE_PNG);                              
                
                $qrCode->save('./public/files/qrcodes/qrcode.png');                
                
            ?>
            
            <img src ="./public/files/qrcodes/qrcode.png" />
            
        </div>
    </div>
</div>




<!-- Open source code -->

<!-- Compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
  
</body>
</html>
