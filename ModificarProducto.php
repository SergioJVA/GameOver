<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="IndexProductosYClientes.css">
    <?php


include_once "Tienda.php";
include_once "Producto.php";
include_once "Juegos.php";
include_once "Consolas.php";
include_once "Accesorios.php";
include_once "ITienda.php";

// Reanudamos la sesión ya iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])) {
    $codigoProducto = $_POST["producto_seleccionado"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $marca=$_POST["marca"];
    $modelo=$_POST["modelo"];
    $plataforma=$_POST["plataforma"];
    $genero=$_POST["genero"];
    $edadMinima=$_POST["edadMinima"];
    $tipoConexion=$_POST["tipoConexion"];
    $color=$_POST["color"];

    // Obtener el producto actual
    $productos = $_SESSION['Tienda']->getProductos();
    foreach ($productos as $producto) {
        if ($producto->getCodigo() == $codigoProducto) {
            // Actualizar los atributos del producto
            $producto->setNombre($nombre);
            $producto->setPrecio($precio);
            $producto->setDescripcion($descripcion);
           
        }
    }

    // Redirigir a la página principal de productos
    header("Location: PrincipalProductos.php");
    exit;
}

?>
</head>
<div class="container">
<h1>Productos</h1>

<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="submit" name="Modificar" id="Modificar" value="Modificar Producto">
    
    
    
    <?php

if (isset($_POST["Modificar"])) {
    // Obtiene todos los productos de la tienda
    $productos = $_SESSION['Tienda']->getProductos();

    // Muestra el formulario de modificación
    echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
    echo "<label>Seleccionar Producto:</label>";
    echo "<select name='producto_seleccionado'>";
    foreach ($productos as $producto) {
        echo "<option value='" . $producto->getCodigo() . "'>" . $producto->getCodigo() . "</option>";
    }
    echo "</select><br>";
    echo "<label>Nombre:</label> <input type='text' name='nombre'><br>";
    echo "<label>Precio:</label> <input type='text' name='precio'><br>";
    echo "<label>Descripcion:</label> <input type='text' name='descripcion'><br>";
    echo "<input type='submit' name='guardar' value='Guardar'>";
    echo "<button class='volver'  name='volver'>Volver Atras</button>";
    echo "</form>";
}
    
  // Botón para volver atrás
  if (isset($_POST["volver"])) {
    header("Location: PrincipalProductos.php");
    exit;
}


?>

    </form>
</div>
</body>
</html>


