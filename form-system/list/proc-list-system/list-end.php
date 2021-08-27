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
$table = 'ruas';

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'id', 'dt' => 1),
    array('db' => 'da', 'dt' => 2),
    array('db' => 'setor', 'dt' => 3),
    array('db' => 'log', 'dt' => 4),
    array('db' => 'rua', 'dt' => 5),
    array('db' => 'bairro', 'dt' => 6),
    array('db' => 'cep', 'dt' => 7),
    array('db' => 'pgguia', 'dt' => 8),
    array('db' => 'ubs', 'dt' => 9),
    array('db' => 'atual', 'dt' => 10),
    array('db' => 'ruagoogle', 'dt' => 11),
    array('db' => 'latitude', 'dt' => 12),
    array('db' => 'longitude', 'dt' => 13),
    array('db' => 'usuariocad', 'dt' => 14),
    array(
        'db' => 'criado',
        'dt' => 15,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'usuarioalt', 'dt' => 16),
    array(
        'db' => 'alterado',
        'dt' => 17,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    )
);

// SQL server connection information
include_once '../../../config.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('../ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);