<?php
include_once '../../configuracion.php';

$objReloj=new AbmReloj();
$datos=data_submitted();
echo($datos['accion']);
$obj=null; 
if(isset($datos['idReloj'])){
    $listaRelojes=$objReloj->buscar($datos);
    if(count($listaRelojes)==1){
        $obj=$listaRelojes[0];
    }// fin if 

}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container">
        <form action="accionReloj.php" method="post">
            <label for="id">ID</label>
            <input type="number" name="idReloj" id="idReloj" readonly value="<?php echo($obj->getidReloj()) ?>">
            <label for="nombreTipo"> Nombre del Reloj</label>
            <input type="text" name="nombreReloj" id="nombreReloj" value="<?php echo($obj->getnombreReloj()) ?>">
            <label for="nombreTipo"> Precio</label>
            <input type="text" name="precio" id="precio" value="<?php echo($obj->getprecio()) ?>">
            <label for="nombreTipo"> Stock</label>
            <input type="text" name="stock" id="stock" value="<?php echo($obj->getstock()) ?>">
            <label for="nombreTipo"> Id Marca</label>
            <input type="text" name="idMraca" id="idMarca" value="<?php echo($obj->getobjMarca()->getidMarca()) ?>">
            <label for="nombreTipo"> Id Tipo </label>
            <input type="text" name="idTipo" id="idTipo" value="<?php echo($obj->getobjTipo()->getidTipo()) ?>">
            <input type="hidden" name="accion" id="accion" value="<?php echo(($datos['accion']=='borrar') ?  "borrar" : "editar") ?>">
            <input type="submit" value="<?php echo(($datos['accion']=='borrar') ?  "borrar" : "editar") ?>">
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    <a href="indexReloj.php">Volver</a>
    </div>