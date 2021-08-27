<!--
<script>
    $(function(){
        window.print();
    });
</script>-->

<style>
    #logo-bloqueio {
        width: 1000px;
        height: 100px;
        margin: 0 auto 0px;
        display: block;
    }

    #logo-dengue {
        width: 500px;
        height: 200px;
        margin: 0 auto 0px;
        display: block;
    }
</style>

<?php

$id = $_GET['id'];

//$conectar = mysqli_connect("mysql.hostinger.com.br","u460889717_rods","Dodo0115","u460889717_sisda");
$conectar = mysqli_connect("localhost", "root", "", "sisdam1");

$consulta_sinan = "SELECT * FROM dengue WHERE id='$id'";
$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_suvis = mysqli_fetch_assoc($resultado_sinan);

mysqli_close($conectar);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <div class="page-header text-center col-xs-12">
        <img id="logo-bloqueio" class="logo-img" src="./imagens/bloqueio/titulobloqueio.jpg">
    </div>

    <div class="row">

        <div class="col-xs-12">
            <form class="form-horizontal" id="ficha_bloqueio" method="POST" action="">

                <div class="row">
                    <h2><p class="text-center"><strong>AGRAVO : DENGUE</strong></p></h2>
                    </br>
                </div>

                <div class="row">
                    <h2><p align="right"><strong>SETOR : <?php echo $editar_sinan_suvis['Setor1']; ?></strong></p></h2>
                    <h3><p><strong>SINAN : <?php echo $editar_sinan_suvis['nDoc']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ENTRADA: <?php echo $editar_sinan_suvis ['DataEntrada']; ?></strong></p></h3>
                    <h3><p><strong><?php echo $editar_sinan_suvis['UBS1']; ?></strong></p></h3>
                    <h3><p><strong>EXAME : <?php echo utf8_encode($editar_sinan_suvis['Resultado']); ?>&nbsp;&nbsp;&nbsp;
                                EM :
                                <?php echo $editar_sinan_suvis['DataResultado']; ?></strong></p></h3>
                </div>
                </br>

                <div class="row">
                    <h3><p><strong>PACIENTE
                                : <?php echo utf8_encode($editar_sinan_suvis['NomeSolicitante']); ?></strong></p></h3>

                    <h4><p><strong>ENDEREÇO
                                : <?php echo $editar_sinan_suvis['Logradouro']; ?> <?php echo utf8_encode($editar_sinan_suvis['Endereco1']); ?>
                                &nbsp;&nbsp;&nbsp;Nº: <?php echo $editar_sinan_suvis['N']; ?>
                                &nbsp;&nbsp;&nbsp;COMP: <?php echo utf8_encode($editar_sinan_suvis['Complemento']); ?></strong>
                        </p></h4>

                    <h4><p><strong>BAIRRO : <?php echo utf8_encode($editar_sinan_suvis['Bairro1']); ?>&nbsp;&nbsp;&nbsp;
                                CEP : <?php echo $editar_sinan_suvis['Cep1']; ?></strong></p></h4>

                    <h4><p><strong>DA : <?php echo $editar_sinan_suvis['Da']; ?>&nbsp;&nbsp;&nbsp; PGGUIA
                                : <?php echo $editar_sinan_suvis['PgGuia1']; ?>
                                &nbsp;&nbsp;&nbsp; TELEFONE : <?php echo $editar_sinan_suvis['Telefone']; ?></strong>
                        </p></h4>

                    <h4><p><strong>END. TRABALHO/EST : _________________________________________________</strong></p>
                    </h4>

                    <h4><p><strong>DA : ______ &nbsp;&nbsp;PÁG GUIA : __________ &nbsp;&nbsp;TELEFONE :
                                _________-__________ </strong></p></h4>
                    </br>

                    <h4><p><strong>DATA 1º SINTOMAS : <?php echo $editar_sinan_suvis['Data1Sintomas']; ?> &nbsp;&nbsp;&nbsp;
                                S E :
                                <?php echo $editar_sinan_suvis['Se1Sintomas']; ?></strong></p></h4>

                    <h4><p><strong>DATA VIAGEM : ____/____/_______</strong></p></h4>

                    <h4><p><strong>LOCAL PROVÁVEL DE INFECÇÃO : ______________________________________________</strong>
                        </p></h4>

                    <h4><p><strong>DATA DE COLETA DE SOROLOGIA
                                : <?php echo $editar_sinan_suvis['DataColeta']; ?></strong></p></h4>
                    </br>

                    <h4><p><strong>BLOQUEIO EM : ____/____/_______&nbsp;&nbsp;&nbsp;
                                ENC. P/ AÇÃO QUÍMICA : ____/____/_______</strong></p></h4>
                    </br>

                    <h4><p><strong>OBSERVAÇÃO :</strong></p></h4>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h3><p><strong>______________________________________________________________________________________________________</strong>
                        </p></h3>

                    <h6><p class="col-xs-12 text-center">IMPRESSO POR : <?php echo $usuariologin ?>
                            &nbsp;&nbsp;&nbsp; <?php echo $editar_sinan_suvis['Impressao']; ?>
                            &nbsp;&nbsp;&nbsp; EM : <?php echo date("d/m/Y"); ?></p></h6>
                </div>

            </form>
        </div>
    </div>
</div>
