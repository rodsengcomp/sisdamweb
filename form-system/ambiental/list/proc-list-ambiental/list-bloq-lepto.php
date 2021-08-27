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
SELECT tbllepto.UnidadeNotificadora, tbllepto.DataEntrada, tbllepto.nDoc, tbllepto.Endereco1, tbllepto.N, tbllepto.Complemento, 
tbllepto.Descarte, tbllepto.DataBloqueio, tbllepto.usuarioAlteracao, tbllepto.DataAlteracao, tbllepto.DataLer,
tbllepto.usuarioLer, tbllepto.Impressao, tbllepto.ruagoogle, tbllepto.latitude, tbllepto.longitude, tbllepto.idrua,
leptonet.NU_NOTIFIC, leptonet.DT_NOTIFIC, leptonet.SEM_NOT, leptonet.NM_PACIENT, leptonet.CS_SEXO,leptonet.DT_NASC, leptonet.DT_SIN_PRI,
leptonet.SEM_PRI,leptonet.DS_OBS, leptonet.NU_NUMERO, leptonet.NU_DDD_TEL,leptonet.NU_TELEFON,
sv2.sinan as sinansv2,
ruas.da, ruas.setor, ruas.log, ruas.cep, ruas.bairro, ruas.pgguia, ruas.id, ruas.ubs,ruas.rua,
resultado_ccz_lepto.RES_ELISA, resultado_ccz_lepto.RES_MAT,resultado_ccz_lepto.LIBERACAO_EM
FROM tbllepto INNER JOIN leptonet ON tbllepto.nDoc = leptonet.NU_NOTIFIC 
LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
LEFT JOIN ruas ON tbllepto.idRua = ruas.id
LEFT JOIN sv2 ON leptonet.NU_NOTIFIC = sv2.sinan
WHERE (((leptonet.ID_DISTRIT) Like "70")))temp
EOT;

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'nDoc', 'dt' => 0),
    array('db' => 'sinansv2', 'dt' => 1),
    array('db' => 'nDoc', 'dt' => 2),
    array('db' => 'RES_ELISA', 'dt' => 3),
    array('db' => 'RES_MAT', 'dt' => 4),
    array('db' => 'DT_SIN_PRI', 'dt' => 5),
    array('db' => 'NM_PACIENT', 'dt' => 6),
    array('db' => 'setor', 'dt' => 7),
    array('db' => 'DT_NOTIFIC', 'dt' => 8),
    array('db' => 'rua', 'dt' => 9),
    array('db' => 'DS_OBS', 'dt' => 10),
    array('db' => 'nDoc', 'dt' => 11),
    array('db' => 'nDoc', 'dt' => 12),
    array('db' => 'ubs', 'dt' => 13),
    array('db' => 'NU_TELEFON', 'dt' => 14),
    array('db' => 'UnidadeNotificadora', 'dt' => 15),
    array('db' => 'DataBloqueio', 'dt' => 16),
    array('db' => 'DataAlteracao', 'dt' => 17),
    array('db' => 'Impressao', 'dt' => 18),
    array('db' => 'N', 'dt' => 19),
    array('db' => 'Complemento', 'dt' => 20),
    array('db' => 'ruagoogle', 'dt' => 21),
    array('db' => 'latitude', 'dt' => 22),
    array('db' => 'longitude', 'dt' => 23),
    array('db' => 'DT_NASC', 'dt' => 24),
    array('db' => 'log', 'dt' => 25),
    array('db' => 'NU_DDD_TEL', 'dt' => 26)
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