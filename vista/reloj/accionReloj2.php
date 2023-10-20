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
var_dump(count($id));
$resp=false;

for($i=0;$i<count($id);$i++){
    // parte que llama al metodo alta
    if($i<$nroNuevos){
        $datosEnviar["nombreReloj"]=$datos["nombre"][$id[$i]-1];
        $datosEnviar["precio"]=floatval($datos["precio"][$id[$i]-1]);
        $datosEnviar["idReloj"]=intval($datos["id"][$id[$i]-1]);
        $datosEnviar["idTipo"]=intval($datos["idTipo"][$id[$i]-1]);
        $datosEnviar["idMarca"]=intval($datos["idMarca"][$id[$i]-1]);
        if($datos["accion1"]=="Cambiar"){
            if($objReloj->alta($datosEnviar)){
                $resp=true;
            }// fin if 

        }// fin if 
    }// fin if 
    
    //parte que llama al metodo modificacion
    if($i>=$nroNuevos && $i<($nroModificados+$nroNuevos+$nroSinModificar)){
        $datosEnviar["nombreReloj"]=$datos["nombre"][$id[$i]-1];
        $datosEnviar["precio"]=$datos["precio"][$id[$i]-1];
        $datosEnviar["idReloj"]=$datos["id"][$id[$i]-1];
        $datosEnviar["idTipo"]=$datos["idTipo"][$id[$i]-1];
        $datosEnviar["idMarca"]=$datos["idMarca"][$id[$i]-1];
        if($datos["accion2"]=="Cambiar"){
            if($objReloj->modificacion($datosEnviar)){
                $resp=true;
            }
        }
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

