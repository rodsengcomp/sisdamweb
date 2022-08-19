<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(1);


$servidor = "192.168.0.20";
$usuario = "sisdam_bdjacana";
$password = "3f2nY4es3UdxGA7P";
$dbname = "sisdam";

$sql_details = array(
    'user' => 'sisdam_bdjacana',
    'pass' => '3f2nY4es3UdxGA7P',
    'db' => 'sisdam',
    'host' => '192.168.0.20'
);

$pdo = new PDO('mysql:host=192.168.0.20;dbname=sisdam', 'sisdam_bdjacana', '3f2nY4es3UdxGA7P', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

class config
{
    var $hostclass = '192.168.0.20';
    var $usuarioclass = 'sisdam_bdjacana';
    var $senhaclass = '3f2nY4es3UdxGA7P';
    var $dbclass = 'sisdam';
}

?>