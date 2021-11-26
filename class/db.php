<?php
// Aquí van a estar los querys para todas las consultas, updates, deletes y conexiones

class database
{
    private $server = "localhost";
    private $user = "user";
    private $pass = "password";
    private $dbName = "database";
    
    public function conectar()
    {  
        return mysqli_connect($this->server, $this->user, $this->pass, $this->dbName);
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

    public function login( $email_usuario )
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "SELECT * FROM usuario WHERE email = " . $email_usuario . ";";
        $exec = mysqli_query( $connect, $query );

        return $exec;

    }

    public function signup( $id_usuario, $nombre_usuario, $usuario_usuario, $email_usuario, $contra_usuario ) // Tambien puede ser llamada "crearUsuario"
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "INSERT INTO usuario ( rfc, nombre, usuario, correo, contraseña ) VALUES ( " . $id_usuario . ", " . $nombre_usuario . ", " . $usuario_usuario . ", " . $email_usuario . ", " .  $contra_usuario . ");";
        $exec = mysqli_query($connect, $query);
        // $exec es true si la consulta fue exitosa, se evalúa en el siguiente if
        if( $exec ){
            $msg = "Creado con éxito";
        }else{
            $msg = "Error al crear";
        }
        return $msg;
    }

}

?>