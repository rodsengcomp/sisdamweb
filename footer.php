<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 12/06/2017
 * Time: 16:03
 */

//error_reporting(0);
include_once 'conecta.php';

$consulta_footer = "SELECT * FROM footer";
$resultado_footer = $conectar->query($consulta_footer);
$editar_footer = mysqli_fetch_assoc($resultado_footer);

?>

    <footer style="color: #191970" class="text-center">
        <h5>
            <div>&copy;&nbsp;Sistema <?php echo $editar_footer['sistema']; ?> -
                versão: <?php echo $editar_footer['versao']; ?> - <?php echo $editar_footer['ano']; ?>
                - <?php echo $editar_footer['direitos']; ?></div>
        </h5>
        <h5>
            <div>Desenvolvido por : <?php echo $editar_footer['desenvolvedor']; ?> - Contato : <a href=#
                                                                                                  data-toggle=tooltip
                                                                                                  title="Contato do Suporte"><?php echo $editar_footer['email_contato']; ?></a>
            </div>
        </h5>
    </footer>

<?php
//Fecha a conexão
$conectar->close();
?>