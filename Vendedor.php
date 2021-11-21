<?php

class Vendedor extends Usuario
{
    private $calificacion;

    public function __construct()
    {
        $this->tipo = "Vendedor";
    }

    private function publicarProducto($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function editarProducto($id_producto)
    {
        
    }
    private function eliminarProducto($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function responderProducto($id_producto)
    {
        
    }
}

?>