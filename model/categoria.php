<?php

require_once 'database.php';

class Categoria
{
    private $pdo;
    
    public $categoria_id;
    public $categoria_tienda;
    public $categoria_nombre;
    public $categoria_descripcion;

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

    public function GetAllCategorias()
    {
        try
        {
            $stm = $this->pdo->prepare("
                SELECT 
                categorias.categoria_id, categorias.categoria_nombre, categorias.categoria_descripcion, 
                tiendas.tienda_nombre as categoria_tienda
                FROM categorias 
                INNER JOIN tiendas ON tiendas.tienda_id = categorias.categoria_tienda
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
            $stm = $this->pdo->prepare("SELECT * FROM categorias WHERE categoria_id = ?");
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
            $stm = $this->pdo->prepare("DELETE FROM categorias WHERE categoria_id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Insert(Categoria $data)
    {
        try {
            $sql = "INSERT INTO categorias (categoria_nombre, categoria_descripcion, categoria_tienda) VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->categoria_nombre, 
                    $data->categoria_descripcion,
                    $data->categoria_tienda
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SetById($data)
    {
        try {
            $sqlUpdate = "UPDATE categorias SET categoria_nombre = ?, categoria_descripcion = ?, categoria_tienda = ? WHERE categoria_id = ?";
            $this->pdo->prepare($sqlUpdate)->execute(
                array(
                    $data->categoria_nombre, 
                    $data->categoria_descripcion,
                    $data->categoria_tienda,
                    $data->categoria_id
                ));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function GetTiendas()
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM tiendas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

}