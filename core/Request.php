<?php

class Request {

    private $_controlador;
    private $_metodo;
    private $_argumento;

    public function __construct() {/* ESTE CONSTRUCTOR ME PERMITE INCIALIZAR EL CODIGO CUANDO EJECUTE EL PROGRAMA */

        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url); /* SIRVE PARA METER URL EN UN ARREGLO */
            $url = array_filter($url); /* SIRVE PARA BORRAR POSICIONES VACIAS */
            $this->_controlador = strtolower(array_shift($url)); /* SIRVE PARA JALAR DATOS DE LA POSICION 1 */
            $this->_metodo = strtolower(array_shift($url)); /* COJE EL DATO DE LA SIGUIENTE POSICION */
            $this->_argumento = $url; /* COJE EL RESTO DE LA URL */
        }
        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER; /* DEFINO EL CONTROLADOR CON UN VALOR POR DEFECTO */
        }
        if (!$this->_metodo) {
            $this->_metodo = DEFAULT_METHOD; /* DEFINO EL METODO CON UN VALOR POR DEFECTO */
        }
        if (!$this->_argumento) {
            $this->_argumento = array(); /* LO DEFINE COMO UN ARREGLO VACION */
        }
    }

    public function getControlador() {
        return $this->_controlador;
    }

    public function getMetodo() {
        return $this->_metodo;
    }

    public function getArgs() {
        return $this->_argumento;
    }

}
