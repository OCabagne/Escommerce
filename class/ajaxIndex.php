<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Escommerce/class/db.php';
    $idProducto = htmlspecialchars($_POST['idProducto']);
    $dataBase = new database();
    $conLightbox=$dataBase->galeriaProducto("idProducto", $idProducto);
    $retorno = array(
        "precio" => $conLightbox['precio'],
        "marca" => $conLightbox['marca'],
        "modelo" => $conLightbox['modelo'],
        "caracteristicas" => $conLightbox['caracteristicas'],
        "oferta" => $conLightbox['oferta'],
        "urlImg" => $conLightbox['urlImg']
    );
    $retorna = json_encode($retorno);
    echo $retorna;
?>