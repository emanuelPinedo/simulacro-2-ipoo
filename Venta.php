<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

	public function __construct($numero, $fecha, $objCliente, $colMotos, $precioFinal) {

		$this->numero = $numero;
		$this->fecha = $fecha;
		$this->objCliente = $objCliente;
		$this->colMotos = $colMotos;
		$this->precioFinal = $precioFinal;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($num) {
		$this->numero = $num;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function setFecha($date) {
		$this->fecha = $date;
	}

	public function getObjCliente() {
		return $this->objCliente;
	}

	public function setObjCliente($objCliente) {
		$this->objCliente = $objCliente;
	}

	public function getColMotos() {
		return $this->colMotos;
	}

	public function setColMotos($colecMotos) {
		$this->colMotos = $colecMotos;
	}

	public function getPrecioFinal() {
		return $this->precioFinal;
	}

	public function setPrecioFinal($precioFinal) {
		$this->precioFinal = $precioFinal;
	}

    public function incorporarMoto($objMoto){
        if($objMoto->getActiva()){
            $colMotos = $this->getColMotos();
            array_push($colMotos,$objMoto);
            $this->setColMotos($colMotos);
        }
    }

    public function mostrarMotos($colMotos){
        $msj = "";
        foreach ($colMotos as $moto){
            $msj .= "\nCódigo: " . $moto->getCodigo() . ", Descripción: " . $moto->getDescripcion();
        }
        return $msj;
    }

    public function retornarTotalVentaNacional(){
        $precioVenta = 0;
        foreach($this->getColMotos() as $colMoto){
            if ($colMoto instanceof MotosNacionales){
                $precioVenta += $colMoto->darPrecioVenta();
            }
        }
        return $precioVenta;
    }

    public function retornarMotosImportadas(){
        $colecMotosVendidas = [];
        foreach($this->getColMotos() as $colMoto){
            if ($colMoto instanceof MotosImportadas){
                $colecMotosVendidas[] = $colMoto;
            }
        }
        return $colecMotosVendidas;
    }


    public function __toString() {
        return "Número: " . $this->getNumero() . 
        "\nFecha: " . $this->getFecha() . 
        "\nCliente: " . $this->getObjCliente()->getNombre() . " " . $this->getObjCliente()->getApellido() . 
        "\nMotos Vendidas: " . $this->mostrarMotos($this->getColMotos()) . 
        "\nPrecio Final: " . $this->getPrecioFinal();
    }

}