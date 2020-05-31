<?php

class usuarioModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function datosusuario() {
        $sql = $this->_db->query("SELECT usuarios.uiosId, usuarios.uiosEmailFK, usuarios.uiosNombres, usuarios.uiosTelefono, usuarios.uiosDocumento, usuarios.uiosFechaEspecial "
                . "FROM usuarios WHERE usuarios.uiosId='" . Session::get('codigo') . "'");
        return $sql->fetchall();
    }

    function oneprogramadocita() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT doctores.docNombre, doctores.docApellido, especialidad.espNombre, sedes.sedeNombre, sedes.sedeDireccion, programado.pdoFecha, programado.pdoHora FROM programado "
                    . "INNER JOIN doctores ON programado.pdoDoctor=doctores.docId "
                    . "INNER JOIN especialidad ON doctores.docEspecialidad=especialidad.espId "
                    . "INNER JOIN sedes ON programado.pdoSede=sedes.sedeId "
                    . "INNER JOIN citas ON programado.pdoIdCita=citas.ctasId "
                    . "WHERE citas.ctasId='" . $_POST['id'] . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function editinfousuario() {
        if ($_POST) {
            if (!empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
                $sql = $this->_db->exec("UPDATE usuarios SET usuarios.uiosEmailFK='" . $_POST['txtCorreo'] . "', usuarios.uiosNombres='" . $_POST['txtNombre'] . "', usuarios.uiosTelefono='" . $_POST['txtTelefono'] . "', usuarios.uiosDocumento='" . $_POST['txtDocumento'] . "', usuarios.uiosPassword='" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "', usuarios.uiosFechaEspecial='" . $_POST['txtFecha'] . "' "
                        . "WHERE usuarios.uiosId='" . Session::get('codigo') . "'");
            } else {
                $sql = $this->_db->exec("UPDATE usuarios SET usuarios.uiosEmailFK='" . $_POST['txtCorreo'] . "', usuarios.uiosNombres='" . $_POST['txtNombre'] . "', usuarios.uiosTelefono='" . $_POST['txtTelefono'] . "', usuarios.uiosDocumento='" . $_POST['txtDocumento'] . "', usuarios.uiosFechaEspecial='" . $_POST['txtFecha'] . "' "
                        . "WHERE usuarios.uiosId='" . Session::get('codigo') . "'");
            }
            return $sql;
        } else {
            return 0;
        }
    }

    function verificausuario() {
        if ($_POST) {
            $e = array();
            $sql = $this->_db->query("SELECT usuarios.uiosId, usuarios.uiosEmailFK, usuarios.uiosNombres, usuarios.uiosTelefono, usuarios.uiosDocumento, usuarios.uiosFechaEspecial FROM usuarios "
                    . "WHERE usuarios.uiosEmailFK='" . Session::get('email') . "' AND usuarios.uiosPassword='" . Hash::getHash('sha1', $_POST['password'], HASH_KEY) . "'");
            $res = $sql->fetchall();
            if (count($res) > 0) {
                $e['datos'] = $res;
                $e['response'] = 'Success';
            } else {
                $e['datos'] = '';
                $e['response'] = 'Error';
            }
            return $e;
        } else {
            return 0;
        }
    }

    function setpqrsf() {
        if ($_POST) {
            date_default_timezone_set('America/Bogota');
            $sql = $this->_db->exec("INSERT INTO pqrsf (psfCorreo, psfTipo, psfDescripcion, psfFecha, psfEstado) "
                    . "VALUES ('" . Session::get('email') . "','" . $_POST['cmbTipo'] . "','" . $_POST['txtMensaje'] . "','" . date('Y-m-d') . "','Recibido')");
            return $sql;
        } else {
            return 0;
        }
    }

    function listarcitasusuarios() {
        $sql = $this->_db->query("SELECT citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, citas.ctasFecha, citas.ctasHora, citas.ctasEstado FROM citas "
                . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId "
                . "WHERE citas.ctasEmailFK='" . Session::get('email') . "' ORDER BY citas.ctasId DESC");
        return $sql->fetchall();
    }

    function setcita() {
        if ($_POST) {
            date_default_timezone_set('America/Bogota');
            $sql = $this->_db->exec("INSERT INTO  citas(ctasEmailFK, ctasServicio, ctasObservaciones, ctasFecha, ctasHora, ctasEstado) "
                    . "VALUES ('" . Session::get('email') . "','" . $_POST['txtEspecialidad'] . "','" . $_POST['txtMotivo'] . "','" . date('Y-m-d') . "','" . date('H:i:s') . "','Pendiente')");
            return $sql;
        } else {
            return 0;
        }
    }

}
