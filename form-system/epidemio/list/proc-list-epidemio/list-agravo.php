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
$table = 'agravo';

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'id', 'dt' => 1),
    array('db' => 'tipo', 'dt' => 2),
    array('db' => 'cid', 'dt' => 3),
    array('db' => 'agravo', 'dt' => 4),
    array('db' => 'usuariocad', 'dt' => 5),
    array(
        'db' => 'criado',
        'dt' => 6,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'usuarioalt', 'dt' => 7),
    array(
        'db' => 'alterado',
        'dt' => 8,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    )
);

// SQL server connection information
include_once '../../../../config.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);