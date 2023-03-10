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
$table = <<<EOT
 ( 
SELECT dengnet.NU_NOTIFIC, resultado_ccz.SINAN, resultado_ccz.PACIENTE, dengnet.NM_LOGRADO ,resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_IgM_Panbio,
resultado_ccz.Resultado_NS1, resultado_ccz.Sintoma, resultado_ccz.ENTRADA, resultado_ccz.Coleta, resultado_ccz.`Data Resultado` , resultado_ccz.OBSERVACAO
FROM resultado_ccz 
LEFT JOIN dengnet ON resultado_ccz.SINAN = dengnet.NU_NOTIFIC
)temp
    
EOT;

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';

// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'SINAN', 'dt' => 0),
    array('db' => 'Resultado_IgM_Focus', 'dt' => 1),
    array('db' => 'Resultado_IgM_Panbio', 'dt' => 2),
    array('db' => 'Resultado_NS1', 'dt' => 3),
    array('db' => 'Sintoma', 'dt' => 4),
    array('db' => 'PACIENTE', 'dt' => 5),
    array('db' => 'NM_LOGRADO', 'dt' => 6),
    array('db' => 'Coleta', 'dt' => 7),
    array('db' => 'Data Resultado', 'dt' => 8),
    array('db' => 'ENTRADA', 'dt' => 9),
    array('db' => 'OBSERVACAO', 'dt' => 10)
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