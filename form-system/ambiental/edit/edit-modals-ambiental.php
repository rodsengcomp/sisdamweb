<?php
/* Criado por Rodolfo Romaioli R. De Jesus.
 * User: D788796-5
 * Date: 13/03/2019
 * Time: 14:25
 */
$id = $_GET['id'];
$lixo = $_GET['lixeira'] ?? '';
//SQL do modal novos endereços
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
        $('#list-edit-esporo-medc').DataTable({
            processing: true,
            serverside: true,
            ajax: 'form-system/ambiental/edit/proc-edit-ambiental/list-edit-esporo-medc.php?id=<?=$id?>&lixeira=<?=$lixo?>',
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            "aoColumnDefs": [
                <?php if($lixo === 'true'): ?>
                {
                    "aTargets": [0], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return ' <a href="#" role="button" disabled class="btn btn-warning rounded-circle"><strong><span class="fa fa-pencil-alt"></strong></a>';
                    }
                },
                <?php else: ?>
                {
                    "aTargets": [0], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return ' <a href="suvisjt.php?pag=edit-esporo-animal&id='+ full[0]+'&id_sd=' + full[8] + '&data_medc=' + full[1] + '&id_med=' + full[2] + '&dsg=' + full[3] + '&qtd='+ full[4] +'&nm_ent_medc='+ full[5] + '&nm_rec_medc='+ full[6]  + '&obs_med='+ full[7] + '&edit=true" role="button" class="btn btn-warning rounded-circle"><strong><span class="glyphicon glyphicon-pencil"></strong></a>';
                    }
                },
                <?php endif; ?>
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' MG/DIA';
                    }
                },
                {
                    "aTargets": [4], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[4] + ' CAPSULAS';
                    }
                },
                <?php if($lixo === 'true'):?>
                {
                    "aTargets": [8], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp' + full[8]+ '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-warning">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title-dark text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Reativar Medicamento</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja reativar ' + full[2] + ' - ' + full[4] + ' Cápsulas ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[8]+'&id_sd=' + full[0] + '&data_medc=' + full[1] + '&id_med=' + full[2] + '&dsg=' + full[3] + '&qtd='+ full[4] +'&nm_ent_medc='+ full[5] + '&nm_rec_medc='+ full[6] + '&acao=reativar-saida-medicamento" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp' + full[8]+ '"><i class="fa fa-arrow-alt-circle-up"></i></button>';
                    }
                },
                <?php else : ?>
                {
                    "aTargets": [8], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp' + full[8]+ '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-danger">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Deletar Medicamento</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja apagar ' + full[2] + ' - ' + full[4] + ' Cápsulas ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[8]+'&id_sd=' + full[0] + '&data_medc=' + full[1] + '&id_med=' + full[2] + '&dsg=' + full[3] + '&qtd='+ full[4] +'&nm_ent_medc='+ full[5] + '&nm_rec_medc='+ full[6] + '&acao=deletar-saida-medicamento" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp' + full[8]+ '"><i class="fa fa-trash-alt"></i></button>';
                    }
                },
                <?php endif; ?>
            ]
        });

    });

    $('#ModalLixoEsp').modal('show');
</script>


