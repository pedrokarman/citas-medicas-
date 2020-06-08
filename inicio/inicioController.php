<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicioController
 *
 * @author RUBEN DARIO
 */
class inicioController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct("inicio");
    }

    public function setregistro() {
        $data = $this->loadModel('inicio');
        $res = $data->validausuario();
        if (count($res) > 0) {
            Session::set('mensaje', 'Ya existe un usuario con estas caracteristicas');
            Session::set('tipomensaje', 'alert-danger');
        } else {
            $sql = $data->setregistro();
            if ($sql) {
                Session::set('mensaje', 'Registro exitoso');
                Session::set('tipomensaje', 'alert-success');
            } else {
                Session::set('mensaje', 'Error en el proceso');
                Session::set('tipomensaje', 'alert-danger');
            }
        }
        $this->redireccionar('inicio/registro');
    }

    public function registro() {
        $this->_view->title = 'CitasApp - Registro';
        $this->_view->renderizar('registro', 'citas');
    }

    public function index() {
        if (Session::get('autenticado')) {
            $this->redireccionar('administracion/citas');
        } else {
            $this->_view->title = 'CitasApp - Login';
            $this->_view->renderizar('inicio', 'citas');
        }
    }

    public function setlogin() {
        $data = $this->loadModel('inicio');
        $sql = $data->loginsql();
        if (Session::get('autenticado')) {
            if (isset($_POST['txtRecordarme'])) {
                $dominio = $_SERVER["HTTP_HOST"];
                setcookie("user", $_POST['txtUsuario'], time() + 3600, "/", $dominio);
                setcookie("pass", $_POST['txtPassword'], time() + 3600, "/", $dominio);
            } else {
                setcookie("user", "", time() - 3600, "/");
                setcookie("pass", "", time() - 3600, "/");
            }
            Session::set('mensaje', 'Bienvenido ' . Session::get('usuario'));
            Session::set('tipomensaje', 'alert-success');
            $this->redireccionar('administracion/citas');
        } else {
            $usuario = $data->loginusuarios();
            if (Session::get('autenticado')) {
                if (isset($_POST['txtRecordarme'])) {
                    $dominio = $_SERVER["HTTP_HOST"];
                    setcookie("user", $_POST['txtUsuario'], time() + 3600, "/", $dominio);
                    setcookie("pass", $_POST['txtPassword'], time() + 3600, "/", $dominio);
                } else {
                    setcookie("user", "", time() - 3600, "/");
                    setcookie("pass", "", time() - 3600, "/");
                }
                Session::set('mensaje', 'Bienvenido ' . Session::get('usuario'));
                Session::set('tipomensaje', 'alert-success');
                $this->redireccionar('usuario/newcita');
            } else {
                $medicos = $data->loginmedicos();
                if (Session::get('autenticado')) {
                    if (isset($_POST['txtRecordarme'])) {
                        $dominio = $_SERVER["HTTP_HOST"];
                        setcookie("user", $_POST['txtUsuario'], time() + 3600, "/", $dominio);
                        setcookie("pass", $_POST['txtPassword'], time() + 3600, "/", $dominio);
                    } else {
                        setcookie("user", "", time() - 3600, "/");
                        setcookie("pass", "", time() - 3600, "/");
                    }
                    Session::set('mensaje', 'Bienvenido ' . Session::get('usuario'));
                    Session::set('tipomensaje', 'alert-success');
                    $this->redireccionar('medicos/citasasignadas');
                } else {
                    Session::set('mensaje', 'Error verifique sus datos');
                    Session::set('tipomensaje', 'alert-danger');
                    $this->redireccionar();
                }
            }
        }
    }

    public function cerrarsesion() {
        Session::destroy();
        $this->redireccionar();
    }

}
