<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//Establecer ruta
$ruta= 'archivo/precios.xlsx';

//Para extension especifica
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

$spreadsheet= $reader->load($ruta);

//Se establece la hoja
//getActiveSheet obtiene hoja activa, por lo genral es la primera
//getSheet(1)= segunda hoja
$sheet= $spreadsheet->getActiveSheet();
//$sheet= $spreadsheet->getSheet(0);
//$sheet= $spreadsheet->getSheetByName("hojaprecios");

echo '<table border="1" cellpadding="8" style="margin-left:250px;">';
foreach ($sheet->getRowIterator(1,3) as $row){ //numero entre parentesis indica desde que fila comienza o comienza y termina
    $cellIterator= $row->getCellIterator("b","c"); //Itera por columnas
    $cellIterator->setIterateOnlyExistingCells(false); //false itera celdas vacias tambien
    echo '<tr>';
    foreach($cellIterator as $cell){
        if(!is_null($cell)){
            $value= $cell->getCalculatedValue();
            echo '<td>'.$value.'</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
echo '<hr><br>';
echo '<table border="1" cellpadding="8" style="margin-left:250px;">';
foreach ($sheet->getRowIterator(2,5) as $row){
    $descripcion= $sheet->getCellByColumnAndRow(2,$row->getRowIndex());
    $precio= $sheet->getCellByColumnAndRow(3,$row->getRowIndex());
    $celdax= "Sin valor";
    if($sheet->cellExistsByColumnAndRow(7,$row->getRowIndex())){
        $celdax= $sheet->getCellByColumnAndRow(7,$row->getRowIndex());
        $celdax=$celdax->getValue();
    }

    echo '<tr><td>'.$descripcion.'</td><td>'.$precio.'</td><td>'.$celdax.'</td></tr>';
}
echo '</table>';
?>