<?php foreach ($this->modelCategorias->GetAllCategorias() as $row) : ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-success text-white text-uppercase">
                    <i class="fa fa-star"></i>
                    <?php echo $row->categoria_nombre; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($this->model->GetAllProductsByCategory($row->categoria_id) as $rowProducts) : ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="./img/products/<?php echo $rowProducts->producto_codigo_barras; ?>.jpg">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="?c=Producto&a=Detalle&id=<?php echo $rowProducts->producto_id; ?>" title="Ver producto">
                                        <?php echo $rowProducts->producto_nombre; ?>
                                    </a></h4>
                                    <p class="card-text">
                                        <?php echo $rowProducts->producto_descripcion; ?>
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="">
                                                $ <?php echo $rowProducts->producto_precio; ?>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <a href="cart.html" class="btn btn-success btn-block">AÑADIR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>
