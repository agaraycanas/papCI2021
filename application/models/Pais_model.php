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
    
    function u($idPais,$nombre) {
        $paisNuevo = R::findOne('pais','nombre=?',[$nombre]);
        $pais =R::load('pais',$idPais);
        
        if ($paisNuevo == null || strtolower($nombre) == strtolower($pais->nombre) ) {
            $pais->nombre = $nombre;
            R::store($pais);
        }
        else {
            throw new Exception("El país {$paisNuevo->nombre} ya existe");
        }
    }
    
    function getPaisById($id) {
        return R::load('pais',$id);
    }

    function d($idPais) {
        if ($idPais!=null) {
            $pais = R::load('pais',$idPais);
            if ($pais->id == 0) {
                throw new Exception("El país id={$idPais} no existe");
            }
            R::trash($pais);
        }
        
    }


}

?>