<?php

include_once 'Venta.php';

class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcionMoto;
    private $porcentajeIncAnual;
    private $esActivo; //atributo que va a ser true si esta disponible para la venta, caso contrario false

    public function __construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcionMoto = $descripcionMoto;
        $this->porcentajeIncAnual = $porcentajeIncAnual;
        $this->esActivo = $esActivo;
    }

    /** Retorna el Código de la Moto
     * 
     */
    public function getCodigo()
    {
            return $this->codigo;
    }

    /** Establece el Código de la Moto
     * 
     */
    public function getCosto()
    {
            return $this->costo;
    }

    /** Retorna el Anio de Fabricacion de la Moto
     * 
     */
    public function getAnioFabricacion()
    {
            return $this->anioFabricacion;
    }

    /** Retorna la descripción de la Moto
     * 
     */
    public function getDescripcionMoto()
    {
            return $this->descripcionMoto;
    }

    /** Retorna el porcentaje de incremento anual de la Moto
     *
     * */
    public function getPorcentajeIncAnual()
    {
            return $this->porcentajeIncAnual;
    }

    /** Retorna el estado de la Moto
     *  
     * */
    public function getEsActivo()
    {
            return $this->esActivo;
    }

    /** Establece el Código de la Moto
     * 
     */
    public function setCodigo($codigo)
    {
            $this->codigo = $codigo;
    }

    /** Establece el Código de la Moto
     * 
     */
    public function setCosto($costo)
    {
            $this->costo = $costo;
    }

    /** Establece el Anio de Fabricacion de la Moto
     * 
     */
    public function setAnioFabricacion($anioFabricacion)
    {
            $this->anioFabricacion = $anioFabricacion;
    }

    /** Establece la descripción de la Moto
     * 
     */
    public function setDescripcionMoto($descripcionMoto)
    {
            $this->descripcionMoto = $descripcionMoto;
    }

    /** Establece el porcentaje de incremento anual de la Moto
     * 
     */
    public function setPorcentajeIncAnual($porcentajeIncAnual)
    {
            $this->porcentajeIncAnual = $porcentajeIncAnual;
    }

    /** Establece el estado de la Moto
     * 
     */
    public function setEsActivo($esActivo)
    {
            $this->esActivo = $esActivo;

    }

    /** Retorna el precio de la Moto
     * 
     */
    public function darPrecioVenta(){
        $disponibilidad = $this->getEsActivo();
        $precioFinal = 0;
        if(!$disponibilidad){
            $precioFinal = -1;
        }else{
                $precioFinal = $this->getCosto() + $this->getCosto() * ($this->getAnioFabricacion() * $this->getPorcentajeIncAnual());
                if($this instanceof MotoImportada){
                        $precioFinal = $precioFinal + $this->getImpuesto();
                }else{
                        if($this instanceof MotoNacional){
                                if($this->getDescuento() == null){
                                        $precioFinal = $precioFinal - ($precioFinal * 0.15);
                                }
                                else {
                                        $precioFinal = $precioFinal - ($precioFinal * $this->getDescuento());
                                }
                        }
                }
        }
        return $precioFinal;
    }

    /**
     * Retorna un String con la información de la Moto
     */
    public function __toString()

    {
        if($this->getEsActivo()){
            $status = "SI";
        }else{
            $status = "NO";
        }
        if($this->darPrecioVenta() == -1){
            $statusPrecio = "NO DISPONIBLE";
        }else {
            $statusPrecio = $this->darPrecioVenta();
        }
        return  "CODIGO: " . $this->getCodigo() . "\n" .
        "COSTO SIN INCREMENTO: " . $this->getCosto()	 . "\n" .
        "COSTO INCREMENTADO (porcentaje incremento anual): " . $statusPrecio . "\n" .
        "AÑO DE FABRICACION: " . $this->getAnioFabricacion() . "\n" .
        "DESCRIPCION: " . $this->getDescripcionMoto() . "\n" .
        "PORCENTAJE DE INCREMENTO ANUAL: " . $this->getPorcentajeIncAnual() . "\n" .
        "ESTÁ DISPONIBLE: " . $status . "\n";        
    }
}