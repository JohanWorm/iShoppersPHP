<?php

require_once 'database.php';

class Subcategoria
{
    private $pdo;
    
    public $subcategoria_id;
    public $subcategoria_nombre;
    public $subcategoria_descripcion;
    public $subcategoria_categoria;

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
                subcategorias.subcategoria_id, subcategorias.subcategoria_nombre, subcategorias.subcategoria_descripcion, 
                categorias.categoria_nombre as subcategoria_categoria
                FROM subcategorias 
                INNER JOIN categorias ON categorias.categoria_id = subcategorias.subcategoria_categoria
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
            $stm = $this->pdo->prepare("SELECT * FROM subcategorias WHERE subcategoria_id = ?");
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
            $stm = $this->pdo->prepare("DELETE FROM subcategorias WHERE subcategoria_id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Insert(Subcategoria $data)
    {
        try {
            $sql = "INSERT INTO subcategorias (subcategoria_nombre, subcategoria_descripcion, subcategoria_categoria) VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->subcategoria_nombre, 
                    $data->subcategoria_descripcion,
                    $data->subcategoria_categoria
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SetById($data)
    {
        try {
            $sqlUpdate = "UPDATE subcategorias SET subcategoria_nombre = ?, subcategoria_descripcion = ?, subcategoria_categoria = ? WHERE subcategoria_id = ?";
            $this->pdo->prepare($sqlUpdate)->execute(
                array(
                    $data->subcategoria_nombre, 
                    $data->subcategoria_descripcion,
                    $data->subcategoria_categoria,
                    $data->subcategoria_id
                ));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function GetCategorias()
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM categorias");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

}