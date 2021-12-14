<?php
    session_start();
    
    if( isset( $_POST['agregar'] ) ){
        //$actual->agregarProducto( $_GET['agregar'] );
        $_SESSION['carrito'] = $_POST['agregar'];
        $m = $_POST['agregar'];
    }
?>