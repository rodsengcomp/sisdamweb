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
SELECT tbldengue.DataEntrada,tbldengue.UnidadeNotificadora, tbldengue.nDoc, tbldengue.N, tbldengue.Complemento,
tbldengue.ResultadoTr, tbldengue.Descarte, tbldengue.DataBloqueio, tbldengue.DataNeb,tbldengue.Impressao,
tbldengue.idrua, tbldengue.ruagoogle,tbldengue.Setor1, tbldengue.UBS1,tbldengue.Endereco1,tbldengue.Logradouro,
dengnet.NU_NOTIFIC, dengnet.DT_NOTIFIC, dengnet.NM_PACIENT,dengnet.DT_SIN_PRI, dengnet.DS_OBS,
dengnet.NU_TELEFON,
resultado_ccz.Resultado_IgM_Panbio, resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_NS1,resultado_ccz.`Data Resultado` 
FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC
LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
WHERE (((dengnet.ID_DISTRIT) Like "70")))temp
EOT;

/* SELECT tbldengue.UnidadeNotificadora, tbldengue.nDoc, tbldengue.N, tbldengue.Complemento,
tbldengue.ResultadoTr, tbldengue.Descarte, tbldengue.DataBloqueio, tbldengue.DataNeb,tbldengue.Impressao,
tbldengue.idrua, tbldengue.ruagoogle,tbldengue.Setor1, tbldengue.UBS1,tbldengue.Endereco1,tbldengue.Logradouro,
tbldengue.NU_NOTIFIC, tbldengue.DT_NOTIFIC, tbldengue.NM_PACIENT,tbldengue.DT_SIN_PRI, tbldengue.DS_OBS,
tbldengue.NU_TELEFON,
tbldengue.Resultado_IgM_Panbio, tbldengue.Resultado_IgM_Focus, tbldengue.Resultado_NS1,tbldengue.Data Resultado
FROM tbldengue */

// chave primária da tabela
$primaryKey = 'NU_NOTIFIC';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'nDoc', 'dt' => 0),
    array('db' => 'nDoc', 'dt' => 1),
    array('db' => 'Resultado_IgM_Focus', 'dt' => 2),
    array('db' => 'Resultado_IgM_Panbio', 'dt' => 3),
    array('db' => 'Resultado_NS1', 'dt' => 4),
    array('db' => 'ResultadoTr', 'dt' => 5),
    array('db' => 'DT_SIN_PRI', 'dt' => 6),
    array('db' => 'NM_PACIENT', 'dt' => 7),
    array('db' => 'Setor1', 'dt' => 8),
    array('db' => 'DT_NOTIFIC', 'dt' => 9),
    array('db' => 'Endereco1', 'dt' => 10),
    array('db' => 'DS_OBS', 'dt' => 11),
    array('db' => 'nDoc', 'dt' => 12),
    array('db' => 'nDoc', 'dt' => 13),
    array('db' => 'UBS1', 'dt' => 14),
    array('db' => 'NU_TELEFON', 'dt' => 15),
    array('db' => 'UnidadeNotificadora', 'dt' => 16),
    array('db' => 'DataBloqueio', 'dt' => 17),
    array('db' => 'DataNeb', 'dt' => 18),
    array('db' => 'Impressao', 'dt' => 19),
    array('db' => 'Descarte', 'dt' => 20),
    array('db' => 'N', 'dt' => 21),
    array('db' => 'Complemento', 'dt' => 22),
    array('db' => 'ruagoogle', 'dt' => 23),
    array('db' => 'Logradouro', 'dt' => 24),
    array('db' => 'DataEntrada', 'dt' => 25)
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