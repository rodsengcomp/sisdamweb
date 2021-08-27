<?php
error_reporting(0);
include_once 'conecta.php';
?>

<?php
unset($_SESSION['usuarioId'],
    $_SESSION['usuarioNome'],
    $_SESSION['usuarioNivelAcesso'],
    $_SESSION['usuarioLogin'],
    $_SESSION['usuarioSenha'],
    $_SESSION['usuarioTid']);
?>

<!-- ************************ Pois, que adianta ao homem ganhar o mundo inteiro e perder a sua alma? Marcos 8:36 ****************************** -->

<!--   Antes que tudo se inicie expresso minha total gratidão ao Senhor Deus por me conceder a cada dia a oportunidade de expressar o imenso
amor que eu sinto por ele e por sua criação. Aqui também retrato o amor que recebi na Suvis Jaçanã de pessoas especiais, algumas já se aposentaram
do emprego público, mas deixaram um legado de comprometimento e amor pela profissão e principalmente pelo "ser humano" -->

<!-- Sistema criado e desenvolvido por Rodolfo Romaioli Ribeiro de Jesus. Todos os direitos reservados -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Sistema de Gerenciamento da Suvis Jaçanã/Tremembé desenvolvido por Rodolfo R R de Jesus."/>
    <meta name="author" content="Rodolfo Romaioli Ribeiro de Jesus"/>
    <link rel="icon" href="imagens/sv2ico.ico">
    <title>SisdamJT Web</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/btn-circle.css">

    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
include_once 'menus/menu-index.php';
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="./imagens/fevereiro_verm_lar/fevereiro_verm_lar_1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 2px 2px 6px rgba(0, 78, 48, 1);">
                    <!--<h1>Inovação</h1>
                    <p>A cada dia nos aprimoramos na criação de um sistema rápido e integrado para facilitar nosso
                        trabalho.Sempre inovando com ferramentas gratuitas de qualidade e facil acesso, em busca do
                        melhor "Suvis Jaçanã-Tremembé".</p> -->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="./imagens/fevereiro_verm_lar/fevereiro_verm_lar_2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 2px 2px 6px rgba(186, 78, 48, 1);">
                    <!-- <h1>Compromisso</h1>
                    <p>É importante o empenho na busca por ferramentas que cada vez venham a atender melhor a demanda de
                        serviço.Buscamos tecnologias capazes de superar até mesmo nossas expectaivas.</p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="./imagens/fevereiro_verm_lar/fevereiro_verm_lar_3.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 2px 2px 6px rgba(184, 233, 58, 0.9);">
                    <!--<h1>Qualidade</h1>
                    <p>Sempre pensando em qualidade no serviço prestado e excelência nos sistemas criados.Uma equipe de
                        trabalho que não se cansa de buscar a melhoria no processamento e armazenamento de
                        dados.</p>--></br>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
    <!-- Exemplo row of columns -->
    <div class="row">
        <div style="color: #4B0082" class="col-md-4">
            <h2>A doença de Alzheimer</h2>
            <p>Causada por uma degeneração progressiva dos neurônios, inicialmente caracteriza-se pela perda de memória, confusão e desorientação, ansiedade, agitação, ilusão,
                desconfiança, alteração de personalidade e do senso crítico. Começam a surgir dificuldades de realizar as atividades de vida diária (tomar banho, cozinhar, telefonar etc.).
                Na fase intermediária os pacientes sofrem para reconhecer familiares, amigos e ambientes conhecidos, há possibilidade de alucinações, perda de apetite e de peso, incontinência
                urinária, dificuldades na comunicação, movimentos e falas repetitivas, problemas com sono, a necessidade de apoio para atividades rotineiras aumenta. Na fase final a dependência
                total já está estabelecida. A imobilidade é crescente, com tendência a assumir a posição de proteção (fetal).</p>
        </div>
        <div style="color: #FF4500" class="col-md-4">
            <h2>Leucemia</h2>
            <p>um tipo de câncer que afeta os tecidos que formam células sanguíneas e impede que o corpo combata infecções.
                Com causas desconhecidas, a doença costuma se manifestar de forma repentina e agressiva. No entanto, as perspectivas de cura são boas — as chances de se recuperar chegam a 90%, caso seja diagnosticada nos estágios iniciais.
                Para que isso seja possível, é necessário ficar atento a alguns sinais de alerta:</p>
            <p>• Dores nas articulações e nos ossos, febre persistente, sem razão aparente;</p>
            <p>• Infecções frequentes, sangramento nasal e na gengiva;</p>
            <p>• Perda de peso involuntária, surgimento repentino de hematomas no corpo, tontura frequente
            </p>

        </div>
        <div style="color: #4B0082" class="col-md-4">
            <h2>Lúpus</h2>
            <p>O que é? Doença que faz com que o sistema imunológico passe a atacar células do próprio corpo, que passam a ser vistas como inimigas.Quais os sintomas?
                Confusão mental, manchas avermelhadas na pele, febre persistente, dor nas articulações e fadiga.
            <h2>Fibromialgia</h2>
            O que é?
            Síndrome que provoca dores fortes em todo o corpo por longos períodos de tempo.
            Quais os sintomas?
            Dor generalizada, inchaço e sensibilidade nas articulações, fadiga e perda de memória.
            </p>
        </div>
    </div>

    <hr>

    <!-- FOOTER -->
    <footer class="text-center" style="color: #4B0082">
        <p>&copy; Sistema SisdamWeb 2.0 &middot; <a style="color: #4B0082" href="http://10.47.171.110/">Privacidade</a> &middot; <a style="color: #4B0082" href="http://10.47.171.110/">Sobre</a></p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- Menu Responsivo - http://vadikom.github.io/smartmenus/src/demo/bootstrap-navbar.html -->
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="js/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
<!-- Fim do Js Menu -->
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
