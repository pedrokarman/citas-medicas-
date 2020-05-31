<?php

class errorController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct("error");
    }

    public function access($codigo) {
        $this->_view->title = 'Error';
        $this->_view->mensaje = $this->_getError($codigo);
        $this->_view->renderizar('error', 'citas',true);
    }

    private function _getError($codigo = false) {
        if ($codigo) {
            $codigo = $this->filtrarInt($codigo);
            if (is_int($codigo))
                $codigo = $codigo;
        }else {
            $codigo = 'default';
        }

        $error['default'] = 'Ha ocurrido un error y la pagina no puede mostrarse';
        $error['5050'] = 'Acceso Restringido';
        $error['8080'] = 'Tiempo de la session agotado';
        $error['404'] = 'Pagina no encontrada';
        if (array_key_exists($codigo, $error)) {
            $arreglo['mensaje'] = $error[$codigo];
            $arreglo['codigo'] = $codigo;
            return $arreglo;
        } else {
            $arreglo['mensaje'] = $error['default'];
            $arreglo['codigo'] = 'default';
            return $arreglo;
        }
    }

}
