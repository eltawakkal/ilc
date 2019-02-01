<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    //Page header
    public function Header() {
        $headerData = $this->getHeaderData();
        $this->SetFont('aealarabiya', '', 10);
//        $this->SetFont('aealarabiya', 'B', 10);
        $this->writeHTML($headerData['string']);
    }
	 public function Footer() {
        // Position at 25 mm from bottom
       
        // Set font
		//$this -> Line(10, 280, $this -> getPageWidth() - 10, 280);
           //$this->writeHTML($headerData['string']);
		   $this -> writeHTML('<img width="650" height="90"  src="' . base_url() . 'assets/img/receipt.jpg">', true, false, true, false, '');
      
    }
//    var $htmlHeader;
//
//    public function setHtmlHeader($htmlHeader) {
//        $this->htmlHeader = $htmlHeader;
//
//    }

//    public function Header() {
//
//        $this->newline = true;
//        $this->writeHTMLCell(
//            $w = 0, $h = 0, $x = '', $y = '',
//            $this->htmlHeader, $border = 0, $ln = 2, $fill = 0,
//            $reseth = true, $align = 'top', $autopadding = true);
//
////        $this->writeHTML($this->htmlHeader, true, false, true, false, '');
//
//    }

//  


}
