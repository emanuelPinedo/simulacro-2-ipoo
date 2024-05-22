<?php
class MotosImportadas extends Moto{
    private $paisImporta;
    private $importeIngreso;

    public function __construct($vCodigo, $vCosto, $vAnioFabric, $vDescripcion, $vPorcIncAnual, $vActiva, $paisImporta, $importeIngreso){
        parent::__construct($vCodigo, $vCosto, $vAnioFabric, $vDescripcion, $vPorcIncAnual, $vActiva);
        $this->paisImporta = $paisImporta;
        $this->importeIngreso = $importeIngreso;
    }

    public function getPaisImporta(){
        return $this->paisImporta;
    }

    public function getImporteIngreso(){
        return $this->importeIngreso;
    }

    public function setPaisImporta($pais){
        $this->paisImporta = $pais;
    }

    public function setImporteIngreso($importe){
        $this->importeIngreso = $importe;
    }

    public function darPrecioVenta(){
        $venta = parent::darPrecioVenta();
        if($venta != -1){
            $venta += $this->getImporteIngreso();
        }
        return $venta;
     }

     public function __toString(){
         return parent::__toString().
         "\nPaís de origen: " . $this->getPaisImporta() . 
         "\nImpuesto: " . $this->getImporteIngreso();
     }

}