<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$objReloj=new AbmReloj();
$datos=data_submitted();
$obj=null; 
if(isset($datos['idReloj'])){
    $listaRelojes=$objReloj->buscar($datos);
    if(count($listaRelojes)==1){
        $obj=$listaRelojes[0];
    }// fin if 

}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container mt-3">
        <form action="accionReloj.php" method="post">
            <label for="id" style="width:120px">Codigo ID</label>
            <input type="number" name="idReloj" id="idReloj" readonly value="<?php echo($obj->getidReloj()) ?>"><br>
            <label for="nombreTipo" style="width:120px"> Reloj</label>
            <input type="text" name="nombreReloj" id="nombreReloj" value="<?php echo($obj->getnombreReloj()) ?>"><br>
            <label for="nombreTipo" style="width:120px"> Precio</label>
            <input type="text" name="precio" id="precio" value="<?php echo($obj->getprecio()) ?>"><br>
            <label for="nombreTipo" style="width:120px"> Id Marca</label>
            <input type="text" name="idMraca" id="idMarca" value="<?php echo($obj->getobjMarca()->getnombreMarca()) ?>"><br>
            <label for="nombreTipo" style="width:120px"> Id Tipo </label>
            <input type="text" name="idTipo" id="idTipo" value="<?php echo($obj->getobjTipo()->getnombreTipo()) ?>"><br><br>
            <input type="submit" name="accion" id="borrar" class="btn btn-danger" value="Borrar">
            <input type="submit" name="accion" id="editar" class="btn btn-info" value="Editar">
            <a href="indexReloj.php" class="btn btn-secondary">Volver</a>
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    </div>
<?php
include_once("../estructura/footer.php");
?>