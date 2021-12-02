<?php
function infoMsg($mensaje,$uri='') {
    $bu=base_url();
    if (session_status()==PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['_msg']['text']=$mensaje;
    $_SESSION['_msg']['severity']='success';
    $_SESSION['_msg']['uri']=$uri;
    header("Location:{$bu}info");
}

function errorMsg($mensaje,$uri='') {
    $bu=base_url();
    if (session_status()==PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['_msg']['text']=$mensaje;
    $_SESSION['_msg']['severity']='danger';
    $_SESSION['_msg']['uri']=$uri;
    header("Location:{$bu}info");
}


function rolAutorizado($rolesAutorizados) {
    $rolActual='anon';
    if (session_status()==PHP_SESSION_NONE) {
        session_start();
    }
    if (isset ($_SESSION['usuario'])) {
        $rolActual='auth';
        if (isset($_SESSION['usuario']->admin) && $_SESSION['usuario']->admin) {
            $rolActual = 'admin';
        }
    }
    
    if (!in_array($rolActual,$rolesAutorizados)) {
        errorMsg('Rol inadecuado');
    }
}
?>