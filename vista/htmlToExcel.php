<!--
<!DOCTYPE html>
<html>
   <head>
     <title>Load Excel Sheet in Browser using PHPSpreadsheet</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center">Load Excel Sheet in Browser using PHPSpreadsheet</h3>
      <br />
      <div class="table-responsive">
       <span id="message"></span>
          <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td width="25%" align="right">Select Excel File</td>
                <td width="50%"><input type="file" name="select_excel" /></td>
                <td width="25%"><input type="submit" name="load" class="btn btn-primary" /></td>
              </tr>
            </table>
          </form>
       <br />
          <div id="excel_area"></div>
      </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
    //console.log("entro");
  $('#load_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"uploadExcel.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
        $('#excel_area').html(data);
        $('.table').css('width','100%');
      }
    })
  });
});
</script>

-->
<?php
  // EJEMPLO PARA CONVERTIR UNA TABLA HTML EN UN ARCHIVO EXCEL
include_once '../../configuracion.php';

$objReloj =new AbmReloj();
$listaRelojes=$objReloj->buscar(null);
//var_dump($listaRelojes); 
?>

<!-- CODIGO HTML PARA HACER LA TABLA -->
<section>
  <div class="container">
    <h2>Lista de relojes </h2>
    <form action="uploadExcel.php" method="post">
      <table class="table" id="table_content">
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>ID_Tipo</th>
          <th>ID_Marca</th>
        </tr>
        <?php
        foreach($listaRelojes as $reloj){
          echo('<td>'.$reloj->getnombreReloj().'</td>');
          
        }
        ?>
          <td><?php $reloj->getnombreReloj() ?></td>
          <td><?php  $reloj->getprecio() ?></td>
          <td><?php $reloj->getstock() ?></td>
          <td><?php $reloj->getobjTipo()->getnombreTipo() ?></td>
          <td><?php $reloj->getobjMarca()->getnombreMarca() ?></td>
      
      </table>
      <input type="hidden" name="file_content" id="file_content">
      <button type="submit" name="convertit" id="convertir"> Convertir a Excel</button>
    </form>
  </div>
  <script src="../libs/node_modules/jquery/dist/jquery.min.js"></script>
</section>

<script>
  $(document).ready(function(){
    $("#convertir").click(function(){
      var tabla = '<table>';
      tabla += $('#table_content').html();
      tabla+='</table>';

      $("#file_content").val(tabla);
      $("#convertir").submit(); 
    })
  });
</script>