<?php
/*
 * (SELECT COUNT(id_rua) FROM esporo_an
GROUP BY id_rua
HAVING COUNT(id_rua) > 1) AS total_busca,
(SELECT count(id_esp) FROM esporo_an
WHERE esporo_an.id_rua > 1) AS total_busca,
 * */
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
SELECT esporo_an.id_esp, esporo_an.nve, esporo_an.ano, esporo_an.data_entrada, esporo_an.nome_animal, esporo_an.lixeira,
especie_animal.especie, esporo_an.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporo_an.rua_esp_a, esporo_an.numero,
esporo_an.tutor, esporo_an.telefone1, esporo_an.dsg_medc, esporo_an.origem, esporo_an.pedido, esporo_an.sexo, esporo_an.idade,
esporo_an.diagnostico, esporo_an.id_medc, esporo_an.casos_hum_dom,
esporo_medc.nm_mdc_esp_an, 
resultado_esporo.Nr_Pedido, resultado_esporo.Data_Pedido, resultado_esporo.Resultado,
suvis.suvis,
ruas.cep, ruas.da,
origem.nm_origem,
(SELECT COUNT(id_esp) FROM esporo_an WHERE ruas.id = esporo_an.id_rua ORDER BY pin DESC LIMIT 1) AS total_busca,
(SELECT SUM(qtd_medc) FROM esporo_an_sd_medc
WHERE esporo_an_sd_medc.id_an_esp = esporo_an.id_esp) AS total_medc,
(SELECT  esporo_an_sd_medc.data_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc ASC LIMIT 1) AS data_medc_in,
(SELECT  esporo_an_sd_medc.data_medc
FROM    esporo_an_sd_medc
WHERE   esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
ORDER BY esporo_an_sd_medc.data_medc DESC LIMIT 1) AS data_medc_fn,
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
LEFT JOIN resultado_esporo ON esporo_an.pedido = resultado_esporo.Nr_Pedido
LEFT JOIN suvis ON esporo_an.id_uvis = suvis.id
LEFT JOIN origem ON esporo_an.origem = origem.id_origem
WHERE esporo_an.lixeira = 0
GROUP BY esporo_an.id_esp
)temp
EOT;




// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'nve', 'dt' => 0),
                array('db' => 'ano', 'dt' => 1, 'formatter' => function ($d) { return substr($d,2); }),
                array('db' => 'nm_origem', 'dt' => 2),
                array('db' => 'data_entrada', 'dt' => 3, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'pedido', 'dt' => 4, 'formatter' => function ($d) {
                    switch($d){ case 'null'; return '';
                                case ''; return '';
                        default: return ' '.$d;
                    }
                }),
                array('db' => 'rua', 'dt' => 5, 'formatter' => function ($d) {
                    return ucwords(strtolower(trim($d, '*')));
                }),
                array('db' => 'numero', 'dt' => 6),
                array('db' => 'cep', 'dt' => 7),
                array('db' => 'da', 'dt' => 8),
                array('db' => 'suvis', 'dt' => 9, 'formatter' => function ($d) {
                    return ucwords(strtolower($d));
                }),
                array('db' => 'especie', 'dt' => 10, 'formatter' => function ($d) {
                    return ucwords(strtolower($d));
                }),
                array('db' => 'nome_animal', 'dt' => 11),
                array('db' => 'sexo', 'dt' => 12, 'formatter' => function ($d) {
                    switch($d){
                        case 0; return '';
                        case 1; return 'M';
                        case 2; return 'F';
                        case 3; return 'I';
                        default: return $d;
                    }
                }),
                array('db' => 'idade', 'dt' => 13),
                array('db' => 'diagnostico', 'dt' => 14, 'formatter' => function ($d) {
                    switch($d){
                        case 0; return 'EM INVESTIGAÇÃO';
                        case 1; return 'POSITIVO';
                        case 2; return 'NEGATIVO';
                        default: return 'EM INVESTIGAÇÃO';
                    }
                }),
                array('db' => 'Resultado', 'dt' => 15),
                array('db' => 'Data_Pedido', 'dt' => 16),
                array('db' => 'id_medc', 'dt' => 17, 'formatter' => function ($d) {
                    switch($d){
                        case 1; return 'SIM';
                        default: return 'NAO';
                    }
                }),
                array('db' => 'data_medc_in', 'dt' => 18, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'dsg_medc', 'dt' => 19, 'formatter' => function ($d) {
                    switch($d){
                        case 'null'; return '';
                        case ''; return '';
                        default: return ' '.$d;
                    }
                }),
                array('db' => 'data_medc_fn', 'dt' => 20, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'sit_esp', 'dt' => 21),
                array('db' => 'tutor', 'dt' => 22, 'formatter' => function ($d) {
                    return strtoupper($d);
                }),
                array('db' => 'telefone1', 'dt' => 23, 'formatter' => function ($d) {
                    switch($d){
                        case 'null';
                            return '';
                           case '';
                            return '';
                        default:
                            return ' '.$d;
                    }
                }),
                array('db' => 'data_medc_fn', 'dt' => 24, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'total_medc', 'dt' => 25),
                array('db' => 'data_medc_fn', 'dt' => 26, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'data_entrada', 'dt' => 27, 'formatter' => function ($d) {
                    switch($d){
                        case ''; return '';
                        default: return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'total_busca', 'dt' => 28),
                array('db' => 'casos_hum_dom', 'dt' => 29),
                array('db' => 'obs', 'dt' => 30)
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