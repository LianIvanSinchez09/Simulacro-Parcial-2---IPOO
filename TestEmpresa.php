<?php

include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Empresa.php';
include_once 'MotoNacional.php';
include_once 'MotoImportada.php';



$objCliente1 = new Cliente("Lian", "Sinchez", true, "Desarrollador", 1011121314);
$objCliente2 = new Cliente("Luciana", "Sinchez", false, "Peluquera", 123456789);

$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true, 0.10);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true, 0.10);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false, null);
$objMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 1, true, "Francia", 6244400);

$empresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objMoto1, $objMoto2, $objMoto3, $objMoto4], [$objCliente1, $objCliente2], []);
$empresa->registrarVenta([11, 12, 13, 14], $objCliente2);
// print_r($empresa->getColVentasRealizadas());
$empresa->registrarVenta([13, 14], $objCliente2);
$empresa->registrarVenta([14, 2], $objCliente2);    
echo "\n----------------Informe ventas Importadas--------------------------\n";
foreach ($empresa->informarVentasImportadas() as $motoImportada) {
    echo $motoImportada . "\n";
}
echo "\n---------------------Suma ventas nacionales---------------------\n";
echo $empresa->informarSumaVentasNacionales() . "\n";
echo "\n---------------------Empresa---------------------\n";
echo $empresa;

