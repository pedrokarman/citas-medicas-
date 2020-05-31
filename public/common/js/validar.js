$(document).ready(function () {
    $('#form1').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cmbTipoDocumen: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbRol: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbTipofunc: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbTipoCont: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbSupervisor: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbTipoRiesgo: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbTitulacion: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbTipoVinc: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbLibretaM: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbEstadoCivil: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            cmbGenero: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            rbgenero: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            txtNombreTipo: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_\-.]+$/,
                        message: 'El campo no pueden contener caracteres especiales'
                    }
                }
            },
            txtNombre: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'El nombre debe tener entre 3 y 100 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtNombreUsuario: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtContrasena: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtTarjProfe: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtSalud: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtPension: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtAcudiente: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtEps: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtMuniNaci: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtSesion: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtDireccion: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtMuniDireccion: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtMuniExpDocu: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtMuniResi: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtTipoSangre: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 9,
                        message: 'El campo debe tener entre 1 y 9 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtCif: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtAsegura: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtFondoPension: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtNumPol: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 9,
                        message: 'El campo debe tener entre 3 y 9 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtValorCont: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 9,
                        message: 'El campo debe tener entre 3 y 9 caracteres'
                    },
                    regexp: {
                        regexp: /^[0-9_]+$/,
                        message: 'El campo solo pueden contener letras'
                    }
                }
            },
            txtFechNaci: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechHoraInic: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    datetime: {
                        format: 'DD/MM/YYYY H:I',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechHoraFina: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    datetime: {
                        format: 'DD/MM/YYYY H:I',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechaVinc: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechaDesVinc: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtTarjExpProfe: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechAproPol: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechExpPol: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechVigPol: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechVigFinPol: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechaIn: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechaFin: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechaNacimiento: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechExpDoc: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtDocumento: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    stringLength: {
                        min: 6,
                        max: 11,
                        message: 'El Numero de documento debe tener entre 6 y 11 caracteres'
                    },
                }
            },
            txtNumCont: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    stringLength: {
                        min: 6,
                        max: 11,
                        message: 'El Numero de documento debe tener entre 6 y 11 caracteres'
                    },
                }
            },
            txtEstrato: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                }
            },
            txtTelefono1: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    stringLength: {
                        min: 6,
                        max: 11,
                        message: 'El Numero de Telefónico debe tener entre 6 y 11 caracteres'
                    },
                }
            },
            txtTelefono2: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    stringLength: {
                        min: 6,
                        max: 11,
                        message: 'El Numero de Telefónico debe tener entre 6 y 11 caracteres'
                    },
                }
            },
            txtUsuario: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            txtAnual: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    lessThan: {
                        value: 2100,
                        inclusive: true,
                        message: 'El año no puede ser mayor de 2100'
                    },
                    greaterThan: {
                        value: 2000,
                        inclusive: false,
                        message: 'El año no puede ser menor de 2000'
                    }
                }
            },
            txtFecha: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    },
                }
            },
            txtFecha1: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFecha2: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFechSesion: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtCorreo: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    emailAddress: {
                        message: 'Debe digitar un correo válido'
                    }
                }
            },
            txtCorreoA: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    emailAddress: {
                        message: 'Debe digitar un correo válido'
                    }
                }
            },
            txtCorreoMisena: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    emailAddress: {
                        message: 'Debe digitar un correo válido'
                    }
                }
            },
            txtPassword: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            'txtTabla1[]': {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The country is required and can\'t be empty'
                    }
                }
            },
            acceptTerms: {
                validators: {
                    notEmpty: {
                        message: 'You have to accept the terms and policies'
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phoneNumberUS: {
                validators: {
                    phone: {
                        message: 'The input is not a valid US phone number'
                    }
                }
            },
            phoneNumberUK: {
                validators: {
                    phone: {
                        message: 'The input is not a valid UK phone number',
                        country: 'GB'
                    }
                }
            },
            color: {
                validators: {
                    hexColor: {
                        message: 'The input is not a valid hex color'
                    }
                }
            },
            zipCode: {
                validators: {
                    zipCode: {
                        country: 'US',
                        message: 'The input is not a valid US zip code'
                    }
                }
            },
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            date: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The birthday is not valid'
                    }
                }
            },
            ages: {
                validators: {
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 10,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 10'
                    }
                }
            }
        }
    });
    // Validate the form manually
    $('#validateBtn').click(function () {
        $('#form1').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function () {
        $('#form1').data('bootstrapValidator').resetForm(true);
    });
});