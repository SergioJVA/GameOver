<?php

include_once "Tienda.php";
include_once "Cliente.php";

function leerClientesXML(){

    try {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // PASO 1: Creamos el objeto DOMDocument y cargamos el archivo XML
        $dom = new DOMDocument("1.0", "UTF-8");
        $dom->load("Clientes.xml");
        
        // PASO 2: Obtener una lista de los elementos con etiqueta 'Cliente'
        $todosLosClientes = $dom->getElementsByTagName('Cliente');
        
        foreach ($todosLosClientes as $cliente) {
            $dni = $cliente->getElementsByTagName('Dni')->item(0)->nodeValue;
            $nombre = $cliente->getElementsByTagName('Nombre')->item(0)->nodeValue;
            $apellido = $cliente->getElementsByTagName('Apellido')->item(0)->nodeValue;
            $direccion =  $cliente->getElementsByTagName('Direccion')->item(0)->nodeValue;
            $correo = $cliente->getElementsByTagName('Correo')->item(0)->nodeValue;
            $telefono = $cliente->getElementsByTagName('Telefono')->item(0)->nodeValue;
        
            // Crear instancia de la clase base Cliente
            $clienteInstance = new Cliente($dni,$nombre, $apellido, $direccion, $correo, $telefono);
        
        
            $_SESSION['Tienda']->addClientes($clienteInstance, false);
           
        }
        
    
    
        echo "XML Leido Correctamente";
    }
    catch (Exception $error){
        echo "Error general: " . $error->getMessage();
    }

}



?>
