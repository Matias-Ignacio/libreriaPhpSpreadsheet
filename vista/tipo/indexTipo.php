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
            <th style="width:30%">Id</th>
            <th style="width:70%">Tipo de Reloj</th>
            <th style="width:auto"></th>
            <th style="width:auto"></th>
        </tr>
        
            <?php if(count($listaTipo)>0){
                foreach($listaTipo as $tipo){?>
                    <tr>
                    <td> <?php echo($tipo->getidtipo()) ?> </td>
                    <td> <?php echo($tipo->getnombretipo())?></td>
                    <td><a href="editarTipo.php?idTipo=<?php echo($tipo->getidtipo()) ?>" >Editar</a></td>
                    <td><a href="editarTipo.php?idTipo=<?php echo($tipo->getidtipo()) ?>" >Borrar</a></td>
                    
                    </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionTipo.php" method="post">
            <input type="submit" name="accion" id="creaHC" value="Excel">
  </form>
</div>

<?php
include_once("../estructura/footer.php");
//<td><a href="editarTipo.php?idTipo=<?php echo($tipo->getidtipo())?>    <?php //">Editar</a></td></tr>
?>
