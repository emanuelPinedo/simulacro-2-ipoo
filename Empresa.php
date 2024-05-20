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
        $precioTotal = 0;
        $motosVendidas = [];
        $ventaNumero = count($this->colecVentas) + 1;
    
        foreach ($colCodigosMoto as $codeMoto) {
            $objMotoCod = $this->retornarMoto($codeMoto);
            if ($objMotoCod !== null && $objMotoCod->getActiva() && !$objCliente->getEstado()) {
                $precioTotal += $objMotoCod->darPrecioVenta();
                $motosVendidas[] = $objMotoCod;
            }
        }
    
        $objVenta = new Venta($ventaNumero, date('Y-m-d'), $objCliente, $motosVendidas, $precioTotal);
    
        $coleccionVentas = $this->getColecVentas();
        array_push($coleccionVentas, $objVenta);
        $this->setColecVentas($coleccionVentas);
    
        return $objVenta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColecVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getRefCliente();
            if ($clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNroDoc() === $numDoc ) {
                //Si el cliente tiene todos esos datos buscados almacenamos la venta.
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }

    public function listadoClientes()
    {
        $col = $this->getColecClientes();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            $clientes = $col[$i];
            $listado .= $clientes . "\n";
        }
        return $listado;
    }

    public function listadoMotos()
    {
        $col = $this->getColecMotos();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            $motos = $col[$i];
            $listado .= $motos . "\n";
        }
        return $listado;
    }

    public function listadoVentas()
    {
        $col = $this->getColecVentas();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            foreach ($col[$i] as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }

    public function listadoVentasCliente($cliente)
    {
        $ventasCliente = $this->retornarVentasXCliente($cliente->getTipo(), $cliente->getNroDoc()); // obtengo los datos acá invocando al metodo retornar. No puedo usar los get fuera de la clase entonces hago la funcion aca. Concateno
        $listado = null;

        if ($ventasCliente != null) {
            $listado = "";
            foreach ($ventasCliente as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }

    public function informarSumaVentasNacionales(){
        $monto = 0;
        foreach($this->getColecVentas() as $venta){
            $monto += $venta->retornarTotalVentaNacional();
        }
        return $monto;
    }

    public function informarVentasImportadas(){
        $ventaImportada = [];
        foreach($this->getColecVentas() as $venta){
            $ventaImportada[] = $venta->retornarMotosImportadas();
        }
        return $ventaImportada;
    }


    public function __toString(){
        $msj = "\nDatos Empresa:\n";
        $msj .= "Denominación: " . $this->getDenominacion() . "\n";
        $msj .= "Direccion: " . $this->getDireccion() . "\n";
        $msj .= "Lista Clientes: " . $this->listadoClientes() . "\n";
        $msj .= "Lista de Motos: " . $this->listadoMotos() . "\n";
        $msj .= "Lista de Ventas: " . $this->listadoVentas();
        
        return $msj;
    }

}