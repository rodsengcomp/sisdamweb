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
 (SELECT sv2.id,sv2.sinan,sv2.dataentrada,sv2.se,sv2.agravo,sv2.tel,sv2.nome,sv2.datanot,sv2.localate,sv2.sexo,
    sv2.idade,sv2.da,sv2.log,sv2.rua,sv2.num,sv2.comp,sv2.bairro,sv2.cep,sv2.localvd,sv2.suvis,sv2.cidade,sv2.dataobito,
    sv2.usuariocad,sv2.criado,sv2.usuarioalt,sv2.alterado,sv2.tipo,sv2.ocorrencia,ruas.ubs  
    FROM sv2 LEFT JOIN ruas ON sv2.idrua = ruas.id)temp
EOT;

// chave primária da tabela
$primaryKey = 'id';

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