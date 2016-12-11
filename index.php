<?php include_once('classes/UPI_QR_Generator.php'); 
      include_once('vendor/autoload.php');
      use Endroid\QrCode\QrCode;
?>
<!DOCTYPE html>

<html>

<head>
  <title>NPCI UPI QR CODE GENERATOR</title>
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
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/assets/css/custom.css">

  <!-- jQuery -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-88805197-1', 'auto');
    ga('send', 'pageview');

  </script>

</head>
<body>
          
<!-- main content -->

<div class="container">
    <div class="row" style="margin-top:2%">
        <div class="col-md-12 text-center">
            <h1>NPCI UPI QR CODE GENERATOR - Coming Soon</h1>
            <h3>This is a work in progress!</h3>                        
            
            <img src ="./public/files/qrcodes/nitin_prakash-icici.png" />
            
        </div>
    </div>
    
    <div class="row">
                
        
            <div class="col-md-12"><h3>UPI QR Code Generator Form</h3> <hr /></div>
        
            <div class="col-md-9">
                
                <?php
                
                $pa = $pn = '';
                
                if( isset($_POST['submit_qr_code']) ){

                    extract( $_POST );
                    
                    $merchant['pn'] = $pn;
                    $merchant['pa'] = $pa;
                    $qr_code = new UPI_QR_Generator( $merchant );                                                             

                    $upi_text = $qr_code ->generate_upi_text();                                

                    $qrCode = new QrCode();
                    $qrCode->setText($upi_text);
                    $qrCode->setSize(200);
                    $qrCode->setPadding(5);
                    $qrCode->setErrorCorrection('high');
                    //$qrCode   ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
                    //$qrCode    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
                    //$qrCode    ->setLabel('Scan the code');
                    //$qrCode    ->setLabelFontSize(16);
                    //$qrCode->setImageType(QrCode::IMAGE_TYPE_PNG);                              

                    $qrCode->save('./public/files/qrcodes/temp.png');
                    
                    $img = './public/files/qrcodes/temp.png';
                    
                    
                }else{
                    
                    $img = "./public/files/qrcodes/sample.png";
                    
                } ?>
                
                <form class="form-horizontal" id="form-generate-qr-code" data-parsley-validate="true" method="post">            

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-3 control-label" for="pa">Payee Name</label>  
                  <div class="col-md-9">
                  <input id="pa" name="pn" type="text" placeholder="Enter payee name" class="form-control" required value="<?php echo $pn;?>" />
                  <span class="help-block">( Enter payee name as on bank )</span>  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="pa">Payee Address</label>  
                  <div class="col-md-9">
                  <input id="pa" name="pa" type="text" placeholder="Enter payee virtual address" class="form-control" required value="<?php echo $pa;?>" />
                  <span class="help-block">( Enter payee virtual address )</span>  
                  </div>
                </div>

                <!-- Button -->

                <div class="form-group">
                  <label class="col-md-3 control-label" for="generate-qr">Generate Qr Code</label>
                  <div class="col-md-9">
                      <button type="submit" name="submit_qr_code" id="generate-qr" name="generate-qr" class="btn btn-success">Submit</button>
                  </div>
                </div>


                </form>
            </div>

            <div class="col-md-3 text-center" align="center">
                
                <div>                      
                        <img id="generated-qr-code" src = "<?php echo $img;?>" />                    
                <div>               

            </div>            
        
    </div>
    
</div>

<!-- Open source code -->

<!-- Compiled and minified JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>  
  <script src="//cdnjs.cloudflare.com/ajax/libs/parsley.js/2.6.0/parsley.min.js"></script>
  
</body>
</html>
