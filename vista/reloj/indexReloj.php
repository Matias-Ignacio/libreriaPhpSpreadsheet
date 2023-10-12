<?php
$Titulo = "Lista Relojes";
include_once("../estructura/header.php");
$objAbmReloj = new AbmReloj();


$listaReloj = $objAbmReloj->buscar(null);
?>	

<div class="container mt-3">
  <h2 style="text-align: center; color:dodgerblue;">Tabla Reloj</h2>
  <h5 style="text-align: left; color:dodgerblue;">Relojess disponibles</h5>            
  <form action="editarReloj.php" method="post">
    <table>
        <tr>
            <th style="width:10%">Id</th>
            <th style="width:50%">Nombre del Reloj</th>
            <th style="width:10%">Precio</th>
            <th style="width:10%">Stock</th>
            <th style="width:10%">Id Marca</th>
            <th style="width:10%">Id Tipo</th>
        </tr>
        
            <?php if(count($listaReloj)>0){
                foreach($listaReloj as $reloj){?>
                    <tr>
                    <td><input type="hidden" name="idReloj" value="<?php echo($reloj->getidreloj()) ?>"> <?php echo($reloj->getidreloj()) ?></td>
                    <td><input type="hidden" name="nombreReloj" value="<?php echo($reloj->getnombreReloj()) ?>"> <?php echo($reloj->getnombrereloj())?></td>
                    <td><input type="hidden" name="precio" value="<?php echo($reloj->getprecio()) ?>"> <?php echo($reloj->getprecio())?></td>
                    <td><input type="hidden" name="stock" value="<?php echo($reloj->getstock()) ?>"> <?php echo($reloj->getstock())?></td>
                    <td><input type="hidden" name="idTipo" value="<?php echo($reloj->getobjTipo()->getidTipo()) ?>"> <?php echo($reloj->getobjTipo()->getnombreTipo())?></td>
                    <td><input type="hidden" name="idMarca" value="<?php echo($reloj->getobjMarca()->getidMarca()) ?>"> <?php echo($reloj->getobjMarca()->getnombreMarca())?></td>
                    <td><input type="submit" name="accion" id="editar" value="editar"></td>
                    <td><input type="submit" name="accion" id="borrar" value="borrar"></td>
                </tr>
                <?php    
                }// fin for 
            } ?>
            
        
    </table>
  </form>
</div>

<?php
include_once("../estructura/footer.php");
?>
