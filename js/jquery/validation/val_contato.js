$(function() {
    $(document).ready(function () {
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-system-group').removeClass('has-success').addClass('has-error')
            $(element).parent().find('.form-system-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        },
        unhighlight: function (element) {
            $(element).closest('.form-system-group').removeClass('has-error').addClass('has-success');
            $(element).parent().find('.form-system-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        },
        //errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $.validator.addMethod('ascento', function(value, element) {
        return this.optional(element) || /^[a-zA-Z0123456789-\s]+$/i.test(value);
    });

    $("#cadastro_contato").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            sobrenome: {
                ascento: true
            },
            prefixo: {
                ascento: true
            },
            sufixo: {
                required: true,
                ascento: true
            },

            tel1: {
                required: true,
                remote: "remote/valida_tel_contato.php"
            }
         },
        messages: {
            nome: {
                required: "Digite o Nome",
                ascento: "Retire ascentos, ç e caracteres"
            },
            sobrenome: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            prefixo: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            sufixo: {
                required: "Digite o Sufixo",
                ascento: "Retire ascentos, ç e caracteres"
            },
            tel1: {
                required: "Digite o Telefone",
                remote: "Tel já Cadastrado"
            }
        }


    });

    $("#edicao_contato").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            sobrenome: {
                ascento: true
            },
            prefixo: {
                ascento: true
            },
            sufixo: {
                required: true,
                ascento: true
            },
            tel1: {
                required: true
            }
        },

        messages: {
            nome: {
                required: "Digite o Nome",
                ascento: "Retire ascentos, ç e caracteres"
            },
            sobrenome: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            prefixo: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            sufixo: {
                required: "Digite o Sufixo",
                ascento: "Retire ascentos, ç e caracteres"
            },
            tel1: {
                required: "Digite o Telefone"
            }
        }
    });

    });
});

function marcardesmarcar(){
    $('.marcar').each(
        function(){
            if ($(this).prop( "checked"))
                $(this).prop("checked", false);
            else $(this).prop("checked", true);
        }
    );
}

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}


