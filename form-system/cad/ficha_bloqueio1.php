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
error_reporting(0);

$nDoc = $_GET['nDoc'];

$consulta_sinan = "SELECT * FROM tblDengue WHERE nDoc='$nDoc'";
$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_suvis = mysqli_fetch_assoc($resultado_sinan);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <div class="page-header text-center col-xs-12">
        <img id="logo-bloqueio" class="logo-img" src="./imagens/bloqueio/titulobloqueio.jpg">
    </div>

    <div class="row">

        <div class="col-xs-12">
            <form class="form-horizontal" id="ficha_bloqueio" method="POST" action="">

                <div class="row">
                    <h3><label class="col-xs-12">SINAN : <?php echo $editar_sinan_suvis['nDoc']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            ENTRADA : <?php echo $editar_sinan_suvis['DataEntrada']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            SETOR : <?php echo $editar_sinan_suvis['Setor1']; ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12"><?php echo $editar_sinan_suvis['UBS1']; ?>
                            <img id="logo-dengue" class="logo-img" align="right"
                                 src="./imagens/bloqueio/dengue.jpg"></label></h3>
                </div>

                <div class="row">
                    <h3><label align="right" class="col-xs-12">EXAME
                            : <?php echo utf8_encode($editar_sinan_suvis['Resultado']); ?>&nbsp;&nbsp;&nbsp; EM :
                            <?php echo $editar_sinan_suvis['DataResultado']; ?></label></h3>
                </div>
                </br>

                <div class="row">
                    <h3><label class="col-xs-12">PACIENTE
                            : <?php echo utf8_encode($editar_sinan_suvis['NomeSolicitante']); ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">ENDEREÇO
                            : <?php echo $editar_sinan_suvis['Logradouro']; ?> <?php echo utf8_encode($editar_sinan_suvis['Endereco1']); ?>
                            &nbsp;&nbsp;&nbsp;Nº: <?php echo $editar_sinan_suvis['N']; ?>
                            &nbsp;&nbsp;&nbsp;COMP: <?php echo utf8_encode($editar_sinan_suvis['Complemento']); ?></label>
                    </h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">BAIRRO : <?php echo utf8_encode($editar_sinan_suvis['Bairro1']); ?>
                            &nbsp;&nbsp;&nbsp; CEP : <?php echo $editar_sinan_suvis['Cep1']; ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">DA : <?php echo $editar_sinan_suvis['Da']; ?>&nbsp;&nbsp;&nbsp; PGGUIA
                            : <?php echo $editar_sinan_suvis['PgGuia1']; ?>
                            &nbsp;&nbsp;&nbsp; TELEFONE : <?php echo $editar_sinan_suvis['Telefone']; ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">END. TRABALHO/EST :
                            _________________________________________________</label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">DA : ______ &nbsp;&nbsp;PÁG GUIA : __________ &nbsp;&nbsp;TELEFONE :
                            _________-__________ </label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">DATA 1º SINTOMAS : <?php echo $editar_sinan_suvis['Data1Sintomas']; ?>
                            &nbsp;&nbsp;&nbsp; S E :
                            <?php echo $editar_sinan_suvis['Se1Sintomas']; ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">DATA VIAGEM : ____/____/_______</label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">LOCAL PROVÁVEL DE INFECÇÃO :
                            _______________________________________</label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">DATA DE COLETA DE SOROLOGIA
                            : <?php echo $editar_sinan_suvis['DataColeta']; ?></label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">BLOQUEIO EM : ____/____/_______&nbsp;&nbsp;&nbsp;
                            ENC. P/ AÇÃO QUÍMICA : ____/____/_______</label></h3>
                </div>

                <div class="row">
                    <h3><label class="col-xs-12">OBSERVAÇÃO :
                            ____________________________________________________________</label></h3>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>
                <div class="row">
                    <h4><label class="col-xs-12">___________________________________________________________________________________________________</label>
                    </h4>
                </div>

                <div class="row">
                    <h6><label class="col-xs-12 text-center">IMPRESSO POR : <?php echo $usuariologin ?>&nbsp;&nbsp;&nbsp; <?php echo $editar_sinan_suvis['Impressao']; ?>
                            &nbsp;&nbsp;&nbsp; EM : <?php echo date("d/m/Y"); ?></label></h6>
                </div>

            </form>
        </div>
    </div>
</div>
