<?php
class MotosNacionales extends Moto{
    private $porcDescNacional;

    public function __construct($vCodigo,$vCosto,$vAnioFabric,$vDescripcion,$vPorcIncAnual,$vActiva,$porcDescNacional){
        parent::__construct($vCodigo,$vCosto,$vAnioFabric,$vDescripcion,$vPorcIncAnual,$vActiva);
        $this->porcDescNacional = $porcDescNacional;        
    }

	public function getPorcDescNacional() {
		return $this->porcDescNacional;
	}

	public function setPorcDescNacional($porcDesc) {
		$this->porcDescNacional = $porcDesc;
	}

	public function darPrecioVenta(){
		return parent::darPrecioVenta() * ( 1 - $this->getPorcDescNacional()/100);
	 }
 
	 public function __toString()
	 {
		 return parent::__toString() .
		 "\nDescuento: " . $this->getPorcDescNacional();
	 }

}