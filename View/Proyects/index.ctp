<script>
    $(function () {
        $("#myTable").tablesorter();
    });
</script>
<br> 
<?php echo $this->Ajax->link('  Adicionar Proyecto', array('controller' => 'Proyects', 'action' => 'add'), array('update' => 'content', 'indicator' => 'loading', 'class' => 'btn btn-success fa fa-plus-square-o')); ?>
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Listado proyectos
            </div>
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="convocatoria filter-select">Convocatoria</th>
                            <th>Código</th>
                            <th>Regional</th>
                            <th class="sorter-false" colspan="4"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Convocatoria</th>
                            <th>Código</th>
                            <th>Regional</th>
                            <th colspan="4"></th>
                        </tr>
                        <tr>
                            <th colspan="8" class="ts-pager form-horizontal">
                                <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                                <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                                <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                                <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
                                <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                                <select class="pagesize input-mini" title="Select page size">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                <select class="pagenum input-mini" title="Select page number"></select>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($Proyects as $Proyect): ?>
                            <tr>
                                <td><?php echo $Proyect['Proyect']['id']; ?></td>
                                <td><?php echo $Proyect['Call']['nombre']; ?></td>
                                <td><?php echo $this->Ajax->link($Proyect['Proyect']['codigo'], array('controller' => 'Proyects', 'action' => 'select_proyect2', $Proyect["Proyect"]["id"]), array('update' => 'current', 'indicator' => 'loading')); ?></td>
                                <td><?php echo $Proyect['Departament']['name']; ?></td>
                                <td><?php echo $this->Ajax->link(' Editar', array('controller' => 'Proyects', 'action' => 'edit', $Proyect["Proyect"]["id"]), array('update' => 'content', 'indicator' => 'loading', 'class' => 'btn btn-success fa fa-pencil')); ?></td>
                                <td><?php echo $this->Ajax->link('Municipios', array('controller' => 'CityProyects', 'action' => 'index', $Proyect["Proyect"]["id"]), array('update' => 'content', 'indicator' => 'loading', 'class' => 'btn btn-success')); ?></td>
                                <td><?php
                                    if (file_exists("../webroot/files/Propuestas/Propuesta-f2-" . $Proyect['Proyect']['id'] . ".pdf"))
                                        echo $this->Html->link('  Propuesta_F2', "../files/Propuestas/Propuesta-f2-" . $Proyect['Proyect']['id'] . ".pdf", array('target' => 'blank', 'indicator' => 'loading', 'class' => 'btn btn-info fa fa-file-pdf-o', 'download' => "Propuesta_F2-" . $aleatorio . ".pdf"));
                                    ?><br><br>
                                    <?php
                                    if (file_exists("../webroot/files/Propuestas/Propuesta-productiva-f1-" . $Proyect['Proyect']['id'] . ".pdf"))
                                        echo $this->Html->link('  Propuesta_Productiva', "../files/Propuestas/Propuesta-productiva-f1-" . $Proyect['Proyect']['id'] . ".pdf", array('target' => 'blank', 'indicator' => 'loading', 'class' => 'btn btn-info fa fa-file-pdf-o', 'download' => "Propuesta_Productiva-" . $aleatorio . ".pdf"));
                                    ?><br><br>
                                    <?php
                                    if (file_exists("../webroot/files/Propuestas/f24-" . $Proyect['Proyect']['id'] . ".pdf"))
                                        echo $this->Html->link('  Propuesta_Productiva F24', "../files/Propuestas/f24-" . $Proyect['Proyect']['id'] . ".pdf", array('target' => 'blank', 'indicator' => 'loading', 'class' => 'btn btn-info fa fa-file-pdf-o', 'download' => "Propuesta_Productiva_F24-" . $aleatorio . ".pdf"));
                                    ?>
                                </td>
                                <td><?php
                                    if (file_exists("../webroot/files/Propuestas/Propuesta-calificacion-f3-" . $Proyect['Proyect']['id'] . ".pdf"))
                                        echo $this->Html->link('  Calificación_F3', "../files/Propuestas/Propuesta-calificacion-f3-" . $Proyect['Proyect']['id'] . ".pdf", array('target' => 'blank', 'indicator' => 'loading', 'class' => 'btn btn-info fa fa-file-pdf-o', 'download' => "Calificacion_F3-" . $aleatorio . ".pdf"));
                                    ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $this->Ajax->link('  Adicionar Proyecto', array('controller' => 'Proyects', 'action' => 'add'), array('update' => 'content', 'indicator' => 'loading', 'class' => 'btn btn-success fa fa-plus-square-o')); ?>
            </div>
        </div>
    </div>
</div>