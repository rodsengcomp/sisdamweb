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
$table = 'resultado_esporo';

// chave primária da tabela
$primaryKey = 'Nr_Pedido';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
               array('db' => 'Nr_Pedido', 'dt' => 0),
               array('db' => 'Data_Pedido', 'dt' => 1),
               array('db' => 'SeqProcedimento', 'dt' => 2),
               array('db' => 'Solicitante', 'dt' => 3),
               array('db' => 'Distrito', 'dt' => 4),
               array('db' => 'SUVIS', 'dt' => 5),
               array('db' => 'SINAN', 'dt' => 6),
               array('db' => 'Nome', 'dt' => 7),
               array('db' => 'Especie', 'dt' => 8),
               array('db' => 'Proprietario', 'dt' => 9),
               array('db' => 'Endereco', 'dt' => 10),
               array('db' => 'Numero', 'dt' => 11),
               array('db' => 'Bairro', 'dt' => 12),
               array('db' => 'CEP', 'dt' => 13),
               array('db' => 'Resultado', 'dt' => 14),
               array('db' => 'Identificacao1', 'dt' => 15),
               array('db' => 'Identificacao2', 'dt' => 16),
               array('db' => 'LIBERACAO_EM', 'dt' => 17)
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