<?php

    class Tienda{

        //variables
        private string $nombre;
        private string $direccion;
        private int $telefono;
        private array $clientes;
        private array $productos;

        //constructor de la clase tienda
        public function __construct(string $nombre, string $direccion, int $telefono)
        {
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->clientes = [];
            $this->productos = [];
        }

        //Getters y Setters
        public function getNombre(): string{
            return $this->nombre;
        }
        public function getDireccion(): string{
            return $this->direccion;
        }
        public function getTelefono(): int{
            return $this->telefono;
        }
        public function getClientes(): array{
            return $this->clientes;
        }
        public function getProductos(): array{
            return $this->productos;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        //Esta funcion coge un objeto de la clase cliente y si existe devuelve true
        //parametros: objeto de cliente
        private function existeCliente(Cliente $cliente){
            $result = false;

            foreach ($this->clientes as $key => $value){
                if($key === $cliente ->getDni() && get_class($value) === get_class($cliente)){
                    $result = true;
                    break;
                }
            }
            return $result;
        }
        //Esta funcion coge un objeto de la clase producto y si existe devuelve true
        //parametros: objeto de producto
        private function existeProducto(Producto $producto){
            $result = false;

            foreach ($this->productos as $key => $value){
                if($key === $producto ->getCodigo() && get_class($value) === get_class($producto)){
                    $result = true;
                    break;
                }
            }
            return $result;
        }

        //Esta funcion coge un objeto de la clase Cliente y si modifica o añade devuelve true
        //parametros: objeto de cliente y booleano modificar
        public function addClientes(Cliente $cliente, bool $modificarCli){
            
            if(isset($cliente) && ($cliente instanceof Cliente)){
                if($this->existeCliente($cliente) && !$modificarCli){
                    return false;
                }
                elseif(!$this->existeCliente($cliente) && $modificarCli){
                    return false;
                }
                else{
                    $this->clientes[$cliente->getDni()] = $cliente;
                    return true;
                }
            }
            else{
                return false;
            }
        }

        //Esta funcion coge el dni del cliente y comprueba si existe y si existe lo borra, devuelve true
        //parametros: string dni del cliente
        public function borrarClientePorDni($dniCliente){
            foreach ($this->clientes as $clave => $cliente) {
                if ($cliente->getDni() === $dniCliente) {
                    unset($this->clientes[$clave]);
                    return true; // Indica que se encontró y borró el cliente
                }
            }
            return false; // Indica que no se encontró el cliente con el código proporcionado
        }

        //Esta funcion coge un objeto de la clase Producto y si modifica o añade devuelve true
        //parametros: objeto de producto y booleano modificar
        public function addProductos(Producto $producto, bool $modificarPro) {
            if (isset($producto) && ($producto instanceof Producto)) {
                if ($this->existeProducto($producto) && !$modificarPro) {
                    return false;
                } elseif (!$this->existeProducto($producto) && $modificarPro) {
                    return false;
                } else {
                    array_push($this->productos, $producto); // Agregar el producto al final del array
                    return true;
                }
            } else {
                return false;
            }
        }

        //Esta funcion coge el codigo del producto y comprueba si existe y si existe lo borra, devuelve true
        //parametros: string codigo del producto
        public function borrarProductoPorCodigo(string $codigoProducto){
            foreach ($this->productos as $clave => $producto) {
                if ($producto->getCodigo() === $codigoProducto) {
                    unset($this->productos[$clave]);
                    return true; // Indica que se encontró y borró el producto
                }
            }
            return false; // Indica que no se encontró el producto con el código proporcionado
        }

        //esta funcion coge un string y dependiendo de  ese string devolvera un array u otro
        //parametros: string categoria del producto
        public function mostrarProductosEspecificos(string $categoria){
            $result = [];
        
            foreach($this->productos as $producto){
                if ($categoria === "Juegos" && $producto instanceof Juegos) {
                    $result[] = $producto;
                } elseif ($categoria === "Consolas" && $producto instanceof Consolas) {
                    $result[] = $producto;
                } elseif ($categoria === "Accesorios" && $producto instanceof Accesorios) {
                    $result[] = $producto;
                }
            }
        
            return $result;
        }
        
        //Metodo tostring
        public function __toString()
        {
            $result ="<br>Tienda: ".$this->nombre."</br>";

             //Recorre el el array de clientes
            $result .= "<br>Clientes:</br>";
            foreach ($this->clientes as $cliente) {
                $result .= $cliente . "<br>"; 
            }

            //Recorre el el array de productos
            $result .= "<br>Productos:</br>";
            foreach ($this->productos as $producto) {
                $result .= $producto . "<br>"; 
            }

            return $result;
        }
    }

?>