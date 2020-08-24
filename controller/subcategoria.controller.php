<?php

require_once 'model/subcategoria.php';

class SubcategoriaController {
    private  $model;

    public function __construct()
    {
        $this->model = new Subcategoria();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/subcategoria/subcategorias.view.php';
        require_once 'view/footer.php';
    }

    public function Eliminar() {
        $this->model->DeleteById($_REQUEST['id']);
        header('Location: index.php?c=Subcategoria');
    }

    public function Detalle() {
        $detail = $this->model->GetDetailById($_REQUEST['id']);
        $categorias = $this->model->GetCategorias();
        
        require_once 'view/header.php';
        require_once 'view/subcategoria/subcategoria.form.view.php';
        require_once 'view/footer.php';
    }

    public function Crear() {
        $categorias = $this->model->GetCategorias();

        require_once 'view/header.php';
        require_once 'view/subcategoria/subcategoria.form.view.php';
        require_once 'view/footer.php';
    }

    public function Guardar() {
        $data = new Subcategoria();

        $data->subcategoria_id = $_REQUEST['subcategoria_id'];
        $data->subcategoria_nombre = $_REQUEST['subcategoria_nombre'];
        $data->subcategoria_descripcion = $_REQUEST['subcategoria_descripcion'];
        $data->subcategoria_categoria = $_REQUEST['subcategoria_categoria'];

        $data->subcategoria_id > 0 ? $this->model->SetById($data) : $this->model->Insert($data);
        
        require_once 'view/header.php';
        require_once 'view/subcategoria/subcategorias.view.php';
        require_once 'view/footer.php';
    }

}

?>