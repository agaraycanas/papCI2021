<?php
class Persona_model extends CI_Model {
    public function c($nombre,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia) {
        
        if ($idPaisNace==null) {
            throw new Exception("ID País no puede ser nulo");
        }
        
        $persona = R::dispense('persona');
        $persona->nombre = $nombre;
        $persona->nace = R::load('pais',$idPaisNace);
        $persona->vive = R::load('pais',$idPaisVive);
        foreach ($idsAficionGusta as $idAficionGusta) {
            $aficionGusta = R::load('aficion',$idAficionGusta);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficionGusta;
            R::store($gusto);
        }
        foreach ($idsAficionOdia as $idAficionOdia) {
            $aficionOdia = R::load('aficion',$idAficionOdia);
            $odio = R::dispense('odio');
            $odio->persona = $persona;
            $odio->aficion = $aficionOdia;
            R::store($odio);
        }
        R::store($persona);
    }
    
    public function getAll() {
        return R::findAll('persona');
    }

    function u($idPersona,$nombre) {
        $persona=R::load('aficion',$idPersona);
        $persona->nombre = $nombre;
        R::store($persona);
    }
    
    function getPersonaById($id) {
        return R::load('persona',$id);
    }
    
    function d($idPersona) {
        if ($idPersona!=null) {
            $persona = R::load('persona',$idPersona);
            if ($persona->id == 0) {
                throw new Exception("La persona id={$idPersona} no existe");
            }
            R::trash($persona);
        }
        
    }
    
}
?>