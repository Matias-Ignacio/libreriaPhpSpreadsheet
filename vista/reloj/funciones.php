<?php
// crea la funciones funciones necesarias para operar 
// con la libreria PhpSpreadSheet
include_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet;

/**
 * mostrarExcel
 * Muestra un archivo excel en el navegador 
 * @param archivo
 * @return class worksheet
 */
function mostrarExcel($excel){
    
    $reader=IOFactory::createReader('Xlsx');
    $spreadsheet=$reader->load($excel['excel']['tmp_name']);
    $writer=IOFactory::createWriter($spreadsheet,'Html');
    $writer->save('php://output');

    return $spreadsheet;
}// fin function 

/**
 * verificaExtension
 * Verifica si el archivo que se cargue sea de extension xls o xlsx
 * @param string
 * @return boolean
 */
function verificaExtension($archivo){
    $salida=false;
    if($archivo!=""){
        $extensionOk=array('xls','xlsx');
        $nombreArchivo=explode(".",$archivo);
        $extension=end($nombreArchivo);
        if(in_array($extension,$extensionOk)){
            $salida=true; 
        }// fin if 
    }// fin if 
    return $salida; 
}// fin funcion 

/**
 * excelToArray
 * pasa los datos de un archivo excel a un array asociativo
 * @param class spreadsheet
 * @return array
 */
function excelToArray($spreadsheet){
    $worksheet=$spreadsheet->getActiveSheet(); // activa el excel
    $hojaActual=$spreadsheet->getSheet(0); // activa la hoja 1 del excel
    $datosExcel=[];

    foreach($worksheet->getRowIterator() as $index=>$row){ // itera sobre los datos en la hoja activa
        $celdaIterador=$row->getCellIterator();
        $celdaIterador->setIterateOnlyExistingCells(true);
        $row_content=[];// guarda los datos del excel
        foreach($celdaIterador as $cell){
            array_push($row_content,$cell->getValue());
        }// fin for
        $datosExcel[]=$row_content; // obtiene los datos en un array doblemente indexado
    }// fin for 

    // pasa de un array indexado-indexado a uno indexado-asociativo
    $filaMax=$hojaActual->getHighestDataRow();

    for($i=0; $i<$filaMax;$i++){
        $datos[$i]['idReloj']=$datosExcel[$i][0];
        $datos[$i]['nombreReloj']=$datosExcel[$i][1];
        $datos[$i]['precio']=$datosExcel[$i][2];
        $datos[$i]['idTipo']=$datosExcel[$i][3];
        $datos[$i]['idMarca']=$datosExcel[$i][4];
    }// fin for 
    
    return $datos;

}// fin function 


/**
 * bdToArray
 * pasa los datos de una base de datos (array de objetos) a un array asociativo
 * @param array
 * @return array
 */
function bdToarray($arrayObj){
    for($w=0;$w<count($arrayObj);$w++){
        $datosBD[$w]['idReloj']=$arrayObj[$w]->getidReloj();
        $datosBD[$w]['nombreReloj']=$arrayObj[$w]->getnombreReloj();
        $datosBD[$w]['precio']=$arrayObj[$w]->getprecio();
        $datosBD[$w]['idTipo']=$arrayObj[$w]->getobjTipo()->getidTipo();
        $datosBD[$w]['idMarca']=$arrayObj[$w]->getobjMarca()->getidMarca();
    }// fin for 

    return $datosBD;

}// fin function




?>