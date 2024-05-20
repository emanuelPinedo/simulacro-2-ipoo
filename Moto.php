<?
class Moto{
    private $codigo;
    private $costo;
    private $anioFabric;
    private $descripcion;
    private $porcIncAnual;
    private $activa; //Boolean

    public function __construct($codigo,$costo,$anioFabric,$descripcion,$porcIncAnual,$activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabric = $anioFabric;
        $this->descripcion = $descripcion;
        $this->porcIncAnual = $porcIncAnual;
        $this->activa = $activa;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getAnioFabric(){
        return $this->anioFabric;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPorcIncAnual(){
        return $this->porcIncAnual;
    }

    public function getActiva(){
        return $this->activa;
    }

    public function setCodigo($cod){
        $this->codigo = $cod;
    }

    public function setCosto($costo1){
        $this->costo = $costo1;
    }

    public function setAnioFabric($anioFabric1){
        $this->anioFabric = $anioFabric1;
    }

    public function setDescripcion($desc){
        $this->descripcion = $desc;
    }

    public function setPorcIncAnual($porcIncAnual1){
        $this->porcIncAnual = $porcIncAnual1;
    }

    public function setActiva($act){
        $this->activa = $act;
    }

    public function darPrecioVenta(){
        $venta = -1;
        if($this->getActiva()){
            $compra = $this->getCosto();
            $anioActual = date('Y');
            $anioTranscurrido = $anioActual - $this->getAnioFabric();
            $venta = $compra + $compra * ($anioTranscurrido * $this->getPorcIncAnual() / 100);
        }

        return $venta; //si Activa es false entonces retorna 0.
    }

    public function __toString() {
        if ($this->getActiva()) {
            $activa = "Activa";
        } else {
            $activa = "Inactiva";
        }

        return "Código moto: " . $this->getCodigo() . 
        "\nCosto: " . $this->getCosto() . 
        "\nAño de Fabricación: " . $this->getAnioFabric() . 
        "\nDescripción: " . $this->getDescripcion() . 
        "\nPorcentaje Incremento Anual: " . $this->getPorcIncAnual() . 
        "\nActiva: " . $activa;
    }

}