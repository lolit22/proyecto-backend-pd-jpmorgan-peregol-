<?php
//CONEXION A BASE DATOS
$conexion_bd = mysqli_connect("127.0.0.1:3306", "root", "", "mcdelivery_pedidos");

// Verificar conexión
if (!$conexion_bd) {
    echo "Error de conexión.";
    exit();
}

//Obtengo id del producto desde la URL
$id_menu = isset($_GET['id']) ? $_GET['id'] : null;

//Verifico que se haya proporcionado un id
if ($id_menu) {
    //Obtengo los datos del producto
    $query_bd = "SELECT * FROM menu_mcdelivery WHERE id_menu = $id_menu";
    $resultado_bd = mysqli_query($conexion_bd, $query_bd);
    $producto = mysqli_fetch_assoc($resultado_bd);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit();
    }
} else {
    echo "ID de producto no especificado.";
    exit();
}

//Proceso datos del formulario si se han enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria_menu = !empty($_POST["categoria"]) ? $_POST["categoria"] : $producto["categoria_menu"];
    $producto_menu = !empty($_POST["producto"]) ? $_POST["producto"] : $producto["producto_menu"];
    $tamaño_menu = !empty($_POST["tamaño"]) ? $_POST["tamaño"] : $producto["tamaño_menu"];
    $precio_menu = !empty($_POST["precio"]) ? floatval($_POST["precio"]) : $producto["precio_menu"];
    $descripcion_menu = !empty($_POST["descripcion"]) ? $_POST["descripcion"] : $producto["descripcion_menu"];

    //Manejar imagen subida
    $imagen_menu = $_FILES["imagen"];
    if ($imagen_menu["tmp_name"]) {
        $type_img = pathinfo($imagen_menu["name"], PATHINFO_EXTENSION);
        $data_img = file_get_contents($imagen_menu["tmp_name"]);
        $imagen_base64 = "data:image/" . $type_img . ";base64," . base64_encode($data_img);
    } else {
        $imagen_base64 = $_POST["imagen_actual"]; //Mantengo imagen actual si no se sube nueva imagen
    }

    //Actualizo datos en la base de datos
    $query_bd = "UPDATE menu_mcdelivery SET 
        categoria_menu = '$categoria_menu', 
        producto_menu = '$producto_menu', 
        tamaño_menu = '$tamaño_menu', 
        precio_menu = $precio_menu, 
        imagen_menu = '$imagen_base64', 
        descripcion_menu = '$descripcion_menu' 
        WHERE id_menu = $id_menu";
    $resultado_bd = mysqli_query($conexion_bd, $query_bd);

    //Redirijo tras actualizar
    if ($resultado_bd) {
        header('Location: listar_productos.php');
        exit();
    } else {
        echo "Error al modificar el producto.";
    }
}

//DESCONEXION  A BASE DATOS (temp)
mysqli_close($conexion_bd);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="/tienda_mcDonalds_peregol/css/estilos.css">
    <link rel="stylesheet" href="/tienda_mcDonalds_peregol/css/estilos_menu.css">
    
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .link_abm :hover{
            font-size: 1.1rem;
            color:#dc3545;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!--Tipografía de Google Fonts (varinantes 300, 400 y 700)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;700&display=swap" rel="stylesheet">

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/tienda_mcDonalds_peregol/images/img_abm/mcdonalds-logo-bg-red.png" width="70">
            </a>
            <!-- Navegador AMB-->
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="link_abm"><a href="./consultas.html" class="nav-link px-2 link-secondary">AMB McDonald's</a></li>
                <li class="link_abm"><a href="./listar_productos.php" class="nav-link px-4 link-dark">Listar Productos</a></li>
                <li class="link_abm"><a href="#" class="nav-link px-2 link-dark">Agregar Producto</a></li>
            </ul>
            <div class="col-md-3 text-end">
                <a href="../menu.php">
                    <button type="button" class="btn btn-outline-danger me-2">Salir de ABM</button>
                </a>
            </div>
        </header>
    </div>

    <main class="principal">
        <!--Sección: Formulario -->
        <section style="margin: 3rem 0">
    <div class="container mt-5">
        <h2 style="font-family: 'Hind Vadodara', sans-serif; background-color: #dc3545; padding: 0.4rem 0; border-radius: 0.3rem; color: white; text-align: center; font-size: 1.5rem;">MODIFICAR PRODUCTO</h2>
        <p>Ingrese los datos que quiere modificar de los productos del menú.</p>
        <form method="post" action="modificar_productos.php?id=<?php echo $id_menu; ?>" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Categoría</span>
                <input type="text" name="categoria" placeholder="Modifique aquí la categoría del producto" value="<?php echo $producto['categoria_menu']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Producto</span>
                <input type="text" name="producto" placeholder="Modifique aquí el producto" value="<?php echo $producto['producto_menu']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Tamaño</span>
                <input type="text" name="tamaño" placeholder="Modifique aquí el tamaño del producto" value="<?php echo $producto['tamaño_menu']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                <input type="text" name="precio" placeholder="Modifique aquí el precio del producto" value="<?php echo $producto['precio_menu']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Imagen</label>
                <input type="file" name="imagen" placeholder="Imagen" class="form-control" id="inputGroupFile01" onchange="previewImage(event)">
            </div>
            <div class="mb-3 text-center">
                <img id="output" src="<?php echo $producto['imagen_menu']; ?>" alt="Imagen actual" style="max-width: 300px;"> <!-- Achicar imagen -->
                <input type="hidden" name="imagen_actual" value="<?php echo $producto['imagen_menu']; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>
                <input type="text" name="descripcion" placeholder="Modifique aquí la descripción del producto" value="<?php echo $producto['descripcion_menu']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <input type="submit" class="btn btn-danger" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" class="btn btn-danger" name="cancelar" formaction="#">Cancelar</button>
        </form>
        </section>
    </main>

    <!--Pie de Página ABM-->
    <footer class="pie-pagina border-top">
        <div>
            <!--Créditos-->
            <div class="pie-pagina__creditos">
                <img style="width: 3.5rem; margin-top: 0.6rem;" src="/tienda_mcDonalds_peregol/images/home/mcdonalds-logo-footer-bg-white.png" alt="Logo McDonald's amarillo">
                <p style="font-family: 'Hind Vadodara', sans-serif; font-size: 0.75rem; margin-bottom: 0.3rem;">©McDonald's 2024</p>
            </div>
        </div>
    </footer>

    <!-- Paquete Bootstrap JS con  Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>