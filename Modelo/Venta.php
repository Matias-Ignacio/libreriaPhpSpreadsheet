<?php
class Venta{

    private $idVenta;
    private $fecha;
    private $objReloj;
    private $cantidad;
    private $importe;
    private $mensaje; 

    // Constructor
    public function __construct()
    {
        $this->idVenta="";
        $this->fecha="";
        $this->objReloj= new Reloj();
        $this->cantidad= 0;
        $this->importe = 0;
        
    }//  fin cinstructor

    public function setear($idVenta,$fecha,$objReloj, $cantidad,$importe){
        $this->setidVenta($idVenta);
        $this->setfecha($fecha);
        $this->setobjReloj($objReloj);
        $this->setcantidad($cantidad);
        $this->setimporte($importe);
    }// fin function 

    //  METODO GET
    public function getidVenta(){
        return $this->idVenta; 
    }

    public function getfecha(){
        return $this->fecha; 
    }
    public function getobjReloj(){
        return $this->objReloj; 
    }
    public function getcantidad(){
        return $this->cantidad; 
    }
    public function getimporte(){
        return $this->importe; 
    }
    public function getMensaje(){
        return $this->mensaje;
    }// fin mensaje


    //  METODO SET
    public function setidVenta($p){
        $this->idVenta=$p;
    }
    public function setfecha($fecha){
        $this->fecha=$fecha;
    }
    public function setobjReloj($objReloj){
        $this->objReloj=$objReloj;
    }
    public function setcantidad($p){
        $this->cantidad=$p;
    }
    public function setimporte($p){
        $this->importe=$p;
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
        $fec = $this->getfecha();
        $rel = $this->getobjReloj()->getnombreReloj();
        $can = $this->getcantidad();
        $imp = $this->getimporte();
        $array = ["$ID","$fec","$rel","$can","$imp"];

        return $array;
    }

    

    // METODO CARGAR
    /**
     * @return boolean
     */
    public function cargar(){
        $resp=false; 
       $base=new BaseDatos("Relojes");
       $sql="SELECT * FROM Venta WHERE idVenta='".$this->getidVenta()."'";
       if($base->Iniciar()){
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row=$base->Registro();
                $objReloj=new Reloj(); // creo al obj 
                $objReloj->setidReloj($row['idReloj']); // seteo su id 
                $objReloj->cargar(); 
                // setear($idVenta,$fecha,$objReloj,$cantidad,$importe)
                $this->setear($row["idVenta"],$row["fecha"],$objReloj,$row["cantidad"],$row["importe"]);
                $resp=true; 
            }// fin if 
        }// fin if
       }// fin if 
       else{
        $this->setMensaje(" Venta ->".$base->getError());
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
        $sql="INSERT INTO Venta(idVenta,fecha,cantidad,idReloj,importe) VALUES('".$this->getidVenta()."','".$this->getfecha()."',
        '".$this->getcantidad()."','".$this->getobjReloj()->getidReloj()."','".$this->getimporte()."');";
        if($base->Iniciar()){
            if($elid=$base->Ejecutar($sql)){
                $this->setidVenta($elid);// id 
                $resp=true;
            }    
            else{
                $this->setMensaje("Venta -> insertar ".$base->getError());
            }

        }// fin if 
        else{
            $this->setMensaje("Venta -> Insertar ".$base->getError());
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
        $sql="UPDATE Venta SET fecha='".$this->getfecha()."', idReloj='".$this->getobjReloj()->getidReloj()."', cantidad='".$this->getcantidad()."'
        , importe='".$this->getimporte()."' WHERE idVenta='".$this->getidVenta()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $res=true;
            }
            else{
                $this->setMensaje("Venta -> Modificar ".$base->getError());
            }        
        }
        else{
            $this->setMensaje("Venta -> Modificar".$base->getError());
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
        $sql="DELETE FROM Venta WHERE idVenta='".$this->getidVenta()."'";
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
        
        $sql="SELECT * FROM Venta";
        if($parametro!=""){
            $sql.=' WHERE '.$parametro;
            
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Venta();
                    $objReloj = new Reloj();
                    $objReloj->setidReloj($row["idReloj"]);
                    $objReloj->cargar(); 
                    // setear($idVenta,$fecha,$objReloj,$cantidad,$importe)
                    $obj->setear($row["idVenta"],$row["fecha"],$objReloj,$row["cantidad"],$row["importe"]);
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