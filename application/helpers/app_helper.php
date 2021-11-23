<?php
function infoMsg($mensaje,$uri='') {
    $bu=base_url();
    session_start();
    $_SESSION['_msg']['text']=$mensaje;
    $_SESSION['_msg']['severity']='success';
    $_SESSION['_msg']['uri']=$uri;
    header("Location:{$bu}info");
}

function errorMsg($mensaje,$uri='') {
    $bu=base_url();
    session_start();
    $_SESSION['_msg']['text']=$mensaje;
    $_SESSION['_msg']['severity']='danger';
    $_SESSION['_msg']['uri']=$uri;
    header("Location:{$bu}info");
}

?>