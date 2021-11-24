<?php
// hola
class Cliente extends Usuario
{
    public function __construct()
    {
        $this->tipo = "Cliente";
    }

    private function agregarProducto($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function eliminarProducto($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function hacerComentario($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function hacerPregunta($id_producto)
    {
        $flag = false;

        return $flag;
    }
    private function asignarCalificacion($id_producto)
    {
        
    }
    private function comprarProducto($carrito)
    {
        $flag = false;

        return $flag;
    }
}

// Ejemplo de instanciación de un objeto con herencia. 
// Esta clase no tiene atributos, pero necesita los de Usuario.
$userOne = new Cliente('Oscar', '2015070715', 'OCabagne@outlook.com');

?>