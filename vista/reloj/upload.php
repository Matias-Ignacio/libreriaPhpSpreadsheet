<?php
include_once '../../vendor/autoload.php';
include_once 'funciones.php';
include_once '../../configuracion.php';


// guarda el archivo mandado por el formulario en cargarExcel.php
$archivoExcel = $_FILES;
$nombreArchivo = $_FILES['excel']['name'];
$objReloj = new AbmReloj();
$listaRelojes = $objReloj->buscar(null);
// Llama a la funcion verificaExtension si cumple la condicion muestra el excel y obtiene los datos del excel y la BD
$esXls = verificaExtension($nombreArchivo);
if ($esXls) {
    $spreadsheet = mostrarExcel($archivoExcel);
    $datosExcel = excelToArray($spreadsheet);
    $datosBD = bdToarray($listaRelojes);
} // fin if
else {
    echo ('<div class="alert alert-danger">Verifique seleccionar un archivo y que la extension sea (xls o xlsx) </div>');
} // fin else


?>
<div class="container mb-5 mt-5">
        <table>
        <tr>
            <th style="width: 20%;">Id Reloj</th>
            <th style="width: 20%;">Nombre del Reloj</th>
            <th style="width: 20%;">Precio</th>
            <th style="width: 20%;">Id Tipo</th>
            <th style="width: 20%;">Id Marca</th>
        </tr>
        <!-- Caso 1°  count (datosBD) < count (datosExcel)-->
        <?php
        $indices= comparar($datosBD, $datosExcel); // indices modificados
        $indicesNuevos=$indices[0];
        $indicesModificados=$indices[1];
        $indicesSinModificar=$indices[2];
        $id = array_merge($indicesNuevos, $indicesModificados, $indicesSinModificar);
        $nroM = count($indicesModificados);
        $nroS = count($indicesSinModificar);
        $nroN = count($indicesNuevos);
        //var_dump($id);
        ?>

            <?php for ($i = 0; $i < count($datosExcel); $i++) {
                if ($i<$nroN) {
            ?>
                    <!-- PARTE DE LA BD QUE SON NUEVOS  -->
                    <tr>
                        <td><input style="background-color:#0000ff" type="text" name="idReloj" id="idReloj" readonly value="<?php echo ($datosExcel[$id[$i]-1]["idReloj"]) ?>"></td>
                        <td><input style="background-color:#0000ff" type="text" name="nombreReloj" id="nombreReloj" readonly value="<?php echo ($datosExcel[$id[$i]-1]["nombreReloj"]) ?>"></td>
                        <td><input style="background-color:#0000ff" type="text" name="precio" id="precio" readonly value="<?php echo ($datosExcel[$id[$i]-1]["precio"]) ?>"></td>
                        <td><input style="background-color:#0000ff" type="text" name="idTipo" id="idTipo" readonly value="<?php echo ($datosExcel[$id[$i]-1]["idTipo"]) ?>"></td>
                        <td><input style="background-color:#0000ff" type="text" name="idMarca" id="idMarca" readonly value="<?php echo ($datosExcel[$id[$i]-1]["idMarca"]) ?>"></td>
                        <td><input type="hidden" name="accion" id="accion" value="Nuevo"></td>
                    </tr>
                <?php
             
                } // fin if
                ?>
                <!--   PARTE DE LA BD QUE SE MODIFICAN -->
                <?php if ($nroN<=$i && $i < ($nroN + $nroM)) { ?>
                    <tr>
                        <td><input style="background-color:#ff0000" type="text" name="idReloj" id="idReloj" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idReloj"]) ?>"></td>
                        <td><input style="background-color:#ff0000" type="text" name="nombreReloj" id="nombreReloj" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["nombreReloj"]) ?>"></td>
                        <td><input style="background-color:#ff0000" type="text" name="precio" id="precio" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["precio"]) ?>"></td>
                        <td><input style="background-color:#ff0000" type="text" name="idTipo" id="idTipo" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idTipo"]) ?>"></td>
                        <td><input style="background-color:#ff0000" type="text" name="idMarca" id="idMarca" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idMarca"]) ?>"></td>
                        <td><input type="hidden" name="accion" id="accion" value="Cambiar"></td>
                    </tr>
                <?php
               
                } // fin if
                ?>
                <!--PARTE DE LA BD QUE NO SE MODIFICAN -->
                <?php if (($nroN + $nroM) <= $i && $i < ($nroS + $nroM + $nroN )) { ?>
                    <tr>
                        <td><input style="background-color:#3cb371" type="text" name="idReloj" id="idReloj" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idReloj"]) ?>"></td>
                        <td><input style="background-color:#3cb371" type="text" name="nombreReloj" id="nombreReloj" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["nombreReloj"]) ?>"></td>
                        <td><input style="background-color:#3cb371" type="text" name="precio" id="precio" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["precio"]) ?>"></td>
                        <td><input style="background-color:#3cb371" type="text" name="idTipo" id="idTipo" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idTipo"]) ?>"></td>
                        <td><input style="background-color:#3cb371" type="text" name="idMarca" id="idMarca" readonly value="<?php echo ($datosExcel[$id[$i] - 1]["idMarca"]) ?>"></td>
                        <td><input type="hidden" name="accion" id="accion" value="Cambiar"></td>
                    </tr>
                <?php
               
                } // fin if
                ?>


            <?php } // fin for 
            ?>
            <!--  <button type="submit" class="btn btn-outline-primary mt-4 mb-4"> Confirmar Carga </button>  -->
            </table>
        <?php
        ?>
        <td>Datos Modificados: <input type="color" value="#ff0000"></td>
        <td>Datos Nuevo: <input type="color" value="#0000ff"></td>
        <td>Datos Sin Modificar: <input type="color" value="#3cb371"></td>

</div>

<div class="container">
    <form action="accionReloj2.php" id="form1" method="post">
    <button type="submit" class="btn btn-outline-primary mt-4 mb-4"> Confirmar Carga </button>
        <?php for($i=0; $i<count($datosExcel);$i++){
            ?>
            <input type="hidden" name="indices[]" value="<?php echo($id[$i]) ?>"><br>
            <input type="hidden" name="id[]" value="<?php echo($datosExcel[$i]["idReloj"]) ?>">
            <input type="hidden" name="nombre[]" value="<?php echo($datosExcel[$i]["nombreReloj"]) ?>">
            <input type="hidden" name="precio[]" value="<?php echo($datosExcel[$i]["precio"]) ?>">
            <input type="hidden" name="idTipo[]" value="<?php echo($datosExcel[$i]["idTipo"]) ?>">
            <input type="hidden" name="idMarca[]" value="<?php echo($datosExcel[$i]["idMarca"]) ?>">

            <?php
        } ?>
            <input type="hidden" name="cantM" value="<?php echo($nroM) ?>">
            <input type="hidden" name="cantN" value="<?php echo($nroN) ?>">
            <input type="hidden" name="cantSM" value="<?php echo($nroS) ?>">
            <input type="hidden" name="accion1" value="Cambiar">
            <input type="hidden" name="accion2" value="Nuevo">
        
    </form>
</div>
<a href="indexReloj.php" class="btn btn-secondary">Volver</a>