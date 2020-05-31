<?php

class medicosController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct("medicos");
    }

    public function setdatoscita() {
        $data = $this->loadModel('medicos');
        $sql = $data->guardardatoscita();
        if ($sql) {
            Session::set('mensaje', 'Datos guardado exitosamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('medicos/citasasignadas');
    }

    

    public function ingresardatospaciente() {
        $data = $this->loadModel('medicos');
        $this->_view->codigo = $_POST['id'];
        $this->_view->datos = $data->datoscita();
        $this->_view->renderizar('datospaciente', 'blank');
    }

    public function citasasignadas() {
        Session::acceso('Medico');
        $data = $this->loadModel('medicos');
        $this->_view->citas = $data->listarcitas();
        $this->_view->title = "Administracion - Citas";
        $this->_view->modulo = "Citas";
        $this->_view->metodo = "Citas asignadas";
        $this->_view->renderizar('portalcitas', 'citas');
    }

}
