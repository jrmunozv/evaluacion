<?php
// Se hace una descarga de xlsx sin guardar en servidor
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Hola')
    ->setCellValue('B2', 'Mundo!')
    ;
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="salida.xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>