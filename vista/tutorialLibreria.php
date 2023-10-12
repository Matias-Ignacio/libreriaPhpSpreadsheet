<?php
require_once '../../vendor/autoload.php';

// llamado a las clases de la libreria 

use PhpOffice\PhpSpreadsheet\Spreadsheet; // clase  para crear un excel 
use PhpOffice\PhpSpreadsheet\Writer\Xls;  // clase para escribir en el excel

$excel=new Spreadsheet();
$excelActivo=$excel->getActiveSheet(); // prepara el excel para realizar cambios


exit;



?>