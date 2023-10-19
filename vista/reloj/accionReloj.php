<?php
    include_once '../../configuracion.php';
    $Titulo = "Lista de Relojer";
    include_once '../estructura/header.php';
    $hoja = "Relojes";
    include '../funciones/crearHC.php';

<<<<<<< HEAD
    $datoss =data_submitted();
    $datos = $datoss;
    $datos["idReloj"] = intval($datoss["idReloj"]);
    $datos["idMarca"] = intval($datoss["idMarca"]); 
    $datos["idTipo"] = intval($datoss["idTipo"]);
    $datos["precio"] = floatval($datoss["precio"]);
    //var_dump($datos["idReloj"]);
    $resp=false; 
    $objReloj=new AbmReloj();
    $listaObj = $objReloj->buscar(null);


=======
    $datos =data_submitted();
    
    $resp=false; 
    $objReloj=new AbmReloj();
    $listaObj = $objReloj->buscar(null);
    
>>>>>>> 64fb8c909dc6c1258beeb8eef5ab66d4e4b5921a
    if(isset($datos['accion'])){
        if(($datos['accion']=='Cambiar')){
            $datos["idMarca"] = intval($datos["idMarca"]); 
            $datos["idTipo"] = intval($datos["idTipo"]);
            $datos["precio"] = floatval($datos["precio"]);
            if($objReloj->modificacion($datos)){
                $resp=true; 
            }// fin if 
        }// fin if
        if($datos['accion']=='Borrar'){
            if($objReloj->baja($datos)){
                $resp=true; 

            }// fin if 

        }// fin if 
        if($datos['accion']=='Nuevo'){
            if($objReloj->alta($datos)){
                $resp=true;
            }// fin if 

        }// fin if
        if($datos['accion']=='Exportar Excel'){
            $arreglo_titulos = ["ID", "Reloj", "Precio", "Tipo", "Marca"];
            $dimension = "B2:F2";
            $activeWorksheet = headHC($arreglo_titulos, $activeWorksheet, $dimension);
            $dimension = "B3:F";
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