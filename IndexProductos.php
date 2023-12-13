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


try {
    if (isset($_POST["Aniadir"])) {

        $camposCompletos = !empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && $_POST["categoria"] !== "Selecciona una opción";

        if ($camposCompletos) {
        // Reseteamos el producto
        $producto = null;
        // Obtiene los datos del formulario
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];

        switch ($categoria) {
            case "Juegos":
                $plataforma = $_POST["plataforma"];
                $genero = $_POST["genero"];
                $edadMinima = $_POST["edadMinima"];
                $producto = new Juegos("null",$nombre, $descripcion, $precio, $categoria, $plataforma, $genero, $edadMinima);
                break;

               case "Consolas":
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $producto = new Consolas("null",$nombre, $descripcion, $precio, $categoria, $marca, $modelo);
                break;

            case "Accesorios":
                $tipoConex = $_POST["tipoConex"];
                $color = $_POST["color"];
                $producto = new Accesorios("null",$nombre, $descripcion, $precio, $categoria, $tipoConex, $color);
                break;
        }

        // Añadir el producto a la tienda
        $_SESSION['Tienda']->addProductos($producto, false);

        // Limpiar los campos después de añadir el producto
        $_POST["nombre"] = "";
        $_POST["descripcion"] = "";
        $_POST["precio"] = "";
        $_POST["categoria"] = "";
        $_POST["plataforma"] = "";
        $_POST["genero"] = "";
        $_POST["edadMinima"] = "";
        $_POST["marca"] = "";
        $_POST["modelo"] = "";
        $_POST["tipoConex"] = "";
        $_POST["color"] = "";
    }
    }
} catch (TypeError $error) {
    echo "Error de tipo: " . $error->getMessage();
} catch (Exception $error) {
    echo "Error general: " . $error->getMessage();
}


if (isset($_POST["Mostrar"])) {
    echo '<br /><a href="MostrarProductos.php">página 2</a>';
    header("Location: MostrarProductos.php");
    exit;
    
}

if (isset($_POST["Borrar"])) {
    echo '<br /><a href="BorrarProductos.php">página 2</a>';
    header("Location: BorrarProductos.php");
    exit;    
}

if (isset($_POST["Modificar"])) {
    echo '<br /><a href="ModificarProducto.php">página 2</a>';
    header("Location: ModificarProducto.php");
    exit;    
}


else {
?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            var selectCategoria = document.getElementById("categoria");
            var camposExtrasJuegos = document.getElementById("camposExtrasJuegos");
            var camposExtrasConsolas = document.getElementById("camposExtrasConsolas");
            var camposExtrasAccesorios = document.getElementById("camposExtrasAccesorios");

            selectCategoria.addEventListener("change", function() {
                camposExtrasJuegos.style.display = "none";
                camposExtrasConsolas.style.display = "none";
                camposExtrasAccesorios.style.display = "none";



                if (selectCategoria.value === "Juegos") {
                    camposExtrasJuegos.style.display = "block";
                } 

                if(selectCategoria.value === "Consolas"){
                    camposExtrasConsolas.style.display = "block";
                }

                if(selectCategoria.value === "Accesorios"){
                    camposExtrasAccesorios.style.display = "block";
                }

            });
        });
    </script>
</head>
<div class="container">
<h1>Productos</h1>

<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST["nombre"])) {echo $_POST["nombre"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["nombre"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" value="<?php if (isset($_POST["descripcion"])) {echo $_POST["descripcion"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["descripcion"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        <label>Precio:</label>
        <input type="text" name="precio" id="precio" value="<?php if (isset($_POST["precio"])) {echo $_POST["precio"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["precio"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        <label>Categoría:</label>
        <select id="categoria" name="categoria">
            <option value="" selected disabled>Selecciona una opción</option>
            <option value="Juegos">Juegos</option>
            <option value="Consolas">Consolas</option>
            <option value="Accesorios">Accesorios</option>
        </select>

        <div id="camposExtrasJuegos" style="display: none;">
            <label>Plataforma</label>
            <input type="text" id="plataforma" name="plataforma" value="<?php if (isset($_POST["plataforma"])) {echo $_POST["plataforma"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["plataforma"])) echo "style='border: 3px solid red;'"; ?>>


            <label>Genero</label>
            <input type="text" id="genero" name="genero" value="<?php if (isset($_POST["genero"])) {echo $_POST["genero"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["genero"])) echo "style='border: 3px solid red;'"; ?>>


            <label>Edad Minima</label>
            <input type="number" id="edadMinima" name="edadMinima" min="3" max="18" value="<?php if (isset($_POST["edadMinima"])) {echo $_POST["edadMinima"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["edadMinima"])) echo "style='border: 3px solid red;'"; ?>>
        </div>
        
        <div id="camposExtrasConsolas" style="display: none;">
            <label>Marca</label>
            <input type="text" id="marca" name="marca" value="<?php if (isset($_POST["marca"])) {echo $_POST["marca"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["marca"])) echo "style='border: 3px solid red;'"; ?>>


            <label>Modelo</label>
            <input type="text" id="modelo" name="modelo" value="<?php if (isset($_POST["modelo"])) {echo $_POST["modelo"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["modelo"])) echo "style='border: 3px solid red;'"; ?>>
        </div>

        <div id="camposExtrasAccesorios" style="display: none;">
            <label>Tipo Conexion</label>
            <input type="text" id="tipoConex" name="tipoConex" value="<?php if (isset($_POST["tipoConex"])) {echo $_POST["tipoConex"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["tipoConex"])) echo "style='border: 3px solid red;'"; ?>>

            <label>Color</label>
            <input type="text" id="color" name="color" value="<?php if (isset($_POST["color"])) {echo $_POST["color"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["color"])) echo "style='border: 3px solid red;'"; ?>>
        </div>

        <br>
        <br>
        
        <input type="submit" name="Aniadir" id="Aniadir" value="Añadir Producto">
        <?php

    // Botón para volver atrás
    if (isset($_POST["volver"])) {
        header("Location: PrincipalProductos.php");
        exit;
    }
    
?>
 <button class="volver"  name="volver">Volver Atras</button>
    </form>
</div>
</body>
</html>

<?php
 }
 ?>
