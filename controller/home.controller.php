<?php

require_once 'model/producto.php';
require_once 'model/categoria.php';


class HomeController {
    private  $model;
    private  $modelCategorias;

    public function __construct()
    {
        $this->model = new Producto();
        $this->modelCategorias = new Categoria();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/home/home.view.php';
        require_once 'view/home/slide.view.php';
        require_once 'view/productos/productos-top.view.php';
        require_once 'view/footer.php';
    }

}

?>