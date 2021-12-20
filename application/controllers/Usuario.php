<?php
class Usuario extends CI_Controller {
    public function login() {
        frame($this,'usuario/login');
    }
    
    public function loginPost() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John Doe';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->load->model('usuario_model');
        try {
            $usuario = $this->usuario_model->login($nombre,$password);
            if (session_status() == PHP_SESSION_NONE) {session_start ();}
            $_SESSION['usuario'] = $usuario;
            redirect(base_url());
        }
        catch (Exception $e) {
            errorMsg('Usuario o contraseña inválidas','usuario/login');
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
        
        $this->load->model('Usuario_model');
        $data['usuarios'] = $this->Usuario_model->getAll();
        frame($this,'usuario/r',$data);
    }
    
    public function c() {
        rolAutorizado(['admin']);
        frame($this,'usuario/c');
    }
    
    public function cPost() {
        rolAutorizado(['admin']);
        
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John Doe';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->load->model('usuario_model');
        
        try {
            $this->usuario_model->c($nombre,$password);
            redirect(base_url().'usuario/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'usuario/c');
        }
    }

    
    function u()
    {
        rolAutorizado(['admin']);
        
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : null;
        
        $this->load->model('usuario_model');
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        
        $data['usuario'] = $this->usuario_model->getusuarioById($idusuario);
        $data['paises'] = $this->Pais_model->getAll();
        $data['aficiones'] = $this->Aficion_model->getAll();
        
        frame($this, 'usuario/u', $data);
    }
    
    function uPost()
    {
        rolAutorizado(['admin']);
        
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'ninguno';
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : null;
        $idPaisNace = isset($_POST['idPaisNace']) ? $_POST['idPaisNace'] : null;
        $idPaisVive = isset($_POST['idPaisVive']) ? $_POST['idPaisVive'] : null;
        $idsAficionGusta = isset($_POST['idAficionGusta']) ? $_POST['idAficionGusta'] : [] ;
        $idsAficionOdia = isset($_POST['idAficionOdia']) ? $_POST['idAficionOdia'] : [] ;
        
        $this->load->model('usuario_model');
        
        try {
            $this->usuario_model->u($idusuario, $nombre, $idPaisNace, $idPaisVive, $idsAficionGusta, $idsAficionOdia);
            redirect(base_url() . 'usuario/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'usuario/r');
        }
    }
    
    function d() {
        rolAutorizado(['admin']);
        
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : null;
        $this->load->model('usuario_model');
        $data['usuario'] = $this->usuario_model->getusuarioById($idusuario);
        frame($this,'usuario/d',$data);
    }
    
    function dPost()
    {
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : null;
        $this->load->model('usuario_model');
        
        try {
            $this->usuario_model->d($idusuario);
            redirect(base_url().'usuario/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(),'usuario/r');
        }
    }
    
}
?>