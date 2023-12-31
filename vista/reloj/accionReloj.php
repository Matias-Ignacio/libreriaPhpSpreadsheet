<?php
    include_once '../../configuracion.php';
    $Titulo = "Lista de Relojer";
    include_once '../estructura/header.php';
    $hoja = "Relojes";
    include '../funciones/crearHC.php';

    $resp=false; 
    $objReloj=new AbmReloj();
    $listaObj = $objReloj->buscar(null);
    $datos=data_submitted();
    
    if(isset($datos['accion'])){
        if(($datos['accion']=='Cambiar')){
            $datos["idReloj"] = intval($datos["idReloj"]);
            $datos["idMarca"] = intval($datos["idMarca"]); 
            $datos["idTipo"] = intval($datos["idTipo"]);
            $datos["precio"] = floatval($datos["precio"]);
            var_dump($datos);
            if($objReloj->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='Borrar'){
            if($objReloj->baja($datos)){
                $resp=true; 

            }// fin if 

        }// fin if 
        if($datos['accion']=='Nuevo'){
            //echo("<br> nuevo");
            $datos["idReloj"] = intval($datos["idReloj"]);
            $datos["idMarca"] = intval($datos["idMarca"]); 
            $datos["idTipo"] = intval($datos["idTipo"]);
            $datos["precio"] = floatval($datos["precio"]);
            if($objReloj->alta($datos)){
                $resp=true;
            }// fin if 

        }// fin if
        if($datos['accion']=='Exportar Excel'){
            $arreglo_titulos = ["ID", "Reloj", "Precio", "Tipo", "Marca"];
            $dimension = "B2:F2";
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet, $dimension);
            $dimension = "B3:F";
            $activeWorksheet = bodyHC($listaObj, $activeWorksheet, $dimension);
            writeHC($spreadsheet);
            $resp=true;
            echo "<h3>Hecho</h3><br>";
            echo "<a href='../../Archivos/Relojes.xlsx'>Descarga Excel</a><br>";       
        }

        if($datos['accion']=='Exportar todo'){
            general($spreadsheet);
            writeHC($spreadsheet);
            $resp=true;
            echo "<h3>Hecho</h3><br>";
            echo "<a href='../../Archivos/Relojes.xlsx'>Descarga Excel</a><br>"; 
        }

        if($resp){
            $mensaje="La accion ".$datos['accion']."  se realizao correctamente " ;
        }
        else{
            //echo("mensaje error");
            $mensaje="Hubo un problema con la accion ".$datos['accion']." ";
            
        }

    }// fin if

    
?>

<div class="container">
    <?php
    echo($mensaje);
    ?>
</div>
<a href="indexReloj.php">Volver</a>

<?php
include_once("../estructura/footer.php");
?>