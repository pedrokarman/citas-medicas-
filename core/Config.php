<?php

define('RUTA_URL', 'http://localhost/citas-medicas-/');
define('COMMON', RUTA_URL . 'public/common/');
define('BASE_URL_LIB', ROOT . 'core/library' . DS);
define('DEFAULT_CONTROLLER', 'inicio');
define('DEFAULT_METHOD', 'index');
define('DB_HOST', 'localhost:3308');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'citasapp');
define('DB_CHAR', 'utf8');
define('NAME_APP', 'CITAS APP');
define('HASH_KEY', '53bf025929f1f');
define('SESSION_TIME', 60);

$valid = "<link href='" . COMMON . "formvalidation/dist/css/bootstrapValidator.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "formvalidation/dist/js/bootstrapValidator.js'></script>"
        . "<script src='" . COMMON . "formvalidation/dist/js/language/es_CL.js'></script>";
define('LIB_VALIDATOR', $valid);

$timepicker = "<link href='" . COMMON . "timepicker/clockface.css' rel='stylesheet'>
        <link href='" . COMMON . "timepicker/calendarpicker.css' rel='stylesheet'>        
        <script src='" . COMMON . "timepicker/clockface.js'></script>
        <script src='" . COMMON . "timepicker/calendarpicker.js'></script>";
define('LIB_TIMEPICKER', $timepicker);

class Funcionesphp {

    public static function noCache() {
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

}
