<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//Clase para escritura archivos xlsx
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//Formato de texto
$tipoString= \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING;

//Agregar otras hojas
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

//Establecer ruta
$ruta= 'archivo/';
$libro= 'librotest.xlsx';
//Crear libro de trabajo
$spreadsheet= new Spreadsheet();

//Acceder al objeto hoja
$sheet= $spreadsheet->getActiveSheet();

$fecha= date("d/m/Y");
$sheet->setCellValue('A1',0.5);
$sheet->setCellValue('A2',10);
$sheet->setCellValue('A3','Fecha:');
$sheet->setCellValue('B3',$fecha);
$sheet->setCellValue('B8','=SUM(A1:A2)');

//Formato texto
$sheet->setCellValueExplicit('B9','=SUM(A1:A2)',$tipoString);
$sheet->setCellValueExplicit('C2','10',$tipoString);

$spreadsheet->createSheet(0); //Primera posicion

$hoja= new Worksheet($spreadsheet,'Hoja3');

//Se agrega al libro
$spreadsheet->addSheet($hoja,0);

$writer= new Xlsx($spreadsheet);

try{
    $writer->save($ruta.$libro);
    echo "Archivo creado";
}
catch(Exception $e){
    echo $e->getMessage();
}
?>