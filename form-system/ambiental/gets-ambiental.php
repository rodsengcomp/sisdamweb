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
    SELECT zikanet.NU_NOTIFIC, zikanet.DT_NOTIFIC,zikanet.SEM_NOT,zikanet.DT_SIN_PRI,zikanet.SEM_PRI, zikanet.NM_PACIENT, zikanet.DT_NASC,
    zikanet.ID_CNS_SUS , zikanet.NM_MAE_PAC,zikanet.DT_ENCERRA, zikanet.CLASSI_FIN,zikanet.CRITERIO,zikanet.NM_LOGRADO, zikanet.ID_DISTRIT,
    zikanet.NU_NUMERO, zikanet.NM_COMPLEM,zikanet.NM_REFEREN, zikanet.NU_CEP,zikanet.NU_TELEFON,zikanet.NU_DDD_TEL,
    tblzika.nDoc, tblzika.DataEntrada, tblzika.NomeSolicitante, tblzika.Endereco1, tblzika.N,
    tblzika.Complemento, tblzika.Cep1, tblzika.Logradouro, tblzika.Bairro1, tblzika.Da, tblzika.Setor1,
    tblzika.PgGuia1, tblzika.UBS1, tblzika.ruagoogle, tblzika.latitude, tblzika.longitude, tblzika.idrua,
    tblzika.UnidadeNotificadora, tblzika.DataBloqueio, tblzika.DataNeb, tblzika.Descarte, tblzika.DataNotificacao,
    tblzika.SeDataNotificacao, tblzika.DataNascimento, tblzika.Data1Sintomas, tblzika.Se1Sintomas,
    tblzika.Ddd, tblzika.TelefoneFixo, tblzika.DataAlteracao, tblzika.DataLer, tblzika.usuarioLer,
    tblzika.Impressao, tblzika.usuarioAlteracao, tblzika.agravo,tblzika.ResultadoIAL,
    zika_ial.Resultado, zika_ial.Paciente, zika_ial.Exame, zika_ial.`Requisição`
    FROM tblzika INNER JOIN zikanet ON tblzika.NomeSolicitante = zikanet.NM_PACIENT
    LEFT JOIN zika_ial ON tblzika.NomeSolicitante = zika_ial.Paciente
    WHERE (((zikanet.ID_DISTRIT) Like "70")))temp
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
include_once '../../config.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('../list/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>