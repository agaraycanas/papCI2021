<?php
class Pais extends CI_Controller {
    function r() {
        $this->load->model('Pais_model');
        $data['paises'] = $this->Pais_model->getAll();
        frame($this,'pais/r',$data);
    }
    function c() {
        frame($this,'pais/c');
    }
    function cPost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:'ninguno';
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->c($nombre);
            /*
            $bu=base_url();
            header("Location:{$bu}pais/r");
            */
            infoMsg("País $nombre creado con éxito",'pais/r');
        }
        catch (Exception $e) {
           errorMsg($e->getMessage(),'pais/c');
        }
    }
}
?>