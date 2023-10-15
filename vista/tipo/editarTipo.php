<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$objTipo=new AbmTipo();
$datos=data_submitted();
var_dump($datos);
$obj=null; 
if(isset($datos['idTipo'])){
    $listaTipo=$objTipo->buscar($datos);
    if(count($listaTipo)==1){
        $obj=$listaTipo[0];
    }// fin if 

}// fin if 
?>

<?php  if($obj!=null){?>
    <div class="container">
        <form action="accionTipo.php" method="post">
            <label for="id">ID</label>
            <input type="number" name="idTipo" id="idTipo" readonly value="<?php echo($obj->getidTipo()) ?>"><br>
            <label for="nombreTipo"> Nombre del Tipo de Reloj</label>
            <input type="text" name="nombreTipo" id="nombreTipo" value="<?php echo($obj->getnombreTipo()) ?>"><br>
            <input type="submit" value="Borrar">
            
            <input type="submit" name="accion" id="editar" value="editar">
        </form>
    
<?php } else{
        echo("<p>No se encontro el campo que desea modificar </p>");     
    }
?>
    <a href="indexTipo.php">Volver</a>
    </div>