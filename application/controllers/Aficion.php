<?php
class Aficion extends CI_Controller {
    function r() {
        $this->load->model('Aficion_model');
        $data['aficiones'] = $this->Aficion_model->getAll();
        frame($this,'aficion/r',$data);
    }
    function c() {
        frame($this,'aficion/c');
    }
    function cPost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:'ninguno';
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->c($nombre);
            redirect(base_url().'aficion/r');
        }
        catch (Exception $e) {
           errorMsg($e->getMessage(),'aficion/c');
        }
    }
}
?>