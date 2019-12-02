<?php

require_once 'modelo/contactos.php';

class ContactosControlador {
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Contactos();
    }
    
    public function Contactos() {
        session_start();
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }
        
        require_once 'vista/modulos/m.contactos.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }
    
    public function Registrar() {
        session_start();
        
        $contactos = new Contactos();
        $contactos->nombre=$_REQUEST['nombre'];
        $contactos->asunto=$_REQUEST['asunto'];
        $contactos->correo=$_REQUEST['correo'];
        $contactos->mensaje=$_REQUEST['mensaje'];
        $contactos->Registrar($contactos);

        
        echo "<script type='text/javascript'>
                    window.location.href='index.php?c=Usuario&a=Index&Contactos=1';
                 </script>";
        //header('location:index.php?c=Juego&a=CargarCatalogo');
    }
    
}
