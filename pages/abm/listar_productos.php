<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>McDonald's - Productos ABM</title>
    <link rel="shortcut icon" href="/tienda_mcDonalds_peregol/images/img_abm/abm_icon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        .center-center{
            text-align: center;
        }
    </style>

    <!--Tipografía de Google Fonts (varinantes 300, 400 y 700)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!--Encabezado-->
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom">
            <!-- Logo-->
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/tienda_mcDonalds_peregol/images/img_abm/mcdonalds-logo-bg-red.png" width="70">
            </a>
            <!--Navegacion-->
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="link_abm"><a href="./consultas.html" class="nav-link px-2 link-secondary">AMB McDonald's</a></li>
                <li class="link_abm"><a href="#" class="nav-link px-4 link-dark">Listar Productos</a></li>
                <li class="link_abm"><a href="./agregar_productos.html" class="nav-link px-2 link-dark">Agregar Producto</a></li>
            </ul>
            <!--Boton de Salida Login-->
            <div class="col-md-3 text-end">
                <a href="../menu.php">
                    <button type="button" class="btn btn-outline-danger me-2">Salir de ABM</button>
                </a>
            </div>
        </header>
    </div>

    <!-- Seccion Principal-->
    <main style="width: 85%; margin:0 auto;">
        <!-- Seccion Listado de Productos-->
        <section style="margin: 3rem 0">
            <!-- Título de Pedidos-->
            <h2 style="font-family: 'Hind Vadodara', sans-serif; background-color: #dc3545; padding: 0.5rem 0; border-radius: 0.3rem; color: white; text-align: center; font-size: 1.5rem;">PEDIDOS McDELIVERY - PRODUCTOS DEL MENU</h2>
            <p style="padding: 0.7rem 0">En la siguiente lista se enumeran los distintos productos que se ofrecen actualmente en el menú de los locales de McDonald's para los pedidos hechos a través de McDelivery.</p>
            <!-- Tabla de Productos -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr class="table table-bordered border border-danger table-danger align-middle">
                        <th >id</th>
                        <th>Categoría</th>
                        <th>Producto</th>
                        <th>Tamaño</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    // CONEXION A BASE DE DATOS
                    $conexion_bd = mysqli_connect("127.0.0.1:3306", "root", "", "mcdelivery_pedidos");

                    $query_bd = "SELECT * FROM menu_mcdelivery";
                    $resultado_bd = mysqli_query($conexion_bd, $query_bd);

                    while($unaFila = mysqli_fetch_assoc($resultado_bd)){
                        $precio_formateado = number_format($unaFila["precio_menu"], 2, ',', '.');
                        echo '<tr class="align-middle">
                        <td class="border border-danger table-danger">'.$unaFila["id_menu"].'</td>
                        <td class="border border-danger">'.$unaFila["categoria_menu"].'</td>
                        <td class="border border-danger">'.$unaFila["producto_menu"].'</td>
                        <td class="border border-danger">'.$unaFila["tamaño_menu"].'</td>
                        <td class="border border-danger">$' . $precio_formateado . '</td>
                        <td class="border border-danger"><img src = "'.$unaFila["imagen_menu"].'" width="250px"></td>
                        <td class="border border-danger">'.$unaFila["descripcion_menu"].'</td>
                        
                        <td class="border border-danger center-center"><a style="color: #dc3545; text-decoration: none; font-weight:600" href="/tienda_mcDonalds_peregol/pages/abm/modificar_productos.php?id='.$unaFila["id_menu"] . '"><img src="/tienda_mcDonalds_peregol/images/img_abm/icon_modificar.png" width="33px" alt="">Actualizar</a></td>
                        
                        <td class="border border-danger center-center"><a style="color: #dc3545; text-decoration: none; font-weight:600" href="/tienda_mcDonalds_peregol/pages/abm/eliminar_productos.php?id='.$unaFila["id_menu"].'"><img src="/tienda_mcDonalds_peregol/images/img_abm/icon_eliminar.png" width="25px" alt="">Borrar</a></td>
                        </tr>';
                    }
                    // DESCONEXION A BASE DE DATOS
                    mysqli_close($conexion_bd);
                    ?>
                </table>
        </section> 
    </main>
    
    <!--Pie de Pagina -->
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