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

$ids = $_GET['id'];

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
$primaryKey = 'id_an_esp';

$table = <<<EOT
 ( 
SELECT esporo_an_sd_medc.id_medc, esporo_an_sd_medc.data_medc, esporo_an_sd_medc.dsg_medc, esporo_an_sd_medc.qtd_medc, esporo_an_sd_medc.nm_ent_medc, esporo_an_sd_medc.nm_rec_medc, 
esporo_an_sd_medc.id_an_esp,
esporo_medc.nm_mdc_esp_an
FROM esporo_an_sd_medc
LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
WHERE id_an_esp=$ids
ORDER BY data_medc DESC
)temp
EOT;
// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
                array('db' => 'data_medc', 'dt' => 0, 'formatter' => function ($d) {
                    return date('d/m/Y', strtotime($d));
                }),
                array('db' => 'data_medc', 'dt' => 1,),
                array('db' => 'nm_mdc_esp_an', 'dt' => 2),
                array('db' => 'dsg_medc', 'dt' => 3),
                array('db' => 'qtd_medc', 'dt' => 4),
                array('db' => 'nm_ent_medc', 'dt' => 5),
                array('db' => 'nm_rec_medc', 'dt' => 6),
                array('db' => 'id_medc', 'dt' => 7),
                array('db' => 'id_medc', 'dt' => 8)
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