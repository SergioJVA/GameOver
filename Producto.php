<?php 
    class Producto {
        // Atributos
        private string $codigo;
        private string $nombre;
        private string $descripcion;
        private float $precio;
        private string $categoria;


        // Constructor
        public function __construct($codigo,$nombre, $descripcion, $precio, $categoria) {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->categoria = $categoria;
        }

        // Getters y Setters
        public function getCodigo(): string {
            return $this->codigo;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function getDescripcion(): string {
            return $this->descripcion;
        }

        public function getPrecio(): float {
            return $this->precio;
        }

        public function getCategoria(): string {
            return $this->categoria;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }




        // Metodo ToString
        public function __toString()
        {
            return "<br>-Codigo => ". $this->codigo . "<br> -Nombre => ". $this->nombre . "<br> -Descripcion => ". $this->descripcion . "<br> -Precio => ". $this->precio . "<br> -Categoria => ". $this->categoria;
        }
     

    }



?>