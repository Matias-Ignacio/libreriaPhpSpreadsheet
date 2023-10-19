<?php

    class AbmVenta{

        /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Venta
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idVenta',$param) and array_key_exists('fecha',$param)  and array_key_exists('idReloj',$param) and 
        array_key_exists('cantidad',$param) and array_key_exists('importe',$param)){
            $obj = new Venta(); 
            $objReloj = new Reloj();
            $objReloj->setidReloj($param['idReloj']);
            $obj->setear($param["idVenta"],$param["fecha"],$objReloj,$param["cantidad"],$param["importe"]);
        }
        return $obj;
    }// fin cargarObjeto




    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Venta
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idVenta']) ){
            $obj = new Venta();
            $obj->setear($param['idVenta'],null,null,null,null);
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
        if (isset($param['idVenta']))
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
        $elObjVenta = $this->cargarObjeto($param);
        if ($elObjVenta!=null and $elObjVenta->insertar()){
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
            $elObjVenta = $this->cargarObjetoConClave($param);
            if ($elObjVenta!=null and $elObjVenta->eliminar()){
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
            $elObjVenta = $this->cargarObjeto($param);
            if($elObjVenta!=null and $elObjVenta->modificar()){
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
            if  (isset($param['idVenta']))
                $where.=" and idVenta = '".$param['idVenta']."'";
            if  (isset($param['fecha']))
                 $where.=" and fecha = '".$param['fecha']."'";
            if  (isset($param['idReloj']))
                 $where.=" and idReloj = '".$param['idReloj']."'";
            if  (isset($param['cantidad']))
                 $where.=" and cantidad = '".$param['cantidad']."'";                              
            if  (isset($param['importe']))
                 $where.=" and importe = '".$param['importe']."'";
                   
            }// fin if <> null
            echo("<br>"); 
           // var_dump($where); 
            $arreglo = Venta::listar($where);  
            
        return $arreglo;
    }// fin function buscar


    }// fin clase 

?>