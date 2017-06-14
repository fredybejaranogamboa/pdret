<script>
    $(document).ready(function () {
        $("#formulario").validate();
    });
</script>
<div class="panel-heading">
    Datos proyecto
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php echo $this->Form->create("Proyect", array('novalidate' => '', 'id' => 'formulario', 'role' => "form", "class" => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "edit", $this->data['Proyect']['id']))); ?>
            <?php echo $this->Form->hidden('Proyect.id'); ?>
            <?php echo $this->Form->input('Proyect.call_id', array('label' => 'Convocatoria', 'required' => '', 'empty' => 'Seleccione una convocatoria', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('Proyect.codigo', array('required' => '', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('Proyect.nombre', array('required' => '', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('Proyect.tipo', array('label' => 'Tipo', 'empty' => 'Seleccione un tipo', 'required' => '', 'class' => 'form-control', 'options' => array('F' => 'Familiar', 'A' => 'Asociativo', 'T' => 'Territorial', 'R' => 'Resguardo'))); ?>
            <?php echo $this->Form->input('Proyect.departament_id', array('label' => 'Departamento', 'required' => '', 'empty' => 'Seleccione departamento', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('Proyect.branch_id', array('label' => 'Territorial - organización', 'required' => '', 'empty' => 'Seleccione territorial u organización', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('Proyect.agreement_id', array('label' => 'Convenio', 'empty' => 'Seleccione acuerdo', 'class' => 'form-control')); ?>
            <br>
            <?php
            echo "Archivo F2-GI-PPDRET-01";
            echo $this->Form->file('Proyect.archivo_propuesta', array('label' => 'Adjuntar archivo propuesta',
                'class' => 'form-control',
                'accept' => 'application/pdf',
                'aria-required' => 'true',
                'extension' => 'pdf'
            ));
            ?>
            <br>
            <?php
            echo "Archivo F3-GI-PPDRET-01";
            echo $this->Form->file('Proyect.archivo_propuesta_calificacion', array('label' => 'Adjuntar archivo propuesta', 'class' => 'form-control',
                'class' => 'form-control',
                'accept' => 'application/pdf',
                'aria-required' => 'true',
                'extension' => 'pdf'));
            ?>
            <br>
            <?php
            echo "Archivo F1-GI-PPT-01";
            echo $this->Form->file('Proyect.archivo_propuesta_productiva', array('label' => 'Adjuntar archivo propuesta productiva', 'class' => 'form-control',
                'class' => 'form-control',
                'accept' => 'application/pdf',
                'aria-required' => 'true',
                'extension' => 'pdf'));
            ?>
            <br>
            <?php
            echo "Archivo F24-GI-PPDRET";
            echo $this->Form->file('Proyect.f24', array('label' => 'Adjuntar archivo propuesta productiva f24', 'class' => 'form-control',
                'class' => 'form-control',
                'accept' => 'application/pdf',
                'aria-required' => 'true',
                'extension' => 'pdf'));
            ?>
            <br>
            <?php if ($permitir) echo $this->Form->end(array('label' => "Guardar", 'class' => 'btn btn-default')) ?>
        </div>
    </div>
</div>




