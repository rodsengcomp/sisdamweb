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
 SELECT antranet.NU_NOTIFIC, antranet.NM_PACIENT,antranet.DT_NOTIFIC,antranet.SEM_NOT,antranet.ID_UNIDADE, antranet.DT_SIN_PRI, antranet.SEM_PRI, antranet.DT_NASC,
    antranet.NU_IDADE_N, antranet.CS_SEXO, antranet.ID_CNS_SUS, antranet.ID_DISTRIT, antranet.NM_BAIRRO, antranet.NM_LOGRADO, antranet.NU_NUMERO,
    antranet.NM_COMPLEM, antranet.NU_CEP, antranet.NU_DDD_TEL, antranet.NU_TELEFON,antranet.ANIMAL, antranet.CONDIC_ANI, antranet.OBSERVACAO,
    antranet.FIM_ANIMAL, antranet.DT_ENCERRA, antranet.OBS, antranet.UBS
    FROM antranet
    )temp

EOT;

/* SELECT tbldengue.UnidadeNotificadora, tbldengue.nDoc, tbldengue.N, tbldengue.Complemento,
tbldengue.ResultadoTr, tbldengue.Descarte, tbldengue.DataBloqueio, tbldengue.DataNeb,tbldengue.Impressao,
tbldengue.idrua, tbldengue.ruagoogle,tbldengue.Setor1, tbldengue.UBS1,tbldengue.Endereco1,tbldengue.Logradouro,
tbldengue.NU_NOTIFIC, tbldengue.DT_NOTIFIC, tbldengue.NM_PACIENT,tbldengue.DT_SIN_PRI, tbldengue.DS_OBS,
tbldengue.NU_TELEFON,
tbldengue.Resultado_IgM_Panbio, tbldengue.Resultado_IgM_Focus, tbldengue.Resultado_NS1,tbldengue.LIBERACAO_EM
FROM tbldengue */

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'NU_NOTIFIC', 'dt' => 0),
    array('db' => 'DT_NOTIFIC', 'dt' => 1),
    array('db' => 'NM_PACIENT', 'dt' => 2),
    array('db' => 'DT_SIN_PRI', 'dt' => 3),
    array('db' => 'NM_LOGRADO', 'dt' => 4),
    array('db' => 'NU_NUMERO', 'dt' => 5),
    array('db' => 'NM_COMPLEM', 'dt' => 6),
    array('db' => 'UBS', 'dt' => 7),
    array('db' => 'DT_ENCERRA', 'dt' => 8),
    array('db' => 'OBS', 'dt' => 9),
    array('db' => 'NU_DDD_TEL', 'dt' => 10),
    array('db' => 'ANIMAL', 'dt' => 11),
    array('db' => 'CONDIC_ANI', 'dt' => 12),
    array('db' => 'OBSERVACAO', 'dt' => 13),
    array('db' => 'FIM_ANIMAL', 'dt' => 14),
    array('db' => 'NU_TELEFON', 'dt' => 15)


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