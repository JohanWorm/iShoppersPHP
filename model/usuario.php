<?php

require_once 'database.php';

class Usuario
{
    private $pdo;
    
    public $id;
    public $usuario_nombres;
    public $usuario_apellidos;
    public $usuario_rol;
    public $usuario_email;
    public $usuario_telefono;
    public $usuario_celular;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();     
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetAll()
    {
        try
        {
            $stm = $this->pdo->prepare("
                SELECT 
                usuarios.usuario_id, usuarios.usuario_nombres, usuarios.usuario_apellidos, usuarios.usuario_email, usuarios.usuario_telefono, usuarios.usuario_celular, 
                roles.rol_nombre as usuario_rol
                FROM usuarios 
                INNER JOIN usuarios_roles ON usuarios_roles.usuario_id = usuarios.usuario_id 
                INNER JOIN roles ON roles.rol_id = usuarios.usuario_rol
            ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetDetailById($id)
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario_id = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function DeleteById($id)
    {
        try 
        {
            $stm = $this->pdo->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Insert(Usuario $data)
    {
        try {
            $sql = "INSERT INTO usuarios (usuario_nombres, usuario_apellidos, usuario_email, usuario_rol, usuario_telefono, usuario_celular) VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->usuario_nombres, 
                    $data->usuario_apellidos,
                    $data->usuario_email,
                    $data->usuario_rol,
                    $data->usuario_telefono,
                    $data->usuario_celular
                ));

            $lastId = $this->pdo->lastInsertId();

            $sqlRolRel = "INSERT INTO usuarios_roles (usuario_id, rol_id) VALUES (?, ?)";

            $this->pdo->prepare($sqlRolRel)->execute(
                array(
                    $lastId, 
                    $data->usuario_rol
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SetById($data)
    {
        try {
            $sqlUpdate = "UPDATE usuarios SET usuario_nombres = ?, usuario_apellidos = ?, usuario_rol = ?, usuario_email = ?, usuario_celular = ?, usuario_telefono = ? WHERE usuario_id = ?";
            $this->pdo->prepare($sqlUpdate)->execute(
                array(
                    $data->usuario_nombres, 
                    $data->usuario_apellidos,
                    $data->usuario_rol,
                    $data->usuario_email,
                    $data->usuario_celular,
                    $data->usuario_telefono,
                    $data->usuario_id
                ));

            $sqlUpdateRel = "UPDATE usuarios_roles SET usuario_id = ?, rol_id = ? WHERE usuario_id = ?";
            $this->pdo->prepare($sqlUpdateRel)->execute(
                array(
                    $data->usuario_id,
                    $data->usuario_rol,
                    $data->usuario_id
                ));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function GetRoles()
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM roles");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

}