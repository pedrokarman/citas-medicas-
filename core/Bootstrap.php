<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author CesarAugusto
 */
class Bootstrap {

    public static function run(Request $peticion) {
        $nombrecontrolador = $peticion->getControlador() . 'Controller';
        $rutacontrolador = ROOT . $peticion->getControlador() . DS . $nombrecontrolador . '.php';
        $metodo = $peticion->getMetodo();
        $arg = $peticion->getArgs();
        if (is_readable($rutacontrolador)) {
            require_once $rutacontrolador;
            $controller = new $nombrecontrolador;
            if (is_callable(array($nombrecontrolador, $metodo))) {
                $metodo = $peticion->getMetodo();
            } else {
                $metodo = DEFAULT_METHOD;
            }

            if (isset($arg)) {
                call_user_func_array(array($controller, $metodo), $arg);
            } else {
                call_user_func(array($controller, $metodo));
            }
        } else {
            header('location:' . RUTA_URL . 'error/access/404');
            exit();
        }
    }

}
