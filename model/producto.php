<?php

require_once 'database.php';

class Producto
{
    private $pdo;
    
    public $producto_id;
    public $producto_nombre;
    public $producto_categoria;
    public $producto_descripcion;
    public $producto_precio;
    public $producto_subcategoria;
    public $producto_codigo_barras;

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

    public function GetAllProductos()
    {
        try
        {
            $stm = $this->pdo->prepare("
                SELECT 
                productos.producto_id, productos.producto_nombre, productos.producto_descripcion, productos.producto_precio, productos.producto_codigo_barras,
                categorias.categoria_nombre as producto_categoria,
                subcategorias.subcategoria_nombre as producto_subcategoria
                FROM productos 
                INNER JOIN categorias ON categorias.categoria_id = productos.producto_categoria 
                INNER JOIN subcategorias ON subcategorias.subcategoria_id = productos.producto_subcategoria
            ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetAllProductsByCategory($category_id)
    {
        try
        {
            $stm = $this->pdo->prepare("
                SELECT 
                    producto_id, producto_nombre, producto_categoria, producto_descripcion, producto_precio, producto_subcategoria, producto_codigo_barras
                FROM
                    productos
                WHERE 
                    producto_categoria = ?
            ");
            $stm->execute(array($category_id));
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
            $stm = $this->pdo->prepare("SELECT * FROM productos WHERE producto_id = ?");
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
            $stm = $this->pdo->prepare("DELETE FROM productos WHERE producto_id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function SetById($data)
    {
        try 
        {
            $sql = "UPDATE usuarios SET 
                        producto_nombre          = ?, 
                        producto_descripcion        = ?,
                        producto_precio        = ?,
                        producto_precio        = ?,
                        producto_codigo_barras            = ?, 
                        usurio_telefono = ?
                    WHERE producto_id = ?";
            $this->pdo->prepare($sql)->execute(
                    array(
                        $data->usuario_nombres, 
                        $data->usuario_apellidos,
                        $data->usuario_rol,
                        $data->usuario_email,
                        $data->usuario_celular,
                        $data->usurio_telefono,
                        $data->id
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Insert(Usuario $data)
    {
        try 
        {
        $sql = "INSERT INTO usuarios (usuario_nombres,usuario_email,usuario_apellidos,usuario_sol,usuario_telefono,usuario_celular) 
                VALUES (?, ?, ?, ?, ?, ?)";

 

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->usuario_nombres, 
                    $data->usuario_apellidos,
                    $data->usuario_rol,
                    $data->usuario_email,
                    $data->usuario_celular,
                    $data->usurio_telefono,
                    date('Y-m-d')
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}