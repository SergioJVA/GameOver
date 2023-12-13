<?php
include_once "ITienda.php";


    class Accesorios extends Producto implements ITienda{
        // Atributos
        private string $tipoConexion;
        private string $color;



        // Constructor
        public function __construct($codigo,$nombre, $descripcion, $precio, $categoria, $tipoConexion, $color)
        {
            parent::__construct($codigo,$nombre,  $descripcion,  $precio, $categoria);
            $this->codigo = $this->crearCodigo();
            $this->tipoConexion = $tipoConexion;
            $this->color = $color;
            $this->crearCodigo();
        }


        // Getters y Setters
        public function getTipoConexion():string{
            return $this->tipoConexion;
        }

        public function getColor():string{
            return $this->color;
        }


        public function setTipoConexion($tipoConexion){
            return $this->tipoConexion = $tipoConexion;
        }

        public function setColor($color){
            return $this->color = $color;
        }



        // Métodos 
        public function crearCodigo() {
            $codigoAleatorio = random_int(1000, 9999); // Números aleatorios entre 1000 y 9999
            $this->codigo = "ACC" . $codigoAleatorio;
        }


        // Metodo ToString
        public function __toString()
        {
           return parent::__toString(). "<br>-Tipo Conexion => " . $this->tipoConexion . "<br>-Color => ". $this->color;
        }
    }


?>