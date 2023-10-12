<?php
    include_once '../../configuracion.php';
    include_once '../estructura/header.php';

    $datos =data_submitted();
    $resp=false; 
    $objReloj=new AbmReloj();

    if(isset($datos['accion'])){
        if(($datos['accion']=='editar')){
            if($objReloj->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='borrar'){
            if($objReloj->baja($datos)){
                $resp=true; 

            }// fin if 

        }// fin if 
        if($datos['accion']=='nuevo'){
            if($objReloj->alta($datos)){
                $resp=true;
            }// fin if 

        }// fin if
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