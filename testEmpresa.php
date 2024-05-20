<?php
include 'Cliente.php';
include 'Motos.php';
include 'MotosNacionales.php';
include 'MotosImportadas.php';
include 'Venta.php';
include 'Empresa.php';

$objCliente1 = new Cliente('mema', 'pinedo', true, 'dni', 45798194);
$objCliente2 = new Cliente('ekeziel', 'pinedou', true, 'dni', 41254325);

$objMoto11 = new MotosNacionales(11, 100, 2022, 'Benelli Imperiale 400', 85, true, 10);
$objMoto12 = new MotosNacionales(12, 100, 2021, 'Zanella Zr 150 Ohc ', 70, true, 10);
$objMoto13 = new MotosNacionales(13, 100, 2023, 'Zanella Patagonian Eagle 250', 55, false, 0);

$objMoto14 = new MotosImportadas(14, 1, 2020, 'Pitbike Enduro Motocross Apollo Aiii 190cc Plr', 100, true, 'francia', 50);

$objEmpresa = new Empresa('Alta Gama', 'Av Argenetina 123', [$objCliente1, $objCliente2],  [$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);
//5
echo "\n";
echo $objEmpresa->registrarVenta([11, 12, 13, 14], $objCliente2);
echo "\n***************************";
//6
echo "\n";
echo $objEmpresa->registrarVenta([13,14], $objCliente2);
echo "\n***************************";
//7
echo "\n";
echo $objEmpresa->registrarVenta([14,2], $objCliente2);
echo "\n***************************";
//8
$motosImportadas = $objEmpresa->informarVentasImportadas();
foreach($motosImportadas as $moto){
    echo $moto . "\n";
}
echo "\nSuma de ventas nacionales: " . $objEmpresa->informarSumaVentasNacionales();

echo "\n" . $objEmpresa;