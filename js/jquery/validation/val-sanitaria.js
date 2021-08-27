// Desenvolvido por Rodolfo R R de Jesus - rodolfo.romaioli$@gmail.com - 1700493@aluno.univesp.br
// Mais detalhes : https://jqueryvalidation.org/documentation/

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

// Definindo os campos de data do formulário para serem válidos até a data atual =>
        // datasancad -> dataprazocad -> dataultmovcad -> dataarqcad -> datasaidacad //

        // Datepicker datanasc para contar data atual
        $('#datasancad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanasc para contar data atual
        $('#dataprazocad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanasc para contar data atual
        $('#dataultmovcad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();}
        });

        // Datepicker datanasc para contar data atual
        $('#dataarqcad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanasc para contar data atual
        $('#datasaidacad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

// Validation method data de entrada para comparar com data atual;
        $.validator.addMethod("maxDateEnt", function(e) {
            var curDateEnt = $('#datasancad').datepicker("getDate");
            var maxDateEnt = new Date();
            maxDateEnt.setDate(maxDateEnt.getDate());
            maxDateEnt.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateEnt, maxDateEnt);
            if (curDateEnt > maxDateEnt) {
                $(this).datepicker("setDate", maxDateEnt);
                return false;
            }
            return true;
        });

        // Validation method data de prazo para comparar com data atual;
        $.validator.addMethod("maxDatePra", function(e) {
            var curDatePra = $('#dataprazocad').datepicker("getDate");
            var maxDatePra = new Date();
            maxDatePra.setDate(maxDatePra.getDate());
            maxDatePra.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDatePra, maxDatePra);
            if (curDatePra > maxDatePra) {
                $(this).datepicker("setDate", maxDatePra);
                return false;
            }
            return true;
        });

        // Validation method data de ultimo movimento para comparar com data atual;
        $.validator.addMethod("maxDateUlt", function(e) {
            var curDateUlt = $('#dataultmovcad').datepicker("getDate");
            var maxDateUlt = new Date();
            maxDateUlt.setDate(maxDateUlt.getDate());
            maxDateUlt.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateUlt, maxDateUlt);
            if (curDateUlt > maxDateUlt) {
                $(this).datepicker("setDate", maxDateUlt);
                return false;
            }
            return true;
        });

        // Validation method data de arquivamento para comparar com data atual;
        $.validator.addMethod("maxDateArq", function(e) {
            var curDateArq = $('#dataarqcad').datepicker("getDate");
            var maxDateArq = new Date();
            maxDateArq.setDate(maxDateArq.getDate());
            maxDateArq.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateArq, maxDateArq);
            if (curDateArq > maxDateArq) {
                $(this).datepicker("setDate", maxDateArq);
                return false;
            }
            return true;
        });

        // Validation method data de saida para comparar com data atual;
        $.validator.addMethod("maxDateSai", function(e) {
            var curDateSai = $('#datasaidacad').datepicker("getDate");
            var maxDateSai = new Date();
            maxDateSai.setDate(maxDateSai.getDate());
            maxDateSai.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateSai, maxDateSai);
            if (curDateSai > maxDateSai) {
                $(this).datepicker("setDate", maxDateSai);
                return false;
            }
            return true;
        });
// Fim da validação de data atual //

        ///////////////////////////////////// <<<<<<<<<<>>>>>>>>>>>>>>> //////////////////////////

// Agora a comparação com a data de entrada (Não pode ser maior que a data de entrada os demais campos) //
        // // datasancad -> dataprazocad -> dataultmovcad -> dataarqcad -> datasaidacad //

        // Validation method prazo não pode ser maior que data entrada
        $.validator.addMethod("validaPraE", function(e) {
            var curDatePE = $('#datasancad').datepicker("getDate");
            var maxDatePE = $('#dataprazocad').datepicker("getDate");
            console.log(this.value, curDatePE, maxDatePE);
            if (curDatePE > maxDatePE) {
                return false;
            }
            return true;
        });

        // Validation method ultimo movimento não pode ser maior que data entrada
        $.validator.addMethod("validaUltE", function(e) {
            var curDateUE = $('#datasancad').datepicker("getDate");
            var maxDateUE = $('#dataultmovcad').datepicker("getDate");
            console.log(this.value, curDateUE, maxDateUE);
            if (curDateUE > maxDateUE) {
                return false;
            }
            return true;
        });

        // Validation method arquivo não pode ser maior que data entrada
        $.validator.addMethod("validaArqE", function(e) {
            var curDateAE = $('#datasancad').datepicker("getDate");
            var maxDateAE = $('#dataarqcad').datepicker("getDate");
            console.log(this.value, curDateAE, maxDateAE);
            if (curDateAE > maxDateAE) {
                return false;
            }
            return true;
        });

        // Validation method saida não pode ser maior que data entrada
        $.validator.addMethod("validaSaiE", function(e) {
            var curDateSE = $('#datasancad').datepicker("getDate");
            var maxDateSE = $('#datasaidacad').datepicker("getDate");
            console.log(this.value, curDateSE, maxDateSE);
            if (curDateSE > maxDateSE) {
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

        $("#cad_adm_sanitaria").validate({
            rules: {
                datent: {
                    required: true,
                    dateBR: true,
                    maxDateEnt: true
                },
                nome: {
                    required: true
                },
                atividade: {
                    required: true
                },
                tipo: {
                    required: true,
                    remote: "remote/sanitaria/val-tipo.php"
                },
                datprazo:{
                    dateBR: true
                },
                tecnico: {
                    remote: "remote/sanitaria/val-nome.php"
                },
                datultmov:{
                    dateBR: true,
                    maxDateUlt: true
                },
                datarq:{
                    dateBR: true,
                    maxDateArq: true
                },
                datsai:{
                    dateBR: true,
                    maxDateSai: true
                }
            },
            messages: {
                datent: {
                    required: "Digite uma Data válida",
                    dateBR: "Data Inválida",
                    maxDateEnt: "Digite uma data até hoje"
                },
                nome: {
                    required: "É necessário um Nome"
                },
                atividade: {
                    required: "Digite uma atividade"
                },
                tipo: {
                    required: "Digite um tipo de documento",
                    remote: "Tipo não encontrado"
                },
                datprazo:{
                    dateBR: "Data Inválida"
                },
                tecnico: {
                    remote: "Téc. Resp. não encontrado"
                },
                datultmov:{
                    dateBR: "Data Inválida",
                    maxDateUlt: "Digite uma data até hoje"
                },
                datarq:{
                    dateBR: "Data Inválida",
                    maxDateArq: "Digite uma data até hoje"
                },
                datsai:{
                    dateBR: "Data Inválida",
                    maxDateSai: "Digite uma data até hoje"
                }
            }
        });

    });
});