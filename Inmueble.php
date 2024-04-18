<?php

class Inmueble{

    private $codigoRef;
    private $nroPiso;
    private $tipoInmueble; #local comercial o departamento
    private $costoMensual;
    private $objPersona;

    public function __construct($codigoRef,$nroPiso,$tipoInmueble,$costoMensual,$objPersona)
    {
        $this->codigoRef=$codigoRef;
        $this->nroPiso=$nroPiso;
        $this->tipoInmueble=$tipoInmueble;
        $this->costoMensual=$costoMensual;
        $this->objPersona=$objPersona;
    }

    /**
     * Get the value of codigoRef
     */ 
    public function getCodigoRef()
    {
        return $this->codigoRef;
    }

    /**
     * Set the value of codigoRef
     *
     * @return  self
     */ 
    public function setCodigoRef($codigoRef)
    {
        $this->codigoRef = $codigoRef;

         
    }

    /**
     * Get the value of nroPiso
     */ 
    public function getNroPiso()
    {
        return $this->nroPiso;
    }

    /**
     * Set the value of nroPiso
     *
     * @return  self
     */ 
    public function setNroPiso($nroPiso)
    {
        $this->nroPiso = $nroPiso;

         
    }

    /**
     * Get the value of tipoInmueble
     */ 
    public function getTipoInmueble()
    {
        return $this->tipoInmueble;
    }

    /**
     * Set the value of tipoInmueble
     *
     * @return  self
     */ 
    public function setTipoInmueble($tipoInmueble)
    {
        $this->tipoInmueble = $tipoInmueble;

         
    }

    /**
     * Get the value of costoMensual
     */ 
    public function getCostoMensual()
    {
        return $this->costoMensual;
    }

    /**
     * Set the value of costoMensual
     *
     * @return  self
     */ 
    public function setCostoMensual($costoMensual)
    {
        $this->costoMensual = $costoMensual;

         
    }

    /**
     * Get the value of objPersona
     */ 
    public function getObjPersona()
    {
        return $this->objPersona;
    }

    /**
     * Set the value of objPersona
     *
     * @return  self
     */ 
    public function setObjPersona($objPersona)
    {
        $this->objPersona = $objPersona;
    }

    /* recibe la referencia al nuevo inquilino del inmueble.
    Si NO se encuentra alquilado, setea incluyendo al nuevo inquilino */
    #lo del booleano es un agregado personal
    public function alquilarInmueble($newInquilino){
        $inquilino = false;
        if($this->getObjPersona() == null){
            $this->setObjPersona($newInquilino);
            $inquilino = true;
        }
        return $inquilino;
    }

    public function __toString()
    {
        return "codigo de referencia: ".$this->getCodigoRef()."\n".
        "numero de piso: ".$this->getNroPiso()."\n".
        "tipo de inmueble: ".$this->getTipoInmueble()."\n".
        "costo mensual: ".$this->getCostoMensual()."\n".
        "objPersona: ".$this->getObjPersona();
    }
}