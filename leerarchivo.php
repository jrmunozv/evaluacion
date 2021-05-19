<?php

require 'vendor/autoload.php';
//Leer celdas especificas
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

    public function readCell($column, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        //if ($row == 1 || ($row >= 20 && $row <= 30)) {
        if ($row > 1) {
            return true;
        }
        return false;
    }
}


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = 'Test.xlsx';

/**  Identify the type of $inputFileName  **/
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/**  Create a new Reader of the type that has been identified  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

//Leer desde la funcion
$reader->setReadFilter( new MyReadFilter() );


/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);



$cantidad= $spreadsheet->getActiveSheet()->toArray();
//echo count($cantidad);
echo '<p>En esta pagina se subiran los datos.<p/>';
foreach($cantidad as $row){
    //echo $row[0];
    print_r($row[0]);
    print_r($row[1]);

}


?>