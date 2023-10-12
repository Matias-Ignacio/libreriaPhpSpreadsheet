<?php
class Tipo{

    private $idTipo;
    private $nombreTipo;
    private $mensaje;

    // Constructor
    public function __construct()
    {
        $this->idTipo="";
        $this->nombreTipo="";
        
    }//  fin cinstructor

    public function setear($idTipo,$nombreTipo){
        $this->setidTipo($idTipo);
        $this->setnombreTipo($nombreTipo);
    }// fin function 

    //  METODO GET
    public function getidTipo(){
        return $this->idTipo; 
    }
    public function getnombreTipo(){
        return $this->nombreTipo; 
    }
    public function getMensaje(){
        return $this->mensaje;
    }// fin mensaje

    //  METODO SET
    public function setidTipo($p){
        $this->idTipo=$p;
    }
    public function setnombreTipo($nombreTipo){
        $this->nombreTipo=$nombreTipo;
    }
    public function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }// fin 

    /**
     * retorna un arreglo con los atributos del objeto
     * @return array
     */
    public function getDatos(){
        $ID = $this->getidTipo();
        $nom = $this->getnombreTipo();
        $array = ["$ID","$nom"];
        return $array;
    }
    

    // METODO CARGAR
    /**
     * @return boolean
     */
    public function cargar(){
        $resp=false; 
       $base=new BaseDatos("relojes");
       $sql="SELECT * FROM tipo WHERE idTipo='".$this->getidTipo()."'";
       if($base->Iniciar()){
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row=$base->Registro();
                $this->setear($row["idTipo"],$row["nombreTipo"]);
                $resp=true; 
            }// fin if 
        }// fin if
       }// fin if 
       else{
        $this->setMensaje(" Tipo ->".$base->getError());
       }

       return $resp; 

    }// fin function cargar



    
    // FUNCION INSERTAR 
    /**
     * @return boolean
     */
    public function insertar(){
        $resp=false;
        $base=new BaseDatos("relojes");
        $sql="INSERT INTO tipo(idTipo,nombreTipo) VALUES('".$this->getidTipo()."','".$this->getnombreTipo().");";
        if($base->Iniciar()){
            if($elid=$base->Ejecutar($sql)){
                $this->setidTipo($elid);// id 
                $resp=true;
            }    
            else{
                $this->setMensaje("Tipo -> insertar ".$base->getError());
            }

        }// fin if 
        else{
            $this->setMensaje("Tipo -> Insertar ".$base->getError());
        }
        return $resp; 

    }// fin function insertar
    


    // FUNCION MODIFICAR 
    /**
     * @return boolean
     */
    public function modificar(){
        $res=false;
        $base=new BaseDatos("relojes");

        $sql="UPDATE tipo SET nombreTipo='".$this->getnombreTipo()."' WHERE idTipo='".$this->getidTipo()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $res=true;
            }
            else{
                $this->setMensaje("Tipo -> Modificar ".$base->getError());
            }        
        }
        else{
            $this->setMensaje("Tipo -> Modificar".$base->getError());
        }

        return $res; 
    }// fin modificar



    // FUNCION ELIMINAR 
    /**
     * @return boolean
     */
    public function eliminar(){
        $res=false; 
        $base=new BaseDatos("relojes");
        $sql="DELETE FROM tipo WHERE idTipo='".$this->getidTipo()."'";
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
        $base=new BaseDatos("relojes");
        $sql="SELECT * FROM tipo";
        if($parametro!=""){
            $sql.=' WHERE '.$parametro;
            
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Tipo();
                    //$objPersona = new Persona();
                    $obj->setear($row["idTipo"],$row["nombreTipo"]);
                    array_push($arreglo,$obj); // carga el obj en el array 
                    
                }
            }
        }
        else{
            //$this->setMensaje("Tipo -> listar".$base->getError());
        }
        return $arreglo; 
    }// fin function 


}// fin clase 

   
?>