<?php

include_once 'Cliente.php';
include_once 'Moto.php';



class Venta {
    private $numeroVenta;
    private $fechaVenta;
    private $referenciaCliente;
    private $refColeccionMotos;
    private $precioFinalVenta;

    public function __construct($numeroVenta, $fechaVenta, Cliente $referenciaCliente, $refColeccionMotos, $precioFinalVenta)
    {
        $this->numeroVenta = $numeroVenta;
        $this->fechaVenta = $fechaVenta;
        $this->referenciaCliente = $referenciaCliente;
        $this->refColeccionMotos = $refColeccionMotos;
        $this->precioFinalVenta = $precioFinalVenta;
    }

    public function getNumeroVenta()
    {
            return $this->numeroVenta;
    }

    public function setNumeroVenta($numeroVenta)
    {
            $this->numeroVenta = $numeroVenta;
    }

    public function getFechaVenta()
    {
            return $this->fechaVenta;
    }

    public function setFechaVenta($fechaVenta)
    {
            $this->fechaVenta = $fechaVenta;
    }

    public function getReferenciaCliente()
    {
            return $this->referenciaCliente;
    }

    public function setReferenciaCliente($referenciaCliente)
    {
            $this->referenciaCliente = $referenciaCliente;
    }

    public function getRefColeccionMotos()
    {
            return $this->refColeccionMotos;
    }

    public function setRefColeccionMotos($refColeccionMotos)
    {
            $this->refColeccionMotos[] = $refColeccionMotos;
    }

    public function getPrecioFinalVenta()
    {
            return $this->precioFinalVenta;
    }

    public function setPrecioFinalVenta($precio)
    {
            $this->precioFinalVenta += $precio;
    }

    public function incorporarMoto(Moto $objMoto){
        $disponibilidad = $objMoto->getEsActivo();
        if($disponibilidad){
            $this->setRefColeccionMotos($objMoto);
            $this->setPrecioFinalVenta($objMoto->darPrecioVenta());
        }
    }

    public function retornarTotalVentaNacional(){
        $sumatoria = 0;
        foreach ($this->getRefColeccionMotos() as $moto) {
                if($moto instanceof MotoNacional){
                        $sumatoria += $moto->darPrecioVenta();
                }        
        }
        return $sumatoria;
    }

    public function retornarMotosImportadas(){
        $motosImportadas = [];
        foreach ($this->getRefColeccionMotos() as $moto) {
                if($moto instanceof MotoImportada){
                        $motosImportadas[] = $moto;
                }        
        }
        return $motosImportadas;
    }

    public function __toString(){
        echo "Coleccion motos: \n";
        foreach ($this->getRefColeccionMotos() as $moto) {
                echo $moto;
        }       
            return "NUMERO DE VENTA: " . $this->getNumeroVenta() . "\n" . 
            "FECHA DE VENTA: " . $this->getFechaVenta() . "\n" . 
            "CLIENTE: \n" . $this->getReferenciaCliente() . "\n" . 
            "PRECIO FINAL VENTA: " . $this->getPrecioFinalVenta();
    }
}