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
$agravo = $_GET['agravo'];
$agravo_impresso = $_GET['impresso'];
$agravo_list = $_GET['list'];

$url = "&sinan={$agravo_sinan_sql}&tabela={$agravo_tabela_sql}&buttons={$agravo_buttons}&agravo={$agravo_hidden}&ial={$agravo_ial}&list={$agravo_list}";

?>