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
    SELECT famarnet.NU_NOTIFIC, famarnet.DT_NOTIFIC,famarnet.SEM_NOT,famarnet.DT_SIN_PRI,famarnet.SEM_PRI, famarnet.NM_PACIENT, famarnet.DT_NASC,
    famarnet.ID_CNS_SUS , famarnet.NM_MAE_PAC,famarnet.DT_ENCERRA, famarnet.CLASSI_FIN,famarnet.CRITERIO,famarnet.NM_LOGRADO, famarnet.ID_DISTRIT,
    famarnet.NU_NUMERO, famarnet.NM_COMPLEM,famarnet.NM_REFEREN, famarnet.NU_CEP,famarnet.NU_TELEFON,famarnet.NU_DDD_TEL,
    tblfebrea.nDoc, tblfebrea.DataEntrada, tblfebrea.NomeSolicitante, tblfebrea.Endereco1, tblfebrea.N,
    tblfebrea.Complemento, tblfebrea.Cep1, tblfebrea.Logradouro, tblfebrea.Bairro1, tblfebrea.Da, tblfebrea.Setor1,
    tblfebrea.PgGuia1, tblfebrea.UBS1, tblfebrea.ruagoogle, tblfebrea.latitude, tblfebrea.longitude, tblfebrea.idrua,
    tblfebrea.UnidadeNotificadora, tblfebrea.DataBloqueio, tblfebrea.DataNeb, tblfebrea.Descarte, tblfebrea.DataNotificacao,
    tblfebrea.SeDataNotificacao, tblfebrea.DataNascimento, tblfebrea.Data1Sintomas, tblfebrea.Se1Sintomas,
    tblfebrea.Ddd, tblfebrea.TelefoneFixo, tblfebrea.DataAlteracao, tblfebrea.DataLer, tblfebrea.usuarioLer,
    tblfebrea.Impressao, tblfebrea.usuarioAlteracao, tblfebrea.agravo,tblfebrea.ResultadoIAL,
    febrea_ial.Resultado, febrea_ial.Paciente, febrea_ial.Exame, febrea_ial.`Requisição`
    FROM tblfebrea INNER JOIN famarnet ON tblfebrea.NomeSolicitante = famarnet.NM_PACIENT
    LEFT JOIN febrea_ial ON tblfebrea.NomeSolicitante = febrea_ial.Paciente
    WHERE (((famarnet.ID_DISTRIT) Like "70")))temp
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