<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colecClientes;
    private $colecMotos;
    private $colecVentas;

    public function __construct($denominacion,$direccion,$colecClientes,$colecMotos,$colecVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colecClientes = $colecClientes;
        $this->colecMotos = $colecMotos;
        $this->colecVentas = $colecVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColecClientes(){
        return $this->colecClientes;
    }

    public function getColecMotos(){
        return $this->colecMotos;
    }

    public function getColecVentas(){
        return $this->colecVentas;
    }

    public function setDenominacion($denom){
        $this->denominacion = $denom;
    }

    public function setDireccion($direc){
        $this->direccion = $direc;
    }

    public function setColecClientes($colClientes){
        $this->colecClientes = $colClientes;
    }

    public function setColecMotos($colMotos){
        $this->colecMotos = $colMotos;
    }

    public function setColecVentas($colVentas){
        $this->colecVentas = $colVentas;
    }

    public function retornarMoto($codigoMoto){
        $motoEncontrada = null; // null pq todavia no se encuentra la moto
        $cont = 0;
        $motos= $this->getColecMotos();
        $cantMotos = count($motos);

        while ($cont < $cantMotos && $motoEncontrada === null) {
            $moto = $this->getColecMotos()[$cont];
            if ($moto->getCodigo() == $codigoMoto) {
                $motoEncontrada = $moto;
            }
            $cont++;
        }
        return $motoEncontrada;
    }
    
    public function registrarVenta($colCodigosMoto, $objCliente){
        $objVenta = new Venta(null, date('Y'), $objCliente, [], 0);

        foreach ($colCodigosMoto as $codeMoto) {
            $objMotoCod = $this->retornarMoto($codeMoto);
            if ($objMotoCod !== null && $objMotoCod->getActiva() && $objCliente->getEstado()) {
                $objVenta->incorporarMoto($objMotoCod);
            }
        }
        // modifico array
        $coleccionVentas = $this->getColecVentas();
        array_push($coleccionVentas,$objVenta);
        $this->setColecVentas($coleccionVentas);

        return $objVenta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColecVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getColecClientes();
            if ($clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNroDoc() === $numDoc ) {
                //Si el cliente tiene todos esos datos buscados almacenamos la venta.
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }

    public function informarSumaVentasNacionales(){
        $monto = 0;
        $colecDeVentas = $this->getColecVentas();
        foreach($colecDeVentas as $venta){
            $monto += $venta->retornarTotalVentaNacional();
        }
        return $monto;
    }

    public function informarVentasImportadas(){
        $ventasMotosImportadas = [];
        $colecDeVentas = $this->getColecVentas();
        foreach($colecDeVentas as $venta){
            $motosImportadas = $venta->retornarMotosImportadas();
            if(count($motosImportadas)>0){
                $ventasMotosImportadas [] = $venta;
            }
        }
        return $ventasMotosImportadas;
    }


    public function __toString(){
        $msj = "\nDatos Empresa:\n";
        $msj .= "Denominación: " . $this->getDenominacion() . "\n";
        $msj .= "Direccion: " . $this->getDireccion() . "\n";
        $msj .= "Lista Clientes: ";
        foreach($this->getColecClientes() as $clientes){
            $msj .= "- " . $clientes . "\n";
        }
        $msj .= "Lista de Motos: ";
        foreach($this->getColecMotos() as $motos){
            $msj .= "- " . $motos . "\n";
        }
        $msj .= "Lista de Ventas: ";
        foreach($this->getColecVentas() as $ventas){
            $msj .= "- " . $ventas . "\n";
        }
        
        return $msj;
    }

}