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
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css" />
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
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
            <h1>NPCI UPI QR CODE GENERATOR</h1>
            <h3>If you like the script, please scan this QR Code below to pay a small amount to keep going!</h3>                        
            
            <img src ="./public/files/qrcodes/nitin_prakash-icici.png" />
            
        </div>
    </div>
    
    <div class="row">
                
        
            <div class="col-md-12"><h3>UPI QR Code Generator Form</h3> <hr /></div>
        
            <div class="col-md-9">
                
                <?php
                
                $pa = $pn = $am = $tid = $tr = $tn = $url = '';
                
                if( isset($_POST['submit_qr_code']) ){

                    extract( $_POST );
                    
                    $merchant['pn'] = $pn;
                    $merchant['pa'] = $pa;
                    $merchant['am'] = $am;
                    $merchant['tid'] = $tid;
                    $merchant['tr'] = $tr;
                    $merchant['tn'] = $tn;
                    $merchant['url'] = $url;
                    
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
                    
                    $qr_generated = 1;
                                        
                }else{
                    
                    $img = "./public/files/qrcodes/sample.png";
                    
                } ?>
                
                <form class="form-horizontal" id="form-generate-qr-code" data-parsley-validate="true" method="post">            

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-3 control-label" for="pn"><i class="text-danger">*</i> Payee Name</label>  
                  <div class="col-md-9">
                  <input id="pn" name="pn" type="text" placeholder="Enter payee name" class="form-control" required value="<?php echo $pn;?>" />
                  <span class="help-block">( Enter payee name as on bank )</span>  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="pa"><i class="text-danger">*</i> Payee Address</label>  
                  <div class="col-md-9">
                  <input id="pa" name="pa" type="text" placeholder="Enter payee virtual address" class="form-control" required value="<?php echo $pa;?>" />
                  <span class="help-block">( Enter payee virtual address )</span>  
                  </div>
                </div>
                
                <p class="alert alert-info text-center">
                    Following fields below are optional!
                </p>
                
                <div class="form-group">
                  <label class="col-md-3 control-label" for="am"> Payee Amount</label>  
                  <div class="col-md-9">
                  <input id="am" name="am" type="number" placeholder="Enter payee amount" class="form-control" value="<?php echo $am;?>" />
                  <span class="help-block">( Transaction amount in decimal format )</span>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label" for="tid"> Merchant Code</label>  
                  <div class="col-md-9">
                  <input id="mc" name="mc" type="text" placeholder="Enter merchant code" class="form-control" value="<?php echo $tid;?>" />
                  <span class="help-block">( Merchant may acquire the txn id from his PSP )</span>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label" for="tr"> Transaction reference ID </label>  
                  <div class="col-md-9">
                  <input id="tid" name="tid" type="text" placeholder="Enter transaction ID" class="form-control" value="<?php echo $tr;?>" />
                  <span class="help-block">(  Order number, subscription number, Bill ID, booking ID, insurance renewal reference, etc )</span>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label" for="tn"> Transaction note </label>  
                  <div class="col-md-9">
                  <input id="tn" name="tn" type="text" placeholder="Enter transaction note" class="form-control" value="<?php echo $tn;?>" />
                  <span class="help-block">(  Short description of the transaction )</span>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label" for="url"> Reference URL </label>  
                  <div class="col-md-9">
                  <input id="url" name="url" type="url" placeholder="Enter reference URL" class="form-control" value="<?php echo $url;?>" />
                  <span class="help-block">(  URL which provides transaction details )</span>  
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
                    <p> <img id="generated-qr-code" src = "<?php echo $img;?>" /> </p>
                    <p> <a title="Download PNG" data-toggle="tooltip" class="btn btn-sm btn-primary" href="<?php echo $img;?>" download="UPI-QR-Code"><i class="fa fa-image"></i></a> &nbsp;
                        <!-- <a title="Download PDF" data-toggle="tooltip" class="btn btn-sm btn-info" href="<?php echo $img;?>" download="UPI-QR-Code.pdf"><i class="fa fa-file"></i></a> &nbsp; 
                        <a title="Print" data-toggle="tooltip" class="btn btn-sm btn-danger" href="<?php echo $img;?>" download="UPI-QR-Code"><i class="fa fa-print"></i></a> -->
                    </p>
                        
                <div>               

            </div>            
        
    </div>
    
</div>

<!-- Open source code -->

<!-- Compiled and minified JavaScript -->
  <script defer src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script defer src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>  
  <script defer src="//cdnjs.cloudflare.com/ajax/libs/parsley.js/2.6.0/parsley.min.js"></script>
  <script defer>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
  </script>
  
</body>
</html>
