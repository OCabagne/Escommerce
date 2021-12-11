<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Escommerce/class/db.php';
    if( isset( $_SESSION['user_id'] ) ){
        $db = new database();
        $usuario = $db->buscarUsuario( "*", $_SESSION['user_id'] );
    }else{
        header( 'Location: ./login.php' );
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categor&iacute;as Escommerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../sass/main.css">
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
            <a href="index.php"><img src="../assets/images/LogoProyecto.png" alt="Logo E-scommerce"></a>
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
                            <a class="nav-link" href="#">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vender</a>
                        </li>
                    </ul>

                    <?php
                        if( isset( $_SESSION['user_id'] ) ){
                    ?>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-borde nav-ul">
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="/Escommerce/pages/registro.php">Crea tu cuenta</a>-->
                                    <?php
                                        echo "<p>" . $usuario['nombreUsuario'] . "</p>";
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.html" id="indexBread"><img
                                        src="https://img.icons8.com/material-sharp/24/000000/home.png" />Inicio</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad" id="lista-productos">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Moda</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Mujeres</a></li>
                                                    <li><a href="#">Hombres</a></li>
                                                    <li><a href="#">Ni&ntilde;os</a></li>
                                                    <li><a href="#">Ni&ntilde;as</a></li>
                                                    <li><a href="#">Beb&eacute;s</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Electr&oacute;nica</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Celulares</a></li>
                                                    <li><a href="#">Aud&iacute;fonos</a></li>
                                                    <li><a href="#">Monitores</a></li>
                                                    <li><a href="#">Teclados</a></li>
                                                    <li><a href="#">Ratones</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Hogar</a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Jard&iacute;n</a></li>
                                                    <li><a href="#">Muebles</a></li>
                                                    <li><a href="#">Electrodom&eacute;sticos</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Salud y belleza</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Maquillaje</a></li>
                                                    <li><a href="#">Skin Care</a></li>
                                                    <li><a href="#">Cremas corporales</a></li>
                                                    <li><a href="#">Shampoo</a></li>
                                                    <li><a href="#">Jabones</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Filtrar por precio</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Precio:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filtrar</a>
                        </div>
                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Filtrar por marca</h4>
                            </div>
                            <div class="size__list">
                                <label for="xxs">
                                    Por
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    favor
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    pon
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    las
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    marcas
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    gracias
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    ja
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    ja
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Filtrar por modelo</h4>
                            </div>
                            <div class="size__list color__list">
                                <label for="black">
                                    y
                                    <input type="checkbox" id="black">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="whites">
                                    tambien
                                    <input type="checkbox" id="whites">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="reds">
                                    los
                                    <input type="checkbox" id="reds">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greys">
                                    modelos
                                    <input type="checkbox" id="greys">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="blues">
                                    por
                                    <input type="checkbox" id="blues">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="beige">
                                    fis
                                    <input type="checkbox" id="beige">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greens">
                                    Greens
                                    <input type="checkbox" id="greens">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="yellows">
                                    Yellows
                                    <input type="checkbox" id="yellows">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
                                    <ul class="product__hover">
                                        <li><a href="#" class="agregar-carrito"><img class="agregar-carrito"
                                                    src="https://img.icons8.com/windows/32/000000/add-shopping-cart.png" /></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="detalles-producto.html">Slim striped pocket shirt</a></h6>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../assets/images/productos/product-4.jpg">
                                    <img src="../assets/images/productos/product-4.jpg"
                                        class="product__item__pic set-bg">
                                    <div class="label">Sale</div>
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
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 footPago">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.php"><img src="../assets/images/LogoProyecto.png" alt=""></a>
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
                            <li><a href="mi-cuenta.php">Mi cuenta</a></li>
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