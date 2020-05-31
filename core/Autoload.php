<?php

function autoloadCore($class) {
    if (file_exists(ROOT . 'core/' . $class . '.php')) {
        require_once ROOT . 'core/' . $class . '.php';
    }
}

spl_autoload_register('autoloadCore');
