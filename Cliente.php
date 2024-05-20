<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDoc;
    private $nroDoc;

	public function __construct($nombre, $apellido, $estado, $tipoDoc, $nroDoc) {

		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->estado = $estado;
		$this->tipoDoc = $tipoDoc;
		$this->nroDoc = $nroDoc;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($name) {
		$this->nombre = $name;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($apell) {
		$this->apellido = $apell;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estad) {
		$this->estado = $estad;
	}

	public function getTipoDoc() {
		return $this->tipoDoc;
	}

	public function setTipoDoc($docTipo) {
		$this->tipoDoc = $docTipo;
	}

	public function getNroDoc() {
		return $this->nroDoc;
	}

	public function setNroDoc($docNro) {
		$this->nroDoc = $docNro;
	}

    public function __toString(){
        $estado = "";
        if ($this->getEstado()){
            $estado = "Activo";
        } else {
            $estado = "Inactivo";
        }
        return "Nombre: " . $this->getNombre() . 
        "\nApellido: " . $this->getApellido() . 
        "\nEstado: " . $estado . 
        "\nTipo de Documento: " . $this->getTipoDoc() .
        "\nNúmero de Documento: " . $this->getNroDoc();
    }

}