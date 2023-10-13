<?php
$Titulo = "Lista Marcas";
include_once("../estructura/header.php");
$objAbmMarca = new AbmMarca();

$listaMarca = $objAbmMarca->buscar(null);
?>	

<div class="container mt-3">
  <h2 style="text-align: center; color:dodgerblue;">Tabla Marcas</h2>
  <h5 style="text-align: left; color:dodgerblue;">Marcas disponibles</h5>    
  <form action="editarMarca.php" method="post">
    <table class="table-striped">
        <tr>
            <th style="width:30%">Id</th>
            <th style="width:70%">Nombre de la Marca</th>
            <th style="width:auto"></th>
            <th style="width:auto"></th>
        </tr>
        
            <?php if(count($listaMarca)>0){
                foreach($listaMarca as $marca){?>
                    <tr>
                    <td><input type="hidden" name="idMarca" value="<?php echo($marca->getidMarca()) ?>"> <?php echo($marca->getidMarca()) ?></td>
                    <td><input type="hidden" name="nombreMarca" value="<?php echo($marca->getnombreMarca()) ?>"> <?php echo($marca->getnombreMarca())?></td>
                    <td><input type="submit" name="accion" id="editar" value="editar"></td>
                    <td><input type="submit" name="accion" id="borrar" value="borrar"></td>
                </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionMarca.php" method="post">
            <input type="submit" name="accion" id="creaHC" value="creaHC">
  </form>
</div>

<?php
include_once("../estructura/footer.php");
?>
