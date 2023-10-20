<?php
$Titulo = "Ventas";
include_once("../estructura/header.php");
$objAbm = new AbmVenta();

$listaObj = $objAbm->buscar(null);
?>	

<div class="container mt-3">
  <h2 style="text-align: center; color:dodgerblue;">Ventas</h2>
  <h5 style="text-align: left; color:dodgerblue;">Ventas realizadas</h5>            
  <form action="editarVenta.php" method="post">
    <table class="table-striped">
        <tr>
            <th style="width:20%">Id</th>
            <th style="width:20%">Fecha</th>
            <th style="width:20%">ID Reloj</th>
            <th style="width:20%">Reloj</th>
            <th style="width:20%">Precio</th>
            <th style="width:20%">Cantidad</th>
            <th style="width:20%">Importe</th>
            <th style="width:auto"></th>
        </tr>
        
            <?php if(count($listaObj)>0){
                foreach($listaObj as $obj){?>
                    <tr>
                    <td> <?php echo($obj->getidVenta()) ?> </td>
                    <td> <?php echo($obj->getfecha())?></td>
                    <td> <?php echo($obj->getobjReloj()->getidReloj())?></td>
                    <td> <?php echo($obj->getobjReloj()->getnombreReloj())?></td>
                    <td> <?php echo($obj->getobjReloj()->getprecio())?></td>
                    <td> <?php echo($obj->getcantidad())?></td>
                    <td> <?php echo($obj->getimporte())?></td>
                    <td><a href="editarVenta.php?idVenta=<?php echo($obj->getidVenta()) ?>" class="btn btn-info">Editar</a></td>
                    </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionVenta.php" method="post">
            <br><input type="submit" name="accion" id="creaHC" value="Exportar Excel" class="btn btn-dark">
  </form>
</div>

<?php
include_once("../estructura/footer.php");

?>
