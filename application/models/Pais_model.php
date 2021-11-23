<?php
class Pais_model extends CI_Model {
   
    function c($nombre) {
        $pais = R::findOne('pais','nombre=?',[$nombre]);
        
        if ($pais==null) {
            $pais=R::dispense('pais');
            $pais->nombre = $nombre;
            R::store($pais);
        }
        else {
            throw new Exception("El país {$pais->nombre} ya existe");
        }
    }
    
    function getAll() {
        return R::findAll('pais');
    }
}
?>