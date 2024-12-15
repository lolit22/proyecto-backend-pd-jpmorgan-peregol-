<?php 
// Verificar si se recibió el ID del producto
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id_menu = $_GET["id"];

    //CONEXION A BASE DE DATOS
    $conexion_bd = mysqli_connect("127.0.0.1:3306", "root", "", "mcdelivery_pedidos");
    //Verifico conexión
    if (!$conexion_bd) {
        echo "Error de conexión.";
    } else {
        //Consulta para eliminar el registro 
        $query_bd = "DELETE FROM menu_mcdelivery WHERE id_menu = " . $id_menu;
        $resultado_bd = mysqli_query($conexion_bd, $query_bd);
        //Verifico si la consulta se ejecutó correctamente
        if ($resultado_bd) {
            echo "Producto eliminado exitosamente.";
            //Redirijo a la página listar eproductos
            header('Location: listar_productos.php');
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
        //DESCONEXION A BASE DE DATOS
        mysqli_close($conexion_bd);
    }
} else {
    echo "ID de producto no especificado o vacío.";
}
?>