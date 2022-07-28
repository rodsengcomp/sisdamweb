<?php

/*
* Exemplo de dados do exemplo do script de processamento do lado do servidor.
 *
 * Veja http://datatables.net/usage/server -side para detalhes completos no servidor-
 * Requisitos de processamento de lado da DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 *
/ * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Variáveis ​​de conjunto fáceis
*/

// tabela DB para usar
$table = 'esporotricose_animal';

$table = <<<EOT
 ( 
SELECT esporotricose_animal.id_esp, esporotricose_animal.nve, esporotricose_animal.ano, esporotricose_animal.data_tratamento, esporotricose_animal.nome_animal,
especie_animal.especie_an, esporotricose_animal.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporotricose_animal.rua_esp_a, esporotricose_animal.numero,
esporotricose_animal.bairro_esp_a, esporotricose_animal.nome_proprietario, esporotricose_animal.ddd1, esporotricose_animal.telefone1, esporotricose_animal.ddd2,
esporotricose_animal.telefone2, esporo_medicamentos.id_esp_med, esporo_medicamentos.nome_mdcm, esporo_medicamentos.dose_mg_dia_1,esporo_medicamentos.data_uem,
esporo_medicamentos.jan, esporo_medicamentos.fev, esporo_medicamentos.mar,esporo_medicamentos.abr,
esporo_medicamentos.mai, esporo_medicamentos.jun, esporo_medicamentos.jul, esporo_medicamentos.ago, esporo_medicamentos.set, esporo_medicamentos.out, esporo_medicamentos.nov,
esporo_medicamentos.dez, situacao_esporo.sit_esp, esporotricose_animal.obs
FROM esporotricose_animal
LEFT JOIN esporo_medicamentos ON esporotricose_animal.id_esp = esporo_medicamentos.id_esp_med
LEFT JOIN especie_animal ON esporotricose_animal.especie = especie_animal.id_especie
LEFT JOIN situacao_esporo ON esporotricose_animal.situacao = situacao_esporo.id_st_esp
LEFT JOIN ruas ON esporotricose_animal.id_rua = ruas.id
)temp
EOT;

// chave primária da tabela
$primaryKey = 'id_esp';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'nve', 'dt' => 0),
                array('db' => 'ano', 'dt' => 1),
                array('db' => 'data_tratamento', 'dt' => 2),
                array('db' => 'nome_animal', 'dt' => 3, 'formatter' => function ($d) {
                    return strtoupper($d);
                }),
                array('db' => 'especie_an', 'dt' => 4),
                array('db' => 'rua_esp_a', 'dt' => 5),
                array('db' => 'nome_proprietario', 'dt' => 6, 'formatter' => function ($d) {
                    return strtoupper($d);
                }),
                array('db' => 'numero', 'dt' => 7),
                array('db' => 'sit_esp', 'dt' => 8),
                array('db' => 'nome_mdcm', 'dt' => 9),
                array('db' => 'data_uem', 'dt' => 10),
                array('db' => 'jan', 'dt' => 11),
                array('db' => 'fev', 'dt' => 12),
                array('db' => 'mar', 'dt' => 13),
                array('db' => 'abr', 'dt' => 14),
                array('db' => 'mai', 'dt' => 15),
                array('db' => 'jun', 'dt' => 16),
                array('db' => 'jul', 'dt' => 17),
                array('db' => 'ago', 'dt' => 18),
                array('db' => 'set', 'dt' => 19),
                array('db' => 'out', 'dt' => 20),
                array('db' => 'nov', 'dt' => 21),
                array('db' => 'dez', 'dt' => 22),
                array('db' => 'obs', 'dt' => 23),
                array('db' => 'bairro_esp_a', 'dt' => 24),
                array('db' => 'ddd1', 'dt' => 25, 'formatter' => function ($d) {
                    switch($d){
                        case '0';
                        return '';
                    break;
                    default:
                        return '('.$d.')';
                    }
                }),
                array('db' => 'telefone1', 'dt' => 26, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                        return '';
                    break;
                    default:
                        return ' '.$d;
                    }
                }),
                array('db' => 'ddd2', 'dt' => 27, 'formatter' => function ($d) {
                    switch($d){
                        case '0';
                        return '';
                    break;
                    default:
                        return '('.$d.')';
                    }
                }),
                array('db' => 'telefone2', 'dt' => 28, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                        return '';
                    break;
                    default:
                        return ' '.$d;
                    }
                }),
                array('db' => 'dose_mg_dia_1', 'dt' => 29),
                array('db' => 'id_esp', 'dt' => 30)
);

// SQL server connection information
include_once '../../../../config.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey , $columns)
);