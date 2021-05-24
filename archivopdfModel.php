<?php

//class Generacion
//{
//public function generarpdf()
//{
    require_once("includes/config.php");
    require "vendor/autoload.php";

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    use PhpOffice\PhpSpreadsheet\Reader\Xls;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //Este es una copia de la plantilla para el respectivo usuario
    $rutaorigen= "plantillas/";
    $rutadestino= "datos/";
    $archivoplantilla= "AnalisisRazonado.xlsx";
    $archivofinal= $_SESSION["archivo"];//"AnalisisRazonado".date("Ymd").time();
    $extension= ".xlsx";


    if (copy($rutaorigen.$archivoplantilla, $rutadestino.$archivofinal.$extension)) {
        //echo 'Se ha copiado el archivo corretamente';
    }
    else {
        //echo 'Se produjo un error al copiar el fichero';
    }

    $archivoexcel= $rutadestino.$archivofinal.$extension;

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet = $reader->load("$archivoexcel"); 


    //echo 'Archivo pdf creado.';


    try
    {
        
        //$spread = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //$sheet->setTitle("Plantilla");
        $sheet->setCellValueByColumnAndRow(3, 1, $_SESSION["archivo"]);
        $sheet->setCellValueByColumnAndRow(8, 10, "999999");
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        //$sheet->setCellValue("B4", "Valor B4");
        $writer->save("$archivoexcel");
        
    } catch (\Exception $e) {
       // echo 'Ocurrió un error al intentar abrir el archivo.' . $e;
    }  
        


    //Creacion del writer pdf
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');

    //Salvataggio del pfd
    //$pdf_path = 'pdf_finali/'.$name.'.pdf';
    $writer->setSheetIndex(3);
    $archivopdf= $rutadestino.$archivofinal.".pdf";
    $writer->save($archivopdf);



    session_destroy();
    //echo json_encode(array('success' => 1));

    
        
//}

//}

?>