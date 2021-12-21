<?php
class Participacion_model extends CI_Model {
    public function getParticipacionById($id) {
        return R::load('participacion',$id);
    }
    
    public function compartir($usuarioCompartidor,$numero,$cantidad,$idUsuario) {
        $participacionACompartir = null;
        
        foreach ($usuarioCompartidor->ownParticipacionList as $participacion) {
            if ($participacion->boleto->numero == $numero) {
                $participacionACompartir = $participacion;
            }
        }
        
        $usuarioGorron = R::load('usuario',$idUsuario);
        $participacionGorrona = R::dispense('participacion');
        
        $participacionGorrona->cantidad = $cantidad;
        $participacionGorrona->esPropio = false;
        
        $participacionGorrona->usuario = $usuarioGorron;
        $participacionGorrona->boleto = $participacionACompartir->boleto;
        
        R::store($participacionGorrona);
        
        $participacionACompartir->cantidad -= $cantidad;
        R::store($participacionACompartir);
    }
}