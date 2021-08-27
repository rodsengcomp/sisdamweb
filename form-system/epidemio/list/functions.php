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

//função para converter string = CLASSI_FIN
function class_fim($class){
    switch ($class) {
        default: $class_f = ''; break;
        case '1': $class_f = 'CONF'; break;
        case '2': $class_f = 'DESC'; break;
    }
    return $class_f;
}

function criterio($crit) {
    switch ($crit) {
        default: $criterio_f = ''; break;
        case '1': $criterio_f = 'LABORAT.'; break;
        case '2': $criterio_f = 'CLIN. EP.'; break;
        case '3': $criterio_f = 'OBITO'; break;
        case '9': $criterio_f = 'IGNORADO'; break;
    }
    return $criterio_f;
}

function evolucao($evol) {
    switch ($evol) {
        default: $evolucao_f = ''; break;
        case '1': $evolucao_f = 'CURA'; break;
        case '2': $evolucao_f = 'OBT COQ.'; break;
        case '3': $evolucao_f = 'OBT OUT.'; break;
        case '9': $evolucao_f = 'IGNORADO'; break;
    }
    return $evolucao_f;
}
?>

