<?php

    class Cliente{
        //Variables
        private string $dni;
        private string $nombre;
        private string $apellido;
        private string $direccion;
        private string $correo;
        private int $telefono;

        //constructor
        public function __construct(string $dni,string $nombre, string $apellido, string $direccion, string $correo, int $telefono)
        {
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->direccion = $direccion;
            $this->correo = $correo;
            $this->telefono = $telefono;

        }

        //Getters y Setters
        public function getDni(): string{
            return $this->dni;
        }
        public function getNombre(): string{
            return $this->nombre;
        }
        public function getApellido(): string{
            return $this->apellido;
        }
        public function getDireccion(): string{
            return $this->direccion;
        }
        public function getCorreo(): string{
            return $this->correo;
        }
        public function getTelefono(): int{
            return $this->telefono;
        }
        public function setDni($dni){
            $this->dni = $dni;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        //metodo toString 
        public function __toString()
        {
            return "<br>-Dni => ". $this->dni . "<br> -Nombre => ". $this->nombre . "<br> -Apellido => ". $this->apellido . "<br> -Direccion => ". $this->direccion . "<br> -Correo => ". $this->correo . "<br> -Telefono => ". $this->telefono;
        }

    }

?>