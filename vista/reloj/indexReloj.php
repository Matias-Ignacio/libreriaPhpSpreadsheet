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
    <table class="table-striped">
        <tr>
            <th style="width:10%">Id</th>
            <th style="width:45%">Nombre del Reloj</th>
            <th style="width:15%">Precio</th>
            <th style="width:15%">Marca</th>
            <th style="width:15%">Tipo</th>
        </tr>
        
            <?php if(count($listaReloj)>0){
                foreach($listaReloj as $reloj){?>
                    <tr>
                    <td> <?php echo($reloj->getidreloj()) ?></td>
                    <td> <?php echo($reloj->getnombrereloj())?></td>
                    <td> <?php echo($reloj->getprecio())?></td>
                    <td> <?php echo($reloj->getobjTipo()->getnombreTipo())?></td>
                    <td> <?php echo($reloj->getobjMarca()->getnombreMarca())?></td>
                    
                    <td><a href="editarReloj.php?idReloj=<?php echo($reloj->getidreloj()) ?>" class="btn btn-info">Editar</a></td>
                </tr>
                <?php    
                }// fin for 
            } ?>
    </table>
  </form>
  <form action="accionReloj.php" method="post">
            <br><input type="submit" name="accion" id="creaHC" value="Exportar Excel" class="btn btn-dark">
  </form>
</div>

<?php
include_once("../estructura/footer.php");
?>
