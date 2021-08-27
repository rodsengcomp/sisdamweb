<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: sms
 * Date: 12/06/2017
 * Time: 10:55
 */

error_reporting(0);
include_once '../../../conecta.php';


$consulta_menu = "SELECT * FROM menus";
$resultado_menu = $conectar->query($consulta_menu);
$editar_menu = mysqli_fetch_assoc($resultado_menu);


//Instanciação dos Objetos de Menu
//--------href="#"---------------------------------------------
$submenu_link = "http://10.47.171.110/sisdamjt1/formulario.php";// Caminho do href="#" dos link's não úteis - Menu Sisdam-Web.
$menu_sisdam_image = "./imagens/livrologin.png";

//----------------------------Início-Menu-1-Sisdam-Web----------------------------------//
//Menu-1-Title
$sm_menu_1_title = $editar_menu['menu1_nome']; //"<u>S</u>V2"; //Title  1º Opção Menu Sisdam-Web
//submenu-1-Title
$sm_menu_1_option1 = $editar_menu['submenu1_nome'];//"SV2-2017";         //Option 1 Title
//-------------------------> option- 1 e 2
$sm_menu_1_option1_sub1 = $editar_menu['submenu1_sub1'];//"Listar"; //submenu-1-sub-option-1-Title
$link_sm_menu_1_option1_sub1 = $editar_menu['link_submenu1_sub1'];//"././formulario.php?link=2";        //submenu-1-sub-option-1-Link
$sm_menu_1_option1_sub2 = $editar_menu['submenu1_sub2'];//"Cadastrar";                             //submenu-1-sub-option-2-Title
$link_sm_menu_1_option1_sub2 = $editar_menu['link_submenu1_sub2'];//"././formulario.php?link=3";        //submenu-1-sub-option-2-Link

//submenu-2-Title
$sm_menu_1_option2 = "ARQUIVO";
//-------------------------> options 2-3-4-5-6 - com link's
$sm_menu_1_option2_sub1 = "SV2-2016";                               //submenu-2-sub-option-1-Title
$link_sm_menu_1_option2_sub1 = "././formulario.php?link=73";        //submenu-2-sub-option-1-Link

$sm_menu_1_option2_sub2 = "";                                      //submenu-2-sub-option-2-Title
$link_sm_menu_1_option2_sub2 = "";                                 //submenu-2-sub-option-2-Link

$sm_menu_1_option2_sub3 = "";                                      //submenu-2-sub-option-3-Title
$link_sm_menu_1_option2_sub3 = "";                                 //submenu-2-sub-option-3-Link

$sm_menu_1_option2_sub4 = "";                                      //submenu-2-sub-option-4-Title
$link_sm_menu_1_option2_sub4 = "";                                 //submenu-2-sub-option-4-Link

$sm_menu_1_option2_sub5 = "";                                      //submenu-2-sub-option-5-Title
$link_sm_menu_1_option2_sub5 = "";                                 //submenu-2-sub-option-5-Link

$sm_menu_1_option2_sub6 = "";                                      //submenu-2-sub-option-6-Title
$link_sm_menu_1_option2_sub6 = "";                                 //submenu-2-sub-option-6-Link

//----------------------------Fim-Menu-1-Sisdam-Web----------------------------------//

//----------------------------Início-Menu-2-Sisdam-Web-------------------------------//

//Menu-2-Title
$sm_menu_2_title = "<u>M</u>emo/Oficio"; //Title do 2º Menu Sisdam-Web
//submenu-2-option-1
$sm_menu_2_option1 = "MEMO/OFÍCIO-2017"; //Option 1 Title
$sm_menu_2_option1_sub1 = "Listar";      //2º Menu Sisdam-Web - Sub 1 Option 1 Title
$sm_menu_2_option1_sub2 = "Cadastrar";   //2º Menu Sisdam-Web - Sub 2 Option 2 Title
//submenu-2-option-2
$sm_menu_2_option2 = "ARQUIVO"; //Option 2 Title
$sm_menu_2_option2_sub1 = "MEMO-OFÍCIO-2016";     //Sub 2 Option 1 Title
$sm_menu_2_option2_sub2 = "0";           //2º Menu Sisdam-Web - Sub 2 Option 2 Title
$sm_menu_2_option2_sub3 = "0";           //2º Menu Sisdam-Web - Sub 2 Option 3 Title
$sm_menu_2_option2_sub4 = "0";           //2º Menu Sisdam-Web - Sub 2 Option 4 Title
$sm_menu_2_option2_sub5 = "0";           //2º Menu Sisdam-Web - Sub 2 Option 5 Title
$sm_menu_2_option2_sub6 = "0";           //2º Menu Sisdam-Web - Sub 2 Option 6 Title

//----------------------------Fim-Menu-1-Sisdam-Web----------------------------------//
$conectar->close();
?>