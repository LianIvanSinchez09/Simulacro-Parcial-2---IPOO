<?php

include_once 'Moto.php';
include_once 'Cliente.php';
include_once 'Venta.php';

class Empresa {
    private $denominacion;
    private $direccion;
    private $colMotos;
    private $colClientes;
    private $ColVentasRealizadas;

    public function __construct($denominacion, $direccion, $colMotos , $colClientes , $ColVentasRealizadas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colMotos = $colMotos; // $colmotos entra como Array, el atributo colMotos no es array y lo mismo con los demas
        $this->colClientes = $colClientes;
        $this->ColVentasRealizadas = $ColVentasRealizadas;
    }

    /** Retorna la denominación de la Empresa
     * 
     */
    public function getDenominacion()
    {
            return $this->denominacion;
    }
    /** Establece la denominación de la Empresa
     * 
     */
    public function setDenominacion($denominacion)
    {
            $this->denominacion = $denominacion;
    }

    /** Retorna la dirección de la Empresa
     * 
     */
    public function getDireccion()
    {
            return $this->direccion;
    }
    /** Establece la dirección de la Empresa
     * 
     */
    public function setDireccion($direccion)
    {
            $this->direccion = $direccion;
    }
    /** Retorna la colección de Clientes
     * 
     */
    public function getColClientes()
    {
            return $this->colClientes;
    }

    /** Establece la colección de Clientes
     * 
     */
    public function setColClientes($colClientes)
    {
            $this->colClientes[] = $colClientes;
    }

    /** Retorna la colección de Motos
     * 
     */
    public function getColMotos()
    {
        return $this->colMotos;
    }

    /** Establece la colección de Motos
     * 
     */
    public function setColMotos($colMotos)
    {
            $this->colMotos[] = $colMotos;
    }
    /** Retorna el ColVentasRealizadas
     * 
     */
    public function getColVentasRealizadas()
    {
            return $this->ColVentasRealizadas;
    }

    /** Establece el ColVentasRealizadas
     * 
     */
    public function setColVentasRealizadas(Venta $ColVentasRealizadas)
    {
            $this->ColVentasRealizadas[] = $ColVentasRealizadas;
    }


    /** RETORNA LA MOTO BUSCADA CON EL CODIGO ESPECIFICO DE LA MOTO PUESTO EN PARAMETROS
     * @param int $codigoMoto
     */

    public function retornarMoto($codigoMoto){
        $motoEncontrada = null;
        foreach ($this->getColMotos() as $moto) {
            if($moto->getCodigo() == $codigoMoto){
                $motoEncontrada = $moto;
            }
        }
        return $motoEncontrada;
    }

    /** Calcula el precio de todas las motos dentro de una coleccion
     * @param array $array Motos
     * @return int Precio
     */
    public function calcPrecio($array){
        $precio = 0;
        foreach ($array as $moto) {
            $precio = $precio + $moto->darPrecioVenta();
        }
        return $precio;
    }

    /** Añade a la coleccion de ventas una instancia de la clase Venta, verificando si la Moto/s ingresada es activa o no
     * @param array $colCodigosMoto
     * @param Cliente $objCliente
     * @return Venta
     */

    public function registrarVenta($colCodigosMoto, Cliente $objCliente){
        $colMotosVenta = [];
        $objVenta = null;
        foreach ($colCodigosMoto as $codigo) {
            $motoRetornada = $this->retornarMoto($codigo);
            if($motoRetornada != null && $motoRetornada->getEsActivo()){
                $colMotosVenta[] = $motoRetornada;
            }
        }
        $objVenta = new Venta(1, date("m.d.y"), $objCliente, $colMotosVenta, $this->calcPrecio($colMotosVenta));
        $this->setColVentasRealizadas($objVenta);
        return $objVenta;
    }

    /** Retorna las ventas hechas por el cliente con el tipo y DNI pasados por parametros
     * @param string $tipo
     * @param int $numDoc
     * @return array
     */

    public function retornarVentasXCliente($tipo,$numDoc){
        foreach ($this->getColVentasRealizadas() as $venta) {
            if($venta->getReferenciaCliente()->getDni() == $numDoc || $venta->getReferenciaCliente()->getTipoCliente() == $tipo){
                    $ventasCliente[] = $venta;
                }
            }
            return $ventasCliente;
        }

    /** Recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa
     * @return int
     */

    public function informarSumaVentasNacionales(){
        $importeTotalVentasNacionales = 0;
        foreach ($this->getColVentasRealizadas() as $venta) {
            foreach ($venta->getRefColeccionMotos() as $moto) {
                if($moto instanceof MotoNacional){
                    $importeTotalVentasNacionales += $moto->darPrecioVenta();
                }
            }
        }
        return $importeTotalVentasNacionales;
    }



    public function informarVentasImportadas(){
        $colMotosImportadas = [];
        foreach ($this->getColVentasRealizadas() as $venta) {
            foreach ($venta->getRefColeccionMotos() as $moto) {
                if($moto instanceof MotoImportada){
                    $colMotosImportadas[] = $venta;
                }
            }
        }
        return $colMotosImportadas;
    }

    public function __toString()
    {
        return "DENOMINACION: " . $this->getDenominacion() . "\n" .
        " DIRECCION: " . $this->getDireccion() . "\n" . 
        "Informacion suma de venta nacional: $" . $this->informarSumaVentasNacionales() . "\n";
    }

}