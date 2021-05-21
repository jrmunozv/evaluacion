<?php

require 'vendor/autoload.php';

$mpdf= new \Mpdf\Mpdf([

]);

$mpdf->writeHtml("<p>Hola Mundo</p>",\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output();

?>