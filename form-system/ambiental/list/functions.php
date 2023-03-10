<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 28/06/2017
 * Time: 10:18
 */

$agravo_sinan_sql = $_GET['sinan'];
$agravo_tabela_sql = $_GET['tabela'];
$agravo_ial = $_GET['ial'];
$agravo_buttons = $_GET['buttons'];
$agravo_hidden = $_GET['agravo'];
$agravo_impresso = $_GET['impresso'];
$agravo_list = $_GET['list'];
$agravo = $_GET['agravo'];


$url = "&sinan={$agravo_sinan_sql}&tabela={$agravo_tabela_sql}&buttons={$agravo_buttons}&agravo={$agravo_hidden}&ial={$agravo_ial}&list={$agravo_list}";

// Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
function geraTimestamp($data) {
    $partes = explode('/', $data);
    return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}

function completeResultDia($coddia)
{switch ($coddia) {
    default: $colordia = '<button class="btn btn-default">'; break;
    case '0'  : $colordia = '<button class="btn btn-info">'; break;
    case ($coddia <= '30')  : $colordia = '<button class="btn btn-success">'; break;
    case ($coddia > '30')  : $colordia = '<button class="btn btn-danger">'; break; }
    return $colordia;}

function result_igm_f($btn_igm_f)
{switch ($btn_igm_f) {
    default: $res_igm_f = ''; break;
        case 'Reagente': $res_igm_f = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="IGM Reagente">R_IF</button>'; break;
        case 'Não Reagente': $res_igm_f = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="IGM Não Reagente">N_IF</button>'; break;
        case 'Coleta Inadequada': $res_igm_f = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="IGM Coleta Inadequada">C_IF</button>'; break;
        case 'Inconclusivo': $res_igm_f = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="IGM Inconclusivo">I_IF</button>'; break;
        case '': $res_igm_f = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="IGM Não Realizado">E_IF</button>'; break;

    }

    return $res_igm_f;
}

function result_igm_p($btn_igm_p)
{switch ($btn_igm_p) {
    default: $res_igm_p = ''; break;
    case 'Reagente': $res_igm_p = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="IGM Reagente">R_IP</button>'; break;
    case 'Não Reagente': $res_igm_p = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="IGM Não Reagente">N_IP</button>'; break;
    case 'Coleta Inadequada': $res_igm_p = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="IGM Coleta Inadequada">C_IP</button>'; break;
    case 'Inconclusivo': $res_igm_p = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="IGM Inconclusivo">I_IP</button>'; break;
    case '': $res_igm_p = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="IGM Não Realizado">E_IP</button>'; break;

}

    return $res_igm_p;
}

function result_ns1($btn_ns1)
{switch ($btn_ns1) {
    default: $res_ns1 = ''; break;
    case 'Reagente': $res_ns1 = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="NS1 Reagente">R_N</button>'; break;
    case 'Não Reagente': $res_ns1 = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="NS1 Não Reagente">N_N</button>'; break;
    case 'Coleta Inadequada': $res_ns1 = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="NS1 Coleta Inadequada">C_N</button>'; break;
    case 'Inconclusivo': $res_ns1 = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="NS1 Inconclusivo">I_N</button>'; break;
    case '': $res_ns1 = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="NS1 Não Realizado">E_N</button>'; break;
}

    return $res_ns1;

}

function result_elisa($btn_elisa)
{switch ($btn_elisa) {
    default: $res_elisa = ''; break;
    case 'Reagente': $res_elisa = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="IGM Reagente">R_E</button>'; break;
    case 'Não Reagente': $res_elisa = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="IGM Não Reagente">N_E</button>'; break;
    case 'Coleta Inadequada': $res_elisa = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="IGM Coleta Inadequada">C_E</button>'; break;
    case 'Inconclusivo': $res_elisa = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="IGM Inconclusivo">I_E</button>'; break;
    case '': $res_elisa = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="IGM Não Realizado">E_E</button>'; break;

}

    return $res_elisa;

}
function result_mat($btn_mat)
{switch ($btn_mat) {
    default: $res_mat = ''; break;
    case 'Reagente': $res_mat = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="NS1 Reagente">R_M</button>'; break;
    case 'Não Reagente': $res_mat = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="NS1 Não Reagente">N_M</button>'; break;
    case 'Coleta Inadequada': $res_mat = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="NS1 Coleta Inadequada">C_M</button>'; break;
    case 'Inconclusivo': $res_mat = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="NS1 Inconclusivo">I_M</button>'; break;
    case '': $res_mat = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="NS1 Não Realizado">E_M</button>'; break;
}

    return $res_mat;

}

function result_tr($btn_tr)
{switch ($btn_tr) {
    default: $res_tr = ''; break;
    case 'Reagente': $res_tr = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="Teste Rapido Reagente">TRR</button>'; break;
    case 'Nao Reagente': $res_tr = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Reagente">TRN</button>'; break;
    case 'Exame Nao Realizado': $res_tr = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Realizado">TEN</button>'; break;
}

    return $res_tr;

}

function result_ial($btn_ial)
{switch ($btn_ial) {
    default: $res_ial = ''; break;
    case 'Reagente': $res_ial = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="Teste Rapido Reagente">TRR</button>'; break;
    case 'Nao Reagente': $res_ial = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Reagente">TRN</button>'; break;
    case 'Exame Nao Realizado': $res_ial = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Realizado">ENR</button>'; break;
}

    return $res_ial;

}

function completeResult($cod)
{switch ($cod) {
    default: $color = '<button class="btn btn-default">';break;
        case 'INATIVO':$color = '<button class="btn btn-danger">';break;
        case 'ATIVO': $color = '<style color="#5cb85c">'; break; }
    return $color;
}

function niveluser($nivel)
{switch ($nivel) {
    default: $user = ''; break;
        case '0': $user = 'INATIVO'; break;
        case '1': $user = 'ADMINISTRADOR'; break;
        case '2': $user = 'AVANÇADO'; break;
        case '3': $user = 'USUÁRIO'; break;
        case '4': $user = 'VISITANTE'; break;}
    return $user;}

function completeResultSetor($codsetor)
{switch ($codsetor) {
    default: $colorsetor = '<button class="btn btn-default">'; break;
        case '8301': $colorsetor = '<button class="btn btn-danger">'; break;
        case '8302': $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8303':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8304':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8305':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8306':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8307':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8308':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8309':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8310':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8311':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8312':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8313':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8314':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8315':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8316':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8317':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8318':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8319':
            $colorsetor = '<button class="btn btn-danger">';
            break;
        case '8320':
            $colorsetor = '<button class="btn btn-danger">';
            break;

        case '3801':
            $colorsetor = '<button class="btn btn-success">';
            break;

        case 'ATIVO':
            $colorsetor = '<style color="#5cb85c">';
            break;
    }

    return $colorsetor;

}
?>


<?php

//Count da tabela dengue
$count_ndoc_dengue = "COUNT(tbldengue.nDoc)";

//Total de Reagentes tbldengue
//Total de Reagentes Da 83
$pos_den_total1="SELECT COUNT(tbldengue.nDoc)
    FROM tbldengue 
    INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
    WHERE tbldengue.ResultadoTr='Reagente' AND dengnet.CLASSI_FIN>9 
    OR resultado_ccz.Resultado_IgM_Focus='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_IgM_Panbio='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_Ns1='Reagente' AND dengnet.CLASSI_FIN>9";

$pos_den_total = "SELECT COUNT(tbldengue.nDoc) 
    FROM tbldengue
    INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN  
    WHERE resultado_ccz.Resultado_IgM_Focus='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_IgM_Panbio='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_NS1='Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Focus<>'Não Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Panbio<>'Não Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Focus IS NULL AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Panbio IS NULL AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_NS1 IS NULL AND dengnet.CLASSI_FIN>9";

//Sql Total de Não Reagentes tbldengue
$neg_den_total ="SELECT COUNT(tbldengue.nDoc)
    FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
    LEFT JOIN dengue_ial ON tbldengue.NomeSolicitante = dengue_ial.Paciente
    WHERE resultado_ccz.Resultado_IgM_Focus='Não Reagente'
    OR resultado_ccz.Resultado_IgM_Panbio='Não Reagente'
    OR dengue_ial.Resultado = 'Não Reagente '
    OR dengue_ial.Resultado = 'Não Detectável '";

//Sql Total Exame não realizado tbldengue
$sem_col_den_total = "SELECT COUNT(tbldengue.nDoc) 
    FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
    WHERE tbldengue.ResultadoTr='Exame Nao Realizado' AND resultado_ccz.Resultado_IgM_Focus IS NULL AND resultado_ccz.Resultado_IgM_Panbio IS NULL AND resultado_ccz.Resultado_NS1 IS NULL";

//Sql Inconclusivo Total
$inco_den_total = "SELECT COUNT(tbldengue.nDoc) FROM tbldengue LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN  
    WHERE resultado_ccz.Resultado_IgM_Focus='Inconclusivo'
    OR resultado_ccz.Resultado_IgM_Panbio='Inconclusivo'
    OR resultado_ccz.Resultado_NS1='Inconclusivo'";
//------------------------------------------ fim dcont dengue--------------------------

//Count da tabela leptospirose
$count_ndoc_lepto = "COUNT(tbllepto.nDoc)";

$pos_lep_total = "SELECT COUNT(tbllepto.nDoc)
FROM tbllepto
INNER JOIN leptonet ON tbllepto.nDoc = leptonet.NU_NOTIFIC
LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
WHERE resultado_ccz_lepto.RES_ELISA_PANBIO='Reagente' AND leptonet.CLASSI_FIN='1'
OR resultado_ccz_lepto.RES_MAT='Reagente' AND leptonet.CLASSI_FIN='1'";

//Sql Total de Não Reagentes tbllepto
$neg_lep_total ="SELECT COUNT(tbllepto.nDoc)
FROM tbllepto INNER JOIN leptonet ON tbllepto.nDoc = leptonet.NU_NOTIFIC
LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
WHERE resultado_ccz_lepto.RES_ELISA_PANBIO='Não Reagente'";

//Sql Total Inconclusivo tbllepto
$sem_col_lep_total = "SELECT COUNT(tbllepto.nDoc)
FROM tbllepto LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
WHERE resultado_ccz_lepto.RES_ELISA_PANBIO IS NULL AND resultado_ccz_lepto.RES_MAT IS NULL";

//Sql Inconclusivo Total
$inco_lep_total = "SELECT COUNT(tbllepto.nDoc) FROM tbllepto LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
WHERE resultado_ccz_lepto.RES_ELISA_PANBIO='Inconclusivo'
OR resultado_ccz_lepto.RES_MAT='Inconclusivo'";


$sql_ubs_joamar = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS J JOAMAR'";
$sql_ubs_galvao = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS V NOVA GALVAO'";
$sql_ubs_fontalis = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS J FONTALIS'";
$sql_ubs_toledo = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS DR JOSE TOLEDO PIZA'";
$sql_ubs_jacana = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS JACANA'";
$sql_ubs_edu = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS PQ EDU CHAVES'";
$sql_ubs_flor = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS J FLOR DE MAIO'";
$sql_ubs_albertina = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS V ALBERTINA DR OSVALDO MARCAL'";
$sql_ubs_pedras = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS JARDIM DAS PEDRAS'";
$sql_ubs_mariquinha = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS DONA MARIQUINHA SCIASCIA'";
$sql_ubs_apuana = "SELECT UBS1 FROM tbldengue WHERE UBS1='UBS J APUANA'";

$result_joamar = $conectar->query($sql_ubs_joamar);
$result_galvao = $conectar->query($sql_ubs_galvao);
$result_fontalis = $conectar->query($sql_ubs_fontalis);
$result_toledo = $conectar->query($sql_ubs_toledo);
$result_jacana = $conectar->query($sql_ubs_jacana);
$result_edu = $conectar->query($sql_ubs_edu);
$result_flor = $conectar->query($sql_ubs_flor);
$result_albertina = $conectar->query($sql_ubs_albertina);
$result_pedras = $conectar->query($sql_ubs_pedras);
$result_mariquinha = $conectar->query($sql_ubs_mariquinha);
$result_apuana = $conectar->query($sql_ubs_apuana);

$row_count_joamar = mysqli_num_rows($result_joamar);
$row_count_v_n_galvao = mysqli_num_rows($result_galvao);
$row_count_fontalis =  mysqli_num_rows($result_fontalis);
$row_count_toledo = mysqli_num_rows($result_toledo);
$row_count_jacana = mysqli_num_rows($result_jacana);
$row_count_edu = mysqli_num_rows($result_edu);
$row_count_flor = mysqli_num_rows($result_flor);
$row_count_albertina = mysqli_num_rows($result_albertina);
$row_count_pedras = mysqli_num_rows($result_pedras);
$row_count_mariquinha = mysqli_num_rows($result_mariquinha);
$row_count_apuana = mysqli_num_rows($result_apuana);
?>