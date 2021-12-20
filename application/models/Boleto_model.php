<?php

class Boleto_model extends CI_Model
{

    public function registrar($numero, $cantidad, $usuario)
    {
        
        $boleto = R::findOne('boleto','numero=?',[$numero]);
        if ($boleto==null) {
            $boleto = R::dispense('boleto');
            $boleto->numero = $numero;
            R::store($boleto);
        }
        else {
            foreach ($boleto->ownParticipacionList as $p) {
                if ($p->usuario->nombre == $usuario->nombre){
                    throw new Exception('El usuario ya tiene ese boleto. Actualiza su participación');
                }
            }
        }
        
        $participacion = R::dispense('participacion');
        $participacion->cantidad = $cantidad;
        $participacion->esPropio = true;
        $participacion->usuario = $usuario;
        $participacion->boleto = $boleto;
        R::store($participacion);
    }
}