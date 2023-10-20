<?php
$Titulo = "Grupo 5 PhpSpreadsheet";
include_once("header.php");

?>
<head> 
    <link type="text/css" rel="stylesheet" href="../css/estilos.css">
</head>
<div class="flex-column">
<h1 class ="tit">Libreria PhpSpreadSheet</h1>
<div class="container mt-3" >
    <section>
        <h2 class ="tit">Descripción</h2>
        <p>Es una libreria escrita en PHP, ofreciendo una variedad de clases que permiten manipular archivos de excel, asi como 
            tambien otros tipos de archivo como CSV, SYLK, entre otros archivos.
        </p>
        <h2 class ="tit">Requerimientos</h2>
        <p>La version de PHP 8.0 o mayor. Antes de instalar la libreria se recomienda instalar <strong>composer</strong>.Este es un gestor 
            de librerias de PHP. Para saber sobre su instalación y requerimiento visite <a href="https://getcomposer.org/">Composer</a> 

        </p>
        <h2 class ="tit">Instalación</h2>
        <p>
            Una vez instalado composer , puede corroborarlo al ingresar a la terminal e ingresar <strong>composer -v</strong>.
            Abra el editor de codigo con el cual trabaje y dirigase al directorio raiz del proyecto.<br><br>
            <img src="../imagenes/Sin título.png" width="900px" height="240px"> 
            <br><br>
            Para instalar la libreria escriba: <strong> composer require phpoffice/phpspreadsheet </strong><br>
            Se descargar una carpeta <strong>vendor</strong> donde se almacenará la libreria.  
        </p>

        <h2 class ="tit">Hello World</h2>
        <img src="../imagenes/ejemplo.png"><br><br>
        <p>Como se puede ver en el ejemplo lo primero que debemos hacer empezar a usar la libreria es llamar al script vendor 
        y con <strong>use</strong> llamamos las distintas clases para usar los metodos correspondientes. Por ejemplo la clase 
        <strong>Spreadsheet</strong> se utiliza para crear un objeto y llamar al metodo <strong>getActiveSheet()</strong> para activar 
        la escritura o lectura del archivo. El metodo <strong> set </strong>, escribimos en el archivo y el objeto <strong>writer</strong>, 
        la usamos para guardar los cambios escritos. 
        </p>
    </section>
</div>
<div class="container mt-3">
    <section>     
        <h2 class ="tit">Clases Escritor y Lector de archivos</h2>
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
    </section>

    <div class="container">
        <h3 class ="tit">Clases "Hoja" y "Hoja de calculo"</h3>
        <p>La instancia de clase Spreadsheet (Hoja de calculo) es el objeto principal que contiene los otros objetos.<br>
        <code>$SP = new Spreadsheet();</code><br>
        Para crear una instancia de clase Worksheet (Hoja o solapa):<br>
        <code>$WS = new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($SP, 'Nombre');</code><br>
        <code>$SP->addSheet($WS, 0);</code><br>
        Para cambiar el nombre a una solapa <br>
        <code>$WS->setTitle('nombre);</code>
        Para seleccionar una solapa por el nombre<br>
        <code>$WS = $SP->setActiveSheetIndexByName('nombre'); </code><br>
        Tambien se las puede seleccionar con el indice de la solapa
        </p>
    </div>
    <div class="container">
        <h3 class ="tit">Acceder a las celdas</h3>
        <p>

        </p>
    </div>
          
</div>
</div>
        
<?php
include_once("footer.php");
?>