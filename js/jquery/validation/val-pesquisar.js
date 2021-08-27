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
        return this.optional(element) || /^[-\0-9\a-zA-Z\s]+$/i.test(value);
    });

    $.validator.addMethod('latlong', function(value, element) {
        return this.optional(element) || /^[0-9\-\,]+$/i.test(value);
    });

    $("#cad-cnes").validate({
        rules: {
            cnes: {
                required: true,
                remote: "remote/pesquisar/val-cnes.php",
            },
            estabelecimento: {
                required: true,
                ascento: true,
                remote: "remote/pesquisar/val-est.php"
            }
         },
        messages: {
            cnes: {
                required: "Digite o Cnes",
                remote: "Em Duplicidade"
            },
            estabelecimento: {
                required: "Digite o Estabelecimento",
                remote: "Em Duplicidade",
                ascento: "Retire ascentos, ç e caracteres"
            }
        }


    });

    $("#edit-cnes").validate({
        rules: {
            cnes: {
                required: true
            },
            estabelecimento: {
                required: true,
                ascento: true
            }
        },
        messages: {
            cnes: {
                required: "Digite o Cnes"
            },
            estabelecimento: {
                required: "Digite o Estabelecimento",
                ascento: "Retire ascentos, ç e caracteres"
            }
        }


    });

    $("#cad-cidade").validate({
        rules: {
            codigo: {
                required: true,
                remote: "remote/pesquisar/val-codigo.php"
            },
            cidade: {
                required: true,
                remote: "remote/pesquisar/val-cad-cidade.php",
                ascento: true
            },
            latitude: {
                required: true,
                remote: "remote/pesquisar/val-lat-cidade.php",
                latlong: true
            },
            longitude: {
                required: true,
                remote: "remote/pesquisar/val-long-cidade.php",
                latlong: true
            }
        },
        messages: {
            codigo: {
                required: "Digite o Codigo",
                remote: "Em Duplicidade"
            },
            cidade: {
                required: "Digite a Cidade",
                remote: "Em Duplicidade",
                ascento: "Retire ascentos ~ ^ "
            },
            latitude: {
                required: "Digite a Latitude",
                remote: "Em duplicidade",
                latlong:"Apenas -12,34567890"
            },
            longitude: {
                required: "Digite a Longitude",
                remote: "Em duplicidade",
                latlong: "Apenas -12,34567890"
            }
        }
    });

    $("#edit-cidade").validate({
        rules: {
            codigo: {
                required: true
            },
            cidade: {
                required: true,
                ascento: true
            },
            latitude: {
                required: true,
                latlong: true
            },
            longitude: {
                required: true,
                latlong: true
            }
        },
        messages: {
            codigo: {
                required: "Digite o Codigo"
            },
            cidade: {
                required: "Digite a Cidade",
                remote: "Em Duplicidade",
                ascento: "Retire ascentos ~ ^ "
            },
            latitude: {
                required: "Digite a Latitude",
                latlong:"Apenas -12,34567890"
            },
            longitude: {
                required: "Digite a Longitude",
                latlong: "Apenas -12,34567890"
            }
        }
    });

    $("#cad-agravo").validate({
        rules: {
            agravo: {
                required: true,
                remote: "remote/pesquisar/val-agravo.php"
            },
            tipoagravo: {
                required: true,
                remote: "remote/pesquisar/val-tipo-agravo.php",
                ascento: true
            }
        },
        messages: {
            agravo: {
                required: "Digite o Agravo",
                remote: "Em Duplicidade"
            },
            tipoagravo: {
                required: "Digite o Tipo de Agravo",
                remote: "Tipo Não Encontrado!",
                ascento: "Retire ascentos, ç e caracteres"
            }
        }


    });

    $("#edit-agravo").validate({
        rules: {
            agravo: {
                required: true,
                ascento: true
            },
            tipoagravo: {
                required: true,
                remote: "remote/pesquisar/val-tipo-agravo.php",
                ascento: true
            }
        },
        messages: {
            agravo: {
                required: "Digite o Agravo",
                ascento: "Retire ascentos, ç e caracteres"
            },
            tipoagravo: {
                required: "Digite o Tipo de Agravo",
                remote: "Tipo Não Encontrado!",
                ascento: "Retire ascentos, ç e caracteres"
            }
        }


    });

    $("#cad-end").validate({
        rules: {
            ruagoogle: {
                required: true
            },
            da: {
                required: true,
                remote: "remote/pesquisar/val-da.php"
            },
            setor: {
                required: true,
                remote: "remote/pesquisar/val-setor.php"
            },
            cep: {
                required: true
            },
            log: {
                required: true,
                remote: "remote/pesquisar/val-log.php"
            },
            ruaoutros: {
                required: true,
                remote: "remote/pesquisar/val-rua-outros.php",
                //ascento: true
            },
            bairro: {
                required: true,
                minlength: 3,
                //ascento: true
            },
            ubs: {
                required: true,
                remote: "remote/pesquisar/val-ubs.php"
            },
            cidade: {
                required: true,
                remote: "remote/pesquisar/val-cidade.php"
            }
        },
        messages: {
            ruagoogle: {
                required: "ok"
            },
            da: {
                required: "Digite o Da",
                remote: "Da inválido"
            },
            setor: {
                required: "Digite um Setor",
                remote: "Setor inválido."
            },
            cep: {
                required: "Digite o Cep"
            },
            log: {
                required: "Digite um Logradouro",
                remote: "Digite um logradouro válido"
            },
            ruaoutros: {
                required: "Digite um Endereço",
                remote: "Rua em duplicidade",
                //ascento: "Retire ascentos, ç e caracteres"
            },
            bairro: {
                required: "Digite um Bairro",
                minlength: "Digite um Bairro válido",
                //ascento: "Retire ascentos, ç e caracteres"
            },
            ubs: {
                required: "Digite uma Ubs",
                remote: "Ubs não encontrada"
            },
            cidade: {
                required: "Digite uma cidade",
                remote: "remote/valida_cidade.php"
            }
        }


    });

    $("#edit-end").validate({
        rules: {
            da: {
                required: true,
                remote: "remote/pesquisar/val-da.php"
            },
            setor: {
                required: true,
                remote: "remote/pesquisar/val-setor.php"
            },
            cep: {
                required: true
            },
            log: {
                required: true,
                remote: "remote/pesquisar/val-log.php"
            },
            ruaoutros: {
                required: true
            },
            bairro: {
                required: true,
                minlength: 3,
                //ascento: true
            },
            ubs: {
                required: true
            },
            cidade: {
                required: true,
                remote: "remote/pesquisar/val-cidade.php"
            }
        },
        messages: {
            da: {
                required: "Digite o Da",
                remote: "Da inválido"
            },
            setor: {
                required: "Digite um Setor",
                remote: "Setor inválido."
            },
            cep: {
                required: "Digite um Cep"
            },
            log: {
                required: "Digite um Logradouro",
                remote: "Digite um logradouro válido"
            },
            ruaoutros: {
                required: "Digite um Endereço"
            },
            bairro: {
                required: "Digite um Bairro",
                minlength: "Digite um Bairro válido",
                //ascento: "Retire ascentos, ç e caracteres"
            },
            ubs: {
                required: "Digite uma Ubs"
            },
            cidade: {
                required: "Digite uma cidade",
                remote: "remote/valida_cidade.php"
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



