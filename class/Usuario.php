<?php
require("db.php");
require("Producto.php");

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
        $db = new database();
        if($db->confirmarProducto($id_producto))   // Confirma la existencia del ID
        {
            $nombre = $db->buscarProducto("nombreProducto", $id_producto); // nombre tiene el valor del campo solicitado en String
            $precio = $db->buscarProducto("precio", $id_producto); 
            $marca = $db->buscarProducto("marca", $id_producto);
            $modelo = $db->buscarProducto("modelo", $id_producto); 
            $caract = $db->buscarProducto("caracteristicas", $id_producto); 
            $categoria = $db->buscarProducto("idCategoria", $id_producto); // Regresa el idCategoria
            //$calificacion = $db->buscarProducto("nombreProducto", $id_producto); // Dónde quedó la calificacion?

            $producto = new Producto($id_producto, $nombre, $precio, $caract, $categoria);

            // Método para enviar objetos serializados, Json (?)
        }
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