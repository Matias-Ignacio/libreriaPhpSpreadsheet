<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$objMarca=new AbmMarca();
$datos=data_submitted();
echo($datos['accion']);
$obj=null; 
if(isset($datos['idMarca'])){
    $listaMarca=$objMarca->buscar($datos);
    if(count($listaMarca)==1){
        $obj=$listaMarca[0];
    }// fin if 

}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container">
        <form action="accionMarca.php" method="post">
            <label for="id">ID</label>
            <input type="number" name="idMarca" id="idMarca" readonly value="<?php echo($obj->getidMarca()) ?>">
            <label for="nombreMarca"> Nombre de la Marca</label>
            <input type="text" name="nombreMarca" id="nombreMarca" value="<?php echo($obj->getnombreMarca()) ?>">
            <input type="hidden" name="accion" id="accion" value="<?php echo(($datos['accion']=='borrar') ?  "borrar" : "editar") ?>">
            <input type="submit" value="<?php echo(($datos['accion']=='borrar') ?  "borrar" : "editar") ?>">
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    <a href="indexMarca.php">Volver</a>
    </div>