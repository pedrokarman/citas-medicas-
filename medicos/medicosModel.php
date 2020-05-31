<?php

class medicosModel extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function historiaclinica() {
        if ($_POST) {
           
            $res = $sql->fetchall();
            for ($i = 0; $i < count($res); $i++) {
                $historia = $this->_db->query("SELECT usuarios.uiosNombres, doctores.docNombre, doctores.docApellido, programado.pdoFecha, programado.pdoHora, sedes.sedeNombre, atencionpaciente.atenId, atencionpaciente.atenPresionSist, atencionpaciente.atenPresionDiast, atencionpaciente.atenPulsaciones, atencionpaciente.atenRitmoRespi, atencionpaciente.atenTemperatura, atencionpaciente.atenAltura, atencionpaciente.atenPeso, atencionpaciente.atenExploracion, atencionpaciente.atenDiagnostico, atencionpaciente.atenTratamiento FROM atencionpaciente "
                        . "INNER JOIN citas ON atencionpaciente.atenIdCita=citas.ctasId "
                        . "INNER JOIN programado ON citas.ctasId=programado.pdoIdCita "
                        . "INNER JOIN sedes ON programado.pdoSede=sedes.sedeId "
                        . "INNER JOIN doctores ON programado.pdoDoctor=doctores.docId "
                        . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                        . "WHERE citas.ctasEmailFK='" . $res[$i]['ctasEmailFK'] . "' ORDER BY pdoFecha");
                $reshistoria = $historia->fetchall();
                $array_j = array();
                for ($j = 0; $j < count($reshistoria); $j++) {
                    $e2 = array();
                    $e2['usuario'] = ucwords(strtolower($reshistoria[$j]['uiosNombres']));
                    $e2['medico'] = ucwords(strtolower($reshistoria[$j]['docNombre'] . ' ' . $reshistoria[$j]['docApellido']));
                    $e2['fecha'] = $reshistoria[$j]['pdoFecha'];
                    $e2['hora'] = $reshistoria[$j]['pdoHora'];
                    $e2['sede'] = $reshistoria[$j]['sedeNombre'];
                    $e2['sist'] = $reshistoria[$j]['atenPresionSist'];
                    $e2['diast'] = $reshistoria[$j]['atenPresionDiast'];
                    $e2['pulsaciones'] = $reshistoria[$j]['atenPulsaciones'];
                    $e2['ritmorespi'] = $reshistoria[$j]['atenRitmoRespi'];
                    $e2['temperatura'] = $reshistoria[$j]['atenTemperatura'];
                    $e2['altura'] = $reshistoria[$j]['atenAltura'];
                    $e2['peso'] = $reshistoria[$j]['atenPeso'];
                    $e2['exploracion'] = $reshistoria[$j]['atenExploracion'];
                    $e2['diagnostico'] = $reshistoria[$j]['atenDiagnostico'];
                    $e2['tratamiento'] = $reshistoria[$j]['atenTratamiento'];
                    $peso = $reshistoria[$j]['atenPeso'];
                    $altura = $reshistoria[$j]['atenAltura'];
                    $altura = $altura / 100;
                    $imc = $peso / ($altura * $altura);
                    $e2['imc'] = round($imc * 100) / 100;
                    array_push($array_j, $e2);
                }
            }
            return $array_j;
        } else {
            return 0;
        }
    }

    function guardardatoscita() {
        if ($_POST) {
            $cita = $this->_db->exec("UPDATE citas SET citas.ctasEstado='Atendida' WHERE citas.ctasId='" . $_POST['txtCodigo'] . "'");
            $sql = $this->_db->exec("INSERT INTO atencionpaciente(atenPresionSist, atenPresionDiast, atenPulsaciones, atenRitmoRespi, atenTemperatura, atenAltura, atenPeso, atenExploracion, atenDiagnostico, atenTratamiento, atenIdCita) "
                    . "VALUES ('" . $_POST['txtSist'] . "','" . $_POST['txtDiast'] . "','" . $_POST['txtPpm'] . "','" . $_POST['txtRpm'] . "','" . $_POST['txtGrados'] . "','" . $_POST['txtCms'] . "','" . $_POST['txtKgrs'] . "','" . $_POST['txtExploracion'] . "','" . $_POST['txtDiagnostico'] . "','" . $_POST['txtTratamiento'] . "','" . $_POST['txtCodigo'] . "')");
            return $sql;
        } else {
            return 0;
        }
    }

    function datoscita() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT usuarios.uiosNombres, doctores.docNombre, doctores.docApellido FROM citas "
                    . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                    . "INNER JOIN programado ON citas.ctasId=programado.pdoIdCita "
                    . "INNER JOIN doctores ON programado.pdoDoctor=doctores.docId "
                    . "WHERE citas.ctasId='" . $_POST['id'] . "'");
            return $sql->fetchall();
        } else {
            return 0;
        }
    }

    function listarcitas() {
        $sql = $this->_db->query("SELECT citas.ctasEstado, citas.ctasId, usuarios.uiosNombres, usuarios.uiosTelefono, especialidad.espNombre, citas.ctasObservaciones, programado.pdoFecha, programado.pdoHora, sedes.sedeNombre FROM programado "
                . "INNER JOIN citas ON programado.pdoIdCita=citas.ctasId "
                . "INNER JOIN usuarios ON citas.ctasEmailFK=usuarios.uiosEmailFK "
                . "INNER JOIN especialidad ON citas.ctasServicio=especialidad.espId "
                . "INNER JOIN sedes ON programado.pdoSede=sedes.sedeId "
                . "WHERE programado.pdoDoctor='" . Session::get('codigo') . "'");
        return $sql->fetchall();
    }

}
