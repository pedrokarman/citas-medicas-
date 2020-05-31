var RUTA_URL = "http://localhost/ctasapp/";
$(document).ready(function () {
    $(document).on('click', '#btnVerCertificados', function () {
        $('#ModalCertificados').modal('show');
        var data = {
            'id': $(this).val()
        };
        cargadivconsulta('contenidoModalCerti', 'vercertificados', data);
    });
    $(document).on('click', '#btnHistoriaClinica', function () {
        var data = {
            'id': $(this).val()
        };
        cargadivconsulta('vistaCitas', 'verhistoriaclinica', data);
    });
    $(document).on('click', '#btnAtender', function () {
        var data = {
            'id': $(this).val()
        };
        cargadivconsulta('vistaCitas', 'ingresardatospaciente/', data);
    });
    $(document).on('click', '#btnArchivos', function () {
        cargadivconsulta('vistaArchivos', 'vistaarchivos', '');
        $(this).text('Cancelar');
        $(this).attr('id', 'btnCancelar');
    });
    $(document).on('click', '#btnCancelar', function () {
        $('#vistaArchivos').empty();
        $(this).text('Subir certificados');
        $(this).attr('id', 'btnArchivos');
    });
    $(document).on('click', '#btnOtros', function () {
        $('#otrosArchivos').append('<div class="form-group">\n\
<div class="form-row">\n\
<div class="col-md-6">\n\
<label>Seleccione archivo</label></div>\n\
<div class="col-md-6">\n\
<input type="file" name="txtCertificado[]"></div></div></div>');
    });
    $(document).on('click', '#btnGenerarReporte', function () {
        var fi = $('#txtFechaI').val();
        var ff = $('#txtFechaF').val();
        var data = {
            'fechai': fi,
            'fechaf': ff
        };
        if (fi.length > 0 && ff.length > 0) {
            cargadivconsulta('cargarCitas', 'generarreporte/', data);
        } else {
            new PNotify({
                title: 'Mensaje alerta',
                text: 'Seleccione fechas',
                type: 'danger'
            });
        }
    });
    $(document).on('click', '#btnEnviar', function () {
        var password = $('#txtPassword').val();
        var data = {
            'password': $('#txtPassword').val()
        };
        if (password.length > 0) {
            cargadivconsulta('formularioEditar', 'formularioeditar', data);
        } else {
            alert('Digite contraseña');
        }
    });
    $(document).on('click', '#btnVerProgramar', function () {
        var data = {
            'id': $(this).val()
        };
        $('#CitasModal').modal('show');
        cargadivconsulta('contenidoModal', RUTA_URL + 'usuario/verestadocita', data);
    });
    $(document).on('click', '#btnAgregarRoles', function () {
        cargadivconsulta('vista', 'formularioroles/', '');
    });
    $(document).on('click', '#btnEditarRoles', function () {
        var data = {
            'id': $(this).val()
        };
        cargadivconsulta('vista', 'formularioroles/', data);
    });
    $(document).on('click', '#btnBuscarDatos', function () {
        $('#btnEstado').val('I');
        var data = $('#formdatos').serialize();
        cargadivconsulta('vista', 'buscarcitas/', data);
    });
    $(document).on('click', '#btnCancelarCita', function () {
        var id = $('#codCita').val();
        var data = {
            'txtCodigo': id
        };
        $.ajax({
            type: 'POST',
            url: 'cancelarcita',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.response == 'Error') {
                    new PNotify({
                        title: 'Mensaje confirmacion!',
                        text: data.mensaje,
                        type: 'error'
                    });
                } else {
                    $('#ProgramarModal').modal('hide');
                    $('#vista').load(RUTA_URL + 'administracion/cargarcitas');
                    new PNotify({
                        title: 'Mensaje confirmacion!',
                        text: data.mensaje,
                        type: 'success'
                    });
                }
            }
        });
    });
    $('#modalEliminarEspe').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipent = button.data('id')
        var nom = button.data('nom')
        var modal = $(this);
        modal.find('h4').text('Esta seguro que desea eliminar esta especialidad: ' + nom + '?');
        modal.find('#enviar').attr('href', 'bajaespe/' + recipent);
    });
    $(document).on('click', '#btnEditarEspe', function () {
        cargadivconsulta('vista', 'formularioespe/' + $(this).val(), '');
    });
    $(document).on('click', '#btnAgregarEspe', function () {
        cargadivconsulta('vista', 'formularioespe/', '');
    });
    $('#modalEliminarSedes').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipent = button.data('id')
        var nom = button.data('nom')
        var modal = $(this);
        modal.find('h4').text('Esta seguro que desea eliminar esta sede: ' + nom + '?');
        modal.find('#enviar').attr('href', 'bajasedes/' + recipent);
    });
    $(document).on('click', '#btnEditarSedes', function () {
        cargadivconsulta('vista', 'formulariosedes/' + $(this).val(), '');
    });
    $(document).on('click', '#btnAgregarSedes', function () {
        cargadivconsulta('vista', 'formulariosedes/', '');
    });
    $('#modalEliminarMedicos').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipent = button.data('id')
        var nom = button.data('nom')
        var modal = $(this);
        modal.find('h4').text('Esta seguro que desea eliminar este medico: ' + nom + '?');
        modal.find('#enviar').attr('href', 'bajamedicos/' + recipent);
    });
    $(document).on('click', '#btnEditarMedicos', function () {
        cargadivconsulta('vista', 'formulariomedicos/' + $(this).val(), '');
    });
    $(document).on('click', '#btnAgregarMedicos', function () {
        cargadivconsulta('vista', 'formulariomedicos/', '');
    });
    $(document).on('click', '#btnCerrarModal', function () {
        $('#btnEstado').val('A');
    });
    $(document).on('click', '#btnGuardar', function () {
        var data = $('#formProgramar').serialize();
        $('#lblMensaje').empty();
        $.ajax({
            type: 'POST',
            url: 'programarCita',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.response == 'Error') {
                    $('#lblMensaje').append('<div class="alert alert-danger" role="alert">' + data.mensaje + '</div>');
                } else {
                    $('#ProgramarModal').modal('hide');
                    $('#vista').load(RUTA_URL + 'administracion/cargarcitas');
                    new PNotify({
                        title: 'Mensaje confirmacion!',
                        text: data.mensaje,
                        type: 'success'
                    });
                }
            }
        });
    });
    $(document).on('change', '#selEspecialidad', function () {
        cargadivconsulta('CargarMedico', 'cargamedicos/' + $(this).val(), '');
    });
    $(document).on('click', '#btnProgramar', function () {
        $('#btnEstado').val('I');
        $('#ProgramarModal').modal('show');
        cargadivconsulta('contenidoModal', 'programarcitas/' + $(this).val(), '');
    });
    setTimeout(function () {
        $("#mensaje").fadeOut(1500);
    }, 3000);
    window.onclick = function (event) {
        var modal = document.getElementById('ProgramarModal');
        if (event.target == modal) {
            $('#btnEstado').val('A');
        }
    }
});
function cargarcitas() {
    var bandera = $('#btnEstado').val();
    if (bandera == 'A') {
        $('#vista').load(RUTA_URL + 'administracion/cargarcitas');
    }
}
setInterval("cargarcitas()", 6000);
jQuery(window).load(function () {

    $(".loader-img").fadeOut();
    $(".loader").fadeOut("slow");

});