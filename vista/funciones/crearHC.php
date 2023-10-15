<?php

require '../../vendor/autoload.php';
include_once '../../configuracion.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Phpoffice\Phpspreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet(); // crea un obj spreadsheet 
$spreadsheet
->getProperties()
->setCreator("Grupo_5A")
->setTitle('Excel creado con PhpSpreadSheet')
->setSubject('Excel de prueba')
->setDescription('Excel generado como demostración')
->setKeywords('PHPSpreadsheet')
->setCategory('Categoría Excel');
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle($hoja);
//Crea una nueva hoja con el nombre pasado por la variable $hoja
//$myWorkSheet = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $hoja);
//$spreadsheet->addSheet($myWorkSheet, 0);
//Activa la hoja por el nombre
//$activeWorksheet = $spreadsheet->setActiveSheetIndexByName($hoja);  



/**
 * Encabezado de la hoja de calculo
 * @param array             //Arreglo con los nombres de las columnas
 * @param Worksheet         //clase hoja
 * @return Worksheet        //clase hoja
 */
function headHC($array, $WP){
    $celda_letra = 65;      // ascii "A"
    foreach ($array as $value) {
        $celda = chr(++$celda_letra) . "2";
        $WP->setCellValue($celda, $value);
    }
    //Bordes y estilo
    $WP->getStyle('B2:C2')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
    $WP->getStyle('B2:C2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $WP->getStyle('B2:C2')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle('B2:C2')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle('B2:C2')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle('B2:C2')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle('B2:C2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $WP->getStyle('B2:C2')->getFill()->getStartColor()->setARGB('33337777');

    return $WP;
}

/**
 * llenado del cuerpo de la hoja de calculo
 * @param array 
 * @param Worksheet         //clase hoja
 * @return Worksheet        //clase hoja
 */
function bodyHC($lista, $WP){  //Pasaba $array
    $fila = 3;
    $columna = 2;
    foreach ($lista as $key1 => $obj) {
        $arregloDatoObjeto = $obj->getDatos();
        foreach ($arregloDatoObjeto as $key => $datObj) { 
            $WP->setCellValueByColumnAndRow($columna+$key, $fila+$key1, $datObj);
        }
    }    
    $WP->getStyle('A3:B8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    return $WP;
}



/**
 * Escribir en el archivo de hoja de calculo
 * @param Spreadsheet
 */
function writeHC($spreadsheet){
    //$write =PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,"Xlsx");
    //$write->save("grupo5.xlsx");
    $writer = new Xlsx($spreadsheet);
    $writer->save('../../Archivos/Relojes.xlsx');
    /*$fileName="Descarga_excel_Reloj.xlsx";
    # Crear un "escritor"
    //$writer = new Xlsx($spreadsheet);
    # Le pasamos la ruta de guardado
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
    $writer->save('php://output');*/
}