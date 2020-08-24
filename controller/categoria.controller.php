<?php

require_once 'model/categoria.php';

class CategoriaController {
    private  $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/categoria/categorias.view.php';
        require_once 'view/footer.php';
    }

    public function Eliminar() {
        $this->model->DeleteById($_REQUEST['id']);
        header('Location: index.php?c=Categoria');
    }

    public function Detalle() {
        $detail = $this->model->GetDetailById($_REQUEST['id']);
        $tiendas = $this->model->GetTiendas();
        
        require_once 'view/header.php';
        require_once 'view/categoria/categoria.form.view.php';
        require_once 'view/footer.php';
    }

    public function Crear() {
        $tiendas = $this->model->GetTiendas();

        require_once 'view/header.php';
        require_once 'view/categoria/categoria.form.view.php';
        require_once 'view/footer.php';
    }

    public function Guardar() {
        $data = new Categoria();

        $data->categoria_id = $_REQUEST['categoria_id'];
        $data->categoria_nombre = $_REQUEST['categoria_nombre'];
        $data->categoria_descripcion = $_REQUEST['categoria_descripcion'];
        $data->categoria_tienda = $_REQUEST['categoria_tienda'];

        $data->categoria_id > 0 ? $this->model->SetById($data) : $this->model->Insert($data);
        
        require_once 'view/header.php';
        require_once 'view/categoria/categorias.view.php';
        require_once 'view/footer.php';
    }

}

?>