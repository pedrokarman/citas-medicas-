<?php

class Registry {

    //put your code here
    private static $_instancia;
    private $_data;

    private function __construct() {
        
    }

    public static function getInstancia() {
        if (!self::$_instancia instanceof self) {
            self::$_instancia = new Registry();
        }
        return self::$_instancia;
    }

    public function __set($name, $value) {
        $this->_data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        } else {
            return false;
        }
    }

}

$registry = Registry::getInstancia();
$registry->_request = new Request();
$registry->_db = new Database();
