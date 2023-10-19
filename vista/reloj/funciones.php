<?php
// crea la funciones funciones necesarias para operar 
// con la libreria PhpSpreadSheet
include_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style;

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
 * arrayID
 * @param array datos BD 
 * @return array de id
 */
function arrayIdBD($BD){
    $id=[];
    foreach($BD as $index=>$valor){
        $id[$index]=$valor["idReloj"];

    }// fin for
    
    return $id; 

}// fin function 

/**
 * arrayID
 * @param array datos excel 
 * @return array de id
 */
function arrayIdExcel($excel){
    $id=[];
    foreach($excel as $index=>$valor){
        $id[$index]=$valor["idReloj"];

    }// fin for
    
    return $id; 

}// fin function 



/**
 * comparar
 * compara los datos de la base de datos con del excel segun los campos
 * devolviendo los indices de los registros modificados  - sin modificar y nuevos 
 * @param array BD
 * @param array excel 
 * @return array
 */
function comparar($BD,$excel){
    //$tamBD=count($BD);
    //$tamExcel=count($excel);
    $idBD=arrayIdBD($BD);
    $idExcel=arrayIdExcel($excel);
   // var_dump($idBD); 
    //var_dump($idExcel);
    
    // RECORRIDO DEL EXCEL Y COMPARAR CON LOS DATOS DE LA BD PARA DETERMINAR LOS ID 
    // DE DATOS MODIFICADOS Y SIN MODIFICAR
    foreach($BD as $index=>$valor){
        // pregunta si el excel y la BD tienen el mismo id
        
        $estaId=array_search($valor["idReloj"],$idExcel); // consulta si el id de la BD esta en la del excel; da false si no lo encuentra  
        $estaId=is_numeric($estaId); //
        $contarCampo=0; 
        //echo("<br>".$idBD[$index]."<br>");
        if($estaId){
           // echo("<br> ----------- bucle nro".$index."---------- <br>");
            foreach($valor as $key=>$dato){

                if($dato!=$excel[$idBD[$index]-1][$key]){
                    //echo("<br> Dato:  ".$dato."<br>");
                    //echo("<br> Dato excel:  ".$excel[$index][$key]."<br>");
                    //echo("<br> key:  ".$key."<br>");
                    $indicesModificados[$index]=$valor["idReloj"];                    
                }// fin if
                else{
                    $contarCampo++;
                }// fin else

            }// fin for 

        }// fin if
        if($contarCampo==5){
            $indicesSinModificar[$index]=$BD[$index]["idReloj"];
        } // fin if

    }// fin foreach

    // guarda los indices nuevos 
    $indicesNuevos=array_diff($idExcel,$idBD);
    
    $indices[0]=$indicesNuevos;
    $indices[1]=$indicesModificados;
    $indices[2]=$indicesSinModificar;
    //$indices=array_merge($indicesModificados,$indicesSinModificar,$indicesNuevos);


    return $indices;

}// fun funcion 
