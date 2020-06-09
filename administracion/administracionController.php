<?php

class administracionController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct("administracion");
    }

    public function vercertificados() {
        $data = $this->loadModel('administracion');
        $this->_view->datos = $data->vercertificados();
        $this->_view->renderizar('vercertificados', 'blank');
    }

    public function vistaarchivos() {
        $this->_view->renderizar('certificados', 'blank');
    }

    public function generarreporte() {
        $data = $this->loadModel('administracion');
        $this->_view->citas = $data->listarcitasusuariosreporte();
        $this->_view->estado = $data->estadocitas();
        $this->_view->renderizar('genreporte', 'blank');
    }

    public function reportes() {
        Session::acceso("General");
        $this->_view->title = "Administracion - Reportes";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Reportes";
        $this->_view->renderizar('reportes', 'citas');
    }

    public function setroles() {
        $data = $this->loadModel('administracion');
        $sql = $data->setrol();
        if ($sql) {
            Session::set('mensaje', 'Operacion exitosa');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/appusuarios');
    }

    public function formularioroles() {
        $data = $this->loadModel('administracion');
        $this->_view->select = false;
        if (isset($_POST['id'])) {
            $this->_view->datos = $data->onerol();
            $this->_view->accion = 'Editar Usuarios';
            $this->_view->select = true;
        } else {
            $this->_view->datos = array();
            $this->_view->accion = 'Agregar Usuarios';
        }
        $this->_view->renderizar('formularioroles', 'blank');
    }

    public function buscarcitas() {
        $data = $this->loadModel('administracion');
        $this->_view->citas = $data->filtracitas();
        $this->_view->renderizar('cargacitas', 'blank');
    }

    public function cancelarcita() {
        $data = $this->loadModel('administracion');
        $sql = $data->cancelarcita();
        if ($sql) {
            $response['response'] = 'Success';
            $response['mensaje'] = 'Cita cancelada correctamente';
            /* $token = $data->onetoken();
              $mensaje = 'Su cita ha sido cancelada';
              $res = $this->sendnotification($token, $mensaje); */
        } else {
            $response['response'] = 'Error';
            $response['mensaje'] = 'Error al cancelar la cita';
        }
        echo json_encode($response);
    }

    public function index() {
        $this->redireccionar('error/access/404');
    }

    public function usuarios() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $this->_view->title = "Administracion - Usuarios";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Usuarios";
        $this->_view->usuarios = $data->listausuarios();
        $this->_view->renderizar('usuarios', 'citas');
    }

    public function pqrsf() {
        if (Session::get('autenticado')) {
            $data = $this->loadModel('administracion');
            $this->_view->title = "Administracion - Pqrsf";
            $this->_view->modulo = "Administracion";
            $this->_view->metodo = "Pqrsf";
            $this->_view->pqrsf = $data->pqrsf();
            $this->_view->renderizar('pqrsf', 'citas');
        } else {
            Session::acceso('');
        }
    }

    public function bajaespe($argum = false) {
        Session::acceso('General');
        $data = $this->loadModel('administracion');
        $sql = $data->bajasede($argum);
        if ($sql) {
            Session::set('mensaje', 'Registro eliminado correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/especialidades');
    }

    public function appusuarios() {
        Session::acceso('General');
        $data = $this->loadModel('administracion');
        $this->_view->title = "Administracion - Usuarios App";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Usuarios Administracion";
        $this->_view->usuarios = $data->roles();
        $this->_view->renderizar('roles', 'citas');
    }

    public function setespe() {
        Session::acceso('General');
        $data = $this->loadModel('administracion');
        $sql = $data->setespecialidad();
        if ($sql) {
            Session::set('mensaje', 'Operacion exitosas');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error en el proceso');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/especialidades');
    }

    public function formularioespe($argum = false) {
        Session::acceso('General');
        $data = $this->loadModel('administracion');
        if ($argum) {
            $this->_view->datos = $data->oneespecialidad($argum);
            $this->_view->accion = 'Editar Especialidades';
        } else {
            $this->_view->datos = array(); 
            $this->_view->accion = 'Agregar Especialidades';
        }
        $this->_view->renderizar('formularioespecialidades', 'blank');
    }

    public function especialidades() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $this->_view->title = "Administracion - Especialidades";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Especialidades";
        $this->_view->espe = $data->listarespecialidades();
        $this->_view->renderizar('especialidades', 'citas');
    }

    public function bajasedes($argum = false) {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $sql = $data->bajasedes($argum);
        if ($sql) {
            Session::set('mensaje', 'Registro eliminado correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error al eliminar el registro');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/sedes');
    }

    public function setsedes() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $sql = $data->setsede();
        if ($sql) {
            Session::set('mensaje', 'Registro eliminado correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error al eliminar el registro');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/sedes');
    }

    public function formulariosedes($argum = false) {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        if ($argum) {
            $this->_view->accion = 'Editar Sedes';
            $this->_view->datos = $data->onesedes($argum);
        } else {
            $this->_view->accion = 'Agregar Sedes';
            $this->_view->datos = array();
        }
        $this->_view->renderizar('formulariosedes', 'blank');
    }

    public function sedes() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $this->_view->title = "Administracion - Sedes";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Sedes";
        $this->_view->sedes = $data->listasedes();
        $this->_view->renderizar('sedes', 'citas');
    }

    public function bajamedicos($argum = false) {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $sql = $data->bajamedico($argum);
        if ($sql) {
            Session::set('mensaje', 'Registro eliminado correctamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error al guardar registro');
            Session::set('tipomensaje', 'alert-danger');
        }
        $this->redireccionar('administracion/medicos');
    }

    public function setmedico() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $sql = $data->setmedico();
        if ($sql) {
            Session::set('mensaje', 'Registro guardado exitosamente');
            Session::set('tipomensaje', 'alert-success');
        } else {
            Session::set('mensaje', 'Error al guardar registro');
            Session::set('tipomensaje', 'alert-danger');
        }
        if(isset($_FILES['txtCertificado'])){
        for ($i = 0; $i < count($_FILES['txtCertificado']['name']); $i++) {
            if ($_FILES['txtCertificado']['error'][$i] != 4) {
                $nombrearchivo = htmlentities($_FILES['txtCertificado']['name'][$i]);
                $destino = ROOT . 'public' . DS . 'citasLayout' . DS . 'files' . DS . html_entity_decode($nombrearchivo);
                move_uploaded_file($_FILES['txtCertificado']['tmp_name'][$i], $destino);
            }
        }
        }
        $this->redireccionar('administracion/medicos');
    }

    public function formulariomedicos($argum = false) {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $this->_view->especialidad = $data->listarespecialidades();
        if ($argum) {
            $this->_view->accion = 'Editar Medicos';
            $this->_view->datos = $data->onemedico($argum);
        } else {
            $this->_view->accion = 'Agregar Medicos';
            $this->_view->datos = array();
        }
        $this->_view->renderizar('formulariomedicos', 'blank');
    }

    public function programarCita() {
        $data = $this->loadModel('administracion');
        $sql = $data->guardarProgramacion();
        if ($sql['response'] == 'Success') {
            /* $token = $data->onetoken();
              $mensaje = 'Su cita ha sido programada exitosamente';
              $res = $this->sendnotification($token, $mensaje); */
        }
        echo json_encode($sql);
    }

    public function medicos() {
        Session::acceso("General");
        $data = $this->loadModel('administracion');
        $this->_view->title = "Administracion - Medicos";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Medicos";
        $this->_view->medicos = $data->listadoctores();
        $this->_view->renderizar('medicos', 'citas');
    }

    public function cargamedicos($argum = false) {
        $data = $this->loadModel('administracion');
        $this->_view->doctores = $data->listardoctores($argum);
        $this->_view->renderizar('doctores', 'blank');
    }

    public function programarcitas($argum = false) {
        Session::accesoEstricto(array('Citas', 'General'), true);
        $data = $this->loadModel('administracion');
        $sql = $data->listarprogramado($argum);
        if (count($sql) > 0) {
            $this->_view->datos = $data->listarprogramado($argum);
            $this->_view->doctor = $data->onedoctor($sql[0]['pdoDoctor']);
        } else {
            $this->_view->datos = array(6);
        }
        $this->_view->codigo = $argum;
        $this->_view->especialidad = $data->listarespecialidades();
        $this->_view->sedes = $data->listarsedes();
        $this->_view->renderizar('programarcitas', 'blank');
    }

    public function citas() {
        Session::accesoEstricto(array('Citas', 'General'), true);
        $data = $this->loadModel('administracion');
        $this->_view->citas = $data->listarcitas();
        $this->_view->medicos = $data->listadoctores();
        $this->_view->usuarios = $data->usuarioscitas();
        $this->_view->title = "Administracion - Citas";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Citas";
        $this->_view->renderizar('citas', 'citas');
    }

    public function cargarcitas() {
        Session::accesoEstricto(array('Citas', 'General'), true);
        $data = $this->loadModel('administracion');
        $this->_view->citas = $data->listarcitas();
        $this->_view->title = "Administracion - Citas";
        $this->_view->modulo = "Administracion";
        $this->_view->metodo = "Citas";
        $this->_view->renderizar('cargacitas', 'blank');
    }

    public function sendnotification($tokens, $message) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = "AAAARVJW_-0:APA91bGHO3S2DxCa3Jf9zo8PV0d76lI0Fmq3lgQpsAy0kJMuL6-NmmJLw7ymhfaopYanBuV2X3Pmytexx5rQc9yaouFVYB-bf-rdIr2yW-fGPW63crHI3bgXi5bZie3r2qcReV6xeEi5";

        $title = "CardioApp";

        $notification = array(
            'body' => $message,
            'title' => $title,
            'sound' => "defaultSoundUri",
            'icon' => "ic_notification");

        $fields = array(
            'registration_ids' => $tokens,
            'notification' => $notification);

        $headers = array(
            'Authorization:key=' . $server_key,
            'Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
