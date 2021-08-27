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
$table = 'chiku_ial';

// chave primária da tabela
$primaryKey = 'Requisição';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'Requisição', 'dt' => 0),
    array('db' => 'Paciente', 'dt' => 1),
    array('db' => 'Dt. Cadastro', 'dt' => 2),
    array('db' => 'Dt. Recebimento', 'dt' => 3),
    array('db' => 'Dt. Liberação', 'dt' => 4),
    array('db' => 'Status Exame', 'dt' => 5),
    array('db' => 'Exame', 'dt' => 6),
    array('db' => 'Resultado', 'dt' => 7),
    array('db' => 'Metodo', 'dt' => 8),
    array('db' => 'Cód. Amostra', 'dt' => 9),
    array('db' => 'Amostra', 'dt' => 10),
    array('db' => 'CNS', 'dt' => 11),
    array('db' => 'Mun. Residência', 'dt' => 12),
    array('db' => 'UF Residência', 'dt' => 13),
    array('db' => 'Requisitante', 'dt' => 14),
    array('db' => 'Mun. Requisitante', 'dt' => 15),
    array('db' => 'Material', 'dt' => 16),
    array('db' => 'Restrição', 'dt' => 17),
    array('db' => 'Labotório Cadastro', 'dt' => 18),
    array('db' => 'Labotório Executor', 'dt' => 19),
    array('db' => 'id', 'dt' => 20)
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