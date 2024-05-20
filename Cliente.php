<?php

class Cliente {
    private $nombreCliente;
    private $apellido;
    private $esDadoDeBaja;
    private $tipoCliente;
    private $dni;

    public function __construct($nombreCliente, $apellido, $esDadoDeBaja, $tipoCliente, $dni)
    {
        $this->nombreCliente = $nombreCliente;
        $this->apellido = $apellido;
        $this->esDadoDeBaja = $esDadoDeBaja;
        $this->tipoCliente = $tipoCliente;
        $this->dni = $dni;
    }
    /** Retorna el nombre del cliente
     * 
     */
    public function getNombreCliente(){
        return $this->nombreCliente;
    }

    /** Retorna el apellido del cliente
     * 
     */
    public function getApellido()
    {
            return $this->apellido;
    }

    /** Retorna el tipo de cliente
     * 
     */
    public function getEsDadoDeBaja()
    {
            return $this->esDadoDeBaja;
    }

    /** Retorna el tipo de cliente
     * 
     */
    public function getTipoCliente()
    {
            return $this->tipoCliente;
    }

    /** Retorna el tipo de cliente
     * 
     */
    public function getDni()
    {
            return $this->dni;
    }
    /** Establece el nombre del cliente
     * 
     */
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    /** Establece el apellido del cliente
     * 
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /** Establece el tipo de cliente
     * 
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    }

    /** Establece el estado del cliente
     * 
     */
    public function setEsDadoDeBaja($esDadoDeBaja)
    {
        $this->esDadoDeBaja = $esDadoDeBaja;
    }

    /** Establece el tipo de cliente
     * 
     */
    public function setDNI($dni)
    {
        $this->dni = $dni;
    }

    /** Retorna un string con informacion sobre la moto
     * 
     */
    public function __toString()
    {
        return "NOMBRE CLIENTE: " . $this->getNombreCliente() . "\n" . 
        "APELLIDO DEL CLIENTE: " . $this->getApellido() . "\n" .
        "FUE DADO DE BAJA: " . $this->getEsDadoDeBaja() . "\n" . 
        "TIPO DE CLIENTE: " . $this->getTipoCliente() . "\n" .
        "DNI: " . $this->getDni()
        ;
    }
}