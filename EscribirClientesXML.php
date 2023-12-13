<?php
include_once "Tienda.php";
include_once "Cliente.php";



try {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Supongamos que $_SESSION['Tienda']->getClientes() devuelve un array de objetos Producto
    $clientes = $_SESSION['Tienda']->getClientes();
    
    // PASO 1: Crear un objeto de la clase DOMDocument
    $dom = new DOMDocument("1.0", "UTF-8");
    
    // Indicamos que el documento XML resultante esté formateado automáticamente
    $dom->formatOutput = true;
    
    // PASO 2: Creamos el elemento raíz del documento
    $raiz = $dom->createElement("Clientes");
    $dom->appendChild($raiz);
    
    // PASO 3: Recorremos el array de clientes y creamos un elemento en el archivo XML con cada cliente
    foreach ($clientes as $cliente) {
        $clienteElemento = $dom->createElement("Cliente");
        $raiz->appendChild($clienteElemento);
        $clienteElemento->appendChild($dom->createElement('Dni', $cliente->getDni()));
        $clienteElemento->appendChild($dom->createElement('Nombre', $cliente->getNombre()));
        $clienteElemento->appendChild($dom->createElement('Apellido', $cliente->getApellido()));
        $clienteElemento->appendChild($dom->createElement('Direccion', $cliente->getDireccion()));
        $clienteElemento->appendChild($dom->createElement('Correo', $cliente->getCorreo()));
        $clienteElemento->appendChild($dom->createElement('Telefono', $cliente->getTelefono()));

    }
    
    // PASO FINAL: Guardar el archivo
    $dom->save("Clientes.xml");
}
catch (Exception $error){
        echo "Error general: " . $error->getMessage();
}
finally{
    echo "XML de clientes Generado Correctamente";
}

?>
