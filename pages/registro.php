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
            <p>registro</p>
        </span>
        <hr><!---LINEA DE ADORNO DEBAJO REGSITRO-->
    </div><br>
    <form action="test.php" method="get">
        <input type="text" name="rfc" placeholder="Escribe aqui tu rfc" maxlength="13" required>
        <input type="text" name="nombreUsuario" placeholder="escribe aqui tu nombre de usuario" maxlength="100"
        required>
        <input type="text" name="password" placeholder="escribe aqui tu contraseña" maxlength="100" required>
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