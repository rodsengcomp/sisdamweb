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
$table = 'adm_sanitaria';

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'id', 'dt' => 1),
    array('db' => 'nome_razao_social', 'dt' => 2),
    array('db' => 'num_documento', 'dt' => 3),
    array('db' => 'inspsivisa', 'dt' => 4),
    array('db' => 'atividade', 'dt' => 5),
    array('db' => 'tipo', 'dt' => 6),
    array('db' => 'data_entrada','dt' => 7,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d))."-E";}),
    array('db' => 'prazo','dt' => 8,'formatter' => function ($d, $row) {return date('m/d/Y', strtotime($d));}),
    array('db' => 'data_ult_mov_proc','dt' => 9,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d))."-U";}),
    array('db' => 'data_arquivo','dt' => 10,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d))."-A";}),
    array('db' => 'saida','dt' => 11,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d))."-S";}),
    array('db' => 'orgao', 'dt' => 12),
    array('db' => 'tecnico', 'dt' => 13),
    array('db' => 'observacao', 'dt' => 14),
    array('db' => 'usuario_cad', 'dt' => 15),
    array('db' => 'data_cad','dt' => 16,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d));}),
    array('db' => 'usuario_edit', 'dt' => 17),
    array('db' => 'data_edit','dt' => 18,'formatter' => function ($d, $row) {return date('d/m/y', strtotime($d));})
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