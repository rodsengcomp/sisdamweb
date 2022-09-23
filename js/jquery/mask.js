/**
 * Created by Rodolfo on 09/06/2017.
 * https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
 */

jQuery(function($){
    $("#sinanedi").mask("9999999");
    $("#dataentcad").mask("99/99/9999");
    $("#dataentcad2").mask("99/99/9999");
    $("#datatid").mask("99/99/9999");
    $("#dataentedi").mask("99/99/9999");
    $("#dataentesp").mask("99/99/9999");
    $("#datatram").mask("99/99/9999");
    $("#databloqedit").mask("99/99/9999");
    $("#datanebedit").mask("99/99/9999");
    $("#idade").mask("999a");
    $("#codigo").mask("999999");
    $("#datanotcad").mask("99/99/9999");


    $("#dataua").mask("99/99/9999");
    $("#databa").mask("99/99/9999");
    $("#dataft").mask("99/99/9999");


    $("#dataobitocad").mask("99/99/9999");
    $("#datanotedi").mask("99/99/9999");
    $("#data1sincad").mask("99/99/9999");
    $("#data1sinedi").mask("99/99/9999");
    $("#datamemocad").mask("99/99/9999");
    $("#telcad").mask("(99) 99999999?9");
    $("#tel1").mask("(99) 99999999?9");
    $("#tel2").mask("(99) 99999999?9");
    $("#tels1").mask("99999999?9");
    $("#tels2").mask("99999999?9");
    $("#teledi").mask("(99) 99999999?9");
    $("#cepcad").mask("99999-999");
    $("#ceprua").mask("99999-999");
    $("#cepedi").mask("99999-999");
    $("#pgguiarua").mask("*99-a99");
    $("#cep").mask("99999-999");
    $("#postal_code").mask("99999-999");
    $("#pgguia").mask("*99-a99");
    $("#cnes").mask("9999999");
    $("#inputEmail").mask("a999999");
    $("#sexo").mask("a");
    $("#id_menu").mask("9?9");
    $("#docproc").mask("9999-9.999.999-9");
    $("#inspsivisa").mask("?999/99");

    $("#datasancad").mask("99/99/9999");
    $("#dataprazocad").mask("99/99/9999");
    $("#dataultmovcad").mask("99/99/9999");
    $("#dataarqcad").mask("99/99/9999");
    $("#datasaidacad").mask("99/99/9999");

    $("#cpfcnpj").keydown(function(){
        $("#cpfcnpj").unmask();
        $("#cpfcnpj").focusout(function() {
        $("#cpfcnpj").unmask();
        var tamanho = $("#cpfcnpj").val().replace(/\D/g, '').length;

        if(tamanho < 12){
            $("#cpfcnpj").mask("999.999.999-99");
        } else {
            $("#cpfcnpj").mask("99.999.999/9999-99");
        }
        });

        $("#cpfcnpj").focusin(function() {
            $("#cpfcnpj").unmask();
        });
    });
});
