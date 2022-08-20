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
// chave primária da tabela
$primaryKey = 'id_esp';

$table = <<<EOT
 ( 
SELECT esporo_an.id_esp, esporo_an.nve, esporo_an.ano, esporo_an.data_entrada, esporo_an.nome_animal,
especie_animal.especie, esporo_an.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporo_an.rua_esp_a, esporo_an.numero,
esporo_an.bairro_esp_a, esporo_an.tutor, esporo_an.telefone1, 
esporo_an.telefone2, esporo_an.dsg_medc, esporo_medc.nm_mdc_esp_an, 
(SELECT  esporo_an_sd_medc.data_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc DESC LIMIT 1) AS data_medc,
(SELECT  esporo_an_sd_medc.qtd_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc DESC LIMIT 1) AS qtd_medc,
(SELECT  esporo_an_sd_medc.nm_ent_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc DESC LIMIT 1) AS nm_ent_medc,
(SELECT  esporo_an_sd_medc.nm_rec_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc DESC LIMIT 1) AS nm_rec_medc,
situacao_esporo.sit_esp, esporo_an.obs
FROM esporo_an
LEFT JOIN especie_animal ON esporo_an.especie = especie_animal.id_especie
LEFT JOIN situacao_esporo ON esporo_an.situacao = situacao_esporo.id_st_esp
LEFT JOIN ruas ON esporo_an.id_rua = ruas.id
LEFT JOIN  esporo_an_sd_medc ON esporo_an.id_esp = esporo_an_sd_medc.id_an_esp 
LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
GROUP BY esporo_an.id_esp
)temp
EOT;




// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'nve', 'dt' => 0),
                array('db' => 'ano', 'dt' => 1),
                array('db' => 'data_entrada', 'dt' => 2),
                array('db' => 'nome_animal', 'dt' => 3, 'formatter' => function ($d) {
                    return strtoupper($d);
                }),
                array('db' => 'especie', 'dt' => 4),
                array('db' => 'rua_esp_a', 'dt' => 5),
                array('db' => 'tutor', 'dt' => 6, 'formatter' => function ($d) {
                    return strtoupper($d);
                }),
                array('db' => 'telefone1', 'dt' => 7, 'formatter' => function ($d) {
                    switch($d){
                        case 'null';
                            return '';
                           case '';
                            return '';
                            break;
                        default:
                            return ' '.$d;
                    }
                }),
                array('db' => 'sit_esp', 'dt' => 8),
                array('db' => 'nm_mdc_esp_an', 'dt' => 9, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d;
                    }
                }),
                array('db' => 'dsg_medc', 'dt' => 10, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d.' mg/dia';
                    }
                }),
                array('db' => 'data_medc', 'dt' => 11, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'qtd_medc', 'dt' => 12, 'formatter' => function ($d) {
                    switch($d){
                        case 0:
                        case 'null';
                            return '';
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d.' comp.';
                    }
                }),
                array('db' => 'nm_ent_medc', 'dt' => 13, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'ENT: '.$d;
                    }
                }),
                array('db' => 'nm_rec_medc', 'dt' => 14, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'REC: '.$d;
                    }
                }),
                array('db' => 'obs', 'dt' => 15),
                array('db' => 'id_esp', 'dt' => 16),
                array('db' => 'telefone2', 'dt' => 17, 'formatter' => function ($d) {
                    switch($d){
                        case 'null';
                            return '';
                        case '';
                            return '';
                            break;
                        default:
                            return ' '.$d;
                    }
                }),
                array('db' => 'dsg_medc', 'dt' => 18),
                array('db' => 'numero', 'dt' => 19),
                array('db' => 'bairro_esp_a', 'dt' => 20)

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