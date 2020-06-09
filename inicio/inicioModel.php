<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicioModel
 *
 * @author RUBEN DARIO
 */
class inicioModel extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function loginsql() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT roles.rlesId, roles.rlesNombreRol, roles.rlesTipo FROM roles "
                    . "WHERE roles.rlesUsuario='" . $_POST['txtUsuario'] . "' AND roles.rlesPassword='" . Hash::getHash('sha1', $_POST['txtPassword'], HASH_KEY) . "' AND roles.rlesEstado='A'");
            $res = $sql->fetchall();
            if (count($res) > 0) {
                Session::set('autenticado', true);
                Session::set('level', $res[0]['rlesTipo']);
                Session::set('usuario', $res[0]['rlesNombreRol']);
                Session::set('tiempo', time());
            }
        } else {
            return 0;
        }
    }

    function loginmedicos() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT doctores.docId, doctores.docNombre, doctores.docApellido FROM doctores WHERE "
                    . "doctores.docUsuario='" . $_POST['txtUsuario'] . "' AND doctores.docPassword='" . Hash::getHash('sha1', $_POST['txtPassword'], HASH_KEY) . "' AND doctores.docEstado='A'");
            $res = $sql->fetchall();
            if (count($res) > 0) {
                Session::set('autenticado', true);
                Session::set('level', 'Medico');
                Session::set('usuario', ucwords(strtolower($res[0]['docNombre'] . ' ' . $res[0]['docApellido'])));
                Session::set('tiempo', time());
                Session::set('codigo', $res[0]['docId']);
            }
        } else {
            
        }
    }

    function loginusuarios() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT usuarios.uiosId, usuarios.uiosEmailFK, usuarios.uiosNombres FROM usuarios "
                    . "WHERE usuarios.uiosEmailFK='" . $_POST['txtUsuario'] . "' AND usuarios.uiosPassword='" . Hash::getHash('sha1', $_POST['txtPassword'], HASH_KEY) . "'");
            $res = $sql->fetchall();
            if (count($res) > 0) {
                Session::set('autenticado', true);
                Session::set('level', 'Usuario');
                Session::set('usuario', ucwords(strtolower($res[0]['uiosNombres'])));
                Session::set('tiempo', time());
                Session::set('email', $res[0]['uiosEmailFK']);
                Session::set('codigo', $res[0]['uiosId']);
            }
        } else {
            return 0;
        }
    }

    function setregistro() {
        if ($_POST) {
            $nombre = $_POST['txtNombre'] . ' ' . $_POST['txtApellido'];
            $sql = $this->_db->exec("INSERT INTO  usuarios(uiosEmailFK, uiosNombres, uiosTelefono, uiosDocumento, uiosPassword, uiosFechaEspecial) "
                    . "VALUES ('" . $_POST['txtCorreo'] . "','" . $nombre . "','" . $_POST['txtTelefono'] . "','" . $_POST['txtDocumento'] . "','" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "','" . $_POST['txtFecha'] . "')");
            return $sql;
        } else {
            return 0;
        }
    }

    function validausuario() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT * FROM usuarios "
                    . "WHERE usuarios.uiosEmailFK='" . $_POST['txtCorreo'] . "' OR usuarios.uiosDocumento='" . $_POST['txtDocumento'] . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

}
