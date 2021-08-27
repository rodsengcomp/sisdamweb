<?php
/*
 * Created by PhpStorm.
 * User: SMS
 * Date: 17/05/2018
 * Time: 11:16
 */

/*SQL do modal */
$sql_end_null = $conectar->query("SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.DT_NOTIFIC, $agravo_sinan_sql.NM_PACIENT, $agravo_sinan_sql.ID_DISTRIT, $agravo_sinan_sql.ID_BAIRRO, $agravo_sinan_sql.NM_BAIRRO, $agravo_sinan_sql.ID_LOGRADO, $agravo_sinan_sql.NM_LOGRADO, $agravo_sinan_sql.NU_NUMERO, $agravo_sinan_sql.NM_COMPLEM, $agravo_sinan_sql.ID_UNIDADE
FROM $agravo_sinan_sql LEFT JOIN sv2 ON $agravo_sinan_sql.NU_NOTIFIC = sv2.sinan
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND ((sv2.sinan) Is Null));");
// FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
// WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null));");

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os casos da tabela
$result_edit_end = "SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.DT_NOTIFIC, $agravo_sinan_sql.NM_PACIENT, $agravo_sinan_sql.ID_DISTRIT, $agravo_sinan_sql.ID_BAIRRO, $agravo_sinan_sql.NM_BAIRRO, $agravo_sinan_sql.ID_LOGRADO, $agravo_sinan_sql.NM_LOGRADO, $agravo_sinan_sql.NU_NUMERO,
$agravo_sinan_sql.NU_CEP, $agravo_sinan_sql.NM_REFEREN, $agravo_sinan_sql.NM_COMPLEM, $agravo_sinan_sql.ID_UNIDADE,$agravo_sinan_sql.ID_AGRAVO,$agravo_sinan_sql.SEM_NOT, 
$agravo_sinan_sql.DT_NASC, $agravo_sinan_sql.DT_SIN_PRI, $agravo_sinan_sql.SEM_PRI, $agravo_sinan_sql.NU_DDD_TEL, $agravo_sinan_sql.DS_OBS,$agravo_sinan_sql.CS_SEXO,
$agravo_sinan_sql.NU_IDADE_N,$agravo_sinan_sql.DT_OBITO,
cnes.cnes, cnes.estabelecimento,
idadesv2.idade_sv2,
se.se
FROM $agravo_sinan_sql LEFT JOIN sv2 ON $agravo_sinan_sql.NU_NOTIFIC = sv2.sinan
LEFT JOIN cnes ON $agravo_sinan_sql.ID_UNIDADE = cnes.cnes
LEFT JOIN idadesv2 ON $agravo_sinan_sql.NU_IDADE_N = idadesv2.cod_idade
LEFT JOIN se ON $agravo_sinan_sql.DT_DIGITA = se.dataentrada
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND ((sv2.sinan) Is Null))";
// FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
//WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null))";

$resultado_edit_end = $conectar->query($result_edit_end);

//Contar o total de registros
$total_edit_end = mysqli_num_rows($resultado_edit_end);

//Seta a quantidade de registros por pagina
$quantidade_pg = 1;

//calcular o número de pagina necessárias para apresentar os registros
$num_pagina = ceil($total_edit_end/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os casos a serem apresentado na página
$result_edit_end = "SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.DT_NOTIFIC, $agravo_sinan_sql.NM_PACIENT, $agravo_sinan_sql.ID_DISTRIT, $agravo_sinan_sql.ID_BAIRRO, 
$agravo_sinan_sql.NM_BAIRRO, $agravo_sinan_sql.ID_LOGRADO, $agravo_sinan_sql.NM_LOGRADO, $agravo_sinan_sql.NU_NUMERO, $agravo_sinan_sql.NU_CEP, $agravo_sinan_sql.NM_REFEREN,
$agravo_sinan_sql.NM_COMPLEM, $agravo_sinan_sql.ID_UNIDADE, $agravo_sinan_sql.ID_AGRAVO,$agravo_sinan_sql.SEM_NOT, $agravo_sinan_sql.DT_NASC, $agravo_sinan_sql.DT_SIN_PRI,
$agravo_sinan_sql.SEM_PRI, $agravo_sinan_sql.NU_DDD_TEL, $agravo_sinan_sql.NU_TELEFON,$agravo_sinan_sql.DS_OBS,$agravo_sinan_sql.CS_SEXO,$agravo_sinan_sql.NU_IDADE_N,
$agravo_sinan_sql.DT_OBITO,
cnes.cnes, cnes.estabelecimento,
idadesv2.idade_sv2,
se.se
FROM $agravo_sinan_sql LEFT JOIN sv2 ON $agravo_sinan_sql.NU_NOTIFIC = sv2.sinan
LEFT JOIN cnes ON $agravo_sinan_sql.ID_UNIDADE = cnes.cnes
LEFT JOIN idadesv2 ON $agravo_sinan_sql.NU_IDADE_N = idadesv2.cod_idade
LEFT JOIN se ON $agravo_sinan_sql.DT_DIGITA = se.dataentrada
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND ((sv2.sinan) Is Null)) limit $incio, $quantidade_pg";

//FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
// WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null)) limit $incio, $quantidade_pg";
$resultado_edit_end = $conectar->query($result_edit_end);
$total_edit_end = mysqli_num_rows($resultado_edit_end);

// Consulta sql para redirecionamento após findar os endereços para atualizar
if ($_SESSION['usuarioNivelAcesso'] <> ''){
    if ($sql_end_null->num_rows == 0) {
            $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>NÃO EXISTEM MAIS CASOS DE DENGUE PARA ATUALIZAR !!!</strong></div>";
                if ($agravo_buttons == 'dengue') header("Location: suvisjt.php?pag=list-bloq-dengue$url");
                    elseif ($agravo_buttons == 'chiku') header("Location: suvisjt.php?pag=list-bloq-ial$url");
                        elseif ($agravo_buttons == 'febrea') header("Location: suvisjt.php?pag=list-bloq-ial$url");
                            elseif ($agravo_buttons == 'lepto') header("Location: suvisjt.php?pag=list-bloq-lepto$url");
                    elseif ($agravo_buttons == 'zika') header("Location: suvisjt.php?pag=list-bloq-dengue$url");
                else header("Location: suvisjt.php");
            }
    }
