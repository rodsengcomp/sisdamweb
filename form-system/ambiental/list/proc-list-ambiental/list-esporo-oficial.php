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
SELECT esporotricose_animal.id_esp, esporotricose_animal.nve, esporotricose_animal.ano, esporotricose_animal.data_entrada, esporotricose_animal.nome_animal,
especie_animal.especie, esporotricose_animal.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporotricose_animal.rua_esp_a, esporotricose_animal.numero,
esporotricose_animal.bairro_esp_a, esporotricose_animal.tutor, esporotricose_animal.telefone1, 
esporotricose_animal.telefone2, esporo_medicamento.nm_mdc_esp_an, espo_animal_entrega_medicamentos.nm_medc, espo_animal_entrega_medicamentos.data_medc_1, 
espo_animal_entrega_medicamentos.dsg_medc, 
espo_animal_entrega_medicamentos.qtd_medc_1, espo_animal_entrega_medicamentos.nm_ent_medc_1, espo_animal_entrega_medicamentos.nm_rec_medc_1, 
espo_animal_entrega_medicamentos.data_medc_2, espo_animal_entrega_medicamentos.qtd_medc_2, espo_animal_entrega_medicamentos.nm_ent_medc_2, 
espo_animal_entrega_medicamentos.nm_rec_medc_2, espo_animal_entrega_medicamentos.data_medc_3, espo_animal_entrega_medicamentos.qtd_medc_3, 
espo_animal_entrega_medicamentos.nm_ent_medc_3, espo_animal_entrega_medicamentos.nm_rec_medc_3,
situacao_esporo.sit_esp, esporotricose_animal.obs
FROM esporotricose_animal
LEFT JOIN espo_animal_entrega_medicamentos ON esporotricose_animal.id_esp = espo_animal_entrega_medicamentos.id_an_esp
LEFT JOIN esporo_medicamento ON espo_animal_entrega_medicamentos.nm_medc = esporo_medicamento.id_med_esp
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
                array('db' => 'data_medc_1', 'dt' => 11, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d;
                    }
                }),
                array('db' => 'qtd_medc_1', 'dt' => 12, 'formatter' => function ($d) {
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
                array('db' => 'nm_ent_medc_1', 'dt' => 13, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'ENT: '.$d;
                    }
                }),
                array('db' => 'nm_rec_medc_1', 'dt' => 14, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'REC: '.$d;
                    }
                }),
                array('db' => 'data_medc_2', 'dt' => 15, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d;
                    }
                }),
                array('db' => 'qtd_medc_2', 'dt' => 16, 'formatter' => function ($d) {
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
                array('db' => 'nm_ent_medc_2', 'dt' => 17, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'ENT: '.$d;
                    }
                }),
                array('db' => 'nm_rec_medc_2', 'dt' => 18, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'REC: '.$d;
                    }
                }),
                array('db' => 'data_medc_3', 'dt' => 19, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return ''.$d;
                    }
                }),
                array('db' => 'qtd_medc_3', 'dt' => 20, 'formatter' => function ($d) {
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
                array('db' => 'nm_ent_medc_3', 'dt' => 21, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'ENT: '.$d;
                    }
                }),
                array('db' => 'nm_rec_medc_3', 'dt' => 22, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return 'REC: '.$d;
                    }
                }),
                array('db' => 'obs', 'dt' => 23),
                array('db' => 'id_esp', 'dt' => 24),
                array('db' => 'telefone2', 'dt' => 25, 'formatter' => function ($d) {
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
                array('db' => 'dsg_medc', 'dt' => 26)
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