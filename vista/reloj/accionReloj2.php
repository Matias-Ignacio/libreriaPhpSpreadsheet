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
var_dump($datos["nombre"]);
$resp=false;

for($i=0;$i<count($id);$i++){
    if($i<$nroNuevos){
        $datosEnviar["nombreReloj"]=$datos["nombre"][$i];
        $datosEnviar["precio"]=$datos["precio"][$i];
        $datosEnviar["idReloj"]=$datos["id"][$i];
        $datosEnviar["idTipo"]=$datos["idTipo"][$i];
        $datosEnviar["idMarca"]=$datos["idMarca"][$i];
        if($datos["accion1"]=="Cambiar"){
            if($objReloj->alta($datosEnviar)){
                $resp=true;
            }// fin if 

        }// fin if 
    }// fin if 

    
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

