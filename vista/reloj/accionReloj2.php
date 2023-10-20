<?php
     include_once '../estructura/header.php';
    include_once '../../vendor/autoload.php';
    include_once 'funciones.php';
    include_once '../../configuracion.php';

    $resp=false; 
    $objReloj=new AbmReloj();
    $datos=data_submitted();
    $nroModificados=intval($datos["cantM"]);
    $nroSinModificar=intval($datos["cantSM"]);
    $nroNuevos=intval($datos["cantN"]);
    $id=$datos["indices"];
    var_dump($id);
    $resp=false;
    
    for($i=0;$i<count($datos["indices"]);$i++){
        if($i<$nroNuevos){
            // LLAMA AL INSERTAR 
            if($datos["accion2"]=="Nuevo"){
                if(($datos['accion2']=='Cambiar')){
                    $datos[$i]["idReloj"] = intval($datos[$i]["idReloj"]);
                    $datos[$i]["idMarca"] = intval($datos[$i]["idMarca"]); 
                    $datos[$i]["idTipo"] = intval($datos[$i]["idTipo"]);
                    $datos[$i]["precio"] = floatval($datos[$i]["precio"]);
                    if($objReloj->alta($datos[$i])){
                        $resp=true;

                    }// fin if 

            }// fin if 

        }// fin if 

    }// fin if  nuevo
    if($nroNuevos<=$i && $i<($nroModificados+$nroNuevos)){
        if($datos["accion1"]=="Cambiar"){
            $datos[$i]["idReloj"] = intval($datos[$i]["idReloj"]);
            $datos[$i]["idMarca"] = intval($datos[$i]["idMarca"]); 
            $datos[$i]["idTipo"] = intval($datos[$i]["idTipo"]);
            $datos[$i]["precio"] = floatval($datos[$i]["precio"]);
            if($objReloj->modificacion($datos[$i])){
                $reso=true;
            }// fin if 

        }// fin if 
    }// fin if modificados 
}// fin for  

if($resp){
        $mensaje="Las acciones ".$datos["accion1"]." y ".$datos["accion2"]." se realizaron correctamente";
}
else{
        $mensaje="Hubo problema con la accion ".$datos["accion1"]."  o con la accion ".$datos["accion2"];
            
}

?>

<div class="container">
    <?php
    echo($mensaje);
    ?>
</div>
<a href="indexReloj.php">Volver </a>

<?php
include_once("../estructura/footer.php");
?>

