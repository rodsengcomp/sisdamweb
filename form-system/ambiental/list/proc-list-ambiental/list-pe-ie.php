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
$table = 'pes_ies_38_83';

// chave primária da tabela
$primaryKey = 'id_pe_ie';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'nm_pe_ie', 'dt' => 0),
    array('db' => 'tipo_pe_ie', 'dt' => 1),
    array('db' => 'esp_pe_ie', 'dt' => 2),
    array('db' => 'nome_pe_ie', 'dt' => 3),
    array('db' => 'risco_pe_ie', 'dt' => 4),
    array('db' => 'status_pe_ie', 'dt' => 5),
    array('db' => 'da_pe_ie', 'dt' => 6),
    array('db' => 'setor_pe_ie', 'dt' => 7),
    array('db' => 'quadra_pe_ie', 'dt' => 8),
    array('db' => 'end_pe_ie', 'dt' => 9),
    array('db' => 'ruagoogle_pe_ie', 'dt' => 10),
    array('db' => 'id_pe_ie', 'dt' => 11),
    array('db' => 'id_pe_ie', 'dt' => 12),
    array('db' => 'tel_fixo_pe_ie', 'dt' => 13),
    array('db' => 'ubs_pe_ie', 'dt' => 14),
    array('db' => 'alterado', 'dt' => 15),
    array('db' => 'usuarioalt', 'dt' => 16),
    array('db' => 'criado', 'dt' => 17),
    array('db' => 'usuariocad', 'dt' => 18),
    array('db' => 'log_pe_ie', 'dt' => 19),
    array('db' => 'num_pe_ie', 'dt' => 20),
    array('db' => 'comp_pe_ie', 'dt' => 21),
    array('db' => 'cep_pe_ie', 'dt' => 22),
    array('db' => 'bairro_pe_ie', 'dt' => 23),
    array('db' => 'lat_pe_ie', 'dt' => 24),
    array('db' => 'lng_pe_ie', 'dt' => 25),
    array('db' => 'pgguia_pe_ie', 'dt' => 26),
    array('db' => 'ubs_pe_ie', 'dt' => 27),
    array('db' => 'obs_pe_ie', 'dt' => 28),
    array('db' => 'tel_com_pe_ie', 'dt' => 29),
    array('db' => 'tel_cel_pe_ie_1', 'dt' => 30),
    array('db' => 'tel_cel_pe_ie_2', 'dt' => 31),

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