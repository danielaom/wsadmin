<?php
class Categoria
{
    private $pdo;

    public $id;
    public $nombre;
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