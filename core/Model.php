<?php

class Model {

    protected $_db;
    private $_registry;

    public function __construct() {
        $this->_registry = Registry::getInstancia();
        $this->_db = $this->_registry->_db;
    }

    public function getQuery($sql) {
        $res = $this->_db->query($sql);
        return $res->fetchall();
    }

    public function getExec($sql) {
        $res = $this->_db->exec($sql);
        return $res;
    }

}
