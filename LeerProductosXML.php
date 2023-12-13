<?php
include_once "Tienda.php";
include_once "Producto.php";
include_once "Juegos.php";
include_once "Consolas.php";
include_once "Accesorios.php";
include_once "ITienda.php";


function leerProductosXML() {
    try {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }


        // PASO 1: Creamos el objeto DOMDocument y cargamos el archivo XML
        $dom = new DOMDocument("1.0", "UTF-8");
        $dom->load("Productos.xml");

        // PASO 2: Obtener una lista de los elementos con etiqueta 'Producto'
        $todosLosProductos = $dom->getElementsByTagName('Producto');

        foreach ($todosLosProductos as $producto) {
            $codigo = $producto->getElementsByTagName('Codigo')->item(0)->nodeValue;
            $nombre = $producto->getElementsByTagName('Nombre')->item(0)->nodeValue;
            $descripcion = $producto->getElementsByTagName('Descripcion')->item(0)->nodeValue;
            $precio =  $producto->getElementsByTagName('Precio')->item(0)->nodeValue;
            $categoria = $producto->getElementsByTagName('Categoria')->item(0)->nodeValue;

            $productoInstance = null;

            // Crear instancia de la clase base Producto
            if ($categoria === "Juegos") {
                $plataforma = $producto->getElementsByTagName('Plataforma')->item(0)->nodeValue;
                $genero = $producto->getElementsByTagName('Genero')->item(0)->nodeValue;
                $edadMinima = $producto->getElementsByTagName('EdadMinima')->item(0)->nodeValue;
                $productoInstance = new Juegos($codigo, $nombre, $descripcion, $precio, $categoria, $plataforma, $genero, $edadMinima);
            } elseif ($categoria === "Consolas") {
                $marca = $producto->getElementsByTagName('Marca')->item(0)->nodeValue;
                $modelo = $producto->getElementsByTagName('Modelo')->item(0)->nodeValue;
                $productoInstance = new Consolas($codigo, $nombre, $descripcion, $precio, $categoria, $marca, $modelo);
            } elseif ($categoria === "Accesorios") {
                $tipoConexion = $producto->getElementsByTagName('TipoConexion')->item(0)->nodeValue;
                $color = $producto->getElementsByTagName('Color')->item(0)->nodeValue;
                $productoInstance = new Accesorios($codigo, $nombre, $descripcion, $precio, $categoria, $tipoConexion, $color);
            }

            if ($productoInstance !== null) {
                $_SESSION['Tienda']->addProductos($productoInstance,false);
                
            }
        }

        echo "XML Leído Correctamente";


    } catch (Exception $error) {
        echo "Error general: " . $error->getMessage();
        return []; // En caso de error, retornar un array vacío
    } finally {
        // Cerrar la sesión después de realizar operaciones
        session_write_close();
    }
}


?>
