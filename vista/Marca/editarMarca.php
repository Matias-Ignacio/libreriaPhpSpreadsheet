<?php
include_once '../../configuracion.php';
$Titulo = "Marcas";
include_once '../estructura/header.php';

$objMarca=new AbmMarca();
$datos=data_submitted();
$obj=null; 
if(isset($datos['idMarca'])){
    $listaMarca=$objMarca->buscar($datos);
    if(count($listaMarca)==1){
        $obj=$listaMarca[0];
    }// fin if 
}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container mt-3">
        <form action="accionMarca.php" method="post">
            <label for="id" style="width:150px">Codigo ID</label>
            <input type="number" name="idMarca" id="idMarca" readonly value="<?php echo($obj->getidMarca()) ?>"><br>
            <label for="nombreMarca" style="width:150px"> Nombre de la Marca</label>
            <input type="text" name="nombreMarca" id="nombreMarca" value="<?php echo($obj->getnombreMarca()) ?>"><br><br>
            <input type="submit" name="accion" id="borrar" class="btn btn-danger" value="Borrar">
            <input type="submit" name="accion" id="editar" class="btn btn-info" value="Cambiar">
            <a href="indexMarca.php" class="btn btn-secondary">Volver</a>
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    </div>
<?php
include_once("../estructura/footer.php");
?>