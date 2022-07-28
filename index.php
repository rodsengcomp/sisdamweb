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
            <img class="first-slide" src="./imagens/campanha_junho_meio_ambiente/dia_da_imunizacao.jpeg" alt="First slide">
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
            <img class="second-slide" src="./imagens/campanha_junho_meio_ambiente/dia_mundial_do_meio_ambiente.jpeg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 2px 2px 6px rgba(186, 78, 48, 1);">
                    <!-- <h1>Compromisso</h1>
                    <p>É importante o empenho na busca por ferramentas que cada vez venham a atender melhor a demanda de
                        serviço.Buscamos tecnologias capazes de superar até mesmo nossas expectaivas.</p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="./imagens/campanha_meses/cada_cor_mes_2.jpg" alt="Third slide">
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
        <div style="color: black" class="col-md-4">
            <h2>Dia das Mulheres</h2>
            <p>O Dia Internacional da Mulher é uma data comemorativa que foi oficializada pela Organização das Nações Unidas na década de 1970.
                Essa data simboliza a luta histórica das mulheres para terem suas condições equiparadas às dos homens. Inicialmente, essa data remetia à
                reivindicação por igualdade salarial, mas, atualmente, simboliza a luta das mulheres não apenas contra a desigualdade salarial, mas também
                contra o machismo e a violência.
                <strong><a class="text-info" href="https://brasilescola.uol.com.br/historiab/feminismo.htm" target="_blank"> Acesse também: Feminismo no Brasil - a evolução desse movimento em nosso país</a></strong>
            </p>
        </div>
        <div style="color: #d33333" class="col-md-4">
            <h2>História do Dia Internacional da Mulher</h2>
            <p>O Dia Internacional da Mulher existe, enquanto data comemorativa, como resultado da luta das mulheres por meio de manifestações, greves, comitês etc.
                Essa mobilização política, ao longo do século XX, deu importância para o 8 de março como um momento de reflexão e de luta. A construção dessa data
                está relacionada a uma sucessão de acontecimentos.
                Uma primeira história que ficou muito conhecida como fundadora desse dia narra que, em 8 de março de 1857, 129 operárias morreram carbonizadas em um incêndio ocorrido nas instalações de uma fábrica têxtil na cidade de Nova York. Supostamente, esse incêndio teria sido intencional, causado pelo proprietário da fábrica, como forma de repressão extrema às greves e levantes das operárias, por isso teria trancado suas funcionárias na fábrica e ateado fogo nelas. Essa história, contudo, é falsa e, por isso, o 8 de março não está ligado a ela.</p>

        </div>
        <div style="color: #1e7e34" class="col-md-4">
            <h2>Outra História ...</h2>
            <p>Existe, no entanto, outra história que remonta a um <strong>incêndio que de fato aconteceu em Nova York</strong>, no dia 25 de março de 1911.
                Esse incêndio aconteceu na Triangle Shirtwaist Company e <strong>vitimou 146 pessoas</strong>, 125 mulheres e 21 homens, sendo a maioria dos mortos judeus.
                Essa história é considerada um
                dos marcos para o estabelecimento do Dia das Mulheres. As causas desse incêndio foram as péssimas instalações elétricas associadas à composição do
                solo e das repartições da fábrica e, também, à grande quantidade de tecido presente no recinto, o que serviu de combustível para o fogo.
                Além disso, alguns proprietários de fábricas da época, incluindo o da Triangle, trancavam seus funcionários na fábrica durante o expediente como
                forma de conter motins e greves. No momento em que a Triangle pegou fogo, as portas estavam trancadas.
                <strong><a class="text-success" href="https://brasilescola.uol.com.br/datas-comemorativas/dia-da-mulher.htm" target="_blank"> Fonte: Brasil Escola</a></strong>
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
