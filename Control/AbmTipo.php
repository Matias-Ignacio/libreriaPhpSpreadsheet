<?php
    class AbmTipo{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return $obj
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idTipo',$param) and array_key_exists('nombreTipo',$param)){
            $obj = new Tipo(); // llama a la capa modelo 
            $obj->setear($param["idTipo"],$param["nombreTipo"]);

        }
        return $obj;
    }// fin cargarObjeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return $obj
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idTipo']) ){
            $obj = new Tipo();
            $obj->setear($param['idTipo'], null);
        }
        return $obj;
    }// fin function cargarObjetoConClave


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idTipo']))
            $resp = true;
        return $resp;
    }// fin seteadoCamposClaves

    /**
     * METODO ALTA Tipo
     * @param array $param
     * @return boolean
     */
    public function alta($param){
        $resp = false;
        $elObjtTipo = $this->cargarObjeto($param);
        if ($elObjtTipo!=null and $elObjtTipo->insertar()){
            $resp = true;
        }
        return $resp;
        
    } // fin function alta

    /**
     * METODO ELIMINAR Tipo 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjTipo = $this->cargarObjetoConClave($param);
            if ($elObjTipo!=null and $elObjTipo->eliminar()){
                $resp = true;
            }
        } 
        return $resp;
    }// fin functio baja
        
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjTipo = $this->cargarObjeto($param);
            if($elObjTipo!=null and $elObjTipo->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }// fin function modificacion


    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where =" true ";
        if ($param<>NULL){
            if  (isset($param['idTipo']))
                $where.=" and idTipo = '".$param['idTipo']."'";
            if  (isset($param['nombreTipo']))
                 $where.=" and nombreTipo = '".$param['nombreTipo']."'";                 
        }// fin if <> null
        $arreglo = tipo::listar($where);  
       // var_dump($where);
        return $arreglo;
    }// fin function buscar


    }// fin clase 

?>
