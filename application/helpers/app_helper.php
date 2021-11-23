<?php
function info($mensaje) {
    $bu=base_url();
    session_start();
    $_SESSION['_msg']=$mensaje;
    header("Location:{$bu}info");
}
?>