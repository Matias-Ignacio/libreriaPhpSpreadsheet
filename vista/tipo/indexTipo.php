<?php
$Titulo = "Lista Tipos";
include_once("../estructura/header.php");
$objAbmTipo = new AbmTipo();

$listaTipo = $objAbmTipo->buscar(null);
?>	

<div class="container mt-3">
  <h2 style="text-align: center; color:dodgerblue;">Tabla Tipos</h2>
  <h5 style="text-align: left; color:dodgerblue;">Tipos disponibles</h5>            
  <form action="editarTipo.php" method="post">
    <table class="table-striped">
        <tr>
            <th style="width:20%">Id</th>
            <th style="width:80%">Tipo de Reloj</th>
            <th style="width:auto"></th>
        </tr>
        
            <?php if(count($listaTipo)>0){
                foreach($listaTipo as $tipo){?>
                    <tr>
                    <td> <?php echo($tipo->getidtipo()) ?> </td>
                    <td> <?php echo($tipo->getnombretipo())?></td>
                    <td><a href="editarTipo.php?idTipo=<?php echo($tipo->getidtipo()) ?>" class="btn btn-info">Editar</a></td>
                    </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionTipo.php" method="post">
            <br><input type="submit" name="accion" id="creaHC" value="Exportar Excel" class="btn btn-dark">
            <input type="submit" name="accion" id="creaHC" value="Exportar todo" class="btn btn-dark">
  </form>
</div>

<?php
include_once("../estructura/footer.php");
?>
