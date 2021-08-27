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
$table = 'sv2_2016';

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'sinan', 'dt' => 1),
    array('db' => 'dataentrada', 'dt' => 2),
    array('db' => 'se', 'dt' => 3),
    array('db' => 'agravo', 'dt' => 4),
    array('db' => 'tel', 'dt' => 5),
    array('db' => 'nome', 'dt' => 6),
    array('db' => 'datanot', 'dt' => 7),
    array('db' => 'localate', 'dt' => 8),
    array('db' => 'sexo', 'dt' => 9),
    array('db' => 'idade', 'dt' => 10),
    array('db' => 'log', 'dt' => 11),
    array('db' => 'rua', 'dt' => 12),
    array('db' => 'num', 'dt' => 13),
    array('db' => 'comp', 'dt' => 14),
    array('db' => 'bairro', 'dt' => 15),
    array('db' => 'cep', 'dt' => 16),
    array('db' => 'localvd', 'dt' => 17),
    array('db' => 'suvis', 'dt' => 18),
    array('db' => 'cidade', 'dt' => 19),
    array('db' => 'dataobito', 'dt' => 20),
    array('db' => 'usuariocad', 'dt' => 21),
    array(
        'db' => 'criado',
        'dt' => 22,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'usuarioalt', 'dt' => 23),
    array(
        'db' => 'alterado',
        'dt' => 24,
        'formatter' => function ($d, $row) {
            return date('d/m/Y H:i:s', strtotime($d));
        }
    ),
    array('db' => 'ocorrencia', 'dt' => 25)
);

// SQL server connection information
include_once '../../../../config.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('../../ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);