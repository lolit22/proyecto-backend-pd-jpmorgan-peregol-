<?php

//Verifico si se recibieron todos los datos
if ( 
    isset($_POST["categoria_menu"]) && !empty($_POST["categoria_menu"]) && 
    isset($_POST["producto_menu"]) && !empty($_POST["producto_menu"]) && 
    isset($_POST["tamaño_menu"]) && !empty($_POST["tamaño_menu"]) && 
    isset($_POST["precio_menu"]) && !empty($_POST["precio_menu"]) && 
    isset($_POST["descripcion_menu"]) && !empty($_POST["descripcion_menu"]) ) {
    
    //OBTENGO DATOS DEL FORMULARIO
    $categoria_menu = $_POST["categoria_menu"];
    $producto_menu = $_POST["producto_menu"];
    $tamaño_menu = $_POST["tamaño_menu"];
    $precio_menu = $_POST["precio_menu"];
    $descripcion_menu = $_POST["descripcion_menu"];

    //MANEJO IMAGEN 
    $imagen_menu = $_FILES["imagen_menu"];
    //OBTENGO EXTENSION 
    $type_img = pathinfo($imagen_menu["name"], PATHINFO_EXTENSION);
    //OBTENGO CONTENIDO
    $data_img = file_get_contents($imagen_menu["tmp_name"]);
    //GENERo CODIGO BASE64 PARA ALMACENARLO
    $imagen_base64 = "data:image/".$type_img.";base64,".base64_encode($data_img);

    //CONEXION A BASE DE DATOS
    $conexion_bd = mysqli_connect("127.0.0.1:3306", "root", "", "mcdelivery_pedidos");
    
    //Verifico conexión 
    if (!$conexion_bd) { 
        echo "Error de conexión."; 
    } else { 
        //AGREGO PRODUCTO  NUEVO
        $query_bd = "INSERT INTO menu_mcdelivery (categoria_menu, producto_menu, tamaño_menu, precio_menu, imagen_menu, descripcion_menu) VALUES ('$categoria_menu', '$producto_menu', '$tamaño_menu', $precio_menu, '$imagen_base64', '$descripcion_menu')"; 
        $resultado_bd = mysqli_query($conexion_bd, $query_bd); 
    
        //Verifico si la consulta se ejecutó correctamente 
        if ($resultado_bd) { 
            echo "Producto agregado exitosamente.";
            //Redirijo a la página listar eproductos
            header('Location: listar_productos.php'); 
            exit(); 
        } else { 
            echo "Error al agregar el producto."; 
        }

        //DESCONEXION A BASE DE DATOS
        mysqli_close($conexion_bd);
    }
    
} else { 
    echo "Faltan datos requeridos o están vacíos."; }
?>