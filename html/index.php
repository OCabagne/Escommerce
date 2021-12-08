<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Escommerce/class/db.php';
    $nombre = '';
    if( isset( $_SESSION['user_id'] ) ){
        $db = new database();
        $nombre = $db->buscarUsuario( "nombreUsuario", $_SESSION['user_id'] )['nombreUsuario'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-scommerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../sass/main.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/ashion.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/notifications.css">
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!--Inicio de barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-light bg-sombra">
        <div class="container-md logo">
            <a href="index.html"><img src="../assets/images/LogoProyecto.png" alt="Logo E-scommerce"></a>
        </div>

        <div class="nav-texto">
            <div class="container-md nav-busqueda">
                <form class="flex-fill d-flex busqueda">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search">
                    <button class="btn btn-outline-principal" type="submit">Buscar</button>
                    <button class="btn nav-toggle" type="button" aria-label="Abrir menu">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/menu--v1.png" />
                    </button>
                </form>
            </div>
            <div class="container-md nav-colapsada-vertical">
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-borde nav-ul">
                        <li class="nav-item">
                            <a class="nav-link" href="./tienda.html">Categor&iacute;as</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ofertas.html">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ser-vendedor.html">Vender</a>
                        </li>
                    </ul>

                    <?php
                        if( isset( $_SESSION['user_id'] ) ){
                    ?>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-borde nav-ul">
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="/Escommerce/pages/registro.php">Crea tu cuenta</a>-->
                                    <?php
                                        echo "<p>" . $nombre . "</p>"
                                        //print_r( $nombre )
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Salir</a>
                                </li>
                            </ul>
                    <?php
                        }else{
                    ?>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-borde nav-ul">
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="/Escommerce/pages/registro.php">Crea tu cuenta</a>-->
                                    <a class="nav-link" href="registrarCuenta.php">Crea tu cuenta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Ingresa</a>
                                </li>
                            </ul>
                    <?php  
                        }
                    ?>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mis compras</a>
                        </li>
                        <li class="nav-item carrito">
                            <a class="nav-link" href="./carrito.html"><img
                                    src="https://img.icons8.com/fluency-systems-regular/22/000000/shopping-cart-loaded.png" /><span
                                    class="badge bg-secundario" id="cantidad-carrito"></span></a>
                            <div id="carrito">
                                <table id="lista-carrito"
                                    class="u-full-width table table-sm .table-responsive-sm .table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar-carrito" class="button u-full-width vacio">Vaciar Carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!--Fin de barra de navegacion-->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                        data-setbg="../assets/images/categorias/categoria-mujeres.jpg">
                        <div class="categories__text">
                            <h1>Ropa para mujeres</h1>
                            <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                                edolore magna aliquapendisse ultrices gravida.</p>
                            <a href="#">Comprar ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="../assets/images/categorias/categoria-hombres.jpg">
                                <div class="categories__text">
                                    <h4>Ropa para hombres</h4>
                                    <a href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="../assets/images/categorias/categoria-niños.jpg">
                                <div class="categories__text">
                                    <h4>Ropa para ni&ntilde;os</h4>
                                    <a href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="../assets/images/categorias/categoria-cosmeticos.jpg">
                                <div class="categories__text">
                                    <h4>Cosmeticos</h4>
                                    <a href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="../assets/images/categorias/categoria-mascotas.jpg">
                                <div class="categories__text">
                                    <h4>Mascotas</h4>
                                    <a href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad" id="lista-productos">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Nuevos productos</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                    <!---->
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-1.jpg">
                            <img src="../assets/images/productos/product-1.jpg" class="product__item__pic set-bg">
                            <div class="label new">Nuevo</div>
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                    <!---->
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix men">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-2.jpg">
                            <img src="../assets/images/productos/product-2.jpg" class="product__item__pic set-bg">
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Flowy striped skirt</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix accessories">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-3.jpg">
                            <img src="../assets/images/productos/product-3.jpg" class="product__item__pic set-bg">
                            <div class="label stockout">agotado</div>
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Cotton T-Shirt</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-4.jpg">
                            <img src="../assets/images/productos/product-4.jpg" class="product__item__pic set-bg">
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Slim striped pocket shirt</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix kid">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-5.jpg">
                            <img src="../assets/images/productos/product-5.jpg" class="product__item__pic set-bg">
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Fit micro corduroy shirt</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-6.jpg">
                            <img src="../assets/images/productos/product-6.jpg" class="product__item__pic set-bg">
                            <div class="label sale">Oferta</div>
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Tropical Kimono</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-7.jpg">
                            <img src="../assets/images/productos/product-7.jpg" class="product__item__pic set-bg">
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Contrasting sunglasses</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="../assets/images/productos/product-8.jpg">
                            <img src="../assets/images/productos/product-8.jpg" class="product__item__pic set-bg">
                            <div class="label">Oferta</div>
                            <ul class="product__hover">
                                <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                            src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Water resistant backpack</a></h6>
                            <div class="rating">
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categorias Banner Inicio -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-makeup.jpg">
                        <div class="instagram__text">
                            <a href="#">Maquillaje</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-skincare.jpg">
                        <div class="instagram__text">
                            <a href="#">Skin Care</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-ninos.jpg">
                        <div class="instagram__text">
                            <a href="#">Moda para ni&ntilde;os</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-moda.jpg">
                        <div class="instagram__text">
                            <a href="#">Moda para todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-mascotas.jpg">
                        <div class="instagram__text">
                            <a href="#">Para tu mascota</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="../assets/images/categorias/banner-categorias/banner-hogar.jpg">
                        <div class="instagram__text">
                            <a href="#">Decoraci&oacute;n para el hogar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categorias Banner Fin -->

    <!-- Inicio de Categorias Display -->
    <section class="trend spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Del Hogar</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/ht-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Chain bucket bag</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/ht-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Pendant earrings</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/ht-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Cotton T-Shirt</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Electronica</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/bs-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Cotton T-Shirt</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/bs-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Zip-pockets pebbled tote <br />briefcase</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/bs-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Round leather bag</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Moda</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/f-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Bow wrap skirt</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/f-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Metallic earrings</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="../assets/images/categorias/display-categorias/f-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Flap cross-body bag</h6>
                                <div class="rating">
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                    <img src="https://img.icons8.com/office/16/000000/filled-star--v1.png" />
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Categorias Display -->

    <!-- Discount Section Begin -->
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0 descuento-img">
                    <div class="discount__pic">
                        <img src="../assets/images/discount.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 p-0 descuento">
                    <div class="discount__text">
                        <div class="discount__text__title">
                            <span>Descuentos</span>
                            <h2>Invierno 2021</h2>
                        </div>
                        <div class="discount__countdown" id="countdown-time">
                            <div class="countdown__item">
                                <span>22</span>
                                <p>D&iacute;as</p>
                            </div>
                            <div class="countdown__item">
                                <span>18</span>
                                <p>Horas</p>
                            </div>
                            <div class="countdown__item">
                                <span>46</span>
                                <p>Min</p>
                            </div>
                            <div class="countdown__item">
                                <span>05</span>
                                <p>Seg</p>
                            </div>
                        </div>
                        <a href="#">Comprar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="https://img.icons8.com/color/48/000000/in-transit--v1.png" />
                        <h6>Envio Gratis</h6>
                        <p>Para todos los pedidos arriba de $499</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="https://img.icons8.com/color/48/000000/purchase-for-euro.png" />
                        <h6>Reembolso garantizado!</h6>
                        <p>Si el producto tiene problemas, se lo cambiamos!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="https://img.icons8.com/color/48/000000/last-24-hours--v1.png" />
                        <h6>Soporte en linea 24/7</h6>
                        <p>Soporte personalizado</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="https://img.icons8.com/color/48/000000/card-security.png" />
                        <h6>Pago seguro</h6>
                        <p>100% pago seguro</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 footPago">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.html"><img src="../assets/images/LogoProyecto.png" alt=""></a>
                        </div>
                        <p>Tenemos los mejores metodos de pago!</p>
                        <div class="footer__payment">
                            <a href="#"><img src="../assets/images/payment/payment-1.png" alt=""></a>
                            <a href="#"><img src="../assets/images/payment/payment-2.png" alt=""></a>
                            <a href="#"><img src="../assets/images/payment/payment-3.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 footCuenta">
                    <div class="footer__widget">
                        <h6>Mi cuenta</h6>
                        <ul>
                            <li><a href="#">Mi cuenta</a></li>
                            <li><a href="#">Mis compras</a></li>
                            <li><a href="#">Carrito</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.nicescroll.min.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script src="../js/main.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/notifications.js"></script>
</body>

</html>