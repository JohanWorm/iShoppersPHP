<?php

require_once 'model/usuario.php';

class UsuarioController {
    private  $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/usuario/usuarios.view.php';
        require_once 'view/footer.php';
    }

    public function Eliminar() {
        $this->model->DeleteById($_REQUEST['id']);
        header('Location: index.php');
    }

    public function Detalle() {
        $detail = $this->model->GetDetailById($_REQUEST['id']);
        $roles = $this->model->GetRoles();
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.form.view.php';
        require_once 'view/footer.php';
    }

    public function Crear() {
        $roles = $this->model->GetRoles();

        require_once 'view/header.php';
        require_once 'view/usuario/usuario.form.view.php';
        require_once 'view/footer.php';
    }

    public function Guardar() {
        $data = new Usuario();

        $data->usuario_id = $_REQUEST['usuario_id'];
        $data->usuario_nombres = $_REQUEST['usuario_nombres'];
        $data->usuario_apellidos = $_REQUEST['usuario_apellidos'];
        $data->usuario_email = $_REQUEST['usuario_email'];
        $data->usuario_rol = $_REQUEST['usuario_rol'];
        $data->usuario_telefono = $_REQUEST['usuario_telefono'];
        $data->usuario_celular = $_REQUEST['usuario_celular'];

        $data->usuario_id > 0 ? $this->model->SetById($data) : $this->model->Insert($data);
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuarios.view.php';
        require_once 'view/footer.php';
    }

}

?>