<?php
class Usuario
{
    private $pdo;

    public $idProducto;
    public $Nombre;
    public $Descripcion;
    public $Precio;
    public $Fecha;
    public $estado;


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
}