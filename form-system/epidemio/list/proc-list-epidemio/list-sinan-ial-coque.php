<?php

// tabela DB para usar
$table = <<<EOT
 (
SELECT coquenet.NU_NOTIFIC, coquenet.NM_PACIENT, coquenet.DT_SIN_PRI, coquenet.DT_NASC, coquenet.DT_NOTIFIC,
coquenet.CS_SEXO, coquenet.ID_CNS_SUS, coquenet.NM_MAE_PAC, coquenet.ID_DISTRIT, coquenet.ID_BAIRRO, coquenet.NM_BAIRRO, coquenet.ID_LOGRADO,
coquenet.NM_LOGRADO, coquenet.NU_NUMERO, coquenet.NM_COMPLEM, coquenet.NM_REFEREN, coquenet.NU_DDD_TEL, coquenet.NU_TELEFON,
coquenet.DT_DIGITA, coquenet.CLASSI_FIN	, coquenet.CRITERIO, coquenet.DOENCA_TRA, coquenet.EVOLUCAO, coquenet.DT_OBITO, coquenet.DT_ENCERRA,
coquenet.NU_LOTE_I, coque_ial.Paciente, coque_ial.`Status Exame`, coque_ial.`Dt. Liberação` as dtlibera, coque_ial.`Dt. Recebimento` as dtrecebe, 
coque_ial.`Dt. Cadastro` as dtcadastro, coque_ial.Resultado,coque_ial.Requisição
FROM coquenet LEFT JOIN coque_ial ON coquenet.NM_PACIENT = coque_ial.Paciente)temp
EOT;

// chave primária da tabela
$primaryKey = 'Requisição';

// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'NU_NOTIFIC', 'dt' => 0),
    array('db' => 'NM_PACIENT', 'dt' => 1),
    array('db' => 'Status Exame', 'dt' => 2),
    array('db' => 'Resultado', 'dt' => 3),
    array('db' => 'DT_SIN_PRI', 'dt' => 4),
    array('db' => 'DT_NOTIFIC', 'dt' => 5),
    array('db' => 'ID_CNS_SUS', 'dt' => 6),
    array('db' => 'NM_MAE_PAC', 'dt' => 7),
    array('db' => 'ID_BAIRRO', 'dt' => 8),
    array('db' => 'NM_LOGRADO', 'dt' => 9),
    array('db' => 'NM_REFEREN', 'dt' => 10),
    array('db' => 'NU_TELEFON', 'dt' => 11),
    array('db' => 'CLASSI_FIN', 'dt' => 12),
    array('db' => 'EVOLUCAO', 'dt' => 13),
    array('db' => 'DT_ENCERRA', 'dt' => 14),
    array('db' => 'NU_LOTE_I', 'dt' => 15),
    array('db' => 'dtlibera', 'dt' => 16),
    array('db' => 'dtrecebe', 'dt' => 17),
    array('db' => 'dtcadastro', 'dt' => 18),
    array('db' => 'NU_NUMERO', 'dt' => 19),
    array('db' => 'NU_DDD_TEL', 'dt' => 20),
    array('db' => 'Paciente', 'dt' => 21),
    array('db' => 'DT_NASC', 'dt' => 22),
    array('db' => 'CS_SEXO', 'dt' => 23),
    array('db' => 'ID_DISTRIT', 'dt' => 24),
    array('db' => 'NM_BAIRRO', 'dt' => 25),
    array('db' => 'ID_LOGRADO', 'dt' => 26),
    array('db' => 'NM_COMPLEM', 'dt' => 27),
    array('db' => 'DT_DIGITA', 'dt' => 28),
    array('db' => 'CRITERIO', 'dt' => 28),
    array('db' => 'DOENCA_TRA', 'dt' => 29),
    array('db' => 'DT_OBITO', 'dt' => 30),
    array('db' => 'Requisição', 'dt' => 31)


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