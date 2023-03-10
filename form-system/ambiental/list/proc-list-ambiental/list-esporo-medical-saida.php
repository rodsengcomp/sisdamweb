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
$primaryKey = 'id_sd';
$lixo = $_GET['lixeira'] ?? '0';

$table = <<<EOT
 ( 
SELECT esporo_an_sd_medc.id_sd, esporo_an_sd_medc.id_an_esp, esporo_an_sd_medc.data_medc, esporo_an_sd_medc.id_medc, esporo_an_sd_medc.dsg_medc, 
esporo_an_sd_medc.qtd_medc, esporo_an_sd_medc.nm_ent_medc, esporo_an_sd_medc.nm_rec_medc, esporo_an_sd_medc.lixeira, esporo_an_sd_medc.criado, esporo_an_sd_medc.data_criado, 
esporo_an_sd_medc.alterado, esporo_an_sd_medc.data_alterado, esporo_an.nome_animal, esporo_an.tutor, esporo_an.especie, 
especie_animal.especie AS especie_nome,
esporo_medc.nm_mdc_esp_an, usuarios.nome
FROM esporo_an_sd_medc
LEFT JOIN esporo_an ON esporo_an_sd_medc.id_an_esp = esporo_an.id_esp
LEFT JOIN especie_animal ON esporo_an_sd_medc.id_especie = especie_animal.id_especie
LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
LEFT JOIN usuarios ON usuarios.login = esporo_medc.criado
WHERE esporo_an_sd_medc.lixeira = $lixo
)temp
EOT;

// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'id_an_esp', 'dt' => 0),
                array('db' => 'tutor', 'dt' => 1, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return strtoupper($d);
                    }
                }
                ),
                array('db' => 'nome_animal', 'dt' => 2, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return strtoupper($d);
                    }
                }
                ),
                array('db' => 'especie_nome', 'dt' => 3),
                array('db' => 'data_medc', 'dt' => 4, 'formatter' => function ($d) {
                    switch($d){
                        case null:
                        case '0':
                        case '0000-00-00':
                        case ''; return '';
                        default:
                            return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'nm_mdc_esp_an', 'dt' => 5),
                array('db' => 'dsg_medc', 'dt' => 6),
                array('db' => 'qtd_medc', 'dt' => 7),
                array('db' => 'nm_ent_medc', 'dt' => 8),
                array('db' => 'nm_rec_medc', 'dt' => 9),
                array('db' => 'lixeira', 'dt' => 10),
                array('db' => 'id_sd', 'dt' => 11),
                array('db' => 'nome', 'dt' => 12, 'formatter' => function ($d) {
                    return strstr($d, ' ', true);
                }),
                array('db' => 'data_criado', 'dt' => 13, 'formatter' => function ($d) {
                    switch($d){
                        case null:
                        case '0':
                        case '0000-00-00':
                        case ''; return '';
                        default:
                            return date('d/m/Y', strtotime($d));
                    }
                })

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