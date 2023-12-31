<?php
    include_once '../../configuracion.php';
    $Titulo = "Lista de Tipos";
    include_once '../estructura/header.php';
    $hoja = "Tipos";
    include '../funciones/crearHC.php';
  
    $datos =data_submitted();
    $resp=false; 
    $objTipo=new AbmTipo();
    $listaObj = $objTipo->buscar(null);

    if(isset($datos['accion'])){
        if(($datos['accion']=='Cambiar')){
            if($objTipo->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='Borrar'){
            if($objTipo->baja($datos)){
                $resp=true; 
            }// fin if 
        }// fin if 
        if($datos['accion']=='Nuevo'){
            if($objTipo->alta($datos)){
                $resp=true;
            }// fin if 
        }// fin if
        if($datos['accion']=='Exportar Excel'){
            $arreglo_titulos = ["ID", "Tipo"];
            $dimension = "B2:C2";
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet, $dimension);
            $dimension = "B3:C";
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
            $mensaje="Hubo un problema con la accion ".$datos['accion']." ";
            
        }
    }// fin if
?>

<div class="container">
    <?php
    echo($mensaje);
    ?>
</div>
<?php
include_once("../estructura/footer.php");
?>