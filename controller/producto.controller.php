<?php

require_once 'model/producto.php';
require_once 'model/categoria.php';

class ProductoController {
    private  $model;
    private  $modelCategorias;

    public function __construct()
    {
        $this->model = new Producto();
        $this->modelCategorias = new Categoria();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/productos/productos.view.php';
        require_once 'view/footer.php';
    }
    
    public function Detalle() {
        $detail = $this->model->GetDetailById($_REQUEST['id']);
        
        require_once 'view/header.php';
        require_once 'view/productos/detalle.view.php';
        require_once 'view/footer.php';
    }

}

?>