<?php
function frame($controlador, $rutaVista, $datos = []) {
    if (session_status () == PHP_SESSION_NONE) {session_start ();}
    if (isset ( $_SESSION ['nombreUsuario'] )) {
        $datos ['_header'] ['usuario'] ['nombre'] = $_SESSION ['nombreUsuario'];
    }
    $controlador->load->view ( '_t/head',$datos );
    $controlador->load->view ( '_t/header', $datos );
    $controlador->load->view ( '_t/nav', $datos );
    $controlador->load->view ( $rutaVista, $datos );
    $controlador->load->view ( '_t/footer', $datos );
    $controlador->load->view ( '_t/end' );
}
?>