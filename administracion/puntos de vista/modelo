<?php

class administracionModel extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function vercertificados() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT certificados.cerNombre FROM certificados WHERE certificados.cerMedico='" . $_POST['id'] . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function estadocitas() {
        if ($_POST) {
            $array = array();
            $estado = array("Pendiente", "Programada", "Cancelada", "Atendida");
            for ($i = 0; $i < count($estado); $i++) {
                $e = array();
                $e['estado'] = $estado[$i];
                $sql = $this->_db->query("SELECT COUNT(citas.ctasId) as cant FROM citas "
                        . "WHERE citas.ctasEstado='" . $estado[$i] . "' AND citas.ctasFecha BETWEEN '" . $_POST['fechai'] . "' AND '" . $_POST['fechaf'] . "' GROUP BY citas.ctasEstado");
                $res = $sql->fetchall();
                if (count($res) > 0) {
                    $e['cantidad'] = $res[0]['cant'];
                } else {
                    $e['cantidad'] = 0;
                }
                array_push($array, $e);
            }
            return $array;
        } else {
            
        }
    }

    function listarcitasusuariosreporte() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, citas.ctasFecha, citas.ctasHora, citas.ctasEstado FROM citas "
                    . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                    . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId "
                    . "WHERE citas.ctasFecha BETWEEN '" . $_POST['fechai'] . "' AND '" . $_POST['fechaf'] . "' ORDER BY citas.ctasId DESC");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function setrol() {
        if ($_POST) {
            if (!empty($_POST['confirmPassword'])) {
                $sql = $this->_db->exec("INSERT INTO roles(rlesId,rlesNombreRol, rlesUsuario, rlesPassword, rlesTipo, rlesEstado) VALUES ('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtUsuario'] . "','" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "','" . $_POST['txtRol'] . "','" . $_POST['txtEstado'] . "') ON DUPLICATE KEY UPDATE rlesNombreRol='" . $_POST['txtNombre'] . "', rlesUsuario='" . $_POST['txtUsuario'] . "', rlesPassword='" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "', rlesTipo='" . $_POST['txtRol'] . "', rlesEstado='" . $_POST['txtEstado'] . "'");
            } else {
                $sql = $this->_db->exec("INSERT INTO roles(rlesId,rlesNombreRol, rlesUsuario, rlesPassword, rlesTipo, rlesEstado) VALUES ('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtUsuario'] . "','" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "','" . $_POST['txtRol'] . "','" . $_POST['txtEstado'] . "') ON DUPLICATE KEY UPDATE rlesNombreRol='" . $_POST['txtNombre'] . "', rlesUsuario='" . $_POST['txtUsuario'] . "', rlesTipo='" . $_POST['txtRol'] . "', rlesEstado='" . $_POST['txtEstado'] . "'");
            }
            return $sql;
        } else {
            return 0;
        }
    }

    function onerol() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT roles.rlesId, roles.rlesNombreRol, roles.rlesUsuario, roles.rlesPassword, roles.rlesTipo, roles.rlesEstado FROM roles WHERE roles.rlesId='" . $_POST['id'] . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function roles() {
        $sql = $this->_db->query("SELECT roles.rlesId, roles.rlesNombreRol, roles.rlesTipo FROM roles");
        return $sql->fetchall();
    }

    function cancelarcita() {
        if ($_POST) {
            $cancelprogramado = $this->_db->exec("UPDATE programado SET programado.pdoEstado='C' WHERE programado.pdoIdCita='" . $_POST['txtCodigo'] . "'");
            $sql = $this->_db->exec("UPDATE citas SET citas.ctasEstado='Cancelada' WHERE citas.ctasId='" . $_POST['txtCodigo'] . "'");
            return $sql;
        } else {
            return 0;
        }
    }

    function usuarioscitas() {
        $sql = $this->_db->query("SELECT usuarios.uiosEmailFK, usuarios.uiosNombres FROM usuarios INNER JOIN citas ON usuarios.uiosEmailFK=citas.ctasEmailFK GROUP BY usuarios.uiosEmailFK ORDER BY usuarios.uiosNombres");
        return $sql->fetchall();
    }

    function listausuarios() {
        $sql = $this->_db->query("SELECT usuarios.uiosId, usuarios.uiosEmailFK, usuarios.uiosNombres, usuarios.uiosTelefono, usuarios.uiosDocumento, usuarios.uiosFechaEspecial FROM usuarios ORDER BY usuarios.uiosNombres");
        return $sql->fetchall();
    }

    function onetoken() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT usuarios.uiosIdPhone FROM usuarios INNER JOIN citas ON usuarios.uiosEmailFK=citas.ctasEmailFK WHERE citas.ctasId='" . $_POST['txtCodigo'] . "'");
            $res = $sql->fetchall();
            $token[] = $res[0]['uiosIdPhone'];
            return $token;
        } else {
            return 0;
        }
    }

    function guardarProgramacion() {
        if ($_POST) {
            $ok = false;
            date_default_timezone_set('America/Bogota');
            $fechaActual = date('Y-m-d');
            $horaActual = date('H:i:s');
            $fechaCita = $_POST['txtFecha'];
            $horaCita = $_POST['txtHora'];
            $fechaActualM = strtotime($fechaActual);
            $fechaCitaM = strtotime($fechaCita);
            $horaActualM = strtotime($horaActual);
            $horaCitaM = strtotime($horaCita);
            if ($fechaCitaM < $fechaActualM) {
                $e['mensaje'] = 'La fecha de la cita no puede ser menor ala fecha actual';
                $e['response'] = 'Error';
            } else if ($fechaCitaM == $fechaActualM) {
                if ($horaCitaM < $horaActualM) {
                    $e['mensaje'] = 'La hora de la cita no puede ser menor ala hora actual';
                    $e['response'] = 'Error';
                } else {
                    $horaCita = strtotime($horaCita);
                    $horaCitaHora = strtotime('+ 1 hours', $horaCita);
                    $horaCitaHora = date('H:i:s', $horaCitaHora);
                    $horaCita = date('H:i:s', $horaCita);
                    $query = $this->_db->query("SELECT * FROM programado "
                            . "WHERE programado.pdoFecha='" . $fechaCita . "' "
                            . "AND TIME(programado.pdoHora) BETWEEN '" . $horaCita . "' AND '" . $horaCitaHora . "' "
                            . "AND programado.pdoEstado='A' AND programado.pdoDoctor='" . $_POST['txtMedico'] . "'");
                    $res = $query->fetchall();
                    if (count($res) <= 0) {
                        $ok = true;
                    } else {
                        $e['mensaje'] = 'Ya existe una cita con las mismas caracteristicas';
                        $e['response'] = 'Error';
                    }
                }
            } else if ($fechaCitaM > $fechaActualM) {
                $horaCita = strtotime($horaCita);
                $horaCitaHora = strtotime('+ 1 hours', $horaCita);
                $horaCitaHora = date('H:i:s', $horaCitaHora);
                $horaCita = date('H:i:s', $horaCita);
                $query = $this->_db->query("SELECT * FROM programado "
                        . "WHERE programado.pdoFecha='" . $fechaCita . "' "
                        . "AND TIME(programado.pdoHora) BETWEEN '" . $horaCita . "' AND '" . $horaCitaHora . "' "
                        . "AND programado.pdoEstado='A' AND programado.pdoDoctor='" . $_POST['txtMedico'] . "'");
                $res = $query->fetchall();
                if (count($res) <= 0) {
                    $ok = true;
                } else {
                    $e['mensaje'] = 'Ya existe una cita con las mismas caracteristicas ' . $horaCita . '-' . $horaCitaHora;
                    $e['response'] = 'Error';
                }
            }
            if ($ok) {
                $cita = $this->_db->exec("UPDATE citas SET citas.ctasEstado='Programada' WHERE citas.ctasId='" . $_POST['txtCodigo'] . "'");
                $sql = $this->_db->exec("INSERT INTO programado(pdoId, pdoIdCita, pdoFecha, pdoHora, pdoDoctor, pdoSede, pdoEstado) "
                        . "VALUES ('" . $_POST['txtCodigoProgramacion'] . "','" . $_POST['txtCodigo'] . "','" . $_POST['txtFecha'] . "','" . $_POST['txtHora'] . "','" . $_POST['txtMedico'] . "','" . $_POST['txtSede'] . "','A') "
                        . "ON DUPLICATE KEY UPDATE pdoFecha='" . $_POST['txtFecha'] . "', pdoHora='" . $_POST['txtHora'] . "', pdoDoctor='" . $_POST['txtMedico'] . "', pdoSede='" . $_POST['txtSede'] . "'");
                if ($sql) {
                    $e['mensaje'] = 'Cita programada exitosamente, próximamente sera aceptada.';
                    $e['response'] = 'Success';
                } else {
                    $e['mensaje'] = 'Ha ocurrido un error al programar la cita';
                    $e['response'] = 'Error';
                }
            }
            return $e;
        } else {
            return 0;
        }
    }

    function listardoctores($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("SELECT doctores.docId, doctores.docNombre, doctores.docApellido FROM doctores WHERE doctores.docEstado='A' AND doctores.docEspecialidad='" . $arg . "' ORDER BY doctores.docNombre");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function bajasedes($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("UPDATE sedes SET sedes.sedeEstado='I' WHERE sedes.sedeId='" . $arg . "'");
            return $sql;
        } else {
            return 0;
        }
    }

    function pqrsf() {
        $query = "SELECT usuarios.uiosNombres, pqrsf.psfCorreo, pqrsf.psfId, usuarios.uiosTelefono, pqrsf.psfTipo, pqrsf.psfDescripcion, pqrsf.psfFecha FROM pqrsf INNER JOIN usuarios ON pqrsf.psfCorreo=usuarios.uiosEmailFK";
        $sql = $this->getQuery($query);
        return $sql;
    }

    function bajasede($arg = false) {
        if ($arg) {
            $query = "UPDATE especialidad SET especialidad.espEstado='I' WHERE especialidad.espId='" . $arg . "'";
            $sql = $this->getExec($query);
            return $sql;
        } else {
            return 0;
        }
    }

    function setsede() {
        if ($_POST) {
            $sql = $this->_db->exec("INSERT INTO sedes(sedeId, sedeNombre, sedeDireccion, sedeEstado) VALUES "
                    . "('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtDireccion'] . "','A') "
                    . "ON DUPLICATE KEY UPDATE sedeNombre='" . $_POST['txtNombre'] . "', sedeDireccion='" . $_POST['txtDireccion'] . "'");
            return $sql;
        } else {
            return 0;
        }
    }

    function onesedes($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("SELECT sedes.sedeId, sedes.sedeNombre, sedes.sedeDireccion FROM sedes WHERE sedes.sedeId='" . $arg . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function listasedes() {
        $sql = $this->_db->query("SELECT sedes.sedeId, sedes.sedeNombre, sedes.sedeDireccion FROM sedes WHERE sedes.sedeEstado='A' ORDER BY sedes.sedeNombre");
        return $sql->fetchall();
    }

    function bajamedico($arg = false) {
        if ($arg) {
            $sql = $this->_db->exec("UPDATE doctores SET doctores.docEstado='I' WHERE doctores.docId='" . $arg . "'");
            return $sql;
        } else {
            return 0;
        }
    }

    function setmedico() {
        if ($_POST) {
            if (!empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
                $sql = $this->_db->exec("INSERT INTO doctores(docId, docNombre, docApellido, docDireccion, docTelefono, docEspecialidad, docEstado, docUsuario, docPassword) "
                        . "VALUES ('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtApellido'] . "','" . $_POST['txtDireccion'] . "','" . $_POST['txtTelefono'] . "','" . $_POST['txtEspecialidad'] . "','A','" . $_POST['txtUsuario'] . "','" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "') "
                        . "ON DUPLICATE KEY UPDATE docNombre='" . $_POST['txtNombre'] . "', docApellido='" . $_POST['txtApellido'] . "', docDireccion='" . $_POST['txtDireccion'] . "', docTelefono='" . $_POST['txtTelefono'] . "', docEspecialidad='" . $_POST['txtEspecialidad'] . "', docUsuario='" . $_POST['txtUsuario'] . "', docPassword='" . Hash::getHash('sha1', $_POST['confirmPassword'], HASH_KEY) . "'");
            } else {
                $sql = $this->_db->exec("INSERT INTO doctores(docId, docNombre, docApellido, docDireccion, docTelefono, docEspecialidad, docEstado, docUsuario) "
                        . "VALUES ('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtApellido'] . "','" . $_POST['txtDireccion'] . "','" . $_POST['txtTelefono'] . "','" . $_POST['txtEspecialidad'] . "','A','" . $_POST['txtUsuario'] . "') "
                        . "ON DUPLICATE KEY UPDATE docNombre='" . $_POST['txtNombre'] . "', docApellido='" . $_POST['txtApellido'] . "', docDireccion='" . $_POST['txtDireccion'] . "', docTelefono='" . $_POST['txtTelefono'] . "', docEspecialidad='" . $_POST['txtEspecialidad'] . "', docUsuario='" . $_POST['txtUsuario'] . "'");
            }
            $id = $this->_db->lastInsertId();
            if(isset($_FILES['txtCertificado'])){
            for ($i = 0; $i < count($_FILES['txtCertificado']['name']); $i++) {
                if ($_FILES['txtCertificado']['error'][$i] != 4) {
                    $nombrearchivo = htmlentities($_FILES['txtCertificado']['name'][$i]);
                    $res = $this->_db->exec("INSERT INTO certificados(cerNombre, cerMedico, cerEstado) "
                            . "VALUES ('" . $nombrearchivo . "','" . $id . "','A')");
                }
            }
            }
            return $sql;
        } else {
            return 0;
        }
    }

    function onemedico($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("SELECT doctores.docId, doctores.docNombre, doctores.docApellido, doctores.docDireccion, doctores.docTelefono, doctores.docEspecialidad, doctores.docUsuario FROM doctores "
                    . "WHERE doctores.docId='" . $arg . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function listadoctores() {
        $sql = $this->_db->query("SELECT doctores.docId, doctores.docNombre, doctores.docApellido, doctores.docDireccion, doctores.docTelefono, especialidad.espNombre FROM doctores "
                . "INNER JOIN especialidad ON doctores.docEspecialidad=especialidad.espId "
                . "WHERE doctores.docEstado='A' ORDER BY doctores.docNombre");
        return $sql->fetchall();
    }

    function onedoctor($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("SELECT doctores.docId, doctores.docNombre, doctores.docApellido FROM doctores WHERE doctores.docId='" . $arg . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function listarprogramado($arg = false) {
        if ($arg) {
            $sql = $this->_db->query("SELECT programado.pdoId, programado.pdoFecha, programado.pdoHora, programado.pdoSede, programado.pdoIdCita, programado.pdoDoctor, especialidad.espId, citas.ctasEstado FROM programado "
                    . "INNER JOIN doctores ON programado.pdoDoctor=doctores.docId "
                    . "INNER JOIN especialidad ON doctores.docEspecialidad=especialidad.espId INNER JOIN citas ON programado.pdoIdCita=citas.ctasId "
                    . "WHERE programado.pdoIdCita='" . $arg . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function listarsedes() {
        $sql = $this->_db->query("SELECT sedes.sedeId, sedes.sedeNombre FROM sedes WHERE sedes.sedeEstado='A' ORDER BY sedes.sedeNombre");
        return $sql->fetchall();
    }

    function listarespecialidades() {
        $query = "SELECT especialidad.espId, especialidad.espNombre, especialidad.espDescripcion FROM especialidad WHERE especialidad.espEstado='A' ORDER BY especialidad.espNombre";
        $sql = $this->getQuery($query);
        return $sql;
    }

    function setespecialidad() {
        if ($_POST) {
            $query = "INSERT INTO especialidad (espId,espNombre,espDescripcion, espEstado) "
                    . "VALUES ('" . $_POST['txtCodigo'] . "','" . $_POST['txtNombre'] . "','" . $_POST['txtDescripcion'] . "','A') "
                    . "ON DUPLICATE KEY UPDATE espNombre='" . $_POST['txtNombre'] . "', espDescripcion='" . $_POST['txtDescripcion'] . "'";
            $sql = $this->getExec($query);
            return $sql;
        } else {
            return 0;
        }
    }

    function oneespecialidad($arg = false) {
        if ($arg) {
            $query = "SELECT especialidad.espId, especialidad.espNombre, especialidad.espDescripcion FROM especialidad "
                    . "WHERE especialidad.espId='" . $arg . "'";
            $sql = $this->getQuery($query);
            return $sql;
        } else {
            return 0;
        }
    }

    function listarcitas() {
        date_default_timezone_set('America/Bogota');
        $fechaActual = date('Y-m-d');
        $sql = $this->_db->query("SELECT citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, citas.ctasFecha, citas.ctasHora, citas.ctasEstado FROM citas "
                . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId ORDER BY citas.ctasId DESC");
        return $sql->fetchall();
    }

    function filtracitas() {
        if ($_POST) {
            date_default_timezone_set('America/Bogota');
            $fechaActual = date('Y-m-d');
            if ((isset($_POST["q"]) && isset($_POST["pacient_id"]) && isset($_POST["medic_id"]) && isset($_POST["date_at"])) && ($_POST["q"] != "" || $_POST["pacient_id"] != "" || $_POST["medic_id"] != "" || $_POST["date_at"] != "")) {
                $sql = "SELECT citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, citas.ctasFecha, citas.ctasHora, citas.ctasEstado FROM citas "
                        . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                        . "LEFT JOIN programado ON citas.ctasId=programado.pdoIdCita "
                        . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId WHERE ";
                if (!empty($_POST['q'])) {
                    $sql.="citas.ctasObservaciones LIKE '%" . $_POST['q'] . "%' ";
                    //$sql = $this->_db->query('  ORDER BY citas.ctasId DESC");
                }
                if (!empty($_POST['pacient_id'])) {
                    if (!empty($_POST['q'])) {
                        $sql.="AND ";
                    }
                    $sql.="citas.ctasEmailFK='" . $_POST['pacient_id'] . "' ";
                }
                if (!empty($_POST['medic_id'])) {
                    if (!empty($_POST['q']) || !empty($_POST['pacient_id'])) {
                        $sql.="AND ";
                    }
                    $sql.="programado.pdoDoctor='" . $_POST['medic_id'] . "'";
                }
                if (!empty($_POST["date_at"])) {
                    if (!empty($_POST['q']) || !empty($_POST['pacient_id']) || !empty($_POST['medic_id'])) {
                        $sql .= "AND ";
                    }

                    $sql .= "citas.ctasFecha='" . $_POST['date_at'] . "' ";
                }
                $sql.="ORDER BY citas.ctasId DESC";
            } else {
                $sql = "SELECT citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, citas.ctasFecha, citas.ctasHora, citas.ctasEstado FROM citas "
                        . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK LEFT JOIN programado ON citas.ctasId=programado.pdoIdCita "
                        . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId "
                        . "ORDER BY citas.ctasId DESC";
            }
            $res = $this->_db->query($sql);
            return $res->fetchall();
        } else {
            return 0;
        }
    }

}
