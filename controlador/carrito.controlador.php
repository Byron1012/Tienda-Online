<?php

require_once 'modelo/carrito.php';
require_once 'modelo/factura.php';

class CarritoControlador {
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Carrito();
    }

    public function CargarCarrito() {
        session_start();
        //$alm = new Carrito();
        //$alm = $this->model->Obtener($_REQUEST['id']);
        //echo strlen($alm);
        require_once 'vista/seccion/s.librerias.php';
        
        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso']== 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }
        
        require_once 'vista/modulos/m.Cargar_Carrito.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }
    
    public function AgregarCarrito() {
        session_start();
        if(!$_SESSION['validar']){
            header('location:index.php?c=Usuario&a=Login');
        }
        $alm = new Carrito();
        $alm->id_usuario=$_SESSION['id'];
        $alm->id_juego=$_REQUEST['IdJuego'];
        $alm->nombre=$_REQUEST['nombre'];
        $alm->cantidad_carrito=1;
        $alm->activo=1;
        
        $this->model->Registrar($alm);
        //header('location:index.php?c=Juego&a=CargarCatalogo');
        echo "<script type='text/javascript'>
                    window.location.href='index.php?c=Juego&a=CargarCatalogo&AgregarCarrito=1';
                 </script>";
        
    }
    
    public function Eliminar() {
        $alm = new Carrito();
        //echo $_REQUEST['id'];
        //$alm = $alm->Eliminar($_REQUEST['id']);
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Carrito&a=CargarCarrito');
    }
    
    public function Facturar() {
        session_start();
        if(!$_SESSION['validar']){
            header('location:index.php?c=Usuario&a=Login');
        }
        
        $carrito = new Carrito();
        $carrito->activo=0;
        $carrito->id_usuario=$_SESSION['id'];
        $carrito->Actualizar($carrito);
      
        
        $facturar = new Factura();
        $facturar->id_usuario=$_SESSION['id'];
        $facturar->subtotal=$_REQUEST['subtotal'];
        $facturar->iva=$_REQUEST['iva'];
        $facturar->total=$_REQUEST['total'];
        $facturar->Registrar($facturar);
        /*
        echo "\n".$_SESSION['id'];
        echo "\n".$_REQUEST['subtotal'];
        echo "\n".$_REQUEST['iva'];
        echo "\n".$_REQUEST['total'];*/
        echo "<script type='text/javascript'>
                    window.location.href='index.php?c=Juego&a=CargarCatalogo&Facturar=1';
                 </script>";
        //header('location:index.php?c=Juego&a=CargarCatalogo');
    }
    
}