<?php 

include_once "Moto.php";

class MotoImportada extends Moto {
    private $paisImportado;
    private $impuesto;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo, $paisImportado, $impuesto)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo);
        $this->paisImportado = $paisImportado;
        $this->impuesto = $impuesto;
    }

    public function getPaisImportado() {
      return $this->paisImportado;
    }
    public function setPaisImportado($value) {
      $this->paisImportado = $value;
    }

    public function getImpuesto() {
      return $this->impuesto;
    }
    public function setImpuesto($value) {
      $this->impuesto = $value;
    }

    public function __toString()
    {
        parent::__toString();
        return "Impuesto Moto Importada: " . $this->getImpuesto();
    }
}