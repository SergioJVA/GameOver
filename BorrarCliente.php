<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
    <h1>Borrar un cliente</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label>Dni del Cliente:</label>
            <input class="CampoBorrar" type="text" name="dniCliente" id="dniCliente">
            <input class="borrarCliente" type="submit" name="borrarCliente" id="borrarCliente" value="Borrar Cliente">
            <button class="volver"  name="volver">Volver Atras</button>
            <br>

     <?php
     
     if (isset($_POST["borrarCliente"])) {
        
        //Cogemos el dni que este escrito en el campo
        $dniCliente = $_POST["dniCliente"];
        $borradoExitoso = $_SESSION['Tienda']->borrarClientePorDni($dniCliente);
    
        if ($borradoExitoso) {
            echo "El cliente con dni $dniCliente ha sido borrado exitosamente.";
        } else {
            echo "No se encontró ningún cliente con el dni $dniCliente.";
        }
    }


     ?>
        </form>
    </div>
</body>
</html>
