<?php

class Anonymous extends CI_Controller
{

    private $passwordReset = '2021loteria2021';

    public function init()
    {
        frame($this, 'anon/init');
    }

    public function initPost()
    {
        $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        try {
            if ($pwd == null || password_verify($password, $hash)) {
                $this->load->model('Usuario_model');
                $this->Usuario_model->init();
                redirect(base_url() . 'usuario/login');
            }
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'usuario/login');
        }
    }
}