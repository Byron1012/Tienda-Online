<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><img src="assets/img/Joystick.png?h=4475aac77926a91a98fef73162e72acf" style="height: 100px;width: 100px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Usuario') && ($_GET['a'] == 'Index') || ($_GET['c'] == '')) ? 'active' : ' ' ?>" href="index.php">inicio</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Juego') && ($_GET['a'] == 'CargarCatalogo')) ? 'active' : ' ' ?>" href="index.php?c=Juego&a=CargarCatalogo">catalogo</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Carrito') && ($_GET['a'] == 'CargarCarrito')) ? 'active' : ' ' ?>" href="index.php?c=Carrito&a=CargarCarrito">Carrito</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Factura') && ($_GET['a'] == 'Cargar_Factura')) ? 'active' : ' ' ?>" href="index.php?c=Factura&a=Cargar_Factura">Facturar</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Usuario') && ($_GET['a'] == 'FAQ')) ? 'active' : ' ' ?>" href="index.php?c=Usuario&a=FAQ">FAQ</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php echo (($_GET['c'] == 'Contactos') && ($_GET['a'] == 'Contactos')) ? 'active' : ' ' ?>" href="index.php?c=Contactos&a=Contactos">Contactos</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link <?php echo (($_GET['c'] == 'Juego') && ($_GET['a'] == 'Inventario')) ? 'active' : ' ' ?>" data-toggle="dropdown" aria-expanded="false" href="#">ADMIN</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item <?php echo (($_GET['c'] == 'Juego') && ($_GET['a'] == 'Inventario')) ? 'active' : ' ' ?>" role="presentation" href="index.php?c=Juego&a=Inventario">Inventario</a></div>
                </li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><?php echo $_SESSION['nombre']; ?></a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#myModal">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

