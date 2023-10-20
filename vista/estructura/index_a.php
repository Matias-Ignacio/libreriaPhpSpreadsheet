<?php
$Titulo = "Grupo 5 PhpSpreadsheet";
include_once("header.php");

?>
<head> 
    <link type="text/css" rel="stylesheet" href="../css/estilos.css">
</head>
<h2>Libreria PhpSpreadSheet</h2>
<div class="container">
    <section>
        <h4>Descripción</h4>
        <p>Es una libreria escrita en PHP, ofreciendo una variedad de clases que permiten manipular archivos de excel, asi como 
            tambien otros tipos de archivo como CSV, SYLK, entre otros archivos.
        </p>
        <h4>Requerimientos</h4>
        <p>La version de PHP 8.0 o mayor. Antes de instalar la libreria se recomienda instalar <strong>composer</strong>.Este es un gestor 
            de librerias de PHP. Para saber sobre su instalación y requerimiento visite <a href="https://getcomposer.org/">Composer</a> 

        </p>
        <h4>Instalación</h4>
        <p>
            Una vez instalado composer , puede corroborarlo al ingresar a la terminal e ingresar <strong>composer -v</strong>.
            Abra el editor de codigo con el cual trabaje y dirigase al directorio raiz del proyecto.
            <img src="../imagenes/Sin título.png" width="300px" height="80px"> 
            <br>
            Para instalar la libreria escriba: <strong> composer require phpoffice/phpspreadsheet </strong><br>
            Se descargar una carpeta <strong>vendor</strong> donde se almacenará la libreria.  
        </p>

        <h4>Hello World</h4>
        <img src="../imagenes/ejemplo.png"><br>
        Como se puede ver en el ejemplo lo primero que debemos hacer empezar a usar la libreria es llamar al script vendor 
        y con <strong>use</strong> llamamos las distintas clases para usar los metodos correspondientes. Por ejemplo la clase 
        <strong>Spreadsheet</strong> se utiliza para crear un objeto y llamar al metodo <strong>getActiveSheet()</strong> para activar 
        la escritura o lectura dle archivo. El metodo <strong> set </strong>, escribimos en el archivo y el bjeto <strong>writer</strong>, 
        la usamos para guardar los cambios escritos. 
    </section>
</div>
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