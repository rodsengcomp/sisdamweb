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
                                    class="fa fa-database"></i></span>EXTRAÇÃO DE TABELAS SINAN NET</button>
                </div>
            </div>
        </div>

        <div class="blog-header">
            <h1 class="blog-title">Exportação das Tabelas</h1>
            <p class="lead blog-description">Veja o <!-- <strong>Vídeo Explicativo</strong> ou o <strong> -->Passo a Passo</strong> da exportação de tabelas </p>
        </div>

        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">

                    <h2 class="blog-post-title">Tabelas do SinanNet</h2>
                    <p class="blog-post-meta">12 de Julho, 2018 por <a href="#">Rodolfo</a></p>

                    <!-- 4:3 aspect ratio
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ShMsD5XX4kw?rel=0"></iframe>
                    </div> -->

                    <p>No sistema <strong>SinanNet</strong> existem 4 tabelas para exportar "diariamente" ao sistema SisdamWeb são elas:</p>
                    <ul>
                        <li>COQUENET.DBF</li>
                        <li>FAMARNET.DBF</li>
                        <li>LEPTONET.DBF</li>
                        <li>EXANTNET.DBF</li>
                    </ul>

                    <p>Para acessar o <strong>SinanNet</strong> acesse o atalho abaixo na barra de tarefas ou na área de trabalho e siga os seguintes passos: </p>

                    <img src="imagens/atalho-sinan-net.jpg" class="img-responsive" alt="Responsive image">

                    <br>
                    <h3>1º Passo :</h3>
                    <p>Na tela de login digite seu usuário e senha e clique em confirmar : </p>

                    <img src="imagens/login-sinannet.jpg" class="img-responsive" alt="Responsive image">
                    <br>
                    <p>Na tela principal acesse o menu : Ferramentas -> Exportação (DBF)</p>

                    <img src="imagens/tela-principal-sinan-net.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <p>Digite o período com o início do ano até a data atual :</p>
                    <p style="color: darkblue">Período <input type="text" style="color: darkblue" size="6" value="01/01/2018"> a <input type="text" style="color: darkblue" size="6" value="__/__/____"></p>
                    <p>No menu selecione :</p>
                    <p><div class="checkbox"><label><input type="checkbox" checked><strong style="color: darkblue">Exportar dados de identificação do Paciente</strong></label></div></p>
                    <p><div class="checkbox"><label style="color: darkblue"><input type="checkbox" checked>A37.9 - COQUELUCHE</label></div></p>
                    <p><div class="checkbox"><label style="color: darkblue"><input type="checkbox" checked>A95.9 - FEBRE AMARELA</label></div></p>
                    <p><div class="checkbox"><label style="color: darkblue"><input type="checkbox" checked>A27.9 - LEPTOSPIROSE</label></div></p>
                    <p><div class="checkbox"><label style="color: darkblue"><input type="checkbox" checked>B09 - DOENCAS EXANTEMATICAS</label></div></p>

                    <p>Clique em: </p>
                    <img src="imagens/botao-exportar-sinan-net.jpg" class="img-responsive" alt="Responsive image">
                    <br>
                    <h4>O Formulário preenchido : </h4>

                    <img src="imagens/exportacao-sinan-net.jpg" class="img-responsive" alt="Responsive image">
                    <br>

                    <p>Aguarde a exportação das tabelas, ao termino uma mensagem aparecerá na tela : </p>

                    <img src="imagens/dados-exportados.jpg" class="img-responsive" alt="Responsive image">
<br>
                    <h3>2º Passo :</h3>

                    <br>
                    <p>Após a mensagem descrita acima, acesse o caminho: <strong>C:\SinanNet\BaseDBF</strong></p>

                    <img src="imagens/base_dbf.jpg" class="img-responsive" alt="Responsive image">

                    <br>

                    <p>Abra individualmente as planilhas <strong>"COQUENET.DBF, FAMARNET.DBF, LEPTONET.DBF e EXANTNET.DBF"</strong> geradas. </p>

                    <p>Na opção : <strong>Arquivo -> Salvar Como</strong>,
                        salve cada uma delas no formato <strong>"CSV (separado por vírgulas) (*.csv)"</strong> na pasta : <strong>"C:\Users\SMS\Desktop\csv"</strong> . </p>
                    <br>

                    <img src="imagens/planilha-excel-sinan-net.jpg" class="img-responsive" alt="Responsive image">

                    <br>

                    <p>Clique na opção : <strong>Sim</strong></p>

                    <img src="imagens/mensagem_excel_1.png" class="img-responsive" alt="Responsive image">

                    <br>

                    <p>Pasta : <strong>"C:\Users\SMS\Desktop\csv"</strong> descrita acima: </p>
                    <img src="imagens/pasta_csv.jpg" class="img-responsive" alt="Responsive image">











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

    </div><!-- /.container -->
