<?php

class Controller {

    public $_view;

    public function __construct($c) {
        $this->_view = new View($c);
    }

    protected function loadModel($model) {
        $nombremodelo = $model . "Model";
        $rutamodelo = ROOT . $model . DS . $nombremodelo . '.php';
        if (is_readable($rutamodelo)) {
            require_once $rutamodelo;
            $model = new $nombremodelo;
            return $model;
        } else {
            throw new Exception("error cargando el modelo");
        }
    }

    protected function getLibrary($libreria) {
        $rutaLibreria = BASE_URL_LIB . $libreria . '.php';
        if (is_readable($rutaLibreria)) {
            require_once $rutaLibreria;
        } else {
            throw new Exception('Error de libreria');
        }
    }

    protected function loadfile($file, $destino) {
        if (isset($file)) {
            $subido = FALSE;
            if (is_uploaded_file($file['tmp_name'])) {
                copy($file['tmp_name'], $destino);
                $subido = true;
            }
        } else {
            
        }
    }

    protected function getTexto($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }

        return '';
    }

    protected function getInt($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }

        return 0;
    }

    protected function redireccionar($ruta = FALSE) {
        if ($ruta) {
            header('location:' . RUTA_URL . $ruta);
            exit();
        } else {
            header('location:' . RUTA_URL);
            exit();
        }
    }

    protected function filtrarInt($int) {
        $int = (int) $int;

        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }

    protected function getPostParam($clave) {
        if (isset($_POST[$clave])) {
            return $_POST[$clave];
        }
    }

    protected function getSql($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if (!get_magic_quotes_gpc()) {
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }
            return trim($_POST[$clave]);
        }
    }

    protected function getAlphaNum($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }

    public function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        }

        return true;
    }

}
