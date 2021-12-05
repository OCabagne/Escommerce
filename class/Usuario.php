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

    public function verProducto($id_producto)   // Consultar los datos de un producto de acuerdo a su id
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

            return json_encode($producto);  // Regresa el objeto producto en formato JSON
        }
    }
    
    public function verPerfil($rfc)     // Consultar los datos de otro usuario de acuerdo a su RFC
    {
        $db = new database();
        if($db->confirmarUsuario($rfc))   // Confirma la existencia del ID
        {
            $nombre = $db->buscarUsuario("nombreUsuario", $rfc); // nombre tiene el valor del campo solicitado en String
            $correo = $db->buscarUsuario("correo", $rfc); 
            $tipo = $db->buscarUsuario("tipo", $rfc);
            //$calificacion = $db->buscarProducto("nombreProducto", $id_producto); // Dónde quedó la calificacion?

            $usuario = new Usuario($nombre, $rfc, $correo);
            $usuario->tipo = $tipo;

            return json_encode($usuario);  // Regresa el objeto producto en formato JSON
        }
    }

    public function verPedido($id_venta)    // Consultar los productos comprados anteriormente
    {

    }

    public function editarPerfil($usuario)  // Editar los datos del perfil personal
    {
        $producto = json_decode($usuario);
        $db = new database();
    }

    public function barraBusqueda($palabra)
    {
        $db = new database();
        $resultado = $db->buscarSimilar($palabra);
        if($resultado != false) // Si se encontraron resultados
        {
            return json_encode($resultado); // Se regresa la lista de id_producto en formato JSON
        }
    }
}

?>