<?php

class Info extends CI_Controller
{

    public function index()
    {
        session_start();
        $data['msg'] = isset($_SESSION['_msg']) ? $_SESSION['_msg'] : 'Vuelve al menú principal';
        if (isset($_SESSION['_msg'])) {
            unset($_SESSION['_msg']);
        }
        frame($this, '_t/info', $data);
    }
}