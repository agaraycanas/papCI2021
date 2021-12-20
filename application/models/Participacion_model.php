<?php
class Participacion_model extends CI_Model {
    public function getParticipacionById($id) {
        return R::load('participacion',$id);
    }
}