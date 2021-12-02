<?php
require("db.php");

class Vendedor extends Usuario
{
    private $calificacion;

    public function __construct()
    {
        $this->tipo = "Vendedor";
    }

    private function publicarProducto($productoJson) // Registrar nuevo producto
    {
        $producto = json_decode($productoJson);
        $db =  new database();
        if( $db->agregarProducto($producto->idCategoria, $producto->precio, $producto->marca, $producto->modelo, $producto->caracteristicas) != false)
        {
            return "Registrado";
        }
    }

    private function editarProducto($id_producto)
    {
        
    }

    private function eliminarProducto($id_producto)
    {
        $flag = false;
        $db = new database();
        if($db->confirmarProducto($id_producto))  // Verificar que existe
        {
            //Existe. Seguro quieres eliminar?

            if($db->eliminarProducto($id_producto))
            {
                //Eliminado
                return "Eliminado";
            }

            return "Error";
        }

        return "No existe";
    }

    private function responderProducto($id_producto)
    {
        
    }
}
?>