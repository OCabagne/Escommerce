<?php
    //require '\Escommerce\class\db.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Escommerce/class/db.php';

    if( $_POST)
    {
        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['nombreUsuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tipo = $_POST['tipoUsuario'];
        $db = new database();
        echo $rfc;
        //$connect = $db->conectar();       // El método conectar únicamente se usa dentro de db por seguridad de acceso. Los demás métodos son los que van a llamarlo de forma interna.
        echo $db->signup( $rfc, $nombre, $usuario, $email, password_hash( $password, PASSWORD_BCRYPT ), $tipo );
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro E-scommerce</title>
</head>
<body>
    <div>
        <span>
            <p>Registro</p>
        </span>
        <hr><!---LINEA DE ADORNO DEBAJO REGSITRO-->
    </div><br>

    <form action="registro.php" method="post">
        <input type="text" name="rfc" placeholder="Escribe aquí tu rfc" maxlength="13" required>
        <input type="text" name="nombre" placeholder="Escribe aquí tu nombre" maxlength="150" required>
        <input type="text" name="nombreUsuario" placeholder="Escribe aqupi tu nombre de usuario" maxlength="100" required>
        <input type="text" name="password" placeholder="Escribe aquí tu contraseña" maxlength="100" required>
        <input type="email" name="email" placeholder="example@example.com" maxlength="200" required>
        <label for="tipoUsuario">Desea comenzar siendo vendedor</label><br>
        <label>si</label>
        <input type="radio" name="tipoUsuario" value="vendedor">
        <label>despues</label>
        <input type="radio" name="tipoUsuario" value="cliente" checked>
        <button type="submit" name="reg">registrarme</button>
    </form>
</body>
</html>