<?php
    include_once '../../configuracion.php';
    $Titulo = "Lista de Marcas";
    include_once '../estructura/header.php';
    $hoja = "Marcas";
    include '../funciones/crearHC.php';

    $datos =data_submitted();
 
    $resp=false; 
    $objMarca=new AbmMarca();
    $listaObj = $objMarca->buscar(null);

    if(isset($datos['accion'])){
        if(($datos['accion']=='Editar')){
            if($objMarca->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='Borrar'){
            if($objMarca->baja($datos)){
                $resp=true; 
            }// fin if 
        }// fin if 
        if($datos['accion']=='Nuevo'){
            if($objMarca->alta($datos)){
                $resp=true;
            }// fin if 
        }// fin if
        if($datos['accion']=='Exportar Excel'){
            $arreglo_titulos = ["ID", "Marca"];
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet);
            $activeWorksheet = bodyHC($listaObj, $activeWorksheet);
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