<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">


    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    $result_table_febre_a = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengnet' ORDER BY `CREATE_TIME` DESC";
    $result_febre_a = $conectar->query($result_table_febre_a);
    $row_result_febre_a = mysqli_fetch_assoc($result_febre_a);

    ?>



    <table id="list-rel-chiku" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SINAN</th> <!-- 0 -->
            <th class="text-center">DT_NOTIFIC</th>
            <th class="text-center">1º SIN</th>
            <th class="text-center">NOME</th>
            <th class="text-center">DT_NASC</th>
            <th class="text-center">CNS_SUS</th>
            <th class="text-center">NM_MAE_PAC</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">NUMERO</th>
            <th class="text-center">COMPLEM</th>
            <th class="text-center">UBS_RES</th>
            <th class="text-center">TELEFONE</th>
            <th class="text-center">RES</th>
            <th class="text-center">EXAME</th>
            <th class="text-center">UN. NOTIF.</th>
            <th class="text-center">OBSERVAÇÕES</th>
            <th class="text-center">CLASS.</th>
            <th class="text-center">CRIT.</th>
            <th class="text-center">DT ENC.</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>