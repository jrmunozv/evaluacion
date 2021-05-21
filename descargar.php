<?php
// Se hace una descarga de xls sin guardar en servidor
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Hola')
    ->setCellValue('B2', 'Mundo!')
    ;
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="salida.xls"');
$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');

?>