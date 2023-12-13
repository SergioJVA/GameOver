<?php
include_once "Tienda.php";
include_once "Producto.php";
include_once "Juegos.php";
include_once "Consolas.php";
include_once "Accesorios.php";
include_once "ITienda.php";


try {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Supongamos que $_SESSION['Tienda']->getProductos() devuelve un array de objetos Producto
    $productos = $_SESSION['Tienda']->getProductos();
    
    // PASO 1: Crear un objeto de la clase DOMDocument
    $dom = new DOMDocument("1.0", "UTF-8");
    
    // Indicamos que el documento XML resultante esté formateado automáticamente
    $dom->formatOutput = true;
    
    // PASO 2: Creamos el elemento raíz del documento
    $raiz = $dom->createElement("Productos");
    $dom->appendChild($raiz);
    
    // PASO 3: Recorremos el array de productos y creamos un elemento en el archivo XML con cada producto
    foreach ($productos as $producto) {
        $productoElemento = $dom->createElement("Producto");
        $raiz->appendChild($productoElemento);
        $productoElemento->appendChild($dom->createElement('Codigo', $producto->getCodigo()));
        $productoElemento->appendChild($dom->createElement('Nombre', $producto->getNombre()));
        $productoElemento->appendChild($dom->createElement('Descripcion', $producto->getDescripcion()));
        $productoElemento->appendChild($dom->createElement('Precio', $producto->getPrecio()));
        $productoElemento->appendChild($dom->createElement('Categoria', $producto->getCategoria()));
    
        // Agregar campos específicos de cada categoría
        if ($producto instanceof Juegos) {
            $productoElemento->appendChild($dom->createElement('Plataforma', $producto->getPlataforma()));
            $productoElemento->appendChild($dom->createElement('Genero', $producto->getGenero()));
            $productoElemento->appendChild($dom->createElement('EdadMinima', $producto->getEdadMinima()));
        } elseif ($producto instanceof Consolas) {
            $productoElemento->appendChild($dom->createElement('Marca', $producto->getMarca()));
            $productoElemento->appendChild($dom->createElement('Modelo', $producto->getModelo()));
        } elseif ($producto instanceof Accesorios) {
            $productoElemento->appendChild($dom->createElement('TipoConexion', $producto->getTipoConexion()));
            $productoElemento->appendChild($dom->createElement('Color', $producto->getColor()));
        }
    }
    
    // PASO FINAL: Guardar el archivo
    $dom->save("Productos.xml");
}
catch (Exception $error){
        echo "Error general: " . $error->getMessage();
}
finally{
    echo "XML Generado Correctamente";
}

?>
