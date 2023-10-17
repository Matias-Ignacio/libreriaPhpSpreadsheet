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

    for($i=1; $i<$filaMax;$i++){
        $datos[$i-1]['idReloj']=$datosExcel[$i][0];
        $datos[$i-1]['nombreReloj']=$datosExcel[$i][1];
        $datos[$i-1]['precio']=$datosExcel[$i][2];
        $datos[$i-1]['idTipo']=$datosExcel[$i][3];
        $datos[$i-1]['idMarca']=$datosExcel[$i][4];
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

/**
 * nuevosRegistros
 * almacena los indeces de los nuevos registros 
 * @param array datos
 * @param array indicesModificados
 * @return array
 */
function nuevosRegistros($datosB,$datosE){
    $indices=[];
    $k=0;
    for($i=count($datosB);$i<count($datosE);$i++){ 
        $indices[$k]=$datosE[$i]["idReloj"];  
        $k++;
    }// fin for
    return $indices;

}// fin function

/**
 * registroSinModificar
 * Devuelve los registros 
 * @param array indices
 * @param array indices
 * @param array  datos
 * @return array
 */
function sinModificar($indiceM,$indiceN,$datos){

    for($i=0;$i<count($datos);$i++){ 
        $indices[$i]=$datos[$i]["idReloj"];  
    }// fin for
    $aux=array_merge($indiceM,$indiceN);
    $indiceSinModificar=array_diff($indices,$aux);

    return $indiceSinModificar;

}// fin funcion 


/**
 * comparar
 * compara los datos de la base de datos con del excel segun los campos
 * devolviendo los indices de los registros modificados 
 * @param array BD
 * @param array excel 
 * @return array
 */
function comparar($BD,$excel){
    $tamBD=count($BD);
    $tamExcel=count($excel);
    $indicesModificados=[];
    $k=0; 
    if($tamBD<=$tamExcel){
        // index => nro de fila del registro
        // valor => array asociativo del registro
        // key => campo del registro
        // dato => valor del registro segun el campo (key)
        
        foreach($BD as $index=>$valor){
            $k++;
            foreach($valor as $key=>$dato){
                if($dato!=$excel[$index][$key]){ // compara los datos de la BD y del excel (ambos son array asociativos)
                    $indicesModificados[$k]=$BD[$index]["idReloj"];
                }// fin if
            }// fin for 
            
        }// fin for
        $indicesModificados=array_keys($indicesModificados);
    }// fin if

    if($tamBD>$tamExcel){
        foreach($excel as $index=>$valor){
            $k++;
            foreach($valor as $key=>$dato){
                if($dato!=$BD[$index][$key]){
                    $indicesModificados[$k]=$excel[$index]["idReloj"];
                }// fin if 

            }// fin for
        }// fin for    
        $indicesModificados=array_keys($indicesModificados); 
    }// fin if 
    
    return $indicesModificados;

}// fun funcion 



?>