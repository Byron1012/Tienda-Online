<?php

require_once 'modelo/juego.php';

class JuegoControlador {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Juego();
    }

    public function CargarCatalogo() {
        session_start();
        require_once 'vista/seccion/s.librerias.php';

        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso'] == 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }

        require_once 'vista/modulos/m.Catalogo_Juego.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
        if (@$_REQUEST['Facturar'] == 1) {
            echo "<script type='text/javascript'>
                        alert('Compra realizada con exito.');
                  </script>";
        }
        
        if (@$_REQUEST['AgregarCarrito'] == 1) {
            echo "<script type='text/javascript'>
                        alert('Se agrego correctamente el juego al carrito.');
                  </script>";
        }
        
        /*if (@$_REQUEST['Contactos'] == 1) {
            echo "<script type='text/javascript'>
                        alert('Se enviaron correctamente sus datos de contacto.');
                  </script>";
        }*/
        
    }

    public function DetalleJuego() {
        session_start();
        $alm = new Juego();

        $alm = $this->model->Obtener($_REQUEST['id']);
        require_once 'vista/seccion/s.librerias.php';

        if (@$_SESSION['id_acceso'] == 1) {
            require_once 'vista/seccion/s.Menu_Administrador.php';
        } else if (@$_SESSION['id_acceso'] == 2) {
            require_once 'vista/seccion/s.Menu_Usuario.php';
        } else {
            require_once 'vista/seccion/s.Menu_Normal.php';
        }

        require_once 'vista/modulos/m.Detalle_Juego.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }

    public function Inventario() {
        session_start();
        $alm = new Juego();
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

        require_once 'vista/modulos/m.Inventario.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';

        //if ($_REQUEST['Activar'] == 1) {
          //  echo "<script type='text/javascript'>
            //            alert('Ya existe una imagen con el mismo nombre los datos no se pudieron guardar, ingrese con otro nombre la imagen.');
              //    </script>";
        //}
    }

    public function Ingreso_Juego() {
        session_start();
        $alm = new Juego();
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

        require_once 'vista/modulos/m.Ingreso_Juego.php';
        require_once 'vista/seccion/s.ModalCerrarSession.php';
        require_once 'vista/seccion/s.footer.php';
        require_once 'vista/seccion/s.javascript.php';
    }

    public function CrearRegistroJuego() {
        $alm = new Juego();
        //echo'<script type="text/javascript">alert("Tarea Guardada'+$archivo+'");</script>';
        /*  if (file_exists($_REQUEST['url'])&&($_FILES["imagen"]["error"] > 0)){
          //unlink($archivo);
          $alm->url = $_REQUEST['url'];
          }else{ */
        //echo $_REQUEST['url'];

        $alm->url = $_REQUEST['url'];

        $url = 'assets/img/';
        $archivo = $url . $_FILES["imagen"]["name"];
        if ((strlen($alm->url) > 0) && ($_FILES['imagen']['size'] > 0)) { //existen las 2 imagenes
            //echo "Contiene la imagen original y la nueva";
            if (!file_exists($archivo)) {
                //echo "imagen no existe";
                $alm->id = $_REQUEST['id'];
                unlink($_REQUEST['url']);

                if ($_FILES["imagen"]["error"] > 0) {
                    //echo "Error al cargar archivo";
                } else {

                    $permitidos = array("image/gif", "image/png", "application/pdf", "image/jpg", "image/jpeg");
                    $limite_kb = 400000;

                    if (in_array($_FILES["imagen"]["type"], $permitidos) && $_FILES["imagen"]["size"] <= $limite_kb * 1024) {

                        $url = 'assets/img/';
                        $archivo = $url . $_FILES["imagen"]["name"];
                        if (!file_exists($url)) {
                            mkdir($url);
                        }

                        if (!file_exists($archivo)) {

                            $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo); //sube imagen

                            if ($resultado) {
                                if ((!empty($_REQUEST['url'])) && ($_FILES['imagen']['size'] > 0)) {
                                    unlink($_REQUEST['url']);
                                }
                                $alm->url = $archivo;
                                echo $archivo . "Archivo Guardado";
                                $alm->id = $_REQUEST['id'];
                                $alm->nombre = $_REQUEST['nombre'];
                                $alm->cantidad = $_REQUEST['cantidad'];
                                $alm->descuento = $_REQUEST['descuento'];
                                $alm->precio = $_REQUEST['precio'];
                                $alm->categoria = $_REQUEST['categoria'];
                                $alm->edicionLimitada = $_REQUEST['edicionLimitada'];
                                $alm->incluyeDLC = $_REQUEST['incluyeDLC'];
                                $alm->descripcionCorta = $_REQUEST['descripcionCorta'];
                                $alm->descripcionLarga = $_REQUEST['descripcionLarga'];
                                $this->model->Actualizar($alm);
                            } else {
                                $alm->url = $_REQUEST['url'];
                                echo "Error al guardar archivo";
                            }
                        } else {
                            echo "Archivo ya existe";
                            $alm->url = $_REQUEST['url'];
                        }
                    } else {
                        echo "Archivo no permitido o excede el tamaño";
                    }
                }
            } else {
                //echo "imagen existe";
                echo "<script type='text/javascript'>
                    window.location.href='index.php?c=Juego&a=Inventario&Activar=1';
                 </script>";
            }
        } else if ((strlen($alm->url) > 0) && ($_FILES['imagen']['size'] <= 0)) { // existe solo la primera imagen
            //echo "Contiene la imagen original";
            $alm->id = $_REQUEST['id'];
            $alm->url = $_REQUEST['url'];
            $alm->nombre = $_REQUEST['nombre'];
            $alm->cantidad = $_REQUEST['cantidad'];
            $alm->descuento = $_REQUEST['descuento'];
            $alm->precio = $_REQUEST['precio'];
            $alm->categoria = $_REQUEST['categoria'];
            $alm->edicionLimitada = $_REQUEST['edicionLimitada'];
            $alm->incluyeDLC = $_REQUEST['incluyeDLC'];
            $alm->descripcionCorta = $_REQUEST['descripcionCorta'];
            $alm->descripcionLarga = $_REQUEST['descripcionLarga'];
            $this->model->Actualizar($alm);
        } else if ((strlen($alm->url) <= 0)) { //no existe ninguna imagen
            if (!file_exists($archivo)) {
                if ($_FILES["imagen"]["error"] > 0) {
                    //echo "Error al cargar archivo";
                } else {

                    $permitidos = array("image/gif", "image/png", "application/pdf", "image/jpg", "image/jpeg");
                    $limite_kb = 400000;

                    if (in_array($_FILES["imagen"]["type"], $permitidos) && $_FILES["imagen"]["size"] <= $limite_kb * 1024) {

                        $url = 'assets/img/';
                        $archivo = $url . $_FILES["imagen"]["name"];
                        if (!file_exists($url)) {
                            mkdir($url);
                        }

                        if (!file_exists($archivo)) {

                            $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo); //sube imagen

                            if ($resultado) {
                                if ((!empty($_REQUEST['url'])) && ($_FILES['imagen']['size'] > 0)) {
                                    unlink($_REQUEST['url']);
                                }
                                $alm->url = $archivo;
                                //echo $archivo . "Archivo Guardado";
                                $alm->nombre = $_REQUEST['nombre'];
                                $alm->cantidad = $_REQUEST['cantidad'];
                                $alm->descuento = $_REQUEST['descuento'];
                                $alm->precio = $_REQUEST['precio'];
                                $alm->categoria = $_REQUEST['categoria'];
                                $alm->edicionLimitada = $_REQUEST['edicionLimitada'];
                                $alm->incluyeDLC = $_REQUEST['incluyeDLC'];
                                $alm->descripcionCorta = $_REQUEST['descripcionCorta'];
                                $alm->descripcionLarga = $_REQUEST['descripcionLarga'];
                                $this->model->Registrar($alm);
                            } else {
                                $alm->url = $_REQUEST['url'];
                                //echo "Error al guardar archivo";
                            }
                        } else {
                            //echo "Archivo ya existe";
                            $alm->url = $_REQUEST['url'];
                        }
                    } else {
                        //echo "Archivo no permitido o excede el tamaño";
                    }
                }
            } else {
                //echo "imagen existe";
                echo "<script type='text/javascript'>
                    window.location.href='index.php?c=Juego&a=Inventario&Activar=1';
                 </script>";
            }
        }
        echo "<script type='text/javascript'>
                window.location.href='index.php?c=Juego&a=Inventario';
              </script>";
    }

    public function Eliminar() {
        $alm = new Juego();
        $alm = $alm->Obtener($_REQUEST['id']);
        unlink($alm->url);
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Juego&a=Inventario');
    }

}
