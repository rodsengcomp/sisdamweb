<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 28/06/2017
 * Time: 10:18
 */

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

function result_igm($btn_igm)
{switch ($btn_igm) {
    default: $res_igm = ''; break;
        case 'Reagente': $res_igm = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="IGM Reagente">R_I</button>'; break;
        case 'Não Reagente': $res_igm = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="IGM Não Reagente">N_I</button>'; break;
        case 'Coleta Inadequada': $res_igm = '<button class="btn btn-default rounded-circle" data-toggle="tooltip" title="IGM Coleta Inadequada">C_I</button>'; break;
        case 'Inconclusivo': $res_igm = '<button class="btn btn-primary rounded-circle" data-toggle="tooltip" title="IGM Inconclusivo">I_I</button>'; break;
        case '': $res_igm = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="IGM Não Realizado">E_I</button>'; break;

    }

    return $res_igm;

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

function result_tr($btn_tr)
{switch ($btn_tr) {
    default: $res_tr = ''; break;
    case 'Reagente': $res_tr = '<button class="btn btn-danger rounded-circle" data-toggle="tooltip" title="Teste Rapido Reagente">TRR</button>'; break;
    case 'Nao Reagente': $res_tr = '<button class="btn btn-success rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Reagente">TRN</button>'; break;
    case 'Exame Nao Realizado': $res_tr = '<button class="btn btn-warning rounded-circle" data-toggle="tooltip" title="Teste Rapido Não Realizado">TEN</button>'; break;
}

    return $res_tr;

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

