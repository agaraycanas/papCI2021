<?php

class Info extends CI_Controller
{

    public function index()
    {
        session_start();
        $data['msg'] = isset($_SESSION['_msg']) ? $_SESSION['_msg']['text'] : 'Vuelve al menú principal';
        $data['severity'] = isset($_SESSION['_msg']) ? $_SESSION['_msg']['severity'] : 'info';
        $data['uri'] = base_url().(isset($_SESSION['_msg']) ? $_SESSION['_msg']['uri'] : '');
        if (isset($_SESSION['_msg'])) {
            unset($_SESSION['_msg']);
        }
        frame($this, '_t/info', $data);
    }
}