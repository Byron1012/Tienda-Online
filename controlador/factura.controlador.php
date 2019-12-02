<?php

require_once 'modelo/factura.php';

class FacturaControlador {
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Factura();
    }
    
    public function Cargar_Factura() {
        session_start();
        $alm = new Factura();
        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'vista/seccion/s.librerias.php';

        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso'] == 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }

        require_once 'vista/modulos/m.Cargar_Factura.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
        /*
        if ($_REQUEST['Activar'] == 1) {
            echo "<script type='text/javascript'>
                        alert('Ya existe una imagen con el mismo nombre los datos no se pudieron guardar, ingrese con otro nombre la imagen.');
                  </script>";
        }*/
    }
}