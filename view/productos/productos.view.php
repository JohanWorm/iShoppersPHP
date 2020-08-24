
<br>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categorias</div>
                <ul class="list-group category_block">
                    <?php foreach ($this->modelCategorias->GetAllCategorias() as $row) : ?>
                        <li class="list-group-item">
                            <a>
                                <?php echo $row->categoria_nombre; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php foreach ($this->model->GetAllProductos() as $row) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        
                        <img class="card-img-top" src="./img/products/<?php echo $row->producto_codigo_barras; ?>.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="?c=Producto&a=Detalle&id=<?php echo $row->producto_id; ?>" title="View Product">
                                <?php echo $row->producto_nombre; ?>
                            </a></h4>
                            <p class="card-text">
                                <?php echo $row->producto_descripcion; ?>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn-block">
                                        $ <?php echo $row->producto_precio; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">AÑADIR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>

    </div>
</div>
