<?php
$Titulo = "Lista Relojes";
include_once("../estructura/header.php");
$objAbmReloj = new AbmReloj();

$listaReloj = $objAbmReloj->buscar(null);
//var_dump($listaReloj);
?>	

<div class="container mt-3">
  <h2 style="text-align: center; color:dodgerblue;">Tabla Reloj</h2>
  <h5 style="text-align: left; color:dodgerblue;">Relojess disponibles</h5>            
  <form action="editarReloj.php" method="post">
    <table class="table-striped">
        <tr>
            <th style="width:10%">Id</th>
            <th style="width:50%">Nombre del Reloj</th>
            <th style="width:10%">Precio</th>
            <th style="width:10%">Id Marca</th>
            <th style="width:10%">Id Tipo</th>
            <th style="width:10%">Marca</th>
            <th style="width:10%">Tipo</th>
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
</div>


<?php
include_once("../estructura/footer.php");
?>
