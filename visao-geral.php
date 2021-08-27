<div class="container-fluid">
<?php /* Created by Rodolfo Romaioli Ribeiro de Jesus. * User: D788796 * Date: 09/06/2017 * Time: 08:39 */
error_reporting(0);
include_once 'locked/seguranca-admin.php'; include_once 'conecta.php'; include_once 'functions.php';
$result_usuarios = "SELECT * FROM usuarios"; $resultado = $conectar->query($result_usuarios);
?>

<div class="row"><div class="col-lg-12"><div class="page-title">
    <ol class="breadcrumb"><li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a></li><li class="active">Listar Usuários</li></ol>
        <button type="button" class="btn btn-default btn-labeled btn-lg btn-block"><span class="btn-label"><i class="glyphicon glyphicon-list"></i></span>LISTA DE USUÁRIOS</button>
</div>
        <br>
            <?php
                if (isset($_SESSION['msgdelerro'])) {echo $_SESSION['msgdelerro'];unset($_SESSION['msgdelerro']);} /*Mensagem de Erro ao Deletar*/
                if (isset($_SESSION['msgdel'])) {echo $_SESSION['msgdel'];unset($_SESSION['msgdel']);} /*Mensagem de Deletado Com Sucesso*/
                if (isset($_SESSION['msgerro'])) {echo $_SESSION['msgerro'];unset($_SESSION['msgerro']);} /*Mensagem de Erro ao Editar*/
                if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);} /*Mensagem de Editado com Sucesso*/
                if (isset($_SESSION['msgativo'])) {echo $_SESSION['msgativo'];unset($_SESSION['msgativo']);} /*Mensagem de Ativo*/
                if (isset($_SESSION['msginativo'])) {echo $_SESSION['msginativo'];unset($_SESSION['msginativo']);} /*Mensagem de Inativo*/
                if (isset($_SESSION['msgreset'])) {echo $_SESSION['msgreset'];unset($_SESSION['msgreset']);}
                if (isset($_SESSION['msgresetnao'])) {echo $_SESSION['msgresetnao'];unset($_SESSION['msgresetnao']);}
            ?>
    </div></div><!-- end PAGE TITLE ROW -->
                <br>
<div class="row">
    <div class="col-lg-12">

        <div class="text-center">
            <a href="././admin.php?pag=cad-user">
                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                    echo 'display: none;';
                } ?>" accesskey="N" data-toggle="tooltip" title="NOVO" class="btn btn-labeled btn-success">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span><u> N</u>OVO
                </button>
            </a>
        </div>

        <table id="list-user" class="table table-hover table-striped table-bordered" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">EDITAR</th>
                <th class="text-center">RESET</th>
                <th class="text-center">NOME</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">E-MAIL</th>
                <th class="text-center">NÍVEL DE ACESSO</th>
                <th class="text-center">LOGIN</th>
                <th class="text-center">APAGAR</th>
            </tr>
            </thead>

            <tbody>
            <?php while ($row_usuario = mysqli_fetch_assoc($resultado)){ ?>
                <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                    echo 'display: none;';
                } ?>">
                    <?php $id = $row_usuario["id"]; ?>
                    <td class="text-center"><?php echo $row_usuario["id"]; ?></td>
                    <td class="text-center">
                        <a href='././admin.php?pag=edit-user&id=<?php echo $row_usuario['id']; ?>'>
                            <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" type='button' class='btn btn-warning btn-circle'><span class="glyphicon glyphicon-pencil"></button>
                        </a>
                    </td>
                    <td class="text-center">
                        <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {echo 'display: none;';} ?>" class='btn btn-info btn-circle' data-toggle="modal" data-target="#myModalReset<?php echo $row_usuario['id']; ?>"><span class="glyphicon glyphicon-repeat"></button>
                    </td>
                    <td><?php echo $row_usuario["nome"]; ?></td>
                    <td class="text-center" data-toggle="modal" data-target="#myModalAtiva<?php echo $row_usuario['id']; ?>"><?php $color = completePayment($row_usuario["status"]);
                        echo "{$color}" . $row_usuario["status"]; ?></td>
                    <td><?php echo $row_usuario["email"]; ?></td>
                    <td class="text-center"><?php $user = niveluser($row_usuario["nivel_acesso_id"]);
                        echo "{$user}"; ?></td>
                    <td class="text-center"><?php echo $row_usuario["login"]; ?></td>
                    <td class="text-center">
                        <button type="button" class='btn btn-danger btn-circle' data-toggle="modal" data-target="#myModal<?php echo $row_usuario['id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>

                <!-- Inicio Modal Detalhes-->

                <div class="modal fade" id="myModal<?php echo $row_usuario['id']; ?>" tabindex="-1"
                     role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header-del">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="text-center">
                                        <h4>Deseja apagar o login: </h4>
                                        <h4>
                                            <button type="button"
                                                    class="btn btn-danger btn-lg btn-block"><?php echo $row_usuario['login'] ?>
                                                ???
                                            </button>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="text-center">
                                    <a href='admin.php?pag=del-user&id=<?php echo $row_usuario['id']; ?>&nome=<?php echo $row_usuario['nome']; ?>&email=<?php echo $row_usuario['email']; ?>&nivel_acesso_id=<?php echo $row_usuario['nivel_acesso_id']; ?>&login=<?php echo $row_usuario['login']; ?>'>
                                        <button type="button" class="btn btn-success">SIM</button>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal Detalhes -->

                <!-- Inicio Modal Reset de Senha-->

                <div class="modal fade" id="myModalReset<?php echo $row_usuario['id']; ?>" tabindex="-1"
                     role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="text-center">
                                        <h4>Deseja resetar senha do login: </h4>
                                        <h4><?php echo $row_usuario['login'] ?>???</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="text-center">
                                    <a href='admin.php?pag=reset-password&id=<?php echo $row_usuario['id']; ?>&nome=<?php echo $row_usuario['nome']; ?>&email=<?php echo $row_usuario['email']; ?>&status=<?php echo $row_usuario['status']; ?>&nivel_acesso_id=<?php echo $row_usuario['nivel_acesso_id']; ?>&login=<?php echo $row_usuario['login']; ?>&resetsenha=SIM'>
                                        <button type="button" class="btn btn-success">SIM</button>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href='admin.php?pag=reset-password&id=<?php echo $row_usuario['id']; ?>&nome=<?php echo $row_usuario['nome']; ?>&email=<?php echo $row_usuario['email']; ?>&status=<?php echo $row_usuario['status']; ?>&nivel_acesso_id=<?php echo $row_usuario['nivel_acesso_id']; ?>&login=<?php echo $row_usuario['login']; ?>&resetsenha=NAO'>
                                        <button type="button" class="btn btn-danger">NAO</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal Reset de Senha -->

                <!-- Inicio Modal Ativa Login-->

                <div class="modal fade" id="myModalAtiva<?php echo $row_usuario['id']; ?>" tabindex="-1"
                     role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="text-center">
                                        <h4>Deseja mudar status para: </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="text-center">
                                    <a href='admin.php?pag=ativa-user&id=<?php echo $row_usuario['id']; ?>&nome=<?php echo $row_usuario['nome']; ?>&email=<?php echo $row_usuario['email']; ?>&status=ATIVO&nivel_acesso_id=<?php echo $row_usuario['nivel_acesso_id']; ?>&login=<?php echo $row_usuario['login']; ?>'>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok">ATIVO</button>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href='admin.php?pag=ativa-user&id=<?php echo $row_usuario['id']; ?>&nome=<?php echo $row_usuario['nome']; ?>&email=<?php echo $row_usuario['email']; ?>&status=INATIVO&nivel_acesso_id=<?php echo $row_usuario['nivel_acesso_id']; ?>&login=<?php echo $row_usuario['login']; ?>'>
                                        <button type="button" class="btn btn-danger">INATIVO</button>
                                    </a>&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal Ativo Login -->

            <?php } ?>
            <br>
            </tbody>
        </table>
    </div><!-- div row -->

</div>
<!-- /.container-fluid -->

