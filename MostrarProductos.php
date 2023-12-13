<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="MetodoMostrarYBorrar.css">
    <?php
    include_once "Producto.php";
    include_once "Tienda.php";
    include_once "Juegos.php";
    include_once "Consolas.php";
    include_once "Accesorios.php";
    include_once "ITienda.php";

// Reanudamos la sesión ya iniciada
    session_start();



    // Botón para volver atrás
    if (isset($_POST["volver"])) {
        header("Location: PrincipalProductos.php");
        exit;
    }
    ?>
</head>
<body>
    <div>
        <h1>Mostrar Todos los Productos</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input class="mostrarProducto" type="submit" name="MostrarTodos" id="MostrarTodos" value="Mostrar Todos los Productos">
            <input class="mostrarProducto" type="submit" name="juegos" id="juegos" value="Mostrar Juegos">
            <input class="mostrarProducto" type="submit" name="consolas" id="consolas" value="Mostrar Consolas">
            <input class="mostrarProducto" type="submit" name="accesorios" id="accesorios" value="Mostrar Accesorios">
           
            <br>
            <?php

if (isset($_POST["MostrarTodos"])) {
    // Obtener todos los productos de la tienda
    $productos = $_SESSION['Tienda']->getProductos();
    
    // Mostrar la información de todos los productos
    foreach ($productos as $producto) {
        echo "<div class='producto'>";
        echo "<p class='codigo-producto'>Código: " . $producto->getcodigo() . "</p>";
        echo "<h2>" . $producto->getnombre() . "</h2>";
        echo "<div class='detalle-producto'>";
        echo "<p><span>Descripción:</span> " . $producto->getdescripcion() . "</p>";
        echo "<p class='precio-producto'>Precio: " . $producto->getprecio() . "€</p>";
        
        // Verificar la categoría del producto y mostrar la información adicional correspondiente
        switch ($producto->getcategoria()) {
            case 'Consolas':
                // Mostrar información específica de consolas
                echo "<p><span>Modelo:</span> " . $producto->getMarca() . "</p>";
                echo "<p><span>Capacidad:</span> " . $producto->getModelo() . "</p>";
                break;
            case 'Juegos':
                // Mostrar información específica de juegos
                echo "<p><span>Plataforma:</span> " . $producto->getPlataforma() . "</p>";
                echo "<p><span>Género:</span> " . $producto->getGenero() . "</p>";
                echo "<p><span>Edad Mínima:</span> " . $producto->getEdadMinima() . "</p>";
                break;
            case 'Accesorios':
                // Mostrar información específica de accesorios
                echo "<p><span>Tipo:</span> " . $producto->getTipoConexion() . "</p>";
                echo "<p><span>Compatibilidad:</span> " . $producto->getColor() . "</p>";
                break;
        }
        
        echo "</div>";
        echo "</div>";
    }

} elseif (isset($_POST["juegos"])) {
    $productos = $_SESSION['Tienda']->mostrarProductosEspecificos("Juegos");
    foreach ($productos as $producto) {
        echo "<div class='producto'>";
        echo "<p class='codigo-producto'>Código: " . $producto->getCodigo() . "</p>";
        echo "<h2>" . $producto->getNombre() . "</h2>";
        echo "<div class='detalle-producto'>";
        echo "<p><span>Descripción:</span> " . $producto->getDescripcion() . "</p>";
        echo "<p class='precio-producto'>Precio: " . $producto->getPrecio() . "€</p>";
        echo "<p><span>Plataforma:</span> " . $producto->getPlataforma() . "</p>";
        echo "<p><span>Género:</span> " . $producto->getGenero() . "</p>";
        echo "<p><span>Edad Mínima:</span> " . $producto->getEdadMinima() . "</p>";
        echo "</div>";
        echo "</div>";
    }
} elseif (isset($_POST["consolas"])) {
    $productos = $_SESSION['Tienda']->mostrarProductosEspecificos("Consolas");
    foreach ($productos as $producto) {
        echo "<div class='producto'>";
        echo "<p class='codigo-producto'>Código: " . $producto->getCodigo() . "</p>";
        echo "<h2>" . $producto->getNombre() . "</h2>";
        echo "<div class='detalle-producto'>";
        echo "<p><span>Descripción:</span> " . $producto->getDescripcion() . "</p>";
        echo "<p class='precio-producto'>Precio: " . $producto->getPrecio() . "€</p>";
        echo "<p><span>Modelo:</span> " . $producto->getMarca() . "</p>";
        echo "<p><span>Capacidad:</span> " . $producto->getModelo() . "</p>";
        echo "</div>";
        echo "</div>";
    }
} elseif (isset($_POST["accesorios"])) {
    $productos = $_SESSION['Tienda']->mostrarProductosEspecificos("Accesorios");
    foreach ($productos as $producto) {
        echo "<div class='producto'>";
        echo "<p class='codigo-producto'>Código: " . $producto->getCodigo() . "</p>";
        echo "<h2>" . $producto->getNombre() . "</h2>";
        echo "<div class='detalle-producto'>";
        echo "<p><span>Descripción:</span> " . $producto->getDescripcion() . "</p>";
        echo "<p class='precio-producto'>Precio: " . $producto->getPrecio() . "€</p>";
        echo "<p><span>Tipo:</span> " . $producto->getTipoConexion() . "</p>";
        echo "<p><span>Compatibilidad:</span> " . $producto->getColor() . "</p>";
        echo "</div>";
        echo "</div>";
    }
}
            ?>
             <button class="volver"  name="volver">Volver Atras</button>
        </form>
    </div>
</body>
</html>
