<?php

class Persona{
    // ATRIBUTOS
    private $tipoDoc;
    private $nroDoc;
    private $nombre;
    private $apellido;
    private $telefono;

    //CONSTRUCTOR
    public function __construct($tipoDoc,$nroDoc,$nombre,$apellido,$telefono)
    {
        $this->tipoDoc=$tipoDoc;
        $this->nroDoc=$nroDoc;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->telefono=$telefono;
    }

    /* GETTERS Y SETTERS */
    
    /**
     * Get the value of tipoDoc
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

         
    }

    /**
     * Get the value of nroDoc
     */ 
    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    /**
     * Set the value of nroDoc
     *
     * @return  self
     */ 
    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;

         
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }

    public function __toString()
    {
        return "tipo de documento: ".$this->getTipoDoc()."\n".
        "numero de documento: ".$this->getNroDoc()."\n".
        "nombre: ".$this->getNombre()."\n".
        "apellido: ".$this->getApellido()."\n".
        "telefono: ".$this->getTelefono();
    }
}
