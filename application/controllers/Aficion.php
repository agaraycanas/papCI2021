<?php
class Aficion extends CI_Controller {
    function r() {
        $this->load->model('Aficion_model');
        $data['aficiones'] = $this->Aficion_model->getAll();
        frame($this,'aficion/r',$data);
    }
    
    function c() {
        rolAutorizado(['admin']);
        frame($this,'aficion/c');
    }
    
    function cPost() {
        rolAutorizado(['admin']);
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

    function u()
    {
        rolAutorizado(['admin']);
        $idAficion = isset($_GET['idAficion']) ? $_GET['idAficion'] : null;
        $this->load->model('Aficion_model');
        $data['aficion'] = $this->Aficion_model->getAficionById($idAficion);
        frame($this, 'aficion/u', $data);
    }
    
    function uPost()
    {
        rolAutorizado(['admin']);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'ninguno';
        $idAficion = isset($_POST['idAficion']) ? $_POST['idAficion'] : null;
        
        $this->load->model('Aficion_model');
        
        try {
            $this->Aficion_model->u($idAficion, $nombre);
            redirect(base_url() . 'aficion/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'aficion/r');
        }
    }
    
    function d() {
        rolAutorizado(['admin']);
        $idAficion = isset($_GET['idAficion']) ? $_GET['idAficion'] : null;
        $this->load->model('Aficion_model');
        $data['aficion'] = $this->Aficion_model->getAficionById($idAficion);
        frame($this,'aficion/d',$data);
    }
    
    function dPost()
    {
        rolAutorizado(['admin']);
        $idAficion = isset($_POST['idAficion']) ? $_POST['idAficion'] : null;
        $this->load->model('Aficion_model');
        
        try {
            $this->Aficion_model->d($idAficion);
            redirect(base_url().'aficion/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(),'aficion/r');
        }
    }

}
?>