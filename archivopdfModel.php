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

    //use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //Rutas
    $rutaorigen= "plantillas/";
    $rutadestino= "datos/";
    //$archivofinal= $_SESSION["archivo"];//"AnalisisRazonado".date("Ymd").time();
    $archivofinal= $_POST['sufijoarchivo'];



    //Este es una copia de la plantilla para el respectivo usuario
    $archivoplantilla= "analisisrazonado.xlsx";
    $extension= ".xlsx";


    if (copy($rutaorigen.$archivoplantilla, $rutadestino.$archivofinal.$extension)) {
        //echo 'Se ha copiado el archivo corretamente';
    }
    else {
        //echo 'Se produjo un error al copiar el fichero';
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    //Leer los datos del archivo de datos subido por el usuario
    $archivodatos= "datos".$archivofinal.".xlsx";
    $exceldatos= $rutadestino.$archivodatos;


    //Para extension especifica
    $reader1 = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet1= $reader1->load($exceldatos);

    //Se establece la hoja
    //getActiveSheet obtiene hoja activa, por lo genral es la primera
    //getSheet(1)= segunda hoja
    //$sheet= $spreadsheet->getActiveSheet();
    //$sheet1= $spreadsheet1->getSheet(0);
    $sheet1= $spreadsheet1->getSheetByName("Balance");
    //Datos de la empresa
    $balc1= $sheet1->getCellByColumnAndRow(3,1);
    $balc2= $sheet1->getCellByColumnAndRow(3,2);
    $balc3= $sheet1->getCellByColumnAndRow(3,3);
    $balc4= $sheet1->getCellByColumnAndRow(3,4);
    
    //Balance año 1
    $bald8= $sheet1->getCellByColumnAndRow(4,8);
    $bald10= $sheet1->getCellByColumnAndRow(4,10);
    $bald11= $sheet1->getCellByColumnAndRow(4,11);
    $bald12= $sheet1->getCellByColumnAndRow(4,12);
    $bald13= $sheet1->getCellByColumnAndRow(4,13);
    $bald14= $sheet1->getCellByColumnAndRow(4,14);
    $bald15= $sheet1->getCellByColumnAndRow(4,15);
    $bald16= $sheet1->getCellByColumnAndRow(4,16);
    $bald17= $sheet1->getCellByColumnAndRow(4,17);
    $bald18= $sheet1->getCellByColumnAndRow(4,18);
    $bald22= $sheet1->getCellByColumnAndRow(4,22);
    $bald23= $sheet1->getCellByColumnAndRow(4,23);
    $bald24= $sheet1->getCellByColumnAndRow(4,24);
    $bald25= $sheet1->getCellByColumnAndRow(4,25);
    $bald26= $sheet1->getCellByColumnAndRow(4,26);
    $bald27= $sheet1->getCellByColumnAndRow(4,27);
    $bald28= $sheet1->getCellByColumnAndRow(4,28);
    $bald29= $sheet1->getCellByColumnAndRow(4,29);
    $bald30= $sheet1->getCellByColumnAndRow(4,30);
    $bald31= $sheet1->getCellByColumnAndRow(4,31);
    $bald39= $sheet1->getCellByColumnAndRow(4,39);
    $bald40= $sheet1->getCellByColumnAndRow(4,40);
    $bald41= $sheet1->getCellByColumnAndRow(4,41);
    $bald42= $sheet1->getCellByColumnAndRow(4,42);
    $bald43= $sheet1->getCellByColumnAndRow(4,43);
    $bald44= $sheet1->getCellByColumnAndRow(4,44);
    $bald45= $sheet1->getCellByColumnAndRow(4,45);
    $bald49= $sheet1->getCellByColumnAndRow(4,49);
    $bald50= $sheet1->getCellByColumnAndRow(4,50);
    $bald51= $sheet1->getCellByColumnAndRow(4,51);
    $bald52= $sheet1->getCellByColumnAndRow(4,52);
    $bald53= $sheet1->getCellByColumnAndRow(4,53);
    $bald54= $sheet1->getCellByColumnAndRow(4,54);
    $bald58= $sheet1->getCellByColumnAndRow(4,58);
    $bald59= $sheet1->getCellByColumnAndRow(4,59);
    $bald60= $sheet1->getCellByColumnAndRow(4,60);
    $bald61= $sheet1->getCellByColumnAndRow(4,61);


    //Balance año 2
    $colyear= 5;
    $bale8= $sheet1->getCellByColumnAndRow($colyear,8);
    $bale10= $sheet1->getCellByColumnAndRow($colyear,10);
    $bale11= $sheet1->getCellByColumnAndRow($colyear,11);
    $bale12= $sheet1->getCellByColumnAndRow($colyear,12);
    $bale13= $sheet1->getCellByColumnAndRow($colyear,13);
    $bale14= $sheet1->getCellByColumnAndRow($colyear,14);
    $bale15= $sheet1->getCellByColumnAndRow($colyear,15);
    $bale16= $sheet1->getCellByColumnAndRow($colyear,16);
    $bale17= $sheet1->getCellByColumnAndRow($colyear,17);
    $bale18= $sheet1->getCellByColumnAndRow($colyear,18);
    $bale22= $sheet1->getCellByColumnAndRow($colyear,22);
    $bale23= $sheet1->getCellByColumnAndRow($colyear,23);
    $bale24= $sheet1->getCellByColumnAndRow($colyear,24);
    $bale25= $sheet1->getCellByColumnAndRow($colyear,25);
    $bale26= $sheet1->getCellByColumnAndRow($colyear,26);
    $bale27= $sheet1->getCellByColumnAndRow($colyear,27);
    $bale28= $sheet1->getCellByColumnAndRow($colyear,28);
    $bale29= $sheet1->getCellByColumnAndRow($colyear,29);
    $bale30= $sheet1->getCellByColumnAndRow($colyear,30);
    $bale31= $sheet1->getCellByColumnAndRow($colyear,31);
    $bale39= $sheet1->getCellByColumnAndRow($colyear,39);
    $bale40= $sheet1->getCellByColumnAndRow($colyear,40);
    $bale41= $sheet1->getCellByColumnAndRow($colyear,41);
    $bale42= $sheet1->getCellByColumnAndRow($colyear,42);
    $bale43= $sheet1->getCellByColumnAndRow($colyear,43);
    $bale44= $sheet1->getCellByColumnAndRow($colyear,44);
    $bale45= $sheet1->getCellByColumnAndRow($colyear,45);
    $bale49= $sheet1->getCellByColumnAndRow($colyear,49);
    $bale50= $sheet1->getCellByColumnAndRow($colyear,50);
    $bale51= $sheet1->getCellByColumnAndRow($colyear,51);
    $bale52= $sheet1->getCellByColumnAndRow($colyear,52);
    $bale53= $sheet1->getCellByColumnAndRow($colyear,53);
    $bale54= $sheet1->getCellByColumnAndRow($colyear,54);
    $bale58= $sheet1->getCellByColumnAndRow($colyear,58);
    $bale59= $sheet1->getCellByColumnAndRow($colyear,59);
    $bale60= $sheet1->getCellByColumnAndRow($colyear,60);
    $bale61= $sheet1->getCellByColumnAndRow($colyear,61);

    //Balance año 3
    $colyear= 6;
    $balf8= $sheet1->getCellByColumnAndRow($colyear,8);
    $balf10= $sheet1->getCellByColumnAndRow($colyear,10);
    $balf11= $sheet1->getCellByColumnAndRow($colyear,11);
    $balf12= $sheet1->getCellByColumnAndRow($colyear,12);
    $balf13= $sheet1->getCellByColumnAndRow($colyear,13);
    $balf14= $sheet1->getCellByColumnAndRow($colyear,14);
    $balf15= $sheet1->getCellByColumnAndRow($colyear,15);
    $balf16= $sheet1->getCellByColumnAndRow($colyear,16);
    $balf17= $sheet1->getCellByColumnAndRow($colyear,17);
    $balf18= $sheet1->getCellByColumnAndRow($colyear,18);
    $balf22= $sheet1->getCellByColumnAndRow($colyear,22);
    $balf23= $sheet1->getCellByColumnAndRow($colyear,23);
    $balf24= $sheet1->getCellByColumnAndRow($colyear,24);
    $balf25= $sheet1->getCellByColumnAndRow($colyear,25);
    $balf26= $sheet1->getCellByColumnAndRow($colyear,26);
    $balf27= $sheet1->getCellByColumnAndRow($colyear,27);
    $balf28= $sheet1->getCellByColumnAndRow($colyear,28);
    $balf29= $sheet1->getCellByColumnAndRow($colyear,29);
    $balf30= $sheet1->getCellByColumnAndRow($colyear,30);
    $balf31= $sheet1->getCellByColumnAndRow($colyear,31);
    $balf39= $sheet1->getCellByColumnAndRow($colyear,39);
    $balf40= $sheet1->getCellByColumnAndRow($colyear,40);
    $balf41= $sheet1->getCellByColumnAndRow($colyear,41);
    $balf42= $sheet1->getCellByColumnAndRow($colyear,42);
    $balf43= $sheet1->getCellByColumnAndRow($colyear,43);
    $balf44= $sheet1->getCellByColumnAndRow($colyear,44);
    $balf45= $sheet1->getCellByColumnAndRow($colyear,45);
    $balf49= $sheet1->getCellByColumnAndRow($colyear,49);
    $balf50= $sheet1->getCellByColumnAndRow($colyear,50);
    $balf51= $sheet1->getCellByColumnAndRow($colyear,51);
    $balf52= $sheet1->getCellByColumnAndRow($colyear,52);
    $balf53= $sheet1->getCellByColumnAndRow($colyear,53);
    $balf54= $sheet1->getCellByColumnAndRow($colyear,54);
    $balf58= $sheet1->getCellByColumnAndRow($colyear,58);
    $balf59= $sheet1->getCellByColumnAndRow($colyear,59);
    $balf60= $sheet1->getCellByColumnAndRow($colyear,60);
    $balf61= $sheet1->getCellByColumnAndRow($colyear,61);

    //Balance año 4
    $colyear= 7;
    $balg8= $sheet1->getCellByColumnAndRow($colyear,8);
    $balg10= $sheet1->getCellByColumnAndRow($colyear,10);
    $balg11= $sheet1->getCellByColumnAndRow($colyear,11);
    $balg12= $sheet1->getCellByColumnAndRow($colyear,12);
    $balg13= $sheet1->getCellByColumnAndRow($colyear,13);
    $balg14= $sheet1->getCellByColumnAndRow($colyear,14);
    $balg15= $sheet1->getCellByColumnAndRow($colyear,15);
    $balg16= $sheet1->getCellByColumnAndRow($colyear,16);
    $balg17= $sheet1->getCellByColumnAndRow($colyear,17);
    $balg18= $sheet1->getCellByColumnAndRow($colyear,18);
    $balg22= $sheet1->getCellByColumnAndRow($colyear,22);
    $balg23= $sheet1->getCellByColumnAndRow($colyear,23);
    $balg24= $sheet1->getCellByColumnAndRow($colyear,24);
    $balg25= $sheet1->getCellByColumnAndRow($colyear,25);
    $balg26= $sheet1->getCellByColumnAndRow($colyear,26);
    $balg27= $sheet1->getCellByColumnAndRow($colyear,27);
    $balg28= $sheet1->getCellByColumnAndRow($colyear,28);
    $balg29= $sheet1->getCellByColumnAndRow($colyear,29);
    $balg30= $sheet1->getCellByColumnAndRow($colyear,30);
    $balg31= $sheet1->getCellByColumnAndRow($colyear,31);
    $balg39= $sheet1->getCellByColumnAndRow($colyear,39);
    $balg40= $sheet1->getCellByColumnAndRow($colyear,40);
    $balg41= $sheet1->getCellByColumnAndRow($colyear,41);
    $balg42= $sheet1->getCellByColumnAndRow($colyear,42);
    $balg43= $sheet1->getCellByColumnAndRow($colyear,43);
    $balg44= $sheet1->getCellByColumnAndRow($colyear,44);
    $balg45= $sheet1->getCellByColumnAndRow($colyear,45);
    $balg49= $sheet1->getCellByColumnAndRow($colyear,49);
    $balg50= $sheet1->getCellByColumnAndRow($colyear,50);
    $balg51= $sheet1->getCellByColumnAndRow($colyear,51);
    $balg52= $sheet1->getCellByColumnAndRow($colyear,52);
    $balg53= $sheet1->getCellByColumnAndRow($colyear,53);
    $balg54= $sheet1->getCellByColumnAndRow($colyear,54);
    $balg58= $sheet1->getCellByColumnAndRow($colyear,58);
    $balg59= $sheet1->getCellByColumnAndRow($colyear,59);
    $balg60= $sheet1->getCellByColumnAndRow($colyear,60);
    $balg61= $sheet1->getCellByColumnAndRow($colyear,61);

    //Balance año 5
    $colyear= 8;
    $balh8= $sheet1->getCellByColumnAndRow($colyear,8);
    $balh10= $sheet1->getCellByColumnAndRow($colyear,10);
    $balh11= $sheet1->getCellByColumnAndRow($colyear,11);
    $balh12= $sheet1->getCellByColumnAndRow($colyear,12);
    $balh13= $sheet1->getCellByColumnAndRow($colyear,13);
    $balh14= $sheet1->getCellByColumnAndRow($colyear,14);
    $balh15= $sheet1->getCellByColumnAndRow($colyear,15);
    $balh16= $sheet1->getCellByColumnAndRow($colyear,16);
    $balh17= $sheet1->getCellByColumnAndRow($colyear,17);
    $balh18= $sheet1->getCellByColumnAndRow($colyear,18);
    $balh22= $sheet1->getCellByColumnAndRow($colyear,22);
    $balh23= $sheet1->getCellByColumnAndRow($colyear,23);
    $balh24= $sheet1->getCellByColumnAndRow($colyear,24);
    $balh25= $sheet1->getCellByColumnAndRow($colyear,25);
    $balh26= $sheet1->getCellByColumnAndRow($colyear,26);
    $balh27= $sheet1->getCellByColumnAndRow($colyear,27);
    $balh28= $sheet1->getCellByColumnAndRow($colyear,28);
    $balh29= $sheet1->getCellByColumnAndRow($colyear,29);
    $balh30= $sheet1->getCellByColumnAndRow($colyear,30);
    $balh31= $sheet1->getCellByColumnAndRow($colyear,31);
    $balh39= $sheet1->getCellByColumnAndRow($colyear,39);
    $balh40= $sheet1->getCellByColumnAndRow($colyear,40);
    $balh41= $sheet1->getCellByColumnAndRow($colyear,41);
    $balh42= $sheet1->getCellByColumnAndRow($colyear,42);
    $balh43= $sheet1->getCellByColumnAndRow($colyear,43);
    $balh44= $sheet1->getCellByColumnAndRow($colyear,44);
    $balh45= $sheet1->getCellByColumnAndRow($colyear,45);
    $balh49= $sheet1->getCellByColumnAndRow($colyear,49);
    $balh50= $sheet1->getCellByColumnAndRow($colyear,50);
    $balh51= $sheet1->getCellByColumnAndRow($colyear,51);
    $balh52= $sheet1->getCellByColumnAndRow($colyear,52);
    $balh53= $sheet1->getCellByColumnAndRow($colyear,53);
    $balh54= $sheet1->getCellByColumnAndRow($colyear,54);
    $balh58= $sheet1->getCellByColumnAndRow($colyear,58);
    $balh59= $sheet1->getCellByColumnAndRow($colyear,59);
    $balh60= $sheet1->getCellByColumnAndRow($colyear,60);
    $balh61= $sheet1->getCellByColumnAndRow($colyear,61);
    


    $sheet1= $spreadsheet1->getSheetByName("Resultado");
    //$sheet1= $spreadsheet1->getSheet(1);

    //Resultado año 1
    $colyear= 4;
    $resd10= $sheet1->getCellByColumnAndRow($colyear,10);
    $resd11= $sheet1->getCellByColumnAndRow($colyear,11);
    $resd15= $sheet1->getCellByColumnAndRow($colyear,15);
    $resd19= $sheet1->getCellByColumnAndRow($colyear,19);
    $resd23= $sheet1->getCellByColumnAndRow($colyear,23);
    $resd24= $sheet1->getCellByColumnAndRow($colyear,24);
    $resd25= $sheet1->getCellByColumnAndRow($colyear,25);
    $resd26= $sheet1->getCellByColumnAndRow($colyear,26);
    $resd27= $sheet1->getCellByColumnAndRow($colyear,27);
    $resd33= $sheet1->getCellByColumnAndRow($colyear,33);

    //Resultado año 2
    $colyear= 5;
    $rese10= $sheet1->getCellByColumnAndRow($colyear,10);
    $rese11= $sheet1->getCellByColumnAndRow($colyear,11);
    $rese15= $sheet1->getCellByColumnAndRow($colyear,15);
    $rese19= $sheet1->getCellByColumnAndRow($colyear,19);
    $rese23= $sheet1->getCellByColumnAndRow($colyear,23);
    $rese24= $sheet1->getCellByColumnAndRow($colyear,24);
    $rese25= $sheet1->getCellByColumnAndRow($colyear,25);
    $rese26= $sheet1->getCellByColumnAndRow($colyear,26);
    $rese27= $sheet1->getCellByColumnAndRow($colyear,27);
    $rese33= $sheet1->getCellByColumnAndRow($colyear,33);

    //Resultado año 3
    $colyear= 6;
    $resf10= $sheet1->getCellByColumnAndRow($colyear,10);
    $resf11= $sheet1->getCellByColumnAndRow($colyear,11);
    $resf15= $sheet1->getCellByColumnAndRow($colyear,15);
    $resf19= $sheet1->getCellByColumnAndRow($colyear,19);
    $resf23= $sheet1->getCellByColumnAndRow($colyear,23);
    $resf24= $sheet1->getCellByColumnAndRow($colyear,24);
    $resf25= $sheet1->getCellByColumnAndRow($colyear,25);
    $resf26= $sheet1->getCellByColumnAndRow($colyear,26);
    $resf27= $sheet1->getCellByColumnAndRow($colyear,27);
    $resf33= $sheet1->getCellByColumnAndRow($colyear,33);

    //Resultado año 4
    $colyear= 7;
    $resg10= $sheet1->getCellByColumnAndRow($colyear,10);
    $resg11= $sheet1->getCellByColumnAndRow($colyear,11);
    $resg15= $sheet1->getCellByColumnAndRow($colyear,15);
    $resg19= $sheet1->getCellByColumnAndRow($colyear,19);
    $resg23= $sheet1->getCellByColumnAndRow($colyear,23);
    $resg24= $sheet1->getCellByColumnAndRow($colyear,24);
    $resg25= $sheet1->getCellByColumnAndRow($colyear,25);
    $resg26= $sheet1->getCellByColumnAndRow($colyear,26);
    $resg27= $sheet1->getCellByColumnAndRow($colyear,27);
    $resg33= $sheet1->getCellByColumnAndRow($colyear,33);

    //Resultado año 5
    $colyear= 8;
    $resh10= $sheet1->getCellByColumnAndRow($colyear,10);
    $resh11= $sheet1->getCellByColumnAndRow($colyear,11);
    $resh15= $sheet1->getCellByColumnAndRow($colyear,15);
    $resh19= $sheet1->getCellByColumnAndRow($colyear,19);
    $resh23= $sheet1->getCellByColumnAndRow($colyear,23);
    $resh24= $sheet1->getCellByColumnAndRow($colyear,24);
    $resh25= $sheet1->getCellByColumnAndRow($colyear,25);
    $resh26= $sheet1->getCellByColumnAndRow($colyear,26);
    $resh27= $sheet1->getCellByColumnAndRow($colyear,27);
    $resh33= $sheet1->getCellByColumnAndRow($colyear,33);

    /////////////////////////////////////////////////////////////////////////////////////////


    //Abrir el archivo plantilla que contiene todas las formulas y sobre el cual se genera el pdf.
    //Este archivo se llena con los datos subidos por el usuario en seccion anterior
    $archivoexcel= $rutadestino.$archivofinal.$extension;

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet2 = $reader->load($archivoexcel); 


    //echo 'Archivo pdf creado.';


    try
    {
        
        //$spread = new Spreadsheet();
        //$sheet = $spreadsheet2->getActiveSheet();
        $sheet= $spreadsheet2->getSheetByName("Balance");
        //$sheet= $spreadsheet2->getSheet(0);
        //$sheet->setTitle("Plantilla");
        //Datos de la empresa
        $sheet->setCellValueByColumnAndRow(3, 1, $balc1);
        $sheet->setCellValueByColumnAndRow(3, 2, $balc2);
        $sheet->setCellValueByColumnAndRow(3, 3, $balc3);
        $sheet->setCellValueByColumnAndRow(3, 4, $balc4);

        //Balance año 1
        $sheet->setCellValueByColumnAndRow(4, 8, $bald8);
        $sheet->setCellValueByColumnAndRow(4, 10, $bald10);
        $sheet->setCellValueByColumnAndRow(4, 11, $bald11);
        $sheet->setCellValueByColumnAndRow(4, 12, $bald12);
        $sheet->setCellValueByColumnAndRow(4, 13, $bald13);
        $sheet->setCellValueByColumnAndRow(4, 14, $bald14);
        $sheet->setCellValueByColumnAndRow(4, 15, $bald15);
        $sheet->setCellValueByColumnAndRow(4, 16, $bald16);
        $sheet->setCellValueByColumnAndRow(4, 17, $bald17);
        $sheet->setCellValueByColumnAndRow(4, 18, $bald18);
        $sheet->setCellValueByColumnAndRow(4, 22, $bald22);
        $sheet->setCellValueByColumnAndRow(4, 23, $bald23);
        $sheet->setCellValueByColumnAndRow(4, 24, $bald24);
        $sheet->setCellValueByColumnAndRow(4, 25, $bald25);
        $sheet->setCellValueByColumnAndRow(4, 26, $bald26);
        $sheet->setCellValueByColumnAndRow(4, 27, $bald27);
        $sheet->setCellValueByColumnAndRow(4, 28, $bald28);
        $sheet->setCellValueByColumnAndRow(4, 29, $bald29);
        $sheet->setCellValueByColumnAndRow(4, 30, $bald30);
        $sheet->setCellValueByColumnAndRow(4, 31, $bald31);
        $sheet->setCellValueByColumnAndRow(4, 39, $bald39);
        $sheet->setCellValueByColumnAndRow(4, 40, $bald40);
        $sheet->setCellValueByColumnAndRow(4, 41, $bald41);
        $sheet->setCellValueByColumnAndRow(4, 42, $bald42);
        $sheet->setCellValueByColumnAndRow(4, 43, $bald43);
        $sheet->setCellValueByColumnAndRow(4, 44, $bald44);
        $sheet->setCellValueByColumnAndRow(4, 45, $bald45);
        $sheet->setCellValueByColumnAndRow(4, 49, $bald49);
        $sheet->setCellValueByColumnAndRow(4, 50, $bald50);
        $sheet->setCellValueByColumnAndRow(4, 51, $bald51);
        $sheet->setCellValueByColumnAndRow(4, 52, $bald52);
        $sheet->setCellValueByColumnAndRow(4, 53, $bald53);
        $sheet->setCellValueByColumnAndRow(4, 54, $bald54);
        $sheet->setCellValueByColumnAndRow(4, 58, $bald58);
        $sheet->setCellValueByColumnAndRow(4, 59, $bald59);
        $sheet->setCellValueByColumnAndRow(4, 60, $bald60);
        $sheet->setCellValueByColumnAndRow(4, 61, $bald61);

        //Balance año 2
        $colyear= 5;
        $sheet->setCellValueByColumnAndRow($colyear, 8, $bale8);
        $sheet->setCellValueByColumnAndRow($colyear, 10, $bale10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $bale11);
        $sheet->setCellValueByColumnAndRow($colyear, 12, $bale12);
        $sheet->setCellValueByColumnAndRow($colyear, 13, $bale13);
        $sheet->setCellValueByColumnAndRow($colyear, 14, $bale14);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $bale15);
        $sheet->setCellValueByColumnAndRow($colyear, 16, $bale16);
        $sheet->setCellValueByColumnAndRow($colyear, 17, $bale17);
        $sheet->setCellValueByColumnAndRow($colyear, 18, $bale18);
        $sheet->setCellValueByColumnAndRow($colyear, 22, $bale22);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $bale23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $bale24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $bale25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $bale26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $bale27);
        $sheet->setCellValueByColumnAndRow($colyear, 28, $bale28);
        $sheet->setCellValueByColumnAndRow($colyear, 29, $bale29);
        $sheet->setCellValueByColumnAndRow($colyear, 30, $bale30);
        $sheet->setCellValueByColumnAndRow($colyear, 31, $bale31);
        $sheet->setCellValueByColumnAndRow($colyear, 39, $bale39);
        $sheet->setCellValueByColumnAndRow($colyear, 40, $bale40);
        $sheet->setCellValueByColumnAndRow($colyear, 41, $bale41);
        $sheet->setCellValueByColumnAndRow($colyear, 42, $bale42);
        $sheet->setCellValueByColumnAndRow($colyear, 43, $bale43);
        $sheet->setCellValueByColumnAndRow($colyear, 44, $bale44);
        $sheet->setCellValueByColumnAndRow($colyear, 45, $bale45);
        $sheet->setCellValueByColumnAndRow($colyear, 49, $bale49);
        $sheet->setCellValueByColumnAndRow($colyear, 50, $bale50);
        $sheet->setCellValueByColumnAndRow($colyear, 51, $bale51);
        $sheet->setCellValueByColumnAndRow($colyear, 52, $bale52);
        $sheet->setCellValueByColumnAndRow($colyear, 53, $bale53);
        $sheet->setCellValueByColumnAndRow($colyear, 54, $bale54);
        $sheet->setCellValueByColumnAndRow($colyear, 58, $bale58);
        $sheet->setCellValueByColumnAndRow($colyear, 59, $bale59);
        $sheet->setCellValueByColumnAndRow($colyear, 60, $bale60);
        $sheet->setCellValueByColumnAndRow($colyear, 61, $bale61);

        //Balance año 3
        $colyear= 6;
        $sheet->setCellValueByColumnAndRow($colyear, 8, $balf8);
        $sheet->setCellValueByColumnAndRow($colyear, 10, $balf10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $balf11);
        $sheet->setCellValueByColumnAndRow($colyear, 12, $balf12);
        $sheet->setCellValueByColumnAndRow($colyear, 13, $balf13);
        $sheet->setCellValueByColumnAndRow($colyear, 14, $balf14);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $balf15);
        $sheet->setCellValueByColumnAndRow($colyear, 16, $balf16);
        $sheet->setCellValueByColumnAndRow($colyear, 17, $balf17);
        $sheet->setCellValueByColumnAndRow($colyear, 18, $balf18);
        $sheet->setCellValueByColumnAndRow($colyear, 22, $balf22);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $balf23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $balf24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $balf25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $balf26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $balf27);
        $sheet->setCellValueByColumnAndRow($colyear, 28, $balf28);
        $sheet->setCellValueByColumnAndRow($colyear, 29, $balf29);
        $sheet->setCellValueByColumnAndRow($colyear, 30, $balf30);
        $sheet->setCellValueByColumnAndRow($colyear, 31, $balf31);
        $sheet->setCellValueByColumnAndRow($colyear, 39, $balf39);
        $sheet->setCellValueByColumnAndRow($colyear, 40, $balf40);
        $sheet->setCellValueByColumnAndRow($colyear, 41, $balf41);
        $sheet->setCellValueByColumnAndRow($colyear, 42, $balf42);
        $sheet->setCellValueByColumnAndRow($colyear, 43, $balf43);
        $sheet->setCellValueByColumnAndRow($colyear, 44, $balf44);
        $sheet->setCellValueByColumnAndRow($colyear, 45, $balf45);
        $sheet->setCellValueByColumnAndRow($colyear, 49, $balf49);
        $sheet->setCellValueByColumnAndRow($colyear, 50, $balf50);
        $sheet->setCellValueByColumnAndRow($colyear, 51, $balf51);
        $sheet->setCellValueByColumnAndRow($colyear, 52, $balf52);
        $sheet->setCellValueByColumnAndRow($colyear, 53, $balf53);
        $sheet->setCellValueByColumnAndRow($colyear, 54, $balf54);
        $sheet->setCellValueByColumnAndRow($colyear, 58, $balf58);
        $sheet->setCellValueByColumnAndRow($colyear, 59, $balf59);
        $sheet->setCellValueByColumnAndRow($colyear, 60, $balf60);
        $sheet->setCellValueByColumnAndRow($colyear, 61, $balf61);

        //Balance año 4
        $colyear= 7;
        $sheet->setCellValueByColumnAndRow($colyear, 8, $balg8);
        $sheet->setCellValueByColumnAndRow($colyear, 10, $balg10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $balg11);
        $sheet->setCellValueByColumnAndRow($colyear, 12, $balg12);
        $sheet->setCellValueByColumnAndRow($colyear, 13, $balg13);
        $sheet->setCellValueByColumnAndRow($colyear, 14, $balg14);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $balg15);
        $sheet->setCellValueByColumnAndRow($colyear, 16, $balg16);
        $sheet->setCellValueByColumnAndRow($colyear, 17, $balg17);
        $sheet->setCellValueByColumnAndRow($colyear, 18, $balg18);
        $sheet->setCellValueByColumnAndRow($colyear, 22, $balg22);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $balg23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $balg24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $balg25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $balg26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $balg27);
        $sheet->setCellValueByColumnAndRow($colyear, 28, $balg28);
        $sheet->setCellValueByColumnAndRow($colyear, 29, $balg29);
        $sheet->setCellValueByColumnAndRow($colyear, 30, $balg30);
        $sheet->setCellValueByColumnAndRow($colyear, 31, $balg31);
        $sheet->setCellValueByColumnAndRow($colyear, 39, $balg39);
        $sheet->setCellValueByColumnAndRow($colyear, 40, $balg40);
        $sheet->setCellValueByColumnAndRow($colyear, 41, $balg41);
        $sheet->setCellValueByColumnAndRow($colyear, 42, $balg42);
        $sheet->setCellValueByColumnAndRow($colyear, 43, $balg43);
        $sheet->setCellValueByColumnAndRow($colyear, 44, $balg44);
        $sheet->setCellValueByColumnAndRow($colyear, 45, $balg45);
        $sheet->setCellValueByColumnAndRow($colyear, 49, $balg49);
        $sheet->setCellValueByColumnAndRow($colyear, 50, $balg50);
        $sheet->setCellValueByColumnAndRow($colyear, 51, $balg51);
        $sheet->setCellValueByColumnAndRow($colyear, 52, $balg52);
        $sheet->setCellValueByColumnAndRow($colyear, 53, $balg53);
        $sheet->setCellValueByColumnAndRow($colyear, 54, $balg54);
        $sheet->setCellValueByColumnAndRow($colyear, 58, $balg58);
        $sheet->setCellValueByColumnAndRow($colyear, 59, $balg59);
        $sheet->setCellValueByColumnAndRow($colyear, 60, $balg60);
        $sheet->setCellValueByColumnAndRow($colyear, 61, $balg61);

        //Balance año 5
        $colyear= 8;
        $sheet->setCellValueByColumnAndRow($colyear, 8, $balh8);
        $sheet->setCellValueByColumnAndRow($colyear, 10, $balh10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $balh11);
        $sheet->setCellValueByColumnAndRow($colyear, 12, $balh12);
        $sheet->setCellValueByColumnAndRow($colyear, 13, $balh13);
        $sheet->setCellValueByColumnAndRow($colyear, 14, $balh14);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $balh15);
        $sheet->setCellValueByColumnAndRow($colyear, 16, $balh16);
        $sheet->setCellValueByColumnAndRow($colyear, 17, $balh17);
        $sheet->setCellValueByColumnAndRow($colyear, 18, $balh18);
        $sheet->setCellValueByColumnAndRow($colyear, 22, $balh22);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $balh23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $balh24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $balh25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $balh26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $balh27);
        $sheet->setCellValueByColumnAndRow($colyear, 28, $balh28);
        $sheet->setCellValueByColumnAndRow($colyear, 29, $balh29);
        $sheet->setCellValueByColumnAndRow($colyear, 30, $balh30);
        $sheet->setCellValueByColumnAndRow($colyear, 31, $balh31);
        $sheet->setCellValueByColumnAndRow($colyear, 39, $balh39);
        $sheet->setCellValueByColumnAndRow($colyear, 40, $balh40);
        $sheet->setCellValueByColumnAndRow($colyear, 41, $balh41);
        $sheet->setCellValueByColumnAndRow($colyear, 42, $balh42);
        $sheet->setCellValueByColumnAndRow($colyear, 43, $balh43);
        $sheet->setCellValueByColumnAndRow($colyear, 44, $balh44);
        $sheet->setCellValueByColumnAndRow($colyear, 45, $balh45);
        $sheet->setCellValueByColumnAndRow($colyear, 49, $balh49);
        $sheet->setCellValueByColumnAndRow($colyear, 50, $balh50);
        $sheet->setCellValueByColumnAndRow($colyear, 51, $balh51);
        $sheet->setCellValueByColumnAndRow($colyear, 52, $balh52);
        $sheet->setCellValueByColumnAndRow($colyear, 53, $balh53);
        $sheet->setCellValueByColumnAndRow($colyear, 54, $balh54);
        $sheet->setCellValueByColumnAndRow($colyear, 58, $balh58);
        $sheet->setCellValueByColumnAndRow($colyear, 59, $balh59);
        $sheet->setCellValueByColumnAndRow($colyear, 60, $balh60);
        $sheet->setCellValueByColumnAndRow($colyear, 61, $balh61);





        $sheet= $spreadsheet2->getSheetByName("Resultado");
        //$sheet= $spreadsheet2->getSheet(1);

        //Resultado año 1
        $sheet->setCellValueByColumnAndRow(4, 10, $resd10);
        $sheet->setCellValueByColumnAndRow(4, 11, $resd11);
        $sheet->setCellValueByColumnAndRow(4, 15, $resd15);
        $sheet->setCellValueByColumnAndRow(4, 19, $resd19);
        $sheet->setCellValueByColumnAndRow(4, 23, $resd23);
        $sheet->setCellValueByColumnAndRow(4, 24, $resd24);
        $sheet->setCellValueByColumnAndRow(4, 25, $resd25);
        $sheet->setCellValueByColumnAndRow(4, 26, $resd26);
        $sheet->setCellValueByColumnAndRow(4, 27, $resd27);
        $sheet->setCellValueByColumnAndRow(4, 33, $resd33);

        //Resultado año 2
        $colyear= 5;
        $sheet->setCellValueByColumnAndRow($colyear, 10, $rese10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $rese11);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $rese15);
        $sheet->setCellValueByColumnAndRow($colyear, 19, $rese19);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $rese23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $rese24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $rese25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $rese26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $rese27);
        $sheet->setCellValueByColumnAndRow($colyear, 33, $rese33);

        //Resultado año 3
        $colyear= 6;
        $sheet->setCellValueByColumnAndRow($colyear, 10, $resf10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $resf11);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $resf15);
        $sheet->setCellValueByColumnAndRow($colyear, 19, $resf19);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $resf23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $resf24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $resf25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $resf26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $resf27);
        $sheet->setCellValueByColumnAndRow($colyear, 33, $resf33);

        //Resultado año 4
        $colyear= 7;
        $sheet->setCellValueByColumnAndRow($colyear, 10, $resg10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $resg11);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $resg15);
        $sheet->setCellValueByColumnAndRow($colyear, 19, $resg19);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $resg23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $resg24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $resg25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $resg26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $resg27);
        $sheet->setCellValueByColumnAndRow($colyear, 33, $resg33);

        //Resultado año 5
        $colyear= 8;
        $sheet->setCellValueByColumnAndRow($colyear, 10, $resh10);
        $sheet->setCellValueByColumnAndRow($colyear, 11, $resh11);
        $sheet->setCellValueByColumnAndRow($colyear, 15, $resh15);
        $sheet->setCellValueByColumnAndRow($colyear, 19, $resh19);
        $sheet->setCellValueByColumnAndRow($colyear, 23, $resh23);
        $sheet->setCellValueByColumnAndRow($colyear, 24, $resh24);
        $sheet->setCellValueByColumnAndRow($colyear, 25, $resh25);
        $sheet->setCellValueByColumnAndRow($colyear, 26, $resh26);
        $sheet->setCellValueByColumnAndRow($colyear, 27, $resh27);
        $sheet->setCellValueByColumnAndRow($colyear, 33, $resh33);


        $writer = IOFactory::createWriter($spreadsheet2, 'Xlsx');
        //$sheet->setCellValue("B4", "Valor B4");
        $writer->save("$archivoexcel");
        
    } catch (\Exception $e) {
       // echo 'Ocurrió un error al intentar abrir el archivo.' . $e;
    }  
        


    //Creacion del writer pdf
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet2, 'Mpdf');

    //Salvataggio del pfd
    //$pdf_path = 'pdf_finali/'.$name.'.pdf';
    $writer->setSheetIndex(3);
    $archivopdf= $rutadestino.$archivofinal.".pdf";
    $writer->save($archivopdf);

    unlink($exceldatos);
    unlink($archivoexcel);

    $descargapdf= $archivofinal.".pdf";
    
    //session_destroy();
    
    echo json_encode(array('archivo' => $descargapdf));

    
        
//}

//}

?>