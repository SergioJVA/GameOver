<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="MetodoMostrarYBorrar.css">
    <?php
    
    include_once "Tienda.php";
    include_once "Cliente.php";

// Reanudamos la sesión ya iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



    // Botón para volver atrás
    if (isset($_POST["volver"])) {
        header("Location: PrincipalClientes.php");
        exit;
    }
    ?>
</head>
<body>
    <div>
        <h1>Mostrar Todos los Clientes</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input class="mostrarCliente" type="submit" name="MostrarTodos" id="MostrarTodos" value="Mostrar Todos los Clientes">


            <br>
            <?php

if (isset($_POST["MostrarTodos"])) {

    $clientes = $_SESSION['Tienda']->getClientes();

    // Mostrar la información de todos los productos
    foreach ($clientes as $cliente) {

    echo "<div class='cliente'>";
    echo "<p class='dni-cliente'>Dni: " . $cliente->getDni() . "</p>";
    echo "<h2> Nombre: " . $cliente->getnombre() . " " . $cliente->getApellido() ."</h2>";
    echo "<div class='detalle-cliente'>";
    echo "<p><span>Direccion:</span> " . $cliente->getDireccion() . "</p>";
    echo "<p>Correo: " . $cliente->getCorreo() . "€</p>";
    echo "<p>Telefono: " . $cliente->getTelefono() . "€</p>";
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
