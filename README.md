# simulacroIPOO2

 Simulacro Segundo Parcial 2024  IPOO
“Sistema para un local de venta de motos”: Nuevos requerimientos …..

Conocemos que una importante empresa de la región que vende motos, desea implementar una aplicación que le permita gestionar la información de los clientes, de las motos y de las ventas realizadas. 
El equipo de desarrollo que se encuentra realizando la implementación, recibió un nuevo requerimiento vinculado a las motos que van a ser comercializadas. Por un lado va a ser posible vender motos de fabricación nacional y por otro lado, motos importadas desde el exterior. Para el caso de las motos importadas, se debe almacenar  el país desde el que se importa y el  importe correspondiente a los impuestos de importación que la empresa paga por el ingreso al país. Con el objetivo de incentivar el consumo de productos Nacionales, se desea almacenar un porcentaje de descuento en las motos Nacionales que será aplicado al momento de la venta (por defecto el valor del descuento es del 15%).  
	Sobre la implementación realizada para el primer parcial: 

En la clase Cliente:
 Puede utilizar una clase Cliente existente.

En la clase Moto:
Implementar la jerarquía de herencia que corresponda para implementar las motos Nacionales e Importadas.
Incorporar los atributos que se requieren para el nuevo requerimiento de la empresa.
Redefinir el método toString  para que retorne la información de los atributos de la clase.
Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación.  A continuación se describe el método  darPrecioVenta  con el objetivo de tener presente su implementación y realizar las modificaciones que crea necesarias para dar soporte al nuevo requerimiento. 
===================================================================================
.: Recordar :. el método darPrecioVenta inicialmente  calculaba el valor por el cual puede ser vendida una moto. Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: 
$_venta = $_compra + $_compra * (anio * por_inc_anual) 
donde  $_compra:  es el costo de la moto.
            anio: cantidad de años transcurridos desde que se fabricó  la moto.
            por_inc_anual:  porcentaje de incremento anual de la moto.
===================================================================================
En la clase Venta:
Implementar el método retornarTotalVentaNacional() que retorna  la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta.
Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.

En la clase Empresa:
Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.
Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de motos  importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada.
               (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario)


Implementar un script TestEmpresa en la cual:
Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
Cree 4 objetos Motos con la  información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.



TABLA MOTOS NACIONALES:

código 
costo
anio_fabricacion
Descripcion
por_inc_anual
activo
Porc_descuento
11
2230000
2022
Benelli Imperiale 400
85%
true
10
12
584000
2021
Zanella Zr 150 Ohc
70%
true
10
13
999900
2023
Zanella Patagonian Eagle 250


55%
false






TABLA MOTOS  IMPORTADAS


código 
costo
anio_fabricacion
Descripcion
por_inc_anual
activo
Pais_imp
$impesto_imp
14

12499900


2020
Pitbike Enduro Motocross Apollo Aiii 190cc Plr
100%
true
Francia
6244400



Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”,  colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
Invocar al método  registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13,14].  Visualizar el resultado obtenido.
Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14,2].  Visualizar el resultado obtenido.
Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.
Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido.
Realizar un echo de la variable Empresa creada en 2.
