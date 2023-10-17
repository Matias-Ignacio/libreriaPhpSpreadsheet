<?php
include_once '../../configuracion.php';
$Titulo = "Relojes";
include_once '../estructura/header.php';

$objAbmMarca = new AbmMarca();
$listaMarca = $objAbmMarca->buscar(null);
$objAbmTipo = new AbmTipo();
$listaTipo = $objAbmTipo->buscar(null);


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
            <label for="nombreReloj" style="width:120px"> Reloj</label>
            <input type="text" name="nombreReloj" id="nombreReloj" value="<?php echo($obj->getnombreReloj()) ?>"><br>
            <label for="precio" style="width:120px"> Precio</label>
            <input type="text" name="precio" id="precio" value="<?php echo($obj->getprecio()) ?>"><br>
            <label for="Marca" style="width:120px"> Id Marca</label>
      
            <select id="idMarca" name="idMarca">
                <option value="<?php echo($obj->getobjMarca()->getidMarca())?>"><?php echo($obj->getobjMarca()->getnombreMarca()) ?></option>
                <?php foreach($listaMarca as $marca){?>
                    <option value="<?php echo($marca->getIdMarca()) ?>"> <?php echo ($marca->getnombreMarca()); ?></option>
                    <?php } ?>      
                </select><br>
            <label for="Tipo" style="width:120px"> Id Tipo </label>

            <select id="idTipo" name="idTipo">
                <option value="<?php echo($obj->getobjTipo()->getIdTipo()) ?>"><?php echo($obj->getobjTipo()->getnombreTipo()) ?></option>
                <?php foreach($listaTipo as $tipo){?>
                    <option value="<?php echo($tipo->getIdTipo()) ?>"> <?php echo ($tipo->getnombreTipo()); ?></option>
                    <?php } ?>      
                </select><br>
            <br><br>
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
//      <input type="text" name="idMarca" id="idMarca" value="<?php echo($obj->getobjMarca()->getidMarca()) ? >">
//<input type="text" name="idTipo" id="idTipo" value="<?php echo($obj->getobjTipo()->getIdTipo()) ? >">
?>