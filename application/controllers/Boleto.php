<?php

class Boleto extends CI_Controller
{

    public function registrar()
    {
        frame($this, 'boleto/registrar');
    }

    public function registrarPost()
    {
        rolAutorizado(['auth']);
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;

        $this->load->model('Boleto_model');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        try {
            if (! isset($_SESSION['usuario'])) {
                throw new Exception('Sólo para usuarios registrados');
            }
            $this->Boleto_model->registrar($numero, $cantidad,$_SESSION['usuario']);
            redirect(base_url());
        } catch (Exception $e) {
            errorMsg($e->getMessage());
        }
    }
    
    public function r() {
        rolAutorizado(['auth']);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $data['usuario'] = $_SESSION['usuario'];
        frame($this,'boleto/r',$data);
    }
}