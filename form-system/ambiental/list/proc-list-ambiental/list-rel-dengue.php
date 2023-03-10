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
SELECT dengnet.NU_NOTIFIC, dengnet.DT_NOTIFIC,dengnet.SEM_NOT,dengnet.DT_SIN_PRI,dengnet.SEM_PRI, dengnet.NM_PACIENT, dengnet.DT_NASC, dengnet.ID_CNS_SUS , dengnet.NM_MAE_PAC,dengnet.DT_ENCERRA,
dengnet.CLASSI_FIN,dengnet.CRITERIO,dengnet.NM_LOGRADO, dengnet.ID_DISTRIT, dengnet.NU_NUMERO, dengnet.NM_COMPLEM,dengnet.NM_REFEREN, dengnet.NU_CEP,dengnet.NU_TELEFON,
dengnet.DS_OBS,dengnet.NU_DDD_TEL,
tbldengue.UBS1,tbldengue.Cep1,tbldengue.UnidadeNotificadora,tbldengue.ResultadoTr,tbldengue.Endereco1,tbldengue.Setor1,tbldengue.DataBloqueio,tbldengue.DataNeb,
tbldengue.Latitude, tbldengue.Longitude,
Resultado_CCZ.SINAN, Resultado_CCZ.Resultado_IgM_Focus,Resultado_CCZ.Resultado_IgM_Panbio, Resultado_CCZ.Resultado_NS1, Resultado_CCZ.ENTRADA, Resultado_CCZ.Coleta, resultado_ccz.`Data Resultado` ,
Resultado_CCZ.Sintoma, Resultado_CCZ.D_A, Resultado_CCZ.UVIS
FROM dengnet LEFT JOIN tbldengue ON dengnet.NU_NOTIFIC = tbldengue.nDoc   
LEFT JOIN resultado_ccz ON dengnet.NU_NOTIFIC = resultado_ccz.SINAN
WHERE (((dengnet.ID_DISTRIT) Like "70")))temp
EOT;

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array( 'db' => 'NU_NOTIFIC', 'dt' => 0),
    array( 'db' => 'DT_NOTIFIC', 'dt' => 1),
    array( 'db' => 'SEM_NOT', 'dt' => 2),
    array( 'db' => 'DT_SIN_PRI', 'dt' => 3),
    array( 'db' => 'SEM_PRI', 'dt' => 4),
    array( 'db' => 'NM_PACIENT', 'dt' => 5),
    array( 'db' => 'Setor1', 'dt' => 6),
    array( 'db' => 'DT_NASC', 'dt' => 7),
    array( 'db' => 'ID_CNS_SUS', 'dt' => 8),
    array( 'db' => 'NM_MAE_PAC', 'dt' => 9),
    array( 'db' => 'Endereco1', 'dt' => 10),
    array( 'db' => 'NU_NUMERO', 'dt' => 11),
    array( 'db' => 'NM_COMPLEM', 'dt' => 12),
    array( 'db' => 'UBS1', 'dt' => 13),
    array( 'db' => 'NU_DDD_TEL', 'dt' => 14),
    array( 'db' => 'NU_TELEFON', 'dt' => 15),
    array( 'db' => 'ENTRADA', 'dt' => 16),
    array( 'db' => 'Coleta', 'dt' => 17),
    array( 'db' => 'Data Resultado', 'dt' => 18),
    array( 'db' => 'Resultado_IgM_Focus', 'dt' => 19),
    array( 'db' => 'Resultado_IgM_Panbio', 'dt' => 20),
    array( 'db' => 'Resultado_NS1', 'dt' => 21),
    array( 'db' => 'ResultadoTr', 'dt' => 22),
    array( 'db' => 'UnidadeNotificadora', 'dt' => 23),
    array( 'db' => 'DS_OBS', 'dt' => 24),
    array( 'db' => 'DataBloqueio', 'dt' => 25),
    array( 'db' => 'DataNeb', 'dt' => 26),
    array( 'db' => 'CLASSI_FIN', 'dt' => 27),
    array( 'db' => 'CRITERIO', 'dt' => 28),
    array( 'db' => 'DT_ENCERRA', 'dt' => 29),
    array('db' => 'Latitude', 'dt' => 30),
    array('db' => 'Longitude', 'dt' => 31)
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