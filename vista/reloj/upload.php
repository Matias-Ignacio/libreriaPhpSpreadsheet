<?php
    include_once '../../vendor/autoload.php';
    include_once 'funciones.php';
    include_once '../../configuracion.php';

    // guarda el archivo mandado por el formulario en cargarExcel.php
    $archivoExcel=$_FILES; 
    $nombreArchivo=$_FILES['excel']['name'];
    $objReloj=new AbmReloj();
    $listaRelojes=$objReloj->buscar(null);

    // Llama a la funcion verificaExtension
    $esXls=verificaExtension($nombreArchivo);
    if($esXls){
        $spreadsheet=mostrarExcel($archivoExcel);
        $datosExcel=excelToArray($spreadsheet);
        $datosBD=bdToarray($listaRelojes);
        echo("Array asociatico del excel <br><br>");
        var_dump($datosExcel);

        echo("<br><br> Array asociatico de la BD <br><br>");
        var_dump($datosBD);


    }// fin if
    else{
        echo('<div class="alert alert-danger">Verifique seleccionar un archivo y que la extension sea (xls o xlsx) </div>');

    } // fin else



    
?>