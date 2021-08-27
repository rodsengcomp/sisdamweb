$(function() {
    $(document).ready(function () {
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).parent().find('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).parent().find('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
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
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    });

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element)
            || value.length >= 6
            && /\d/.test(value)
            && /[a-z]/i.test(value);
    }, 'Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere.');


    $("#login").validate({
        rules: {
            login: {
                required: true,
                remote: "remote/admin/val-login-index.php"
            },
            senha: {
                required: true,
                strongPassword: true
            }
        },
        messages: {
            login: {
                required: "",
                remote: ""
            },
            senha: {
                required: ""
            }
        }
    });

    });
});

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}



