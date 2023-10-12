<?php
/** 
//upload.php

include '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'xlsx');
 $file_array = explode(".", $_FILES['select_excel']['name']);
 $file_extension = end($file_array);
 if(in_array($file_extension, $allowed_extension))
 {
  $reader = IOFactory::createReader('Xlsx'); 
  $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
  $writer = IOFactory::createWriter($spreadsheet, 'Html');
  $message = $writer->save('php://output');
 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
*/

// codigo para convertir una tabla html en un excel, usando la libreria 
include_once '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$datos =data_submitted(); 

if(isset($datos['file_content'])){
    $archivoTemporario= './tmp_html/' .time() .'.html';
    file_put_contents($archivoTemporario,$datos['file_content']);
    $reader=IOFactory::createReader('Html');
    $spreadsheet=$reader->load($archivoTemporario);
    $writer=IOFactory::createWriter($spreadsheet,'Xlsx');
    $nombreArchivo=time() . 'xlsx';
    $writer->save($nombreArchivo);
    header('Content-Type: application/x-www-form-urlencoded');
    header('Content-Transfer-Encoding:Binary');
    header("Content-disposition:attachment; filename=\"".$nombreArchivo."\"");
    readfile($nombreArchivo);
    unlink($archivoTemporario);
    unlink($nombreArchivo);
    exit;
}// fin if 






























?>