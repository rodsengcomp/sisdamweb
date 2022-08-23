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
$primaryKey = 'id_med_esp';

$table = <<<EOT
 ( 
SELECT esporo_medc.id_med_esp ,esporo_medc.nm_mdc_esp_an FROM esporo_medc
LEFT JOIN esporo_an_ent_medc ON esporo_medc.id_med_esp = esporo_an_ent_medc.nm_esp_medc
)temp
EOT;




// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro 'db' representa o nome da coluna no banco de dados, enquanto o' dt'
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'nm_mdc_esp_an', 'dt' => 0)

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