<?php

// tabela DB para usar
$table = <<<EOT
 (
    SELECT exantnet.NU_NOTIFIC, exantnet.DT_NOTIFIC, exantnet.DT_SIN_PRI, exantnet.SEM_PRI, exantnet.NM_PACIENT,
    exantnet.DT_NASC, exantnet.NM_LOGRADO, exantnet.NU_NUMERO, exantnet.NM_COMPLEM, exantnet.NM_CONTATO, exantnet.NM_REFEREN,
    exantnet.CS_VACINA, exantnet.DT_DOSE_N, exantnet.CS_VACINAL, exantnet.MENOR_5ANO, exantnet.DE5A14ANOS,exantnet.DE15A39ANO,
    exantnet.CLASSI_FIN, exantnet.CS_DESCART,exantnet.CRITERIO, exantnet.EVOLUCAO, exantnet.DT_OBITO, exantnet.DT_ENCERRA,
    tblsarampo.RuaGoogle, sarampo_ial.Paciente, sarampo_ial.`Status Exame`, sarampo_ial.Resultado,sarampo_ial.Requisição,
    sarampo_ial.Exame FROM exantnet
    INNER JOIN tblsarampo ON exantnet.NU_NOTIFIC = tblsarampo.nDoc
    LEFT JOIN sarampo_ial ON exantnet.NM_PACIENT = sarampo_ial.Paciente
    WHERE exantnet.ID_DISTRIT Like "70")temp
EOT;

/*
 *  (
    SELECT exantnet.NU_NOTIFIC, exantnet.DT_NOTIFIC, exantnet.DT_SIN_PRI, exantnet.SEM_PRI, exantnet.NM_PACIENT, exantnet.DT_NASC,
    exantnet.NM_LOGRADO, exantnet.NU_NUMERO, exantnet.NM_COMPLEM, exantnet.NM_CONTATO, exantnet.NM_REFEREN, exantnet.CS_VACINA,
    exantnet.DT_DOSE_N, exantnet.CS_VACINAL, exantnet.MENOR_5ANO, exantnet.DE5A14ANOS,exantnet.DE15A39ANO,exantnet.CLASSI_FIN,
    exantnet.CS_DESCART,exantnet.CRITERIO, exantnet.EVOLUCAO, exantnet.DT_OBITO, exantnet.DT_ENCERRA, sarampo_ial.Paciente,
    sarampo_ial.`Status Exame`, sarampo_ial.Resultado,sarampo_ial.Requisição,sarampo_ial.Exame
    FROM exantnet LEFT JOIN sarampo_ial ON exantnet.NM_PACIENT = sarampo_ial.Paciente
    WHERE sarampo_ial.Resultado <> 'Sarampo, IgG')temp
 *
 * */

// chave primária da tabela
$primaryKey = 'Requisição';

// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'NU_NOTIFIC', 'dt' => 0),
    array('db' => 'RuaGoogle', 'dt' => 1),
    array('db' => 'Requisição', 'dt' => 2),
    array('db' => 'Exame', 'dt' => 3),
    array('db' => 'Status Exame', 'dt' => 4),
    array('db' => 'Resultado', 'dt' => 5),
    array('db' => 'DT_NOTIFIC', 'dt' => 6),
    array('db' => 'DT_SIN_PRI', 'dt' => 7),
    array('db' => 'SEM_PRI', 'dt' => 8),
    array('db' => 'NM_PACIENT', 'dt' => 9),
    array('db' => 'DT_NASC', 'dt' => 10),
    array('db' => 'NM_LOGRADO', 'dt' => 11),
    array('db' => 'NM_COMPLEM', 'dt' => 12),
    array('db' => 'NM_CONTATO', 'dt' => 13),
    array('db' => 'NM_REFEREN', 'dt' => 14),
    array('db' => 'NU_NOTIFIC', 'dt' => 15),
    array('db' => 'CS_VACINA', 'dt' => 16),
    array('db' => 'DT_DOSE_N', 'dt' => 17),
    array('db' => 'CS_VACINAL', 'dt' => 18),
    array('db' => 'MENOR_5ANO', 'dt' => 19),
    array('db' => 'DE5A14ANOS', 'dt' => 20),
    array('db' => 'DE15A39ANO', 'dt' => 21),
    array('db' => 'CLASSI_FIN', 'dt' => 22),
    array('db' => 'CS_DESCART', 'dt' => 23),
    array('db' => 'EVOLUCAO', 'dt' => 24),
    array('db' => 'DT_ENCERRA', 'dt' => 25),
    array('db' => 'DT_OBITO', 'dt' => 26),
    array('db' => 'NU_NOTIFIC', 'dt' => 27),
    array('db' => 'NU_NOTIFIC', 'dt' => 28)
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