<?php
   // Esta seccion carga un excel y lo muestra en el navegador
$Titulo = "Carga Excel";
include_once("../estructura/header.php");
?>

<section>
    <div class="container">
        <h3>Carga Excel</h3>
        <span></span>
        <form method="post" id="loadExcel">
            <table>
                <tr>
                    <td style="width:25% ">Seleccione el Archivo</td>
                    <td style="width:50% "> <input type="file" name="excel" id="excel"></td>
                    <td style="width:25% "><input type="submit" name="cargar" id="cargar" class="btn btn-primary" value="Cargar"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="areaExcel">
        
    </div>
    <script src="../js/funciones.js"></script>
</section>



<?php
include_once ("../estructura/footer.php");

?>