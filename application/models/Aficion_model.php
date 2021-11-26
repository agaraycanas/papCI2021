<?php
class Aficion_model extends CI_Model {
   
    function c($nombre) {
        $aficion = R::findOne('aficion','nombre=?',[$nombre]);
        
        if ($aficion==null) {
            $aficion=R::dispense('aficion');
            $aficion->nombre = $nombre;
            R::store($aficion);
        }
        else {
            throw new Exception("La afición {$aficion->nombre} ya existe");
        }
    }
    
    function getAll() {
        return R::findAll('aficion');
    }

    function u($idAficion,$nombre) {
        $aficionNueva = R::findOne('aficion','nombre=?',[$nombre]);
        $aficion=R::load('aficion',$idAficion);
        
        if ($aficionNueva == null || strtolower($nombre) == strtolower($aficion->nombre) ) {
            $aficion->nombre = $nombre;
            R::store($aficion);
        }
        else {
            throw new Exception("La afición {$aficionNueva->nombre} ya existe");
        }
    }
    
    function getAficionById($id) {
        return R::load('aficion',$id);
    }
    
    function d($idAficion) {
        if ($idAficion!=null) {
            $aficion = R::load('aficion',$idAficion);
            if ($aficion->id == 0) {
                throw new Exception("La afición id={$idAficion} no existe");
            }
            R::trash($aficion);
        }
        
    }
    
}
?>