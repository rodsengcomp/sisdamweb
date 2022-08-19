$(function() {
    $(document).ready(function () {
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok').addClass('glyphicon-remove');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).parent().find('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon glyphicon-ok');
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
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.');

    $.validator.addMethod('ascento', function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    });


    /*            Uma Opção   */
    $.validator.addMethod("dateBR", function (value, element) {
        //contando chars
        if (value.length != 10) return (this.optional(element) || false);
        // verificando data
        var data = value;
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
        if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
        if (mes < 1) return (this.optional(element) || false);
        if (ano < 1900) return (this.optional(element) || false);
        return (this.optional(element) || true);
    }, "Informe uma data válida");


    // Datepicker dataentrada para contar data atual
    $('#databloqedit').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

    $('#datanebedit').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

    // Datepicker datanot para contar data atual
    $('#dataobitocad').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

    // Datepicker datanasc para contar data atual
    $('#datanasccad').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

    // Datepicker data1sicad para contar data atual
    $('#data1sincad').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    })//.datepicker("setDate", new Date()); (opcional para imprimir data no formulario ao iniciar

    // Datepicker datanot para contar data atual
    $('#datanotcad').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

    // Datepicker dataentrada para contar data atual
    $('#dataentcad').datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: "+0",
        onClose: function() {$(this).valid();},
    });

        // Datepicker dataentrada para contar data atual
        $('#dataentcad2').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

// Validation method databloedit para comparar com data atual
    $.validator.addMethod("maxDateBloq", function(e) {
        var curDateE = $('#databloqedit').datepicker("getDate");
        var maxDateBloq = new Date();
        maxDateBloq.setDate(maxDateBloq.getDate());
        maxDateBloq.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
        console.log(this.value, curDateE, maxDateBloq);
        if (curDateE > maxDateBloq) {
            $(this).datepicker("setDate", maxDateBloq);
            return false;
        }
        return true;
    });

        // Validation method dataneb para comparar com data atual
        $.validator.addMethod("maxDateNeb", function(e) {
            var curDateNebs = $('#datanebedit').datepicker("getDate");
            var maxDateNebs = new Date();
            maxDateNebs.setDate(maxDateNebs.getDate());
            maxDateNebs.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateNebs, maxDateNebs);
            if (curDateNebs > maxDateNebs) {
                $(this).datepicker("setDate", maxDateNebs);
                return false;
            }
            return true;
        });

// Validation method datanot para comparar com data atual
    $.validator.addMethod("maxDateN", function(e) {
        var curDateN = $('#datanotcad').datepicker("getDate");
        var maxDateN = new Date();
        maxDateN.setDate(maxDateN.getDate());
        maxDateN.setHours(0, 0, 0, 0); // clear time portion for correct results
        console.log(this.value, curDateN, maxDateN);
        if (curDateN > maxDateN) {
            $(this).datepicker("setDate", maxDateN);
            return false;
        }
        return true;
    });

    $.validator.addMethod("maxDateO", function(e) {
        var curDateN = $('#dataobitocad').datepicker("getDate");
        var maxDateN = new Date();
        maxDateN.setDate(maxDateN.getDate());
        maxDateN.setHours(0, 0, 0, 0); // clear time portion for correct results
        console.log(this.value, curDateN, maxDateN);
        if (curDateN > maxDateN) {
            $(this).datepicker("setDate", maxDateN);
            return false;
        }
        return true;
    });

    // Validation method datanot para comparar com data atual
    $.validator.addMethod("maxDate1S", function(e) {
        var curDateS = $('#data1sincad').datepicker("getDate");
        var maxDateS = new Date();
        maxDateS.setDate(maxDateS.getDate());
        maxDateS.setHours(0, 0, 0, 0); // clear time portion for correct results
        console.log(this.value, curDateS, maxDateS);
        if (curDateS > maxDateS) {
            $(this).datepicker("setDate", maxDateS);
            return false;
        }
        return true;
    });

    // Validation method data1Sintomas não pode ser maior que data entrada
    $.validator.addMethod("validaSintE", function(e) {
        var curDateSE = $('#data1sincad').datepicker("getDate");
        var maxDateSE = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateSE, maxDateSE);
        if (curDateSE > maxDateSE) {
            return false;
        }
        return true;
    });

    // Validation method dataNasc não pode ser maior que data entrada
    $.validator.addMethod("validaNascN", function(e) {
        var curDateSE = $('#datanasccad').datepicker("getDate");
        var maxDateSE = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateSE, maxDateSE);
        if (curDateSE > maxDateSE) {
            return false;
        }
        return true;
    });

    // Validation method dataBloqedit não pode ser maior que data notificação
    $.validator.addMethod("validaBloqNot", function(e) {
        var curDateEN = $('#databloqedit').datepicker("getDate");
        var maxDateBloqN = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateEN, maxDateBloqN);
        if (maxDateBloqN > curDateEN) {
            return false;
        }
        return true;
    });

        // Validation method dataNebedit não pode ser maior que data notificação
        $.validator.addMethod("validaNebNot", function(e) {
            var curDateNebN = $('#datanebedit').datepicker("getDate");
            var maxDateNebN = $('#datanotcad').datepicker("getDate");
            console.log(this.value, curDateNebN, maxDateNebN);
            if (maxDateNebN > curDateNebN) {
                return false;
            }
            return true;
        });

    function idade(nascimento, hoje) {
        var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();
        if ( new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) <
            new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()) )
            diferencaAnos--;
        return diferencaAnos;
    }

    // Validation method dataEntrada não pode ser maior que data notificação
    $.validator.addMethod("validaEntN", function(e) {
        var curDateEN = $('#dataentcad').datepicker("getDate");
        var maxDateEN = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateEN, maxDateEN);
        if (maxDateEN > curDateEN) {
            return false;
        }
        return true;
    });

    // Validation method dataEntrada não pode ser maior que data notificação
    $.validator.addMethod("validaEntN2", function(e) {
        var curDateEN2 = $('#dataentcad2').datepicker("getDate");
        var maxDateEN2 = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateEN2, maxDateEN2);
        if (maxDateEN2 > curDateEN2) {
            return false;
        }
        return true;
    });

    // Validation method dataEntrada não pode ser maior que data notificação
    $.validator.addMethod("validaEntNesp", function(e) {
        var curDateENesp = $('#dataentesp').datepicker("getDate");
        var maxDateENesp = $('#datanotcad').datepicker("getDate");
        console.log(this.value, curDateEN, maxDateEN);
        if (maxDateENesp > curDateENesp) {
            return false;
        }
        return true;
    });

    // Validation method dataentrada para comparar com data atual
    $.validator.addMethod("maxDateE", function(e) {
        var curDateE = $('#dataentcad').datepicker("getDate");
        var maxDateE = new Date();
        maxDateE.setDate(maxDateE.getDate());
        maxDateE.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
        console.log(this.value, curDateE, maxDateE);
        if (curDateE > maxDateE) {
            $(this).datepicker("setDate", maxDateE);
            return false;
        }
        return true;
    });

    // Validation method dataentrada para comparar com data atual
    $.validator.addMethod("maxDateE2", function(e) {
        var curDateE2 = $('#dataentcad2').datepicker("getDate");
        var maxDateE2 = new Date();
        maxDateE2.setDate(maxDateE2.getDate());
        maxDateE2.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
        console.log(this.value, curDateE2, maxDateE2);
        if (curDateE2 > maxDateE2) {
            $(this).datepicker("setDate", maxDateE2);
            return false;
        }
        return true;
    });

        // Validation method dataentrada para comparar com data atual
        $.validator.addMethod("maxDateEsp", function(e) {
            var curDateEsp = $('#dataentesp').datepicker("getDate");
            var maxDateEsp = new Date();
            maxDateEsp.setDate(maxDateEsp.getDate());
            maxDateEsp.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateEsp, maxDateEsp);
            if (curDateE2 > maxDateEsp) {
                $(this).datepicker("setDate", maxDateEsp);
                return false;
            }
            return true;
        });

     $("#edicao_end_dengue").validate({
        rules: {
            sinan: {
                required: true
            },
            nome: {
                required: true
            },
            rua: {
                required: true,
                minlength: 1,
                remote:"remote/sv2/val-rua.php"
            },
            num: {
                required: true
            },
            cep: {
                required: true
            },
            log: {
                required: true
            },
            bairro: {
                required: true
            },
            da: {
                required: true
            },
            setor: {
                required: true
            },
            localvd: {
                required: true
            },
            ruagoogle: {
                required: true
            },
            ruagoogle1: {
                required: true
            },
            latitude: {
                required: true
            },
            longitude: {
                required: true
            },
            idrua: {
                required: true
            }
        },
        messages: {
            sinan: {
                required: "É necessário um Sinan"
            },
            nome: {
                required: "É necessário um Nome"
            },
            rua: {
                required: "Digite uma rua",
                minlength: "Digite uma rua válida",
                remote:"Rua não encontrada"
            },
            num: {
                required: "Digite um número ou S/N"
            },
            cep: {
                required: "Cep requerido"
            },
            log: {
                required: "Logradouro requerido"
            },
            bairro: {
                required: "Bairro requerido"
            },
            da: {
                required: "Da requerido"
            },
            setor: {
                required: "Setor requerido"
            },
            localvd: {
                required: "Ubs requerida"
            },
            ruagoogle: {
                required: "Google requerido"
            },
            ruagoogle1: {
                required: "Google requerido"
            },
            latitude: {
                required: "Latitude requerida"
            },
            longitude: {
                required: "Longitude requerida"
            },
            idrua: {
                required: "Id de Rua requerida"
            }
        }
    });

        $("#edit_end_ambiental").validate({
            rules: {
                sinan: {
                    required: true,
                    rangelength: [5, 7]
                },
                nome: {
                    required: true,
                    minlength: 1
                },
                dataentrada: {
                    required: true,
                    dateBR: true,
                    maxDateE: true
                },
                localate: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-localate.php"
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true,
                    maxlength:9
                },
                log: {
                    required: true,
                    minlength: 3
                },
                rua: {
                    required: true,
                    minlength: 1,
                    remote:"remote/sv2/val-rua.php"
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                localvd: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                sinan: {
                    required:"Digite um Sinan válido",
                    rangelength:"Min 5 e Máx de 7 numeros"
                },
                nome: {
                    required: "Digite o nome",
                    minlength: ""
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje"
                },
                localate: {
                    required: "Digite a unidade de atendimento",
                    minlength: "Digite uma unidade válida",
                    remote :"Local  não encontrado !!!"
                },
                num: {
                    required: "Digite o número",
                    minlength: "Digite um número ou S/N"
                },
                cep: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um cep válido"
                },
                log: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um logradouro válido"
                },
                rua: {
                    required: "Digite o endereço",
                    minlength: "",
                    remote :"Endereço  não encontrado !!!"
                },
                latitude: {
                    required: "Latitude requerida"
                },
                longitude: {
                    required: "Longitude requerida"
                },
                bairro: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um bairro válido"
                },
                localvd: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um local de vd válido"
                }
            }
        });

        $("#cad-material").validate({
            rules: {
                material: {
                    required: true,
                    remote: "remote/ambiental/val-material.php"
                },
                qtd: {
                    required: true
                },
                entrada: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                verifica_memo: {
                    required: true,
                    remote: "remote/ambiental/val-verifica-memo.php"
                }
            },
            messages: {
                material: {
                    required: "Digite um Material",
                    remote: "Digite um Material válido"
                },
                qtd: {
                    required: "Digite a quantidade"
                },
                entrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje"
                },
                verifica_memo: {
                    required: "Digite um Nº de Memo",
                    remote: "Nº de Memo Não Encontrado"
                }
            }
        });

        $("#edit-material").validate({
            rules: {
                material: {
                    required: true,
                    remote: "remote/ambiental/val-material.php"
                },
                qtd: {
                    required: true
                },
                entrada: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                verifica_memo: {
                    required: true,
                    remote: "remote/ambiental/val-verifica-memo.php"
                }
            },
            messages: {
                material: {
                    required: "Digite um Material",
                    remote: "Digite um Material válido"
                },
                qtd: {
                    required: "Digite a quantidade"
                },
                entrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje"
                },
                verifica_memo: {
                    required: "Digite um Nº de Memo",
                    remote: "Nº de Memo Não Encontrado"
                }
            }
        });

        $("#cad-pe-ie").validate({
            rules: {
                tipo: {
                    required: true
                },
                especificacao: {
                    required: true,
                    remote: "remote/ambiental/val-pe-ie.php"
                },
                risco: {
                    required: true
                },
                rua: {
                    required: true,
                    minlength: 1,
                    remote:"remote/sv2/val-rua.php"
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true
                },
                log: {
                    required: true
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                da: {
                    required: true
                },
                setor: {
                    required: true
                },
                localvd: {
                    required: true
                },
                pgguia: {
                    required: true
                },
                ruagoogle: {
                    required: true
                },
                cidade: {
                    required: true
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                }
            },
            messages: {
                tipo: {
                    required: "Digite um Tipo"
                },
                especificacao: {
                    required: "Digite uma Especificacao",
                    remote: "Digite uma Especificação válida"
                },
                risco: {
                    required: "Digite um Risco"
                },
                rua: {
                    required: "Digite um Endereço",
                    minlength: "Endereço Inválido",
                    remote:"Endereço não Catalogado"
                },
                num: {
                    required: "Digite um Número",
                    minlength: "Número Inválido"
                },
                cep: {
                    required: "Digite um endereço válido"
                },
                log: {
                    required: "Digite um endereço válido"
                },
                bairro: {
                    required: "Digite um endereço válido",
                    minlength: "Bairro Inválido"
                },
                da: {
                    required: "Digite um endereço válido"
                },
                setor: {
                    required: "Digite um endereço válido"
                },
                localvd: {
                    required: "Digite um endereço válido"
                },
                pgguia: {
                    required: "Digite um endereço válido"
                },
                ruagoogle: {
                    required: "Digite um endereço válido"
                },
                cidade: {
                    required: "Digite um endereço válido"
                },
                latitude: {
                    required: "Digite uma Latitude"
                },
                longitude: {
                    required: "Digite uma Longitude"
                }
            }
        });

        $("#edit-pe-ie").validate({
            rules: {
                tipo: {
                    required: true
                },
                especificacao: {
                    required: true,
                    remote: "remote/ambiental/val-pe-ie.php"
                },
                risco: {
                    required: true
                },
                rua: {
                    required: true,
                    minlength: 1,
                    remote:"remote/sv2/val-rua.php"
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true
                },
                log: {
                    required: true
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                da: {
                    required: true
                },
                setor: {
                    required: true
                },
                localvd: {
                    required: true
                },
                ruagoogle: {
                    required: true
                },
                cidade: {
                    required: true
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                }
            },
            messages: {
                tipo: {
                    required: "Digite um Tipo"
                },
                especificacao: {
                    required: "Digite uma Especificacao",
                    remote: "Digite uma Especificação válida"
                },
                risco: {
                    required: "Digite um Risco"
                },
                rua: {
                    required: "Digite um Endereço",
                    minlength: "Endereço Inválido",
                    remote:"Endereço não Catalogado"
                },
                num: {
                    required: "Digite um Número",
                    minlength: "Número Inválido"
                },
                cep: {
                    required: "Digite um endereço válido"
                },
                log: {
                    required: "Digite um endereço válido"
                },
                bairro: {
                    required: "Digite um endereço válido",
                    minlength: "Bairro Inválido"
                },
                da: {
                    required: "Digite um endereço válido"
                },
                setor: {
                    required: "Digite um endereço válido"
                },
                localvd: {
                    required: "Digite um endereço válido"
                },
                ruagoogle: {
                    required: "Digite um endereço válido"
                },
                cidade: {
                    required: "Digite um endereço válido"
                },
                latitude: {
                    required: "Digite uma Latitude"
                },
                longitude: {
                    required: "Digite uma Longitude"
                }
            }
        });

        $("#cad-esporo-animal").validate({
            rules: {
                ruagoogle: {
                    required: true
                },
                datanot: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                nomeanimal: {
                    required: true,
                    minlength: 2,
                },  
                especie: {
                    required: true,
                    remote: "remote/ambiental/val-especie.php"
                },
                tutor: {
                    required: true,
                    minlength: 2,
                },
                situacao: {
                    required: true,
                    remote: "remote/ambiental/val-situacao.php"
                },
                rua: {
                    required: true,
                    remote: "remote/pesquisar/val-rua.php",
                    //ascento: true
                },
                num: {
                    required: true
                },
                lat: {
                    required: true
                },
                lng: {
                    required: true
                },
                cep: {
                    required: true
                },
                bairro: {
                    required: true,
                    minlength: 3,
                    //ascento: true
                },
                log: {
                    required: true,
                    remote: "remote/pesquisar/val-log.php"
                },
                da: {
                    required: true,
                    remote: "remote/pesquisar/val-da.php"
                },
                setor: {
                    required: true,
                    remote: "remote/pesquisar/val-setor.php"
                },
                ubs: {
                    required: true,
                    remote: "remote/pesquisar/val-ubs.php"
                },
                medicamento: {
                    remote: "remote/ambiental/val-medicamento.php"
                },
                dataentrada: {
                    dateBR: true,
                    maxDateE: true,
                    validaEntN : true
                },
                dataentrada2: {
                    dateBR: true,
                    maxDateE2: true,
                    validaEntN2 : true
                }
            },
            messages: {
                ruagoogle: {
                    required: "ok"
                },
                datanot: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nomeanimal: {
                    required: "Digite o nome do Animal",
                    minlength: "Mínimo de duas letras"
                },  
                especie: {
                    required: "Digite uma Espécie",
                    remote: "Espécie não encontrada"
                },
                tutor: {
                    required: "Digite o nome do Tutor",
                    minlength: "Mínimo de duas letras"
                },
                situacao: {
                    required: "Digite uma Situação",
                    remote: "Situação não encontrada"
                },
                rua: {
                    required: "Digite um Endereço",
                    remote: "Rua não encontrada",
                    //ascento: "Retire ascentos, ç e caracteres"
                },
                num: {
                    required: "Digite um Número"
                },
                lat: {
                    required: "Digite uma Latitude"
                },
                lng: {
                    required: "Digite uma Longitude"
                },
                cep: {
                    required: "Digite o Cep"
                },
                bairro: {
                    required: "Digite um Bairro",
                    minlength: "Digite um Bairro válido",
                    //ascento: "Retire ascentos, ç e caracteres"
                },
                log: {
                    required: "Digite um Logradouro",
                    remote: "Digite um logradouro válido"
                },
                da: {
                    required: "Digite o Da",
                    remote: "Da inválido"
                },
                setor: {
                    required: "Digite um Setor",
                    remote: "Setor inválido."
                },
                ubs: {
                    required: "Digite uma Ubs",
                    remote: "Ubs não encontrada"
                },
                medicamento: {
                    remote: "Medicamento inválido"
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje",
                    validaEntN : "Não pode ser menor que Data de Entrada"
                },
                dataentrada2: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE2: "Digite a data até hoje",
                    validaEntN2 : "Não pode ser menor que Data de Entrada"
                }
            }
    
    
        });
        $("#edit-esporo-animal").validate({
            rules: {
                ruagoogle: {
                    required: true
                },
                datanot: {
                    dateBR: true,
                    maxDateN: true
                },
                nomeanimal: {
                    required: true,
                    minlength: 2,
                },
                especie: {
                    required: true,
                    remote: "remote/ambiental/val-especie.php"
                },
                tutor: {
                    required: true,
                    minlength: 2,
                },
                situacao: {
                    required: true,
                    remote: "remote/ambiental/val-situacao.php"
                },
                rua: {
                    required: true,
                    remote: "remote/pesquisar/val-rua.php",
                    //ascento: true
                },
                num: {
                    required: true
                },
                lat: {
                    required: true
                },
                lng: {
                    required: true
                },
                cep: {
                    required: true
                },
                bairro: {
                    required: true,
                    minlength: 3,
                    //ascento: true
                },
                log: {
                    required: true
                },
                da: {
                    required: true
                },
                setor: {
                    required: true
                },
                ubs: {
                    required: true,
                    remote: "remote/pesquisar/val-ubs.php"
                },
                medicamento: {
                    remote: "remote/ambiental/val-medicamento.php"
                },
                dataentradaesp: {
                    dateBR: true,
                    maxDateEsp: true,
                    validaEntNesp : true
                }
            },
            messages: {
                ruagoogle: {
                    required: "ok"
                },
                datanot: {
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nomeanimal: {
                    required: "Digite o nome do Animal",
                    minlength: "Mínimo de duas letras"
                },
                especie: {
                    required: "Digite uma Espécie",
                    remote: "Espécie não encontrada"
                },
                tutor: {
                    required: "Digite o nome do Tutor",
                    minlength: "Mínimo de duas letras"
                },
                situacao: {
                    required: "Digite uma Situação",
                    remote: "Situação não encontrada"
                },
                rua: {
                    required: "Digite um Endereço",
                    remote: "Rua não encontrada",
                    //ascento: "Retire ascentos, ç e caracteres"
                },
                num: {
                    required: "Digite um Número"
                },
                lat: {
                    required: "Digite uma Latitude"
                },
                lng: {
                    required: "Digite uma Longitude"
                },
                cep: {
                    required: "Digite o Cep"
                },
                bairro: {
                    required: "Digite um Bairro",
                    minlength: "Digite um Bairro válido",
                    //ascento: "Retire ascentos, ç e caracteres"
                },
                log: {
                    required: "Digite um Logradouro"
                },
                da: {
                    required: "Digite o Da"
                },
                setor: {
                    required: "Digite um Setor"
                },
                ubs: {
                    required: "Digite uma Ubs",
                    remote: "Ubs não encontrada"
                },
                medicamento: {
                    remote: "Medicamento inválido"
                },
                dataentradaesp: {
                    dateBR: "Informe uma data válida",
                    maxDateEsp: "Digite a data até hoje",
                    validaEntNesp : "Não pode ser menor que Data de Entrada"
                },
            }


        });
    });
});








