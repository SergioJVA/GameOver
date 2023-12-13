<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="IndexProductosYClientes.css">
<?php

include_once "Tienda.php";
include_once "Cliente.php";

// Reanudamos la sesión ya iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    if (isset($_POST["Aniadir"])) {
        //variable booleana para comprobar si todos los campos estan rellenados
        $camposCompletos = !empty($_POST["Nombre"]) && !empty($_POST["Apellido"]) && !empty($_POST["Direccion"]) && !empty($_POST["Dni"]) && !empty($_POST["Correo"]) && !empty($_POST["Telefono"]);

            // Reseteamos el cliente
            $cliente = null;
            // Obtiene los datos del formulario
            $nombre = $_POST["Nombre"];
            $apellido = $_POST["Apellido"];
            $direccion = $_POST["Direccion"];
            $dni = $_POST["Dni"];
            $correo = $_POST["Correo"];
            $telefono = $_POST["Telefono"];

            //si es true que añada el cliente
            if ($camposCompletos) {

                // Creamos el cliente y añadimos el cliente a la tienda
                $cliente = new Cliente($nombre, $apellido, $direccion, $dni, $correo, $telefono);
                $_SESSION['Tienda']->addClientes($cliente, false);

                // Limpiar los campos después de añadir el cliente
                $_POST["Nombre"] = "";
                $_POST["Apellido"] = "";
                $_POST["Direccion"] = "";
                $_POST["Dni"] = "";
                $_POST["Correo"] = "";
                $_POST["Telefono"] = "";

            }else{
                throw new Exception("tiene que tener todos los campos");
            }

    }
} catch (TypeError $error) {
    echo "Error de tipo: " . $error->getMessage();
} catch (Exception $error) {
    echo "Error general: " . $error->getMessage();
}


?>

</head>
<div class="container">
<h1>Clientes</h1>

<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" value="<?php if (isset($_POST["Nombre"])) {echo $_POST["Nombre"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["Nombre"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        <label>Apellido:</label>
        <input type="text" name="Apellido" id="Apellido" value="<?php if (isset($_POST["Apellido"])) {echo $_POST["Apellido"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["Apellido"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        <label>Dirección:</label>
        <input type="text" name="Direccion" id="Direccion" value="<?php if (isset($_POST["Direccion"])) {echo $_POST["Direccion"];}?>"
        <?php if (isset($_POST["Aniadir"]) && empty($_POST["Direccion"])) echo "style='border: 3px solid red;'"; ?>>
        <br>
        <br>
        
        <label>Dni:</label>
        <input type="text" id="Dni" name="Dni" value="<?php if (isset($_POST["Dni"])) {echo $_POST["Dni"];}?>"
    <?php if (isset($_POST["Aniadir"]) && empty($_POST["Dni"])) echo "style='border: 3px solid red;'"; ?>>


        <label>Correo:</label>
        <input type="email" id="Correo" name="Correo" min="3" max="18" value="<?php if (isset($_POST["Correo"])) {echo $_POST["Correo"];}?>"
    <?php if (isset($_POST["Aniadir"]) && empty($_POST["Correo"])) echo "style='border: 3px solid red;'"; ?>>

    
        <label>Telefono:</label>
        <input type="tel" id="Telefono" name="Telefono" value="<?php if (isset($_POST["Telefono"])) {echo $_POST["Telefono"];}?>"
    <?php if (isset($_POST["Aniadir"]) && empty($_POST["Telefono"])) echo "style='border: 3px solid red;'"; ?>>

    <br>
    <br>
    
    <input type="submit" name="Aniadir" id="Aniadir" value="Añadir Cliente">
    <button class="volver"  name="volver">Volver Atras</button>
    <?php

        // Botón para volver atrás
        if (isset($_POST["volver"])) {
            header("Location: PrincipalClientes.php");
            exit;
        }
        
    ?>
    

    </form>

</body>
</div>
</html>


