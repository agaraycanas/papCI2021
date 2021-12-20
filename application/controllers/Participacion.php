<?php

class Participacion extends CI_Controller
{

    public function compartir()
    {
        rolAutorizado(['auth']);
        $idParticipacion = isset($_GET['idParticipacion']) ? $_GET['idParticipacion'] : null;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $usuario = $_SESSION['usuario'];
        try {
            $permitido=false;
            foreach ($usuario->ownParticipacionList as $participacion) {
                if ($participacion->id == $idParticipacion) {
                    $permitido = true;
                }
            }
            if (!$permitido) {
                throw new Exception('No puedes compartir un boleto que no te pertenece');
            }
            $this->load->model('Participacion_model');
            $data['participacion'] = $this->Participacion_model->getParticipacionById($idParticipacion);
            
            $this->load->model('Usuario_model');
            $data['usuarios'] = $this->Usuario_model->getAllExcept($usuario);
            
            frame($this,'participacion/compartir',$data);
        } catch (Exception $e) {
            errorMsg($e->getMessage());
        }
    }
}