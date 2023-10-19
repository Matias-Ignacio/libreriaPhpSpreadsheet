<?php
    include_once '../../configuracion.php';
    $Titulo = "Ventas";
    $hoja = "Ventas";
    include_once '../estructura/header.php';
    include '../funciones/crearHC.php';
  
    $datos =data_submitted();
    $resp=false; 
    $obj=new AbmVenta();
    $listaObj = $obj->buscar(null);

    if(isset($datos['accion'])){
        if(($datos['accion']=='Cambiar')){
            if($obj->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='Borrar'){
            if($obj->baja($datos)){
                $resp=true; 
            }// fin if 
        }// fin if 
        if($datos['accion']=='Nuevo'){
            if($obj->alta($datos)){
                $resp=true;
            }// fin if 
        }// fin if
        if($datos['accion']=='Exportar Excel'){
            $arreglo_titulos = ["ID", "Fecha", "Reloj", "Precio", "Cantidad", "Importe"];
            $dimension = "B2:G2";
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet, $dimension);
            $dimension = "B3:G";
            $activeWorksheet = bodyHC($listaObj, $activeWorksheet, $dimension);
            writeHC($spreadsheet);
            $resp=true;
            echo "<h3>Hecho</h3>";
            echo "<a href='../../Archivos/Relojes.xlsx'>Descarga Excel</a>";
        }

        if($resp){
            $mensaje="La accion ".$datos['accion']."  se realizao correctamente " ;
        }
        else{
            $mensaje="Hubo un problema con la accion ".$datos['accion']." ";
            
        }
    }// fin if
?>

<div class="container">
    <?php
    echo($mensaje);
    ?>
</div>
<?php
include_once("../estructura/footer.php");
?>