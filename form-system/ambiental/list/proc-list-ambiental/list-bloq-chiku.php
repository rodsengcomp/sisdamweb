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
    SELECT chikonnet.NU_NOTIFIC, chikonnet.DT_NOTIFIC,chikonnet.SEM_NOT,chikonnet.DT_SIN_PRI,chikonnet.SEM_PRI, chikonnet.NM_PACIENT, chikonnet.DT_NASC,
    chikonnet.ID_CNS_SUS , chikonnet.NM_MAE_PAC,chikonnet.DT_ENCERRA, chikonnet.CLASSI_FIN,chikonnet.CRITERIO,chikonnet.NM_LOGRADO, chikonnet.ID_DISTRIT,
    chikonnet.NU_NUMERO, chikonnet.NM_COMPLEM,chikonnet.NM_REFEREN, chikonnet.NU_CEP,chikonnet.NU_TELEFON,chikonnet.DS_OBS,chikonnet.NU_DDD_TEL,
    tblchiku.nDoc, tblchiku.DataEntrada, tblchiku.NomeSolicitante, tblchiku.Endereco1, tblchiku.N,
    tblchiku.Complemento, tblchiku.Cep1, tblchiku.Logradouro, tblchiku.Bairro1, tblchiku.Da, tblchiku.Setor1,
    tblchiku.PgGuia1, tblchiku.UBS1, tblchiku.ruagoogle, tblchiku.latitude, tblchiku.longitude, tblchiku.idrua,
    tblchiku.UnidadeNotificadora, tblchiku.DataBloqueio, tblchiku.DataNeb, tblchiku.Descarte, tblchiku.DataNotificacao,
    tblchiku.SeDataNotificacao, tblchiku.DataNascimento, tblchiku.Data1Sintomas, tblchiku.Se1Sintomas,
    tblchiku.Ddd, tblchiku.TelefoneFixo, tblchiku.DataAlteracao, tblchiku.DataLer, tblchiku.usuarioLer,
    tblchiku.Impressao, tblchiku.usuarioAlteracao, tblchiku.agravo,tblchiku.ResultadoIAL,
    chiku_ial.Resultado, chiku_ial.Paciente, chiku_ial.Exame, chiku_ial.`Requisição`
    FROM tblchiku INNER JOIN chikonnet ON tblchiku.NomeSolicitante = chikonnet.NM_PACIENT
    LEFT JOIN chiku_ial ON tblchiku.NomeSolicitante = chiku_ial.Paciente
    WHERE (((chikonnet.ID_DISTRIT) Like "70")))temp
EOT;

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array( 'db' => 'NU_NOTIFIC', 'dt' => 0),
    array( 'db' => 'Impressao', 'dt' => 1),
    array( 'db' => 'Exame' ,'dt' => 2 ),
    array( 'db' => 'Resultado', 'dt' => 3),
    array( 'db' => 'DT_NOTIFIC', 'dt' => 4),
    array( 'db' => 'DT_SIN_PRI', 'dt' => 5),
    array( 'db' => 'NM_PACIENT', 'dt' => 6),
    array( 'db' => 'Setor1', 'dt' => 7),
    array( 'db' => 'Logradouro', 'dt' => 8),
    array( 'db' => 'Endereco1', 'dt' => 9),
    array( 'db' => 'N', 'dt' => 10),
    array( 'db' => 'Complemento', 'dt' => 11),
    array( 'db' => 'UBS1', 'dt' => 12),
    array( 'db' => 'DataEntrada', 'dt' => 13),
    array( 'db' => 'UnidadeNotificadora', 'dt' => 14),
    array( 'db' => 'DataBloqueio', 'dt' => 15),
    array( 'db' => 'DataNeb', 'dt' => 16),
    array( 'db' => 'DataAlteracao', 'dt' => 17),
    array( 'db' => 'ruagoogle', 'dt' => 18),
    array( 'db' => 'NU_TELEFON', 'dt' => 19),
    array( 'db' => 'Requisição', 'dt' => 20),
    array('db' => 'agravo', 'dt' => 21)
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