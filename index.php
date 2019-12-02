<?php
require_once 'modelo/database.php';

if(!isset($_REQUEST['a'])){
    $controlador = 'usuario';
}
else 
{
 //$controller = 'usuario'; 
}

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])) //si c no ah sido defida cargara x.controller.php
{
    require_once "controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'Controlador';
    $controlador = new $controlador;
    $controlador->Index();    
}
else//caso contrario aca implementamos la logica de que controlador cargar y que accion apuntar
{
    // Obtenemos el controlador que queremos cargar
    $controlador = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'Controlador';
    $controlador = new $controlador;
    
    // Llama la accion
    call_user_func( array( $controlador, $accion ) );
}