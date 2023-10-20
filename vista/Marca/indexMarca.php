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
            <th style="width:20%">Id</th>
            <th style="width:80%">Nombre de la Marca</th>
            <th style="width:auto"></th>
            <th style="width:auto"></th>
        </tr>
        
            <?php if(count($listaMarca)>0){
                foreach($listaMarca as $marca){?>
                    <tr>
                    <td><?php echo($marca->getidMarca()) ?></td>
                    <td><?php echo($marca->getnombreMarca())?></td>
                    <td><a href="editarMarca.php?idMarca=<?php echo($marca->getidmarca()) ?>" class="btn btn-info">Editar</a></td>
                </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionMarca.php" method="post">
            <input type="submit" name="accion" id="creaHC" value="Exportar Excel" class="btn btn-dark">
            <input type="submit" name="accion" id="creaHC" value="Exportar todo" class="btn btn-dark">
  </form>

</div>

<?php
include_once("../estructura/footer.php");
?>
