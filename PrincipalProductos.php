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
include_once "LeerProductosXML.php";

// Reanudamos la sesión ya iniciada con comprobacion
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST["Aniadir"])) {
    echo '<br /><a href="IndexProductos.php">página 2</a>';
    header("Location: IndexProductos.php");
    exit;
    
}


    
?>

</head>
<div class="container">
<h1>Productos</h1>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

    <input type="submit" name="Borrar" id="Borrar" value="Borrar Producto">
    <input type="submit" name="Modificar" id="Modificar" value="Modificar Producto">
    <input type="submit" name="Mostrar" id="Mostrar" value="Mostrar Productos">
    <input type="submit" name="Aniadir" id="Aniadir" value="Añadir Producto">
    <input type="submit" name="LeerXML" id="LeerXML" value="Obtener Productos XML">
    <input type="submit" name="XML" id="XML" value="Generar o Actualizar XML">
   

    <?php

if (isset($_POST["Mostrar"])) {
    if (empty($_SESSION['Tienda']->getProductos())){
        echo "No hay productos";
    }
    else {
        echo '<br /><a href="MostrarProductos.php">página 2</a>';
        header("Location: MostrarProductos.php");
        exit;
    }

    
}

if (isset($_POST["Borrar"])) {
    if (empty($_SESSION['Tienda']->getProductos())){
        echo "No hay productos";
    }
    else {
        echo '<br /><a href="BorrarProductos.php">página 2</a>';
        header("Location: BorrarProductos.php");
        exit;   
    }
   
}

if (isset($_POST["Modificar"])) {
    if (empty($_SESSION['Tienda']->getProductos())){
        echo "No hay productos";
    }
    else {
        echo '<br /><a href="ModificarProducto.php">página 2</a>';
        header("Location: ModificarProducto.php");
        exit; 
    }
      
}





if (isset($_POST["XML"])) {
    include_once("EscribirProductosXML.php");
}

if (isset($_POST["LeerXML"])) {
    try {
        leerProductosXML();
       
    } catch (Exception $error) {
        echo "Error al cargar productos desde el XML: " . $error->getMessage();
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
