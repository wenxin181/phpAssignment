<?php
/**
 * @author Sim Hui Ming
 */
?>
<?php

class StaffXSLTTransformation {
  
  public function __construct($xmlfilename, $xslfilename) {
    $xml = new DOMDocument();
    $xml->load($xmlfilename);
    
    $xsl = new DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}
//
//$staff = new XSLTTransformation("Staff.xml", "Staff.xsl");
?>
