<?php

class Edificio{

    private $colObjDepartamentos; #coleccion de objetos departamento
    private $objAdmin; #instancia de objPersona que administra el edificio

    public function __construct($colObjDepartamentos,$objAdmin)
    {
        $this->colObjDepartamentos=$colObjDepartamentos;
        $this->objAdmin=$objAdmin;
    }


    /* GETTERS Y SETTERS */

    /**
     * Get the value of  colObjDepartamentos
     */ 
    public function getColObjDepartamentos()
    {
        return $this-> colObjDepartamentos;
    }

    /**
     * Set the value of  colObjDepartamentos
     *
     * @return  self
     */ 
    public function setColObjDepartamentos($colObjDepartamentos)
    {
        $this-> colObjDepartamentos = $colObjDepartamentos;

         
    }

    /**
     * Get the value of objAdmin
     */ 
    public function getObjAdmin()
    {
        return $this->objAdmin;
    }

    /**
     * Set the value of objAdmin
     *
     * @return  self
     */ 
    public function setObjAdmin($objAdmin)
    {
        $this->objAdmin = $objAdmin;

         
    }

    public function arrayToString($coleccion){
        $colString ="";
        foreach($coleccion as $elem){
            $colString .= "\n----------------------\n".$elem;
        }
        return $colString;
    }

    /* retorna una coleccion de todos los departamentos del tipo recibido por parámetro
    que estén DISPONIBLES para ser alquilados y con un COSTO MENSUAL MENOR al valor recibido */
    public function darInmueblesDisponiblesParaAlquiler($unTipoInmueble,$costoMensual){
        $inmueblesDisp = [];
        $edificio = $this->getColObjDepartamentos(); 
        foreach($edificio as $inmueble){
            if($inmueble->getTipoInmueble() == $unTipoInmueble && $inmueble->getCostoMensual() < $costoMensual){
                if($inmueble->getObjPersona()==null){
                    $inmueblesDisp[] = $inmueble;
                }
                
            }
        }
        return $inmueblesDisp;
    }

    /* recibe referencia al inmueble que se desea alquilar y a la persona que desea alquilarlo.  
     Por política de la empresa los inmuebles de un edificio se deben ir ocupando por piso y por tipo. Es
     decir, hasta que todos los inmuebles de un piso y de un tipo no se encuentren ocupados, no es posible alquilar un inmueble
     de un piso superior
     Retorna verdadero si se puede registrar el alquiler o falso en caso contrario 
    */
    
    public function registrarAlquilerInmueble($objInmueble,$objPersona){
        #iterador
        $i = 0;

        #variables del objeto inmueble ingresado por parámetro
        $pisoDeseado = $objInmueble->getNroPiso();
        $tipoInmueble = $objInmueble->getTipoInmueble();
        
        #bandera. True si ya hay pisos anteriores disponibles
        $pisoDisponible = false;
        #coleccion de inmuebles en el edificio
        $inmuebles = $this->getColObjDepartamentos();
        
        #hago un recorrido parcial en caso de que los inmuebles ingresados se hagan con sus pisos de forma ordenada
        while($inmuebles[$i]->getNroPiso() < $pisoDeseado && $pisoDisponible == false){ #pisos anteriores 
            if($inmuebles[$i]->getTipoInmueble() == $tipoInmueble && $this->getColObjDepartamentos()[$i]->getObjPersona() == null){ #si el inmueble es del mismo tipo y está disponible
                $pisoDisponible = true;
            }
            $i++;
        }
        if($pisoDisponible == false){ # si siguió siendo false (no habían pisos anteriores disponibles)
            $objInmueble->alquilarInmueble($objPersona);
        }
        return $pisoDisponible;
    }
       
    /* retorna el valor correspondiente a la suma de los costos de los inmuebles ALQUILADOS */
    public function calculaCostoEdificio(){
        $costoTotalAlqui = 0;
        $edificio = $this->getColObjDepartamentos();
        foreach($edificio as $inmueble){
            if($inmueble->getObjPersona() != null){ #si es distinto de null se considera que un obj persona lo alquila
                $costoTotalAlqui += $inmueble->getCostoMensual();
            }
            
        }
        return $costoTotalAlqui;
    }    

    public function __toString()
    {
        return "administrador del edificio: \n".$this->getObjAdmin()."\n".
        "los ".count($this->getColObjDepartamentos())." departamentos son:".$this->arrayToString($this->getColObjDepartamentos());
    }
}