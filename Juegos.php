<?php

include_once "ITienda.php";

    class Juegos extends Producto implements ITienda{
        private string $plataforma;
        private string $genero;
        private int $edadMinima;



        public function __construct($codigo,$nombre, $descripcion, $precio, $categoria, $plataforma, $genero, $edadMinima)
        {
            parent::__construct($codigo,$nombre, $descripcion, $precio, $categoria);
            $this->codigo = $this->crearCodigo();
            $this->plataforma = $plataforma;
            $this->genero = $genero;
            $this->edadMinima = $edadMinima;
            $this->crearCodigo();
        }


        public function getPlataforma():string{
            return $this->plataforma;
        }

        public function getGenero():string{
            return $this->genero;
        }

        public function getEdadMinima():int{
            return $this->edadMinima;
        }

        public function setPlataforma($plataforma){
            return $this->plataforma = $plataforma;
        }

        public function setGenero($genero){
            return $this->genero = $genero;
        }

        public function setEdadMinima($edadMinima){
            return $this->edadMinima = $edadMinima;
        }

        // Métodos 
        public function crearCodigo() {
            $codigoAleatorio = random_int(1000, 9999); // Números aleatorios entre 1000 y 9999
            $this->codigo = "JUE" . $codigoAleatorio;
        }

        // Metodo ToString
        public function __toString()
        {
           return parent::__toString(). "<br>-Plataforma => " . $this->plataforma . "<br>-Genero => ". $this->genero . "<br>-Edad Minima => ". $this->edadMinima ;
        }
    }


?>