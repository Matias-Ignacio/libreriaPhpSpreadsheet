<?php
class DetalleVenta{

    private $idVenta;
    private $objReloj;
    private $cantidad;
    private $mensaje; 

    // Constructor
    public function __construct()
    {
        $this->idVenta="";
        $this->objReloj = new Reloj();
        $this->cantidad = 0;
        
    }//  fin cinstructor

    public function setear($idVenta,$objReloj,$cantidad){
        $this->setidVenta($idVenta);
        $this->setobjReloj($objReloj);
        $this->setcantidad($cantidad);
    }// fin function 

    //  METODO GET
    public function getidVenta(){
        return $this->idVenta; 
    }
    public function getobjReloj(){
        return $this->objReloj; 
    }
    public function getcantidad(){
        return $this->cantidad; 
    }
    public function getMensaje(){
        return $this->mensaje;
    }// fin mensaje


    //  METODO SET
    public function setidVenta($p){
        $this->idVenta=$p;
    }
    public function setobjReloj($objReloj){
        $this->objReloj=$objReloj;
    }
    public function setcantidad($p){
        $this->cantidad=$p;
    }
    public function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }// fin 
   /**
     * retorna un arreglo con los atributos del objeto
     * @return array
     */
    public function getDatos(){
        $ID = $this->getidVenta();
        $rel = $this->getobjReloj()->getnombreReloj();
        $can = $this->getcantidad();
        $array = ["$ID","$rel","$can"];

        return $array;
    }

    

    // METODO CARGAR
    /**
     * @return boolean
     */
    public function cargar(){
        $resp=false; 
       $base=new BaseDatos("Relojes");
       $sql="SELECT * FROM detalleVenta WHERE idVenta='".$this->getidVenta()."'";
       if($base->Iniciar()){
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row=$base->Registro();
                $objReloj=new Reloj(); // creo al obj 
                $objReloj->setidReloj($row['idReloj']); // seteo su id 
                $objReloj->cargar(); 
                // setear($idVenta,$fecha,$cantidad,$objReloj,$objMarca)
                $this->setear($row["idVenta"],$row["cantidad"],$objReloj);
                $resp=true; 
            }// fin if 
        }// fin if
       }// fin if 
       else{
        $this->setMensaje(" detalleVenta ->".$base->getError());
       }

       return $resp; 

    }// fin function cargar



    
    // FUNCION INSERTAR 
    /**
     * @return boolean
     */
    public function insertar(){
        $resp=false;
        $base=new BaseDatos("Relojes");
        $sql="INSERT INTO detalleVenta(idVenta,cantidad,idReloj) VALUES('".$this->getidVenta()."',
        '".$this->getcantidad()."','".$this->getobjReloj()->getidReloj().");";
        if($base->Iniciar()){
            if($elid=$base->Ejecutar($sql)){
                $this->setidVenta($elid);// id 
                $resp=true;
            }    
            else{
                $this->setMensaje("detalleVenta -> insertar ".$base->getError());
            }

        }// fin if 
        else{
            $this->setMensaje("detalleVenta -> Insertar ".$base->getError());
        }
        return $resp; 

    }// fin function insertar
    


    // FUNCION MODIFICAR 
    /**
     * @return boolean
     */
    public function modificar(){
        $res=false;
        $base=new BaseDatos("Relojes");
        $sql="UPDATE detalleVenta SET cantidad='".$this->getcantidad()."'
        , objReloj='".$this->getobjReloj()->getidReloj()."' WHERE idVenta='".$this->getidVenta()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $res=true;
            }
            else{
                $this->setMensaje("detalleVenta -> Modificar ".$base->getError());
            }        
        }
        else{
            $this->setMensaje("detalleVenta -> Modificar".$base->getError());
        }

        return $res; 
    }// fin modificar



    // FUNCION ELIMINAR 
    /**
     * @return boolean
     */
    public function eliminar(){
        $res=false; 
        $base=new BaseDatos("Relojes");
        $sql="DELETE FROM detalleVenta WHERE idVenta='".$this->getidVenta()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $res=true;
            }
            else{
                $this->setMensaje("Eliminar -> ".$base->getError());
            }
        }
        else{
            $this->setMensaje("Eliminar -> ".$base->getError());
        }
        return $res;
    }// fin eliminar


    // FUNCION LISTAR
    /**
     * @return array
     */
    public static function listar($parametro=""){
        $arreglo=array ();
        $base=new BaseDatos("Relojes");
        
        $sql="SELECT * FROM detalleVenta";
        if($parametro!=""){
            $sql.=' WHERE '.$parametro;
            
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new DetalleVenta();
                    $objReloj = new Reloj();
                    $objReloj->setidReloj($row["idReloj"]);
                    $objReloj->cargar(); 
                    // setear($idVenta,$cantidad,$objReloj)
                    $obj->setear($row["idVenta"],$row["cantidad"],$objReloj);
                    array_push($arreglo,$obj); // carga el obj en el array 
                    
                }
            }
        }
        else{
            //$this->setMensaje("Venta -> listar".$base->getError());
        }
        return $arreglo; 
    }// fin function 


}// fin clase 

   
?>