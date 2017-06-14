

<?php
if (empty($resultados)) {
    echo "<h1 style='color:red;font-size: large;'>No se encontraron resultados en Aspirantes</h1>";
    ?>


<?php } else { ?>
<h1 style="font-size: large">Resultados en beneficiarios:</h1>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Proyecto</th>   
            <th>Predio</th>   
            <th>Tipo Documento</th>
            <th>Documento Identidad</th>
            <th>Primer nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Proyecto</th>   
            <th>Predio</th>   
            <th>Tipo Documento</th>
            <th>Documento Identidad</th>
            <th>Primer nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
        </tr>
        <tr>
            <th colspan="7" class="ts-pager form-horizontal">
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
            <?php
            foreach ($resultados as $ben):
                ?>
        <tr>
            <td><?php echo $ben['Proyect']['codigo'] ?></td> 
            <td><?php echo $ben['Property']['nombre'] ?></td> 
            <td><?php echo $ben['Beneficiary']['tipo_identificacion'] ?></td>
            <td><?php echo $ben['Beneficiary']['numero_identificacion'] ?></td>
            <td><?php echo $ben['Beneficiary']['nombres'] ?></td>
            <td><?php echo $ben['Beneficiary']['primer_apellido'] ?></td>
            <td><?php echo $ben['Beneficiary']['segundo_apellido'] ?></td>

        </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<?php } ?>          
<br><br>


<?php
if (empty($predios)) {
    echo "<h1 style='color:red;font-size: large'>No se encontraron resultados en Predios</h1>";

?>


<?php } else { ?>
<h1 style="font-size: large">Resultados en predios:</h1>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Código</th>   
            <th>nombre</th>
            <th>Municipio</th>
            <th>Matrícula</th>
            <th>Número predial</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Código</th>   
            <th>nombre</th>
            <th>Municipio</th>
            <th>Matrícula</th>
            <th>Número predial</th>
        </tr>
        <tr>
            <th colspan="7" class="ts-pager form-horizontal">
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
            <?php
            foreach ($predios as $predio):
                ?>
        <tr>
            <td><?php echo $predio['Proyect']['codigo'] ?></td> 
            <td><?php echo $predio['Property']['nombre'] ?></td>
            <td><?php echo $predio['City']['name']." (". $predio['Departament']['name'].")" ?></td>
            <td><?php echo $predio['Property']['oficina_matricula'] ."-". $predio['Property']['numero_matricula'] ?></td>
            <td><?php echo $predio['Property']['cedula_catastral'] ?></td>

        </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<?php } ?>          
<br><br>
