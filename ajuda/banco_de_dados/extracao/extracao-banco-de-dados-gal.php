<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 27/06/2018
 * Time: 09:02
 */
?>


<div class="container">
    <div class="blog-masthead">

        <!-- begin PAGE TITLE ROW -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                        <li class="active">Extração de Tabelas</li>
                    </ol>
                    <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                    class="fa fa-database"></i></span>EXTRAÇÃO DE TABELAS GAL</button>
                </div>
            </div>
        </div>

        <div class="blog-header">
            <h1 class="blog-title">Extração das Tabelas</h1>
            <p class="lead blog-description">Veja o <strong>Vídeo Explicativo</strong> ou o <strong>Passo a Passo</strong> da exportação de tabelas </p>
        </div>

        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">

                    <h2 class="blog-post-title">Tabelas do Gal</h2>
                    <p class="blog-post-meta">12 de Julho, 2018 por <a href="#">Rodolfo</a></p>

                    <!-- 4:3 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/KY4Xy6RXrHI?rel=0"></iframe>
                    </div>

                    <!-- 4:3 aspect ratio
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ShMsD5XX4kw?rel=0"></iframe>
                    </div> -->

                    <br>

                    <p>No sistema <strong>GAL - IAL</strong> existem 5 planilhas para extrair "diariamente" :</p>
                    <ul>
                        <li>Planilha de Resultados Chikungunya</li>
                        <li>Planilha de Resultados Coqueluche</li>
                        <li>Planilha de Resultados Dengue</li>
                        <li>Planilha de Resultados Febre Amarela</li>
                        <li>Planilha de Resultados Zika</li>
                    </ul>

                    <p>Acesse o site através do link: <a target="_blank" href="https://gal.saude.sp.gov.br/gal/">https://gal.saude.sp.gov.br/gal/</a> e siga os seguintes passos: </p>

                    <br>
                    <h3>1º Passo :</h3>
                    <br>
                    <p>O site acessado mostra uma mensagem as vezes de que <strong>"Sua conexão não é particular"</strong>, para continuar basta clicar logo abaixo na tela na opção:
                        <strong>AVANÇADO</strong></p>
                    <img src="imagens/ajuda/gal/ajuda_gal_1.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <p>Em seguida clique no link "<u>Ir para <a target="_blank" href="https://gal.saude.sp.gov.br/gal/">gal.saude.sp.gov.br/gal/ (não seguro)</a></u>"
                        que fica disponível na parte inferior da tela.</p>

                    <img src="imagens/ajuda/gal/ajuda_gal_2.jpg" class="img-responsive" alt="Responsive image">

                    <br>
                    <h3>2º Passo :</h3>
                    <br>

                    <p>Após acessar o site a tela de login se abrirá </p>

                    <img src="imagens/ajuda/gal/ajuda_gal_3.jpg" class="img-responsive" alt="Responsive image">
                    <br>
                    <p>Preencha os campos conforme a imagem acima e em seguida clique no botão "<strong>Entrar</strong>" na aba "<strong>Laboratório</strong>".</p>

                    <br>
                    <h3>3º Passo :</h3>
                    <br>

                    <p>Na tela abaixo clique e preencha os campos indicados, após clique em "<strong>Filtrar</strong>".</p>
                    <img src="imagens/ajuda/gal/ajuda_gal_4.jpg" class="img-responsive" alt="Responsive image">
                    <br>

                    <p><strong>Observações: </strong> O campo <strong>exame</strong> deve ser preenchido com o nome dos agravos indicados abaixo, um agravo por solicitação de
                        <strong>Filtrar</strong> que será solicitada no banco de dados.</p>

                    <li>Chikungunya</li>
                    <li>Coqueluche</li>
                    <li>Dengue</li>
                    <li>Febre Amarela</li>
                    <li>Zika</li>
<br>

                    <p>Exemplo de preenchimento co campo <strong>Filtrar</strong> com Agravo.</p>
                    <img src="imagens/ajuda/gal/ajuda_gal_5.jpg" class="img-responsive" alt="responsive image">

                    <br>
                    <h3>4º Passo :</h3>
                    <br>


                    <p>Clique no icone para exportar a listagem atual csv conforme imagem abaixo e será gerado um arquivo compactado no fim da tela ao lado esquerdo. </p>
                    <img src="imagens/ajuda/gal/ajuda_gal_6.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <p>Abra a planilha <strong>data.csv</strong> que está dentro do arquivo compactado. </p>
                    <img src="imagens/ajuda/gal/ajuda_gal_7.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <p>Assim que a planilha <strong>data.csv</strong> for aberta, selecione as coluna <strong>A</strong> e <strong>C</strong> respectivamente com o
                        botão Ctrl do teclado e o botão esquerdo do mouse, em seguida aperte o botão direito do mouse e selecione a opção <strong>Formatar células ...
                            -> Número -> Casas decimais = 0 -></strong> e clique no botão <strong>OK</strong> logo abaixo. </p>
                    <img src="imagens/ajuda/gal/ajuda_gal_8.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <p>Em seguida selecione a opção na planilha <strong>Arquivo -> Salvar como...</strong> e salve a mesma na pasta que está em <strong>C:\Users\SMS\Desktop\csv</strong>. </p>
                    <img src="imagens/ajuda/gal/ajuda_gal_9.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <img src="imagens/ajuda/gal/ajuda_gal_10.jpg" class="img-responsive" alt="Responsive image">

<br>
                    <img src="imagens/ajuda/gal/ajuda_gal_11.jpg" class="img-responsive" alt="Responsive image">

<br>
                    <p><strong>Observações:</strong> Todos os arquivos extraidos do banco de dados estão originalmente com o nome <strong>data.csv</strong> e ao salvar na pasta
                        <strong>C:\Users\SMS\Desktop\csv</strong> devem ser renomeados com os respectivos nomes conforme abaixo:</p>

                    <br>
                    <ul>
                        <li>Planilha de Resultados Chikungunya -> <strong>dataChiku.csv</strong></li>
                        <li>Planilha de Resultados Coqueluche -> <strong>dataCoque.csv</strong></li>
                        <li>Planilha de Resultados Dengue -> <strong>dataDengue.csv</strong></li>
                        <li>Planilha de Resultados Febre Amarela -> <strong>dataFebre.csv</strong></li>
                        <li>Planilha de Resultados Zika <strong>dataZika.csv</strong></li>
                    </ul>




                    <!-- 16:9 aspect ratio
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>-->

                    <!-- 4:3 aspect ratio -->
                    <!--<div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ShMsD5XX4kw?rel=0"></iframe>
                    </div>-->

                    <nav>
                        <!--<ul class="pager">
                            <!--<li><a href="#">Previous</a></li>
                            <li><a href="#">Próximo</a></li>
                        </ul> -->
                    </nav>

                </div><!-- /.blog-main -->

            </div><!-- /.row -->

        </div>
    </div>
</div>