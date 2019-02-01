<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {
    private $header;
    private $footer;
    function __construct($header = '', $footer = '') {
        parent::__construct();
        $this -> header = $header;
        $this -> footer = $footer;
    }

    public function Header() {

        $this -> SetFont('trado', 'B', 15);
        $this -> writeHTML($this -> header, true, false, false, false, '');
       // $this -> Line(10, 37, $this -> getPageWidth() - 10, 37);
       // $this -> Line(10, 36.5, $this -> getPageWidth() - 10, 36.5);
        /// border
      /*  $this -> SetLineStyle(array('width' => .4, 'color' => array(0, 0, 0)));
        $this -> Line(2, 2, $this -> getPageWidth() - 2, 2);
        $this -> Line($this -> getPageWidth() - 2, 2, $this -> getPageWidth() - 2, $this -> getPageHeight() - 2);
        $this -> Line(2, $this -> getPageHeight() - 2, $this -> getPageWidth() - 2, $this -> getPageHeight() - 2);
        $this -> Line(2, 2, 2, $this -> getPageHeight() - 2);*/


    }
	
	

    public function Footer() {

        // Position at 25 mm from bottom
        $this -> SetY(-15);
        // Set font
        $this -> SetFont('trado', 'B', 15);
		//$this -> Line(10, 280, $this -> getPageWidth() - 10, 280);
        $this -> writeHTML($this -> footer, true, false, false, false, '');
      
    }

}
?>