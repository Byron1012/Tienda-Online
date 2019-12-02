<?php

require_once 'modelo/usuario.php';

class UsuarioControlador {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Usuario();
    }

    public function Index() {
        session_start();
        
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }
        
        require_once 'vista/seccion/s.Bienvenida.php';
        //echo '<script type="text/javascript">alert("' . $_SESSION['nombre'] . '")</script>';
        //consola . log ( "Mensaje aquí" );
        //require_once 'vista/seccion/s.Caracteristicas.php';
        require_once 'vista/seccion/s.MisionVision.php';
        
        require_once 'vista/seccion/s.Sobre_Nosotros.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
        
        if (@$_REQUEST['Contactos'] == 1) {
            echo "<script type='text/javascript'>
                        alert('Se enviaron correctamente sus datos de contacto.');
                  </script>";
        }
    }

    public function FAQ() {
        session_start();
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }
        
        require_once 'vista/seccion/s.FAQ.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }

    public function Login() {
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }

        require_once 'vista/modulos/m.Login.php';
        
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }

    public function Registro() {
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }
        
        require_once 'vista/modulos/m.Registro.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }

    public function CrearRegistro() {
        $alm = new Usuario();

        $alm->nombre = $_REQUEST['nombre'];
        $alm->correo = $_REQUEST['correo'];
        $alm->contraseña = $_REQUEST['contrasena'];
        $alm->id_acceso = 2;

        $this->model->Registrar($alm);

        header('Location: index.php?c=Usuario&a=Login');
    }

    public function CargarLogin() {
        $alm = new Usuario();
        $alm->correo = $_REQUEST['correo'];
        $alm->contraseña = $_REQUEST['contrasena'];

        $respuesta = $alm->loginModel($alm);
        //echo '<script type="text/javascript">alert("' . $respuesta['correo'] . '")</script>';

        if ($respuesta['correo'] == $_POST['correo'] && $respuesta['contraseña'] == $_POST['contrasena']) {
            session_start();
            $_SESSION['validar'] = true;
            $_SESSION['id'] = $respuesta['id'];
            $_SESSION['nombre'] = $respuesta['nombre'];
            $_SESSION['correo'] = $respuesta['correo'];
            $_SESSION['contraseña'] = $respuesta['contraseña'];
            $_SESSION['id_acceso'] = $respuesta['id_acceso'];
            header('location:index.php');
        } else {
            header('location:index.php?c=Usuario&a=Login');
        }
    }

    public function CerrarSession() {
       //require_once 'vista/seccion/s.DestruirSession.php';
        session_start();
        session_destroy();
        header('Location: index.php');
    }

}
