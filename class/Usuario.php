<?php

class Usuario
{
    public $usuario;
    public $rfc;
    private $correo;
    private $tipo;

    public function __construct($usuario, $rfc, $correo)
    {
        $this->usuario = $usuario;
        $this->rfc = $rfc;
        $this->correo = $correo;
        $this->tipo = "Cliente";
    }

    public function verProducto($id_producto)
    {

    }   
    
    public function verPerfil($rfc)
    {

    }

    public function verPedido($id_venta)
    {

    }

    public function editarPerfil()
    {
        
    }
}

?>