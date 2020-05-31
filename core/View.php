<?php

class View {

    private $_cont;

    public function __construct($c) {
        $this->_cont = $c;
    }

    public function renderizar($vista, $layout, $NoLayout = false) {
        $nombrelayoyt = $layout . "Layout";
        $men1 = $this->menu();
        $_layoutParams = array(
            'ruta_img' => RUTA_URL . 'public/' . $nombrelayoyt . '/img/',
            'ruta_js' => RUTA_URL . 'public/' . $nombrelayoyt . '/js/',
            'ruta_css' => RUTA_URL . 'public/' . $nombrelayoyt . '/css/',
            'menu' => $men1
        );
        $rutaview = ROOT . $this->_cont . DS . 'views' . DS . $vista . '.phtml';
        if (is_readable($rutaview)) {
            if ($NoLayout) {
                include_once $rutaview;
                exit();
            }
            include_once ROOT . 'public' . DS . $nombrelayoyt . DS . 'header.phtml';
            include_once $rutaview;
            include_once ROOT . 'public' . DS . $nombrelayoyt . DS . 'footer.phtml';
        } else {
            throw new Exception("error en la vista");
        }
    }

    public function menu() {
        $menu = array();
        if (Session::get('autenticado') && Session::get('level') == 'General') {
            $menu = array(
                array(
                    'id' => 'Citas',
                    'titulo' => 'Citas',
                    'icono' => 'fa fa-fw fa-calendar-o',
                    'enlace' => RUTA_URL . 'administracion/citas',
                    'sub' => '',
                ),
                array(
                    'id' => 'Reportes',
                    'titulo' => 'Reportes',
                    'icono' => 'fa fa-fw fa-book',
                    'enlace' => RUTA_URL . 'administracion/reportes',
                    'sub' => '',
                ),
                array(
                    'id' => 'Medicos',
                    'titulo' => 'Medicos',
                    'icono' => 'fa fa-fw fa-user-circle',
                    'enlace' => RUTA_URL . 'administracion/medicos',
                    'sub' => '',
                ),
                array(
                    'id' => 'Sedes',
                    'titulo' => 'Sedes',
                    'icono' => 'fa fa-fw fa-building',
                    'enlace' => RUTA_URL . 'administracion/sedes',
                    'sub' => '',
                ),
                /* array(
                  'id' => 'Consultorios',
                  'titulo' => 'Consultorios',
                  'icono' => 'fa fa-fw fa-home',
                  'enlace' => RUTA_URL . 'administracion/consultorios',
                  'sub' => '',
                  ), */
                array(
                    'id' => 'Especialidades',
                    'titulo' => 'Especialidades',
                    'icono' => 'fa fa-fw fa-briefcase',
                    'enlace' => RUTA_URL . 'administracion/especialidades',
                    'sub' => '',
                ),
                array(
                    'id' => 'Usuarios',
                    'titulo' => 'Usuarios',
                    'icono' => 'fa fa-fw fa-user-o',
                    'enlace' => RUTA_URL . 'administracion/usuarios',
                    'sub' => '',
                ),
                array(
                    'id' => 'App Usuarios',
                    'titulo' => 'Administracion Usuarios',
                    'icono' => 'fa fa-fw fa-id-card',
                    'enlace' => RUTA_URL . 'administracion/appusuarios',
                    'sub' => '',
                ),
                array(
                    'id' => 'Pqrsf',
                    'titulo' => 'Pqrsf',
                    'icono' => 'fa fa-fw fa-newspaper-o',
                    'enlace' => RUTA_URL . 'administracion/pqrsf',
                    'sub' => '',
                ),
            );
        } else if (Session::get('autenticado') && Session::get('level') == 'Citas') {
            $menu = array(
                array(
                    'id' => 'Citas',
                    'titulo' => 'Citas',
                    'icono' => 'fa fa-fw fa-calendar-o',
                    'enlace' => RUTA_URL . 'administracion/citas',
                    'sub' => '',
                ),
                array(
                    'id' => 'Pqrsf',
                    'titulo' => 'Pqrsf',
                    'icono' => 'fa fa-fw fa-newspaper-o',
                    'enlace' => RUTA_URL . 'administracion/pqrsf',
                    'sub' => '',
                ),
            );
        } else if (Session::get('autenticado') && Session::get('level') == 'Usuario') {
            $menu = array(
                array(
                    'id' => 'Citas',
                    'titulo' => 'Solicitar Cita',
                    'icono' => 'fa fa-fw fa-calendar-o',
                    'enlace' => RUTA_URL . 'usuario/newcita',
                    'sub' => '',
                ),
                array(
                    'id' => 'estado',
                    'titulo' => 'Estado Cita(s)',
                    'icono' => 'fa fa-fw fa-check-square ',
                    'enlace' => RUTA_URL . 'usuario/estadocita',
                    'sub' => '',
                ),
                array(
                    'id' => 'Pqrsf',
                    'titulo' => 'Enviar Pqrsf',
                    'icono' => 'fa fa-fw fa-newspaper-o',
                    'enlace' => RUTA_URL . 'usuario/newpqrsf',
                    'sub' => '',
                ),
                array(
                    'id' => 'Cuenta',
                    'titulo' => 'Configura Cuenta',
                    'icono' => 'fa fa-fw fa-user',
                    'enlace' => RUTA_URL . 'usuario/cuenta',
                    'sub' => '',
                ),
            );
        } else if (Session::get('autenticado') && Session::get('level') == 'Medico') {
            $menu = array(
                array(
                    'id' => 'Citas',
                    'titulo' => 'Citas Asignadas',
                    'icono' => 'fa fa-fw fa-calendar-o',
                    'enlace' => RUTA_URL . 'medicos/citasasignadas',
                    'sub' => '',
                ),
            );
        }
        return $menu;
    }

}
