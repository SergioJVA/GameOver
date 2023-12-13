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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}




    // Botón para volver atrás
    if (isset($_POST["volver"])) {
        header("Location: PrincipalProductos.php");
        exit;
    }

   
    ?>
</head>
<body>
    <div>
    <h1>Borrar un producto</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label>Código del Producto:</label>
            <input class="CampoBorrar" type="text" name="codigoProducto" id="codigoProducto">
            <input class="borrarProducto" type="submit" name="borrarProducto" id="borrarProducto" value="Borrar Producto">
            <button class="volver"  name="volver">Volver Atras</button>
            <br>

     <?php
     
     if (isset($_POST["borrarProducto"])) {
        // Asumiendo que tienes un campo en el formulario llamado "codigoProducto"
        $codigoProducto = $_POST["codigoProducto"];
        $borradoExitoso = $_SESSION['Tienda']->borrarProductoPorCodigo($codigoProducto);
    
        if ($borradoExitoso) {
            echo "El producto con código $codigoProducto ha sido borrado exitosamente.";
        } else {
            echo "No se encontró ningún producto con el código $codigoProducto.";
        }
    }


     ?>
        </form>
    </div>
</body>
</html>
