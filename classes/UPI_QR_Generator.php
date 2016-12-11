<?php
/*
 * NCPI UPI Documentation - http://www.npci.org.in/documents/UPILinkingSpecificationsVersion10draft.pdf
 * 
 * UPI_QR_Generator
 * Version 1.0
 * 
 */
/**
 * UPI_QR_Generator Class can be used to generate upi qr codes from Payee Information which is based on NPCI Standards.
 *
 * @author Nitin Prakash
 * @author-website http://webcurries.com/
 * @author-email nitin247@outlook.com
 * 
 */
class UPI_QR_Generator {
    //put your code here
    
    public $merchant; // Merchant/Payee Name ( Required )    
    public $upi;
    public $upi_qr;
    
    public function __construct( $merchant = NULL ){
        
        if( empty( $merchant['pa'] ) && empty( $merchant['pn'] ) ){
            throw new Exception('Payee Name or Payee Address cannot be empty!');
        }else{
            $this->merchant = $merchant;           
            
            $this->upi = 'upi://pay?';
        }
        
    }
    
    public function generate_upi_text(){
        
        return $this->upi_qr = $this->upi . http_build_query($this->merchant);
        
    }
    
   /* 
    * 
    * This functionality is under development
    * 
    * public function upi_text_to_qr(){
        
        $qr = new BarcodeQR(); 
        
        $this->pr($qr);
        
        $qr->text( 'HELLO' );        
        
    }
    */
    
    public function pr($str){
        echo '<pre>';print_r( $str ); echo '</pre>';
    } 
}
