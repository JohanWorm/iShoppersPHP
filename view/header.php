
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="?">iShoppers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item <?php if($_REQUEST['c'] == 'Producto') { echo 'active'; } ?>">
                    <a class="nav-link" href="?c=Producto">Productos</a>
                </li>
                <li class="nav-item <?php if($_REQUEST['c'] == 'Usuario') { echo 'active'; } ?>">
                    <a class="nav-link" href="?c=Usuario">Usuarios</a>
                </li>
                <li class="nav-item <?php if($_REQUEST['c'] == 'Categoria') { echo 'active'; } ?>">
                    <a class="nav-link" href="?c=Categoria">Categorías</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="category.html">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.html">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.html">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contacto</a>
                </li> -->
            </ul>

            <div class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3">
                    <i class="fa fa-shopping-cart"></i> Carrito
                    <span class="badge badge-light">0</span>
                </a>
            </div>
            
        </div>
    </div>
</nav>