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
            <img class="first-slide" src="./imagens/campanha_meses/cada_cor_mes_1.jpg" alt="First slide">
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
            <img class="second-slide" src="./imagens/campanha_meses/cada_cor_mes_2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 2px 2px 6px rgba(186, 78, 48, 1);">
                    <!-- <h1>Compromisso</h1>
                    <p>É importante o empenho na busca por ferramentas que cada vez venham a atender melhor a demanda de
                        serviço.Buscamos tecnologias capazes de superar até mesmo nossas expectaivas.</p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="./imagens/campanha_meses/cada_cor_mes_junho.jpg" alt="Third slide">
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
        <div style="color: #ff0000" class="col-md-4">
            <h2>Junho Vermelho</h2>
            <p>A campanha Junho Vermelho, realizada este mês por instituições públicas e privadas da área da saúde, busca conscientizar a população sobre a importância da doação de sangue e,
                desse modo, angariar mais doadores voluntários. O Ministério da Saúde estima que, no ano passado, devido à pandemia de covid-19, <strong><a class="text-danger"
                target="_blank" href="https://agenciabrasil.ebc.com.br/saude/noticia/2021-01/queda-na-doacao-de-sangue-devido-pandeia-preocupa-hemocentros">
                o número de doações tenha diminuído 20%</a></strong>, na comparação com o ano anterior. No primeiro trimestre de 2021, a taxa de doação voluntária da população brasileira era de 1,6%, dentro do padrão estabelecido pela
                Organização Mundial da Saúde (OMS). O diretor médico da Santa Casa de Misericórdia do Rio de Janeiro, João Tyll, diz que a doação pode ser realizada com segurança, uma vez que são adotadas medidas de prevenção para evitar a propagação do vírus, sem risco para os doadores.
                <br><strong><a target="_blank" class="text-danger" href="https://agenciabrasil.ebc.com.br/saude/noticia/2021-06/campanha-junho-vermelho-busca-doadores-voluntarios-de-sangue">Fonte: Agência Brasil</a></strong>
            </p>
        </div>
        <div style="color: #ff8000" class="col-md-4">
            <h2>Junho Laranja</h2>
            <p>A Sociedade Brasileira de Queimaduras (SBQ) promove o Junho Laranja, um mês de conscientização sobre as queimaduras como grande problema de saúde pública, e que tem a data
                de 6 de junho como o Dia Nacional de Combate às Queimaduras. O tema da campanha em 2021 será “Álcool e fogo: mantenha o distanciamento. Contra queimaduras, prevenção é a
                vacina”. Em tempos de pandemia da covid 19, o uso do álcool se tornou uma grande preocupação dos especialistas em queimaduras. Com o incentivo ao uso para prevenção ao
                coronavírus e a liberação da venda do álcool 70% na versão líquida, foi percebido um aumento considerável da ocorrência de acidentes com o produto. Segundo a SBQ,
                somente em 2020 quase mil pessoas foram internadas em centros de atendimento especializado por queimaduras graves no Brasil.<strong><a class="text-primary"
               href="https://portalcovid19.saude.rn.gov.br/noticias/junho-laranja-e-o-mes-nacional-de-prevencao-de-queimaduras/"> Fonte: portalcovid19/RN</a></strong>
            </p>

        </div>
        <div style="color: #1e7e34" class="col-md-4">
            <h2>Cores das Campanhas</h2>
            <p>Ainda não existe um calendário oficial estabelecido sobre a cor de cada mês. Dessa maneira, associações médicas, por exemplo, quando reunidas podem determinar a cor para um
                mês como forma de conscientização. A disseminação das campanhas ocorrem, sobremaneira, de acordo com o engajamento da mídia, empresas, clínicas, hospitais, indústria
                farmacêutica, organizações não governamentais, instituições públicas ou privadas e até com a participação de monumentos que são iluminados com a cor do mês. Ou seja,
                <strong class="text-info">quanto maior for a divulgação, maior é a chance de a cor escolhida seja fixada na mente das pessoas e associadas imediatamente à sua causa</strong>
                .<strong><a class="text-danger" href="https://www.bioanalise.com.br/blog/entenda-o-significado-das-cores-dos-meses-nas-campanhas-de-saude/" target="_blank"> Fonte: Bio Análise</a></strong>
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
