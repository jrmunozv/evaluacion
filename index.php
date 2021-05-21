<?php

require 'vendor/autoload.php';

require_once 'plantillas/reporte/index.php';

$css= file_get_contents('plantillas/reporte/style.css');


$mpdf= new \Mpdf\Mpdf([

]);

$plantilla= getPlantilla();

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();

?>