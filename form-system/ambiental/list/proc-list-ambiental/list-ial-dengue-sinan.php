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
$table = 'dengue_ial_sinan';

// chave primária da tabela
$primaryKey = 'Requisição';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'sinan', 'dt' => 0), // Ok
    array('db' => 'Requisição', 'dt' => 1), // Ok
    array('db' => 'Paciente', 'dt' => 2), // Ok
    array('db' => 'Data de Cadastro', 'dt' => 3),//Ok
    array('db' => 'Data do Recebimento', 'dt' => 4),//Ok
    array('db' => 'Data da Liberação', 'dt' => 5),//Ok
    array('db' => 'Status Exame', 'dt' => 6),//Ok
    array('db' => 'Exame', 'dt' => 7),//Ok
    array('db' => 'Resultado', 'dt' => 8),//Ok
    array('db' => 'Metodologia', 'dt' => 9),//Ok
    array('db' => 'Amostra', 'dt' => 10),//Ok
    array('db' => 'CNS do Paciente', 'dt' => 11), //Ok
    array('db' => 'Municipio de Residência', 'dt' => 12),//Ok
    array('db' => 'Estado de Residência', 'dt' => 13),//Ok
    array('db' => 'Unidade Solicitante', 'dt' => 14), // Ok
    array('db' => 'Municipio do Solicitante', 'dt' => 15), //Ok
    array('db' => 'Material Biológico', 'dt' => 16),//Ok
    array('db' => 'Laboratório de Cadastro', 'dt' => 17), // Ok
    array('db' => 'Laboratório de Execução', 'dt' => 18),//Ok
    array('db' => 'id', 'dt' => 19)
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