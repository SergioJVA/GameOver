<?php
include_once "ITienda.php";

    class Consolas extends Producto implements ITienda{
        private string $marca;
        private string $modelo;




        public function __construct($codigo,$nombre, $descripcion, float $precio, $categoria, $marca, $modelo)
        {
            parent::__construct($codigo,$nombre,  $descripcion,  $precio, $categoria);
            $this->codigo = $this->crearCodigo();
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->crearCodigo();
        }


        public function getMarca():string{
            return $this->marca;
        }

        public function getModelo():string{
            return $this->modelo;
        }


        public function setMarca($marca){
            return $this->marca = $marca;
        }

        public function setModelo($modelo){
            return $this->modelo = $modelo;
        }



        // Métodos 
        public function crearCodigo() {
            $codigoAleatorio = random_int(1000, 9999); // Números aleatorios entre 1000 y 9999
            $this->codigo = "CON" . $codigoAleatorio;
        }



        // Metodo ToString
        public function __toString()
        {
           return parent::__toString(). "<br>-Marca => " . $this->marca . "<br>-Modelo => ". $this->modelo;
        }
    }


?>