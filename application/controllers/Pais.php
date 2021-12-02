<?php

class Pais extends CI_Controller
{

    function r()
    {
        $this->load->model('Pais_model');
        $data['paises'] = $this->Pais_model->getAll();
        frame($this, 'pais/r', $data);
    }

    function c()
    {
        rolAutorizado(['admin']);
        frame($this, 'pais/c');
    }

    function cPost()
    {
        rolAutorizado(['admin']);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'ninguno';
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->c($nombre);
            /*
             * $bu=base_url();
             * header("Location:{$bu}pais/r");
             */
            infoMsg("País $nombre creado con éxito", 'pais/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'pais/c');
        }
    }

    function u()
    {
        rolAutorizado(['admin']);
        $idPais = isset($_GET['idPais']) ? $_GET['idPais'] : null;
        $this->load->model('Pais_model');
        $data['pais'] = $this->Pais_model->getPaisById($idPais);
        frame($this, 'pais/u', $data);
    }

    function uPost()
    {
        rolAutorizado(['admin']);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'ninguno';
        $idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;

        $this->load->model('Pais_model');

        try {
            $this->Pais_model->u($idPais, $nombre);
            redirect(base_url() . 'pais/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'pais/r');
        }
    }

    function d() {
        rolAutorizado(['admin']);
        $idPais= isset($_GET['idPais']) ? $_GET['idPais'] : null;
        $this->load->model('Pais_model');
        $data['pais'] = $this->Pais_model->getPaisById($idPais);
        frame($this,'pais/d',$data);
    }
    
    function dPost()
    {
        rolAutorizado(['admin']);
        $idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
        $this->load->model('Pais_model');

        try {
            $this->Pais_model->d($idPais);
            redirect(base_url().'pais/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(),'pais/r');
        }
    }
}
?>