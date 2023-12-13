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
include_once "LeerClientesXML.php";

// Reanudamos la sesión ya iniciada con comprobacion
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST["Aniadir"])) {
    echo '<br /><a href="IndexClientes.php">página 2</a>';
    header("Location: IndexClientes.php");
    exit;
    
}



?>

</head>
<div class="container">
<h1>Clientes</h1>

<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="submit" name="Aniadir" id="Aniadir" value="Añadir Cliente">
    <input type="submit" name="Borrar" id="Borrar" value="Borrar Cliente">
    <input type="submit" name="Modificar" id="Modificar" value="Modificar Cliente">
    <input type="submit" name="Mostrar" id="Mostrar" value="Mostrar Clientes">
    <input type="submit" name="LeerXML" id="LeerXML" value="Obtener Clientes XML">
    <input type="submit" name="XML" id="XML" value="Generar o Actualizar XML">
   
    <?php
if (isset($_POST["XML"])) {
    include_once("EscribirClientesXML.php");
    
}

if (isset($_POST["LeerXML"])) {
    try{
        
        leerClientesXML();

    }catch(Exception $e){
        echo "Error al cargar los cliente desde el XML". $e->getMessage();
    }
}

if (isset($_POST["Mostrar"])) {
    if (empty($_SESSION['Tienda']->getClientes())){
        echo "No hay clientes";
    }
    else {
        echo '<br /><a href="MostrarClientes.php">página 2</a>';
        header("Location: MostrarClientes.php");
        exit;
    }

    
}

if (isset($_POST["Borrar"])) {
    if (empty($_SESSION['Tienda']->getClientes())){
        echo "No hay clientes";
    }
    else {
        echo '<br /><a href="BorrarCliente.php">página 2</a>';
        header("Location: BorrarCliente.php");
        exit;
    }

}

if (isset($_POST["Modificar"])) {
    if (empty($_SESSION['Tienda']->getClientes())){
        echo "No hay clientes";
    }
    else {
        echo '<br /><a href="ModificarCliente.php">página 2</a>';
        header("Location: ModificarCliente.php");
        exit; 
    }
   
}


    // Botón para volver atrás
if (isset($_POST["volver"])) {
    header("Location: Index.php");
    exit;
}

?>
<br>
<br>
 <button class="volver"  name="volver">Volver Atras</button>

</form>
</div>
</body>
</html>
