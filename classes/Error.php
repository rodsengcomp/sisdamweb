<?php

class Error extends Tables{

    function inputEmpty($vazio, $parametro, $eco, $parametro1){
        if($vazio.empty($parametro)):
            return $eco.' '.$parametro1;
        endif;
    }
}