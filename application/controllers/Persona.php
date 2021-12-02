<?php
class Persona extends CI_Controller {
    public function login() {
        frame($this,'persona/login');
    }
    
    public function loginPost() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John Doe';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->load->model('Persona_model');
        try {
            $persona = $this->Persona_model->login($nombre,$password);
            if (session_status() == PHP_SESSION_NONE) {session_start ();}
            $_SESSION['usuario'] = $persona;
            redirect(base_url());
        }
        catch (Exception $e) {
            errorMsg('Usuario o contraseña inválidas','persona/login');
        }
    }
    
    public function logout() {
        rolAutorizado(['auth','admin']);
        
        if (session_status() == PHP_SESSION_NONE) {session_start ();}
        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        redirect(base_url());
    }
    
    public function r() {
        rolAutorizado(['auth','admin']);
        
        $this->load->model('Persona_model');
        $data['personas'] = $this->Persona_model->getAll();
        frame($this,'persona/r',$data);
    }
    
    public function c() {
        rolAutorizado(['admin']);
        
        $this->load->model('Pais_model');
        $data['paises'] = $this->Pais_model->getAll();
        
        $this->load->model('Aficion_model');
        $data['aficiones'] = $this->Aficion_model->getAll();
        
        frame($this,'persona/c',$data);
    }
    
    public function cPost() {
        rolAutorizado(['admin']);
        
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John Doe';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $idPaisNace = isset($_POST['idPaisNace']) ? $_POST['idPaisNace'] : null;
        $idPaisVive = isset($_POST['idPaisVive']) ? $_POST['idPaisVive'] : null;
        $idsAficionGusta = isset($_POST['idAficionGusta']) ? $_POST['idAficionGusta'] : [];
        $idsAficionOdia = isset($_POST['idAficionOdia']) ? $_POST['idAficionOdia'] : [];
        $this->load->model('Persona_model');
        
        try {
            $this->Persona_model->c($nombre,$password,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia);
            redirect(base_url().'persona/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'persona/c');
        }
    }

    
    function u()
    {
        rolAutorizado(['admin']);
        
        $idPersona = isset($_GET['idPersona']) ? $_GET['idPersona'] : null;
        
        $this->load->model('Persona_model');
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        
        $data['persona'] = $this->Persona_model->getPersonaById($idPersona);
        $data['paises'] = $this->Pais_model->getAll();
        $data['aficiones'] = $this->Aficion_model->getAll();
        
        frame($this, 'persona/u', $data);
    }
    
    function uPost()
    {
        rolAutorizado(['admin']);
        
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'ninguno';
        $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : null;
        $idPaisNace = isset($_POST['idPaisNace']) ? $_POST['idPaisNace'] : null;
        $idPaisVive = isset($_POST['idPaisVive']) ? $_POST['idPaisVive'] : null;
        $idsAficionGusta = isset($_POST['idAficionGusta']) ? $_POST['idAficionGusta'] : [] ;
        $idsAficionOdia = isset($_POST['idAficionOdia']) ? $_POST['idAficionOdia'] : [] ;
        
        $this->load->model('Persona_model');
        
        try {
            $this->Persona_model->u($idPersona, $nombre, $idPaisNace, $idPaisVive, $idsAficionGusta, $idsAficionOdia);
            redirect(base_url() . 'persona/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'persona/r');
        }
    }
    
    function d() {
        rolAutorizado(['admin']);
        
        $idPersona = isset($_GET['idPersona']) ? $_GET['idPersona'] : null;
        $this->load->model('Persona_model');
        $data['persona'] = $this->Persona_model->getPersonaById($idPersona);
        frame($this,'persona/d',$data);
    }
    
    function dPost()
    {
        $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : null;
        $this->load->model('Persona_model');
        
        try {
            $this->Persona_model->d($idPersona);
            redirect(base_url().'persona/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(),'persona/r');
        }
    }
    
}
?>