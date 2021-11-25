<?php
// Aquí van a estar los querys para todas las consultas, updates, deletes y conexiones

class database
{
    private $server = "localhost";
    private $user = "user";
    private $pass = "password";
    private $db = "database";
    
    public function conectar()
    {  
        $connect = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
        
        return $connect;
    }

    public function getUserName($userId)
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "SELECT nombreUsuario FROM usuario WHERE rfc = " + $userId + ";";
        $exec = mysqli_query($connect, $query);
    }

    public function buscarProducto($id_producto)
    {
        $cnx = new database();
        $connect = $cnx->conectar();
        
        $query = "SELECT nombreProducto FROM producto WHERE idProducto = " + $id_producto + ";";
        $exec = mysqli_query($connect, $query);
    }

    public function eliminarProducto($id_producto)
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "DELETE * FROM producto WHERE idProducto = " + $id_producto + ";";
        $exec = mysqli_query($connect, $query);
    }
}

?>