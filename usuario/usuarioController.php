<?php

class usuarioController extends Controller {

    public function __construct() {
        parent::__construct("usuario");
    }

    public function setinformacion() {
        $data = $this->loadModel('usuario');
        $sql = $data->editinfousuario();
        if ($sql) {
            Session::set('mensaje', 'Informacion editada correctamente');
            Session::set('tipomensaje', 'alert-success');
            $this->redireccionar('inicio/cerrarsesion');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
            $this->redireccionar('usuario/cuenta');
        }
    }

    public function formularioeditar() {
        $data = $this->loadModel('usuario');
        $this->_view->datos = $data->verificausuario();
        $this->_view->renderizar('editarinformacion', 'blank');
    }

    public function verestadocita() {
        $data = $this->loadModel('usuario');
        $this->_view->datos = $data->oneprogramadocita();
        $this->_view->renderizar('verestadocita', 'blank');
    }

    public function cuenta() {
        $this->_view->title = 'CitasApp - Cuenta';
        $this->_view->modulo = 'Cuenta';
        $this->_view->metodo = 'Configurar Cuenta';
        $this->_view->renderizar('cuenta', 'citas');
    }

    public function setnewpqrsf() {
        $data = $this->loadModel('usuario');
        $sql = $data->setpqrsf();
        if ($sql) {
            Session::set('mensaje', 'Mensaje enviado correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('usuario/newpqrsf');
    }

    public function newpqrsf() {
        $data = $this->loadModel('usuario');
        $this->_view->datos = $data->datosusuario();
        $this->_view->title = 'CitasApp - Pqrsf';
        $this->_view->modulo = 'Pqrsf';
        $this->_view->metodo = 'Nuevo Pqrsf';
        $this->_view->renderizar('newpqrsf', 'citas');
    }

    public function estadocita() {
        Session::acceso('Usuario');
        $data = $this->loadModel('usuario');
        $this->_view->title = 'CitasApp - Estado Cita(s)';
        $this->_view->modulo = 'Citas';
        $this->_view->citas = $data->listarcitasusuarios();
        $this->_view->metodo = 'Estado Cita';
        $this->_view->renderizar('estadocitas', 'citas');
    }

    public function nuevacita() {
        $data = $this->loadModel('usuario');
        $sql = $data->setcita();
        if ($sql) {
            Session::set('mensaje', 'Cita solicitada correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('usuario/newcita');
    }

    public function newcita() {
        Session::acceso('Usuario');
        $data = $this->loadModel('usuario');
        $administracion = $this->loadModel('administracion');
        $this->_view->especialidad = $administracion->listarespecialidades();
        $this->_view->title = 'CitasApp - Solicitar Cita';
        $this->_view->modulo = 'Citas';
        $this->_view->metodo = 'Solicitar Cita';
        $this->_view->datos = $data->datosusuario();
        $this->_view->renderizar('newcita', 'citas');
    }

}
