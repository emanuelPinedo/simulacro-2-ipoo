<?php
class MotosNacionales extends Moto{
    private $porcDescNacional;

    public function __construct($vCodigo, $vCosto, $vAnioFabric, $vDescripcion, $vPorcIncAnual, $vActiva,$porcDescNacional){
        parent::__construct($vCodigo, $vCosto, $vAnioFabric, $vDescripcion, $vPorcIncAnual, $vActiva);
        $this->porcDescNacional = $porcDescNacional ?? 15;
    }

	public function getPorcDescNacional() {
		return $this->porcDescNacional;
	}

	public function setPorcDescNacional($porcDesc) {
		$this->porcDescNacional = $porcDesc;
	}

	public function darPrecioVenta(){
		$venta = parent::darPrecioVenta();
		if($venta != -1){
			$desc = ($venta * $this->getPorcDescNacional())/100;
			$venta = $venta - $desc;
		}
		return $venta;
	 }
 
	 public function __toString(){
		 return parent::__toString() .
		 "\nDescuento: " . $this->getPorcDescNacional();
	 }

}