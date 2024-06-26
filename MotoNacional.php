<?php

include_once "Moto.php";

class MotoNacional extends Moto {
    private $descuento;
    
    public function __construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo, $descuento)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo);
        $this->descuento = $descuento;
    }

    public function getDescuento() {
      return $this->descuento;
    }

    public function setDescuento($value) {
        $this->descuento = $value;
    }

    public function __toString()
    {
        parent::__toString();
        echo "Tipo: Nacional\n";
        return "Descuento Moto Nacional: " . $this->getDescuento() . "\n". 
        "----------------------------------------------------\n";
    }
}