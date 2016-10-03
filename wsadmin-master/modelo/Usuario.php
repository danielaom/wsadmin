<?php
class Usuario
{
    private $pdo;

    public $idUsuario;
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $ci;
    public $telefono;
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