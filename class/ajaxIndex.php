<?php
/*function peticionAJax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    return true;
}*/
    require $_SERVER['DOCUMENT_ROOT'].'/Escommerce/class/db.php';
    $modelo = htmlspecialchars($_POST['modelo']);
    $dataBase = new database();
    $conLightbox=$dataBase->galeriaProducto("modelo", $modelo);
    $retorno = array(
        "precio" => $conLightbox['precio'],
        "marca" => $conLightbox['marca'],
        "modelo" => $conLightbox['modelo'],
        "caracteristicas" => $conLightbox['caracteristicas']
    );
    $retorna = json_encode($retorno);
    echo $retorna;
?>