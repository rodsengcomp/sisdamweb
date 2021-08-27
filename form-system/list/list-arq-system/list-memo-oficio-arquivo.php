<?php
$yearMemoOf = $_GET["year"];

$result_arqMemoOf = "SELECT * FROM memo_$yearMemoOf";
$resultado_arqMemoOf = mysqli_query($conectar, $result_arqMemoOf);

?>

<script type="text/javascript">

    $(document).ready(function() {
        $('#list-memo-arq').DataTable({
            responsive: {details:
                    {display: $.fn.dataTable.Responsive.display.modal(
                            {header: function (row)
                                {var data = row.data();
                                    return 'DETALHES DO ' +data[3]+ '&nbspNº&nbsp:&nbsp'  + data[1];}
                            }),
                        renderer: function ( api, rowIdx, columns ) {
                            var data = $.map( columns, function ( col, i ) {
                                return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"} },
            dom: "lBfrtip",
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'asc' ],
            "aoColumnDefs": [{"aTargets": [0] } ],
            buttons: [ {extend:'excel',title:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',header: 'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',filename:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',header: 'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',filename:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print', exportOptions: {columns: ':visible'},title:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',header: 'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',filename:'SisdamWeb - Memorandos / Ofícios <?php echo $unidade.' - '.$yearMemoOf; ?>',orientation:'landscape',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });
    });
</script>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Memorandos/Ofícios <?php echo $yearMemoOf; ?></li>
                </ol>
                <button type="button" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span>LISTA DE MEMORANDOS E OFÍCIOS ARQUIVO - <?php echo $yearMemoOf; ?></button>
            </div>
            <?php
            if (isset($_SESSION['msgdelerro'])) {
                echo $_SESSION['msgdelerro'];
                unset($_SESSION['msgdelerro']);
            }
            if (isset($_SESSION['msgdel'])) {
                echo $_SESSION['msgdel'];
                unset($_SESSION['msgdel']);
            }
            if (isset($_SESSION['msgedit'])) {
                echo $_SESSION['msgedit'];
                unset($_SESSION['msgedit']);
            }
            ?>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <table id="list-memo-arq" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>

            <th class="text-center">ID</th>
            <th class="text-center">DATA</th>
            <th class="text-center">TIPO</th>
            <th class="text-center">DESTINO</th>
            <th class="text-center">ASSUNTO</th>
            <th class="text-center">SOLICITANTE</th>
            <th class="text-center">USUÁRIO</th>
            <th class="text-center">DATA CADASTRO</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row_arqMemoOf = mysqli_fetch_assoc($resultado_arqMemoOf)){ ?>

            <tr>
                <?php $id = $row_arqMemoOf["id"]; ?>
                <td class="text-center"><?php echo $row_arqMemoOf["id"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["datamemo"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["localdestino"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["tipodoc"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["descricaomemo"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["nomememo"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["usuarioca"]; ?></td>
                <td class="text-center"><?php echo $row_arqMemoOf["criado"]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>