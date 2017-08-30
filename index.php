<?php

require_once './Modelo/db/Conexion.php';

$controlador = 'Alumno';


/*
Comentario para ejemplo de git
*/

//Opener informacion del URL
if (!isset($_REQUEST['c'])) {
    require_once "Controlador/$controllerControlador.php";
    $controlador = $controller . 'Controlador';
    $controlador = new $controlador;
    $controlador->index();
} else {
    //Obtenemos el controlador que queremos cargar
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

    // Instanciamos el controlador
    require_once "controlador/$controladorControlador.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    //LLamada al metodo
    call_user_func(array($controlador, $accion));
}

/*
Comentario para ejemplo de git Interfaz
*/