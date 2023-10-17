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
        //echo("Array asociatico del excel <br><br>");
        //var_dump($datosExcel);

        //echo("<br><br> Array asociatico de la BD <br><br>");
        //var_dump($datosBD);


    }// fin if
    else{
        echo('<div class="alert alert-danger">Verifique seleccionar un archivo y que la extension sea (xls o xlsx) </div>');

    } // fin else

    // tabla de comparacion entre los datos del excel y la base de datos   
?>
<?php
$indicesModificados=[];
$indicesNuevos=[];
$indicesSinModificar=[];
?>
<div class="container">
    <form action="#" method="post">
        <table>
            <tr>
                <th style="width: 20%;">Id Reloj</th>
                <th style="width: 20%;">Nombre del Reloj</th>
                <th style="width: 20%;">Precio</th>
                <th style="width: 20%;">Id Tipo</th>
                <th style="width: 20%;">Id Marca</th>
            </tr>
            <!-- Caso 1°  count (datosBD) < count (datosExcel)-->
            <?php
            $indicesM=comparar($datosBD,$datosExcel); // indices modificados
            $indicesN=nuevosRegistros($datosBD,$datosExcel); // indices nuevos
            $indicesS=sinModificar($indicesM,$indicesN,$datosExcel); // indices sin modificar
            $id=array_merge($indicesS,$indicesM,$indicesN);
            $nroM=count($indicesM);
            $nroS=count($indicesS);
            $nroN=count($indicesN);
            var_dump($id);

            echo('<tr>'.PHP_EOL);
            for($i=0;$i<count($datosExcel);$i++){
                if($i<$nroS){
                    echo('<td style="background-color:rgba(60,179,113,0.5)">'.$datosExcel[$id[$i]]['idReloj'].'</td>');
                    echo('<td style="background-color:rgba(60,179,113,0.5)">'.$datosExcel[$id[$i]]['nombreReloj'].'</td>');
                    echo('<td style="background-color:rgba(60,179,113,0.5)">'.$datosExcel[$id[$i]]['precio'].'</td>');
                    echo('<td style="background-color:rgba(60,179,113,0.5)">'.$datosExcel[$id[$i]]['idTipo'].'</td>');
                    echo('<td style="background-color:rgba(60,179,113,0.5)">'.$datosExcel[$id[$i]]['idMarca'].'</td>');

                }// fin if
                if($nroS<=$i && $i<($nroS+$nroM)){
                    echo('<td style="background-color:rgba(255,0,0,0.5)">'.$datosExcel[$id[$i]]['idReloj'].'</td>');
                    echo('<td style="background-color:rgba(255,0,0,0.5)">'.$datosExcel[$id[$i]]['nombreReloj'].'</td>');
                    echo('<td style="background-color:rgba(255,0,0,0.5)">'.$datosExcel[$id[$i]]['precio'].'</td>');
                    echo('<td style="background-color:rgba(255,0,0,0.5)">'.$datosExcel[$id[$i]]['idTipo'].'</td>');
                    echo('<td style="background-color:rgba(255,0,0,0.5)">'.$datosExcel[$id[$i]]['idMarca'].'</td>');

                }// fin if
                if(($nroS+$nroM)<=$i && $i<($nroS+$nroM+$nroN-1)){
                    echo('<td style="background-color:rgba(0,0,255,0.5)">'.$datosExcel[$id[$i]]['idReloj'].'</td>');
                    echo('<td style="background-color:rgba(0,0,255,0.5)">'.$datosExcel[$id[$i]]['nombreReloj'].'</td>');
                    echo('<td style="background-color:rgba(0,0,255,0.5)">'.$datosExcel[$id[$i]]['precio'].'</td>');
                    echo('<td style="background-color:rgba(0,0,255,0.5)">'.$datosExcel[$id[$i]]['idTipo'].'</td>');
                    echo('<td style="background-color:rgba(0,0,255,0.5)">'.$datosExcel[$id[$i]]['idMarca'].'</td>');

                }// fin if 
                echo('</tr>'.PHP_EOL);
            }// fin for
            
            ?>
        </table>
    </form>
    <button type="submit"> Confirmar Datos </button>
</div>






