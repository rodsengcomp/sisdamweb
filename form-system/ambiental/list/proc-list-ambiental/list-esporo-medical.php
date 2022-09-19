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
$primaryKey = 'id_esp_ent';
$lixo = $_GET['lixeira'] ?? '0';

$table = <<<EOT
 ( 
SELECT esporo_an_ent_medc.id_esp_ent, esporo_an_ent_medc.dt_cadastro, esporo_an_ent_medc.nm_esp_medc, esporo_an_ent_medc.dsg_esp_medc, 
esporo_an_ent_medc.qtd_esp_medc, esporo_an_ent_medc.criado, esporo_an_ent_medc.dt_criado, 
esporo_an_ent_medc.alterado, 
esporo_an_ent_medc.dt_alterado, esporo_medc.nm_mdc_esp_an, usuarios.nome
FROM esporo_an_ent_medc
LEFT JOIN esporo_medc ON esporo_an_ent_medc.nm_esp_medc = esporo_medc.id_med_esp
LEFT JOIN usuarios ON usuarios.login = esporo_medc.criado
WHERE lixeira = $lixo
)temp
EOT;

// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'id_esp_ent', 'dt' => 0),
                array('db' => 'dt_cadastro', 'dt' => 1, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'nm_mdc_esp_an', 'dt' => 2),
                array('db' => 'dsg_esp_medc', 'dt' => 3),
                array('db' => 'qtd_esp_medc', 'dt' => 4),
                array('db' => 'nome', 'dt' => 5, 'formatter' => function ($d) {
                    return strstr($d, ' ', true);
                }),
                array('db' => 'dt_criado', 'dt' => 6, 'formatter' => function ($d) {
                    switch($d){
                        case '';
                            return '';
                            break;
                        default:
                            return date('d/m/Y', strtotime($d));
                    }
                }),
                array('db' => 'id_esp_ent', 'dt' => 7)

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