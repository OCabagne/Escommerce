<?php

class Producto
{
    public $id_producto;
    public $Nombre;
    private $precio;
    private $marca;
    private $modelo;
    private $caracteristicas;
    private $categoria;
    private $calificacion;

    public function __construct($id_producto, $Nombre, $precio, $caracteristicas, $categoria)
    {
        $this->id_producto = $id_producto;
        $this->Nombre = $Nombre;
        $this->precio = $precio;
        $this->caracteristicas = $caracteristicas;
        $this->categoria = $categoria;
    }
}

?>