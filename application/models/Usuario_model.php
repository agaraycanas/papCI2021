<?php
class Usuario_model extends CI_Model {
    
    public function init() {
       R::nuke();
       $this->c('admin','admin');
    }
    
    public function login($nombre,$password) {
        $usuario = R::findOne('usuario','nombre=?',[$nombre]);
        if ($usuario==null) {
            throw new Exception('Usuario inválido');
        }
        if (! password_verify( $password, $usuario->password )) {
            throw new Exception('Contraseña inválida');
        }
        return $usuario;
    }
    
    public function c($nombre,$password) {
        
        $usuario = R::dispense('usuario');
        $usuario->nombre = $nombre;
        $usuario->password = password_hash($password, PASSWORD_BCRYPT);
        R::store($usuario);
    }
    
    public function getAll() {
        return R::findAll('usuario');
    }

    function u($idPersona,$nombre,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia) {
        
        $persona=R::load('persona',$idPersona);
        $persona->nombre = $nombre;
        $persona->nace = R::load('pais',$idPaisNace);
        $persona->vive_id = $idPaisVive;
        
        $idsComunes = [];
        
        
        // Actualización de gustos
        foreach ($persona->ownGustoList as $gusto) {
            if (in_array($gusto->aficion_id,$idsAficionGusta)) {
               $idsComunes[] = $gusto->aficion_id; 
            }
            else {
                R::store($persona);
                R::trash($gusto);
            }
        }
        
        foreach (array_diff($idsAficionGusta, $idsComunes) as $idAficion) {
            $aficion = R::load('aficion',$idAficion);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficion;
            R::store($persona);
            R::store($gusto);
        }

        // Actualización de odios
        $idsComunes = [];
        
        foreach ($persona->ownOdioList as $odio) {
            if (in_array($odio->aficion_id,$idsAficionOdia)) {
                $idsComunes[] = $odio->aficion_id;
            }
            else {
                R::store($persona);
                R::trash($odio);
            }
        }
        
        foreach (array_diff($idsAficionOdia, $idsComunes) as $idAficion) {
            $aficion = R::load('aficion',$idAficion);
            $odio = R::dispense('odio');
            $odio->persona = $persona;
            $odio->aficion = $aficion;
            R::store($persona);
            R::store($odio);
        }
        
        
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
    
    public function getAllExcept($usuario) {
        return R::findAll('usuario',"id<>? and nombre<>'admin'",[$usuario->id]);
    }
}
?>