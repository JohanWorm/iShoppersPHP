<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?c=Producto">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $detail->producto_nombre; ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="./img/products/<?php echo $detail->producto_codigo_barras; ?>.jpg" />
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price">
                        <?php echo $detail->producto_nombre; ?>
                    </p>
                    <hr>
                    <p class="price">
                        PRECIO: $ <?php echo $detail->producto_precio; ?>
                    </p>
                    <form method="get" action="cart.html">
                        <div class="form-group">
                            <label for="colors">Cantidad</label>
                            <select class="custom-select" id="colors">
                                <option selected>Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="card border-light mb-3">
                            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Descripción</div>
                            <div class="card-body">
                                <p class="card-text">
                                    $ <?php echo $detail->producto_descripcion; ?>
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> AGREGAR
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
