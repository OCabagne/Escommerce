<?php

// Aquí van a estar los querys para todas las consultas, updates, deletes y conexiones
/*
            TODOS LOS MÉTODOS (a excepción de conectar y desconectar) DEBEN SEGUIR ESTA ESTRUCTURA

        $cnx = new database();  // Instancia de db
        $connect = $cnx->conectar();    // Nos conectamos a la base de datos y guardamos el objeto mysqli retornado en connect.
        if($connect != false)   // if para cachar el caso de error de conexión.
        {
            //
            // CÓDIGO
            //
    
            $cnx->desconectar($connect);    // Desconectamos de la base de datos.
            //Si van a seguir haciendo algo, pero ya no necesitan consultas, va a partir de aquí.
        }


        PARA EJECUTAR LAS CONSULTAS SE USA EL MISMO $connect :

            $exec = mysqli_query($connect, $query); // Ejecución del query
            
*/

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

    public function confirmarProducto($id_producto) // Verifica si un id_producto ya está registrado en la base de datos. 
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

    public function agregarProducto($idCategoria, $precio, $marca, $modelo, $caract)
    {
        $cnx = new database();  // Conexión con DB
        $connect = $cnx->conectar();
        if($connect != false)
        {
            $query = "INSERT INTO producto(idCategoria, precio, marca, modelo, caracteristicas) VALUES (".$idCategoria.",".$precio.",".$marca.",".$modelo.",".$caract.");";
            $exec = mysqli_query($connect, $query); // Ejecución del query
            $row = mysqli_fetch_array($exec); // Obtenemos las columnas resultantes de la consulta

            $cnx->desconectar($connect);   // Desconexión de DB
            return $row; // Regresamos Row. Es false si no se pudo ejecutar
        }
    }

    public function editarProducto($id_producto, $idCategoria, $precio, $marca, $modelo, $caract)
    {
        $cnx = new database();  // Instancia de db
        $connect = $cnx->conectar();    // Nos conectamos a la base de datos y guardamos el objeto mysqli retornado en connect.
        if($connect != false)   // if para cachar el caso de error de conexión.
        {
            $query = "UPDATE producto SET idCategoria = '".$idCategoria."', precio = '".$precio."', marca = '".$marca."', modelo = '".$modelo."', caracteristicas = '".$caract."' WHERE idProducto = ".$id_producto.";";
            $exec = mysqli_query($connect, $query); // Ejecución del query

            $cnx->desconectar($connect);   // Desconexión de DB
            return $exec;
        }
    }

    public function obtenerIDventa()    //Genera un nuevo idVenta y lo regresa
    {
        $cnx = new database();  // Instancia de db
        $connect = $cnx->conectar();    // Nos conectamos a la base de datos y guardamos el objeto mysqli retornado en connect.
        if($connect != false)   // if para cachar el caso de error de conexión.
        {
            //
            // CÓDIGO
            //
    
            $cnx->desconectar($connect);    // Desconectamos de la base de datos.
            //Si van a seguir haciendo algo, pero ya no necesitan consultas, va a partir de aquí.
        }
    }

    public function comprarProducto($id_producto, $idVenta)
    {
        $cnx = new database();  // Instancia de db
        $connect = $cnx->conectar();    // Nos conectamos a la base de datos y guardamos el objeto mysqli retornado en connect.
        if($connect != false)   // if para cachar el caso de error de conexión.
        {
            $query = "INSERT INTO venta (idVenta, idProducto) VALUES (".$idVenta.", ".$id_producto.");";
            $exec = mysqli_query($connect, $query);
            $cnx->desconectar($connect);    // Desconectamos de la base de datos.
            if($exec)
            {
                return "Comprado";
            }
            else
            {
                return "Error";
            }
        }
    }

    public function confirmarUsuario($id_usuario)
    {
        $cnx = new database();
        $connect = $cnx->conectar();
        if($connect != false)
        {           
            $query = "SELECT nombreUsuario FROM usuario WHERE rfc = " . $id_usuario . ";";
            $exec = mysqli_query($connect, $query);

            $cnx->desconectar($connect);
            return $exec;
        }
    }

    public function buscarUsuario($campo, $id_usuario)
    {
        $cnx = new database();  // Conexión con DB
        $connect = $cnx->conectar();
        if($connect != false)
        {
            $query = "SELECT " . $campo . " FROM usuario WHERE rfc = " . $id_usuario . ";";
            $exec = mysqli_query($connect, $query); // Ejecución del query
            $row = mysqli_fetch_array($exec); // Obtenemos las columnas resultantes de la consulta

            $cnx->desconectar($connect);   // Desconexión de DB
            return $row[0]; // Regresamos la primer colúmna de la busqueda (debería ser solo una, pero por precaución se especifica)
        }
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

    public function signup( $id_usuario, $usuario_usuario, $email_usuario, $contra_usuario, $tipo_usuario ) // Tambien puede ser llamada "crearUsuario"
    {
        $cnx = new database();
        $connect = $cnx->conectar();
        if($connect != false)   // if para cachar el caso de error de conexión.
        {
            $query = "INSERT INTO usuario ( rfc, nombreUsuario, contraUsuario, correo, tipoUser) VALUES ( " . $id_usuario . ", " . $usuario_usuario . ", " . $contra_usuario . ", "  . $email_usuario . ", " . $tipo_usuario . ");";
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
    }

    public function categorias()    // Obtener el listado de categorías registradas
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