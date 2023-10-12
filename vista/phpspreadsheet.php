<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet(); // crea un obj spreadsheet 
$worksheet = $spreadsheet->getActiveSheet(); // llama al metodo para activar el obj
$worksheet
->setCellValue('A1','Tax Rate')
->setCellValue('B1','=85%')  // un forma de escribir un % en una celda 
->setCellValue('A3','Net price')
->setCellValue('B3',12.99)
->setCellValue('A4','Tax')
->setCellValue('A5','PRICE INCLUDING TAX');

// define los rango de los nombre
$spreadsheet->addNamedRange(new \PhpOffice\PhpSpreadsheet\NamedRange('Tax_RATE',$worksheet,'=$B$1'));
// prove un nombre de referencia a la celda o al rango de celdas. En etse caso a B1 y B3
$spreadsheet->addNamedRange(new \PhpOffice\PhpSpreadsheet\NamedRange('PRICE',$worksheet,'=$B$3'));

$worksheet
->setCellValue('B4','=PRICE*Tax_RATE')
->setCellValue('B5','=PRICE*(1+Tax_RATE)'); // setea el valor calculado a las celdas B4 y B5
echo sprintf('Con un impuesto de %.2f y un precio bruto de %.2f, El impuesto es de %.2f y el precio neto es %.2f',
$worksheet->getCell('B1')->getCalculatedValue(),
$worksheet->getCell('B3')->getValue(),
$worksheet->getCell('B4')->getCalculatedValue(),
$worksheet->getCell('B5')->getCalculatedValue()
), PHP_EOL;

$write =PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,"Xlsx");
$write->save("grupo5.xlsx");


?>
