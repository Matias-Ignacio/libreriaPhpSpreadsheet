<?php
    include_once '../../configuracion.php';
    include_once '../estructura/header.php';
    $hoja = "Tipos";
    include '../funciones/crearHC.php';
  
    $datos =data_submitted();
    $resp=false; 
    $objTipo=new AbmTipo();
    $listaObj = $objTipo->buscar(null);

    if(isset($datos['accion'])){
        if(($datos['accion']=='editar')){
            if($objTipo->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='borrar'){
            if($objTipo->baja($datos)){
                $resp=true; 
            }// fin if 
        }// fin if 
        if($datos['accion']=='nuevo'){
            if($objTipo->alta($datos)){
                $resp=true;
            }// fin if 
        }// fin if
        if($datos['accion']=='creaHC'){
            $arreglo_titulos = ["ID", "Tipo"];
            $arreglo_celdas = formarArreglo($listaObj);
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet);
            $activeWorksheet = bodyHC($arreglo_celdas, $activeWorksheet);
            writeHC($spreadsheet);
            $resp=true;
            echo "<h3>Hecho</h3>";
            echo "<a href='grupo5.xlsx'>grupo5</a>";          
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