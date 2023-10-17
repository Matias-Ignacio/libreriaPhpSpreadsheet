<?php
include_once '../../configuracion.php';
$Titulo = "Ventas";
include_once '../estructura/header.php';

$objVenta = new AbmVenta();
$datos=data_submitted();
$obj=null; 
if(isset($datos['idVenta'])){
    $listaObj=$objVenta->buscar($datos);
    if(count($listaObj)==1){
        $obj=$listaObj[0];
    }// fin if 
}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container mt-3">
        <form action="accionVenta.php" method="post">
            <label for="id" style="width:100px">Codigo ID</label>
            <input type="number" name="idVenta" id="idVenta" readonly value="<?php echo($obj->getidVenta()) ?>"><br>
            <label for="fecha" style="width:100px">Fecha</label>
            <input type="text" name="fecha" id="fecha" value="<?php echo($obj->getfecha()) ?>"><br>
            <label for="importe" style="width:100px">Importe</label>
            <input type="text" name="importe" id="importe" value="<?php echo($obj->getimporte()) ?>"><br><br>
            <input type="submit" name="accion" id="borrar" class="btn btn-danger" value="Borrar">
            <input type="submit" name="accion" id="editar" class="btn btn-info" value="Editar">
            <a href="indexVenta.php" class="btn btn-secondary">Volver</a>
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    </div>
<?php
include_once("../estructura/footer.php");
?>