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




/**
 * Encabezado de la hoja de calculo
 * @param array             //Arreglo con los nombres de las columnas
 * @param Worksheet         //clase hoja
 * @return Worksheet        //clase hoja
 */
function headHC($array, $WP, $dimension){
    $celda_letra = 65;      // ascii "A"
    foreach ($array as $value) {
        $celda = chr(++$celda_letra) . "2";
        $WP->setCellValue($celda, $value);
    }
    //Bordes y estilo
    $WP->getStyle($dimension)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
    $WP->getStyle($dimension)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $WP->getStyle($dimension)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle($dimension)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle($dimension)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle($dimension)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    $WP->getStyle($dimension)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $WP->getStyle($dimension)->getFill()->getStartColor()->setARGB('33334444');

    return $WP;
}

/**
 * llenado del cuerpo de la hoja de calculo
 * @param array 
 * @param Worksheet         //clase hoja
 * @return Worksheet        //clase hoja
 */
function bodyHC($lista, $WP, $dimension){  //Pasaba $array
    $fila = 3;
    $columna = 2;
    foreach ($lista as $key1 => $obj) {
        $arregloDatoObjeto = $obj->getDatos();
        $largo = $fila + $key1;
        foreach ($arregloDatoObjeto as $key => $datObj) { 
            $WP->setCellValueByColumnAndRow($columna+$key, $fila+$key1, $datObj);
        }
    }    
    $dimension = $dimension . $largo;
    $WP->getStyle($dimension)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    return $WP;
}

/**
 * llenado del cuerpo de la hoja de calculo
 * @param array 
 * @param Worksheet         //clase hoja
 * @return Worksheet        //clase hoja
 */
function ventaHC($lista, $WP, $dimension){  //Pasaba $array
    $fila = 3;
    $columna = 2;
    foreach ($lista as $key1 => $obj) {
        $arregloDatoObjeto = $obj->getDatos();
        $largo = $fila + $key1;
        foreach ($arregloDatoObjeto as $key => $datObj) { 
            $WP->setCellValueByColumnAndRow($columna+$key, $fila+$key1, $datObj);
        }

        $WP->setCellValueByColumnAndRow($columna+$key, $fila+$key1, $obj->getobjReloj()->getprecio());
        $formula = "= E".$fila+$key1." * F".$fila+$key1;
        $WP->setCellValueByColumnAndRow($columna+$key+1, $fila+$key1, $formula);
        $formula = "= G".$fila+$key1."* 1.21";
        
        $WP->setCellValueByColumnAndRow($columna+$key+2, $fila+$key1, $formula);
    }    
    $dimension = $dimension . $largo;
    $WP->getStyle($dimension)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    return $WP;
}

/**
 * Escribir en el archivo de hoja de calculo
 * @param Spreadsheet
 */
function writeHC($spreadsheet){
    //$write =PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,"Xlsx");
    $writer = new Xlsx($spreadsheet);
    $writer->save('../../Archivos/Relojes.xlsx');

}

/**
 * @param Spreadsheet
 */
function general($SP){
    //Crea una nueva hoja con el nombre pasado por la variable $hoja
    $WS = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($SP, 'Relojes');
    $SP->addSheet($WS, 0);
    $WS = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($SP, 'Tipos');
    $SP->addSheet($WS, 1);
    $WS = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($SP, 'Marcas');
    $SP->addSheet($WS, 2);
    $WS = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($SP, 'Ventas');
    $SP->addSheet($WS, 3);
//Activa la hoja por el nombre, Relojes
    $objReloj=new AbmReloj();
    $listaObjReloj = $objReloj->buscar(null);
    $WS = $SP->setActiveSheetIndexByName('Relojes');  
    $arreglo_titulos = ["ID", "Reloj", "Precio", "Tipo", "Marca"];
    $dimension = "B2:F2";
    $WS = headHC($arreglo_titulos, $WS, $dimension);
    $dimension = "B3:F";
    $WS = bodyHC($listaObjReloj, $WS, $dimension);
//Activa la hoja por el nombre, Tipos
    $objTipo=new AbmTipo();
    $listaObjTipo = $objTipo->buscar(null);
    $WS = $SP->setActiveSheetIndexByName('Tipos'); 
    $arreglo_titulos = ["ID", "Tipo"];
    $dimension = "B2:C2";
    $WS = headHC($arreglo_titulos, $WS, $dimension);
    $dimension = "B3:C";
    $WS = bodyHC($listaObjTipo, $WS, $dimension);
    //Activa la hoja por el nombre, Marcas
    $objMarca=new AbmMarca();
    $listaObjMarca = $objMarca->buscar(null);
    $WS = $SP->setActiveSheetIndexByName('Marcas'); 
    $arreglo_titulos = ["ID", "Marca"];
    $dimension = "B2:C2";
    $WS = headHC($arreglo_titulos, $WS,$dimension);
    $dimension = "B3:C";
    $WS = bodyHC($listaObjMarca, $WS, $dimension);

}