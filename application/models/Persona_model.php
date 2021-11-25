<?php
class Persona_model extends CI_Model {
    public function c($nombre,$idPaisNace,$idsAficionGusta) {
        
        if ($idPaisNace==null) {
            throw new Exception("ID País no puede ser nulo");
        }
        
        $persona = R::dispense('persona');
        $persona->nombre = $nombre;
        $persona->nace = R::load('pais',$idPaisNace);
        foreach ($idsAficionGusta as $idAficionGusta) {
            $aficionGusta = R::load('aficion',$idAficionGusta);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficionGusta;
            R::store($gusto);
        }
        R::store($persona);
    }
    
    public function getAll() {
        return R::findAll('persona');
    }
}
?>