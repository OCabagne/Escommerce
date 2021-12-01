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
        $conexion = mysqli_connect($this->server, $this->user, $this->pass, $this->dbName);
        if(mysqli_connect_errno())
        {
            return false; // Fallo la conexion
        }

        return $conexion;
    }

    public function desconectar($conexion)
    {
        $conexion->close();
    }

    public function getUserName($userId)
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "SELECT nombreUsuario FROM usuario WHERE rfc = " . $userId . ";";
        $exec = mysqli_query($connect, $query);
        $cnx->desconectar($connect);
    }

    public function confirmarProducto($id_producto)
    {
        $cnx = new database();
        $connect = $cnx->conectar();
        if($connect != false)
        {           
            $query = "SELECT nombreProducto FROM producto WHERE idProducto = " . $id_producto . ";";
            $exec = mysqli_query($connect, $query);

            $cnx->desconectar($connect);
            return $exec;
        }
    }

    public function buscarProducto($campo, $id_producto)
    {
        $cnx = new database();  // Conexión con DB
        $connect = $cnx->conectar();
        if($connect != false)
        {
            $query = "SELECT " . $campo . " FROM producto WHERE idProducto = " . $id_producto . ";";
            $exec = mysqli_query($connect, $query); // Ejecución del query
            $row = mysqli_fetch_array($exec); // Obtenemos las columnas resultantes de la consulta

            $cnx->desconectar($connect);   // Desconexión de DB
            return $row[0]; // Regresamos la primer colúmna de la busqueda (debería ser solo una, pero por precaución se especifica)
        }
    }

    public function eliminarProducto($id_producto)
    {
        $cnx = new database();
        $connect = $cnx->conectar();

        $query = "DELETE * FROM producto WHERE idProducto = " + $id_producto + ";";
        $exec = mysqli_query($connect, $query);
        $cnx->desconectar($connect);
    }

    public function login( $email_usuario )
    {
        $cnx = new database();
        $connect = $cnx->conectar();
        if($connect != false)
        {
            $query = "SELECT * FROM usuario WHERE email = " . $email_usuario . ";";
            $exec = mysqli_query( $connect, $query);
            $row = mysqli_fetch_array($exec); // Obtenemos las columnas resultantes de la consulta
    
            $cnx->desconectar($connect);
            return $row;
        }
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

        $cnx->desconectar($connect);
        return $msg;
    }

    public function categorias()
    {
        $cnx = new database();  // Conexión con DB
        $connect = $cnx->conectar();
        if($connect != false)
        {
            $query = "SELECT nomCategoria FROM categoria;";
            $exec = mysqli_query($connect, $query); // Ejecución del query
            $row = mysqli_fetch_array($exec); // Obtenemos las columnas resultantes de la consulta

            $cnx->desconectar($connect);   // Desconexión de DB
            return $row; // Regresamos el resultado de la consulta
        }
    }
}

?>