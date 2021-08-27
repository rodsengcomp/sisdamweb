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
    array('db' => 'Requisição', 'dt' => 0),
    array('db' => 'Paciente' , 'dt' => 1),
    array('db' => 'Exame' , 'dt' =>	2),
    array('db' => 'Metodo' , 'dt' => 3),//Metodologia ***
    array('db' => 'Material' , 'dt' => 4),//Material Biológico ou Clínico ??? ***
    array('db' => 'Status Exame' , 'dt' => 5),
    array('db' => 'Resultado' , 'dt' => 6),//1º Campo Resultado ***
    array('db' => 'CNS' , 'dt' => 7),//	CNS do Paciente ***
    array('db' => 'Setor', 'dt' => 8),// Não Tem
    array('db' => 'Bancada', 'dt' => 9),// Não Tem
    array('db' => 'Mun. Residência' , 'dt' => 10),//Municipio de Residência
    array('db' => 'UF Residência' , 'dt' => 11),//Estado de Residência***
    array('db' => 'Requisitante' , 'dt' => 12),//Unidade Solicitante
    array('db' => 'Mun. Requisitante' , 'dt' => 13),// Municipio do Solicitante
    array('db' => 'Cód. Amostra' , 'dt' => 14),
    array('db' => 'Amostra' , 'dt' => 15),
    array('db' => 'Restrição' , 'dt' => 16),
    array('db' => 'Labotório Cadastro' , 'dt' => 17),
    array('db' => 'Dt. Cadastro' , 'dt' => 18),
    array('db' => 'Dt. Recebimento' , 'dt' => 19),
    array('db' => 'Dt. Liberação', 'dt' => 20),
    array('db' => 'Tempo Liberação' , 'dt' => 21),
    array('db' => 'Labotório Executor' , 'dt' => 22),
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