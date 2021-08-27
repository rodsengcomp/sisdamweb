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
$table = 'sv2';

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'id', 'dt' => 1),
    array('db' => 'sinan', 'dt' => 2),
    array('db' => 'protocolo', 'dt' => 3),
    array('db' => 'dataentrada', 'dt' => 4),
    array('db' => 'se', 'dt' => 5),
    array('db' => 'agravo', 'dt' => 6),
    array('db' => 'tel', 'dt' => 7),
    array('db' => 'nome', 'dt' => 8),
    array('db' => 'datanot', 'dt' => 9),
    array('db' => 'localate', 'dt' => 10),
    array('db' => 'sexo', 'dt' => 11),
    array('db' => 'idade', 'dt' => 12),
    array('db' => 'da', 'dt' => 13),
    array('db' => 'log', 'dt' => 14),
    array('db' => 'rua', 'dt' => 15),
    array('db' => 'num', 'dt' => 16),
    array('db' => 'comp', 'dt' => 17),
    array('db' => 'bairro', 'dt' => 18),
    array('db' => 'cep', 'dt' => 19),
    array('db' => 'localvd', 'dt' => 20),
    array('db' => 'suvis', 'dt' => 21),
    array('db' => 'cidade', 'dt' => 22),
    array('db' => 'dataobito', 'dt' => 23),
    array('db' => 'usuariocad', 'dt' => 24),
    array(
        'db' => 'criado',
        'dt' => 25,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'usuarioalt', 'dt' => 26),
    array(
        'db' => 'alterado',
        'dt' => 27,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'tipo', 'dt' => 28),
    array('db' => 'ocorrencia', 'dt' => 29)
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