<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Game Over</title>
    <link rel="stylesheet" href="index.css">
<?php
    include_once "Producto.php";
    include_once "Cliente.php";
    include_once "Tienda.php";
    include_once "Juegos.php";
    include_once "Consolas.php";
    include_once "Accesorios.php";
    include_once "ITienda.php";

    // Iniciamos la sesion
    session_start();

    $tienda = new Tienda("Game Over", "Calle Alfonso 13", "487521036");
    $_SESSION['Tienda'] = $tienda;
    
    // Creamos la tienda

    if (isset($_POST["productos"])){
        header("Location: PrincipalProductos.php");
        exit();
    }

    if (isset($_POST["clientes"])){
        header("Location: PrincipalClientes.php");
        exit();
    }

?>

</head>
<body>

        <img src="Logo.png" alt="Logo de Game Over" id="logo">
        <h1>GAME OVER</h1>



        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="submit" name="clientes" value="Clientes">
            <input type="submit" name="productos" value="Productos">
        </form>

</body>
</html>