<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="IndexProductosYClientes.css">
    <?php


    include_once "Tienda.php";
    include_once "Cliente.php";
    
    // Reanudamos la sesión ya iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])) {

    //cogemos los datos
    $dniCliente = $_POST["cliente_seleccionado"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    // Obtener el producto actual
    $clientes = $_SESSION['Tienda']->getClientes();
    foreach ($clientes as $cliente) {
        if ($cliente->getDni() == $dniCliente) {
            // Actualizar los atributos del producto
            $cliente->setNombre($nombre);
            $cliente->setApellido($apellido);
            $cliente->setDireccion($direccion);
            $cliente->setCorreo($correo);
            $cliente->setTelefono($telefono);
            break;
        }
    }

    // Redirigir a la página principal de clientes
    header("Location: IndexClientes.php");
    exit;
}
?>
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
       

       <input type="submit" name="Modificar" id="Modificar" value="Modificar Cliente">
       
       
       
       
       <?php
   
   if (isset($_POST["Modificar"])) {
       // Obtiene todos los clientes de la tienda
       $clientes = $_SESSION['Tienda']->getClientes();
   
       // Muestra la información de todos los clientes
       foreach ($clientes as $cliente) {
           echo "Dni: " . $cliente->getDni() . "<br>";
           echo "Nombre: " . $cliente->getNombre() . "<br>";
           echo "Apellido: " . $cliente->getApellido() . "<br>";
           echo "Direccion: " . $cliente->getDireccion() . "<br>";
           echo "Correo: " . $cliente->getCorreo() . "<br>";
           echo "Telefono: " . $cliente->getTelefono() . "<br>";
           echo "<hr>"; // Separa los clientes
       }
   
       // Muestra el formulario de modificación
       echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
       echo "<label>Seleccionar Cliente:</label>";
       echo "<select name='cliente_seleccionado'>";
       foreach ($clientes as $cliente) {
           echo "<option value='" . $cliente->getDni() . "'>" . $cliente->getDni() . "</option>";

       }
       echo "</select><br>";
       echo "<label>Nombre:</label> <input type='text' name='nombre'><br>";
       echo "<label>Apellido:</label> <input type='text' name='apellido'><br>";
       echo "<label>Direccion:</label> <input type='text' name='direccion'><br>";
       echo "<label>Correo:</label> <input type='email' name='correo'><br>";
       echo "<label>Telefono:</label> <input type='tel' name='telefono'><br>";
       echo "<input type='submit' name='guardar' value='Guardar'>";
       echo "<button class='volver'  name='volver'>Volver Atras</button>";
       echo "</form>";
   }
       
     // Botón para volver atrás
     if (isset($_POST["volver"])) {
       header("Location: PrincipalClientes.php");
       exit;
   }

   ?>
</body>
</html>