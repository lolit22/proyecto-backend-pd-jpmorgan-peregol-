<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>McDonald's - AutoMac</title>
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

    .card-title {
        font-weight: 600;
    }

    .s3-tarjetas__lista-enlace :hover {
        color: #ffb900;
    }

    .container_menu {
        width: 85%;
        margin: 0 auto;
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
                <li class="link_menu"><a href="#seccion_menu" class="nav-link px-2 link-dark">Menu</a></li>
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

  <main>
        <section class="container-delivery">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/carrusel/carrousel_1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/carrusel/carrousel_2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/carrusel/carrousel_3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </section>
  </main>

  <section id="seccion_menu" style="padding: 2rem 0; margin-top: 1rem;">
        <div class="container_menu" style="font-family: 'Hind Vadodara', sans-serif; margin:0 auto;">
            <div class="row row-cols-1 row-cols-md-3 g-4 width: 85%;">
                
                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_mcCombos.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/mcCombo.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">McCombos</h5>
                                        <p class="card-text">Menú F1 Cuarto de Libra - Big Mac<br>McCrispy Chicken - McNuggets</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_hamburguesas.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/hamburguesas.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Hamburguesas</h5>
                                        <p class="card-text">Cuarto de Libra - Grand Tasty <br>Bacon Cheddar McMelt - McPollo</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_mcNuggets.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/nuggets.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">McNuggets</h5>
                                        <p class="card-text"> x4 unidades - x6 unidades,<br>x10 unidades - x20unidades</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_ensaladas.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/ensaladas.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Ensaladas</h5>
                                        <p class="card-text"> Caesar - Deli Guacamole<br>Deli Guacamole Veggie </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_cajitaFeliz.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/cajita_feliz.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Cajita Feliz</h5>
                                        <p class="card-text"> Con Hamburguesa - McFiesta Jr<br>McNuggets</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_automac.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/automac.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">AutoMac</h5>
                                        <p class="card-text"> Cajita Feliz - Cuarto de Libra <br> Big Mac - McPollo - Papas Fritas</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_paraAcompaniar.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/para_acompañar.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Para Acompañar</h5>
                                        <p class="card-text">Papas Fritas - Papas Cheddar <br> Papas Tasty - Pileta de Cheddar</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_postres.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/postres.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Postres</h5>
                                        <p class="card-text">Cono Clásico - Cono Relleno <br> Super Cono - Sundae - McFlurry</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 420px;">
                        <a class="s3-tarjetas__lista-enlace" href="./categoria_bebidas.php">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../images/icono_menu/bebidas.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Bebidas</h5>
                                        <p class="card-text">Coca Cola - Coca Cola Zero<br>Sprite y Fanta Zero - Agua - Jugo</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
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