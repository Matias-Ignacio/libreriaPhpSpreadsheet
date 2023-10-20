<?php
$Titulo = "Grupo 5 PhpSpreadsheet";
include_once("header.php");

?>
<div role="main">
    <div class="section">     
        <h3>Clases Escritor y Lector de archivos</h3>
        <p>
        Para escribir o leer un archivo se usan las clases IWriter e IReader.<br>
        <code>\PhpOffice\PhpSpreadsheet\Reader\IReader</code><br>
        <code>\PhpOffice\PhpSpreadsheet\Writer\IWriter</code>
        Se puede hacer de forma automatica, que la clase busque el formato adecuado del archivo o de forma directa indicando
        que tipo de archivo es el utilizado. Los mas comunes son Xlsx, Xls, Xml, .ods, CSV, HTML, PDF.<br>
        Por ejemplo:<br>
        Se crea el escritor del formato Xlsx<br>
        <code>$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);</code><br>
        <code>$writer->save("05featuredemo.xlsx");</code><br>

        </p>
    </div>

    <div class="section">
        <h3>Clases "Hoja" y "Hoja de calculo"</h3>
        <p>
        </p>
    </div>
    <div class="section">
        <h3>Acceder a las celdas</h3>
        <p>

        </p>
    </div>
          
</div>
        
<?php
include_once("footer.php");
?>