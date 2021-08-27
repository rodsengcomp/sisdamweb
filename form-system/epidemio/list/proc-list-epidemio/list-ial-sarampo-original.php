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
$table = 'sarampo_ial';

// chave primária da tabela
$primaryKey = 'Requisição';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'Núm. Notificação Sinan', 'dt' => 0),
    array('db' => 'Paciente' , 'dt' => 1),
    array('db' => 'Exame' , 'dt' =>	2),
    array('db' => 'Metodologia' , 'dt' => 3),//Metodologia ***
    array('db' => 'Material Biológico' , 'dt' => 4),//Material Biológico ***
    array('db' => 'Status Exame' , 'dt' => 5),
    array('db' => '1º Campo Resultado' , 'dt' => 6),//1º Campo Resultado ***
    array('db' => 'CNS do Paciente' , 'dt' => 7),//	CNS do Paciente ***
    array('db' => 'Requisição', 'dt' => 8),// Não Tem
    array('db' => 'Bancada', 'dt' => 9),// Não Tem
    array('db' => 'Municipio de Residência' , 'dt' => 10),//Municipio de Residência
    array('db' => 'Estado de Residência' , 'dt' => 11),//Estado de Residência***
    array('db' => 'Unidade Solicitante' , 'dt' => 12),//Unidade Solicitante ***
    array('db' => 'Municipio do Solicitante' , 'dt' => 13),// Municipio do Solicitante ***
    array('db' => 'Cód. Amostra' , 'dt' => 14),// Não Tem
    array('db' => 'Amostra' , 'dt' => 15),
    array('db' => 'Restrição' , 'dt' => 16),// Não Tem
    array('db' => 'Labotório Cadastro' , 'dt' => 17),
    array('db' => 'Dt. Cadastro' , 'dt' => 18),
    array('db' => 'Dt. Recebimento' , 'dt' => 19),
    array('db' => 'Dt. Liberação', 'dt' => 20),
    array('db' => 'Tempo' , 'dt' => 21),// Tempo ***
    array('db' => 'Laboratório de Execução' , 'dt' => 22),// Laboratório de Execução
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