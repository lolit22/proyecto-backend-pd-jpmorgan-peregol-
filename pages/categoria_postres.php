<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>McDonald's - Productos</title>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/estilos_menu.css">
  <!--Tipografía de Google Fonts (varinantes 300, 400 y 700)-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;700&display=swap" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .link_menu :hover {
      font-size: 1.1rem;
      color: #ffb900;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  
</head>

<body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom">
      <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="../images/icono_menu/logo_mcdelivery.png" width="70">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="link_menu"><a href="../index.html" class="nav-link px-2 link-secondary">Home</a></li>
        <li class="link_menu"><a href="./menu.php" class="nav-link px-2 link-dark">Menu</a></li>
        <li class="link_menu"><a href="./productos.php" class="nav-link px-2 link-dark">Productos</a></li>
        <li class="link_menu"><a href="#" class="nav-link px-2 link-dark">Promociones</a></li>
        <li class="link_menu"><a href="#" class="nav-link px-2 link-dark">Mis Pedidos</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="../pages/login/login.html">
          <button type="button" class="btn btn-outline-danger me-2">Administrador</button>
        </a>
        <a href="#">
          <button type="button" class="btn btn-warning">Registrarse</button>
        </a>
      </div>
    </header>
  </div>

  <section style="padding: 2rem 0;">
    <div class="container" style="font-family: 'Hind Vadodara', sans-serif;">
        <h1 style="font-size: 2.5rem; font-weight: bolder;">Menú > Postres</h1>
        
        <?php
        // CONEXIÓN A BASE DE DATOS
        $conexion_bd = mysqli_connect("127.0.0.1:3306", "root", "", "mcdelivery_pedidos");
        
        // MUESTRO TODOS LOS PRODUCTOS DE LA CATEGORIA
        $query_bd = "SELECT * FROM menu_mcdelivery WHERE categoria_menu = 'POSTRES'"; 
        $resultado_bd = mysqli_query($conexion_bd, $query_bd);
        
        echo '<div class="row">';
        
        while ($unaFila = mysqli_fetch_assoc($resultado_bd)) {
            echo '
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card border-warning mb-3" style="max-width: 19rem; height: 32rem; margin-top: 1rem;">
                        <div class="text-center">
                            <div class="card-header">'.$unaFila["categoria_menu"].'</div>
                            <img class="card-img-top" src="'.$unaFila["imagen_menu"].'" alt="imagen del producto">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 21px; font-weight:bold">' . $unaFila["producto_menu"] . '</h5>
                                <br>
                                <h6 style="font-size: 22px; font-weight:bold; color: grey">$ ' . number_format($unaFila["precio_menu"], 2, ',', '.') . '</h6>
                                <br>
                                <!-- boton que me lleva a la página del producto -->
                                <a href="ver_producto.php?id_menu=' . $unaFila["id_menu"] . '" class="btn btn-warning">Ver producto</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        
        echo '</div>';
        
        // DESCONEXIÓN A BASE DE DATOS
        mysqli_close($conexion_bd);
        ?>
        
    </div>
  </section>
  
  <footer class="pie-pagina border-top">
    <!--Links de Interés-->
    <div class="pie-pagina__contenedor">

      <div class="links-interes">
        <div class="enlaces_contenedor">
          <a class="pie-pagina_enlace" href="https://www.mcdonalds.com.ar/quienes-somos/arcos-dorados" target="_blank">Arcos Dorados</a>
          <a class="pie-pagina_enlace" href="https://recetadelfuturo.com/" target="_blank">Receta del Futuro</a>
          <a class="pie-pagina_enlace" href="./contacto.html" target="_blank">Contacto</a>
        </div>

        <div class="descargas__contenedor">
          <img class="imagen-enlace" src="../images/home/descarga_app.png" alt="">
          <a class="pie-pagina_enlace" href="https://www.mcdonalds.com.ar/descarga_app" target="_blank">Descarga la App</a>
        </div>
      </div>

      <hr>

      <!--Créditos-->
      <div class="pie-pagina__creditos">
        <img class="creditos__logo" src="../images/home/mcdonalds-logo-footer-bg-white.png" alt="Logo McDonald's amarillo">
        <p class="creditos__parrafo">©McDonald's 2024</p>
      </div>
    </div>
  </footer>

  <!-- Paquete Bootstrap JS con  Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>