<?php
include_once '../../configuracion.php';
$Titulo = "Tipos";
include_once '../estructura/header.php';

$objTipo=new AbmTipo();
$datos=data_submitted();
$obj=null; 
if(isset($datos['idTipo'])){
    $listaTipo=$objTipo->buscar($datos);
    if(count($listaTipo)==1){
        $obj=$listaTipo[0];
    }// fin if 
}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container mt-3">
        <form action="accionTipo.php" method="post">
            <label for="id" style="width:100px">Codigo ID</label>
            <input type="number" name="idTipo" id="idTipo" readonly value="<?php echo($obj->getidTipo()) ?>"><br>
            <label for="nombreTipo" style="width:100px">Tipo de Reloj</label>
            <input type="text" name="nombreTipo" id="nombreTipo" value="<?php echo($obj->getnombreTipo()) ?>"><br><br>
            <input type="submit" name="accion" id="borrar" class="btn btn-danger" value="Borrar">
            <input type="submit" name="accion" id="editar" class="btn btn-info" value="Editar">
            <a href="indexTipo.php" class="btn btn-secondary">Volver</a>
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    </div>
<?php
include_once("../estructura/footer.php");
?>