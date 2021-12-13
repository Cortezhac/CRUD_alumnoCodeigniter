<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Editar alumno</h3>
            <form action="<?php echo base_url('modulo_alumno/alumno/actualizar_alumno')?>" id="formAlumno" method="post">
                <input type="hidden" name="alm_id" id="alm_id" value="<?php echo $alumno->alm_id ?>">
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="<?php echo $alumno->alm_nombre?>" aria-describedby="helpId">
                  <small id="helpNombre" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="txtEdad">Edad</label>
                  <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="<?php echo $alumno->alm_edad?>" aria-describedby="helpId">
                  <small id="helpEdad" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="selectSexo">Sexo</label>
                  <select class="form-control" name="selectSexo" id="selectSexo">
                    <?php if($alumno->alm_sexo == 'M'):?>
                        <option value="M" selected>Hombre</option>
                        <option value="F">Mujer</option>
                    <?php else:?>
                        <option value="F" selected>Mujer</option>
                        <option value="M">Hombre</option>
                    <?php endif?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="selectIdGrd">Grado</label>
                  <select class="form-control" name="selectIdGrd" id="selectIdGrd">
                    <?php foreach($grados as $item): ?>
                        <?php if($item->grd_id == $alumno->alm_id_grd):?>
                            <option value="<?php echo $item->grd_id?>" selected><?php echo $item->grd_nombre?></option>
                        <?php else:?>
                            <option value="<?php echo $item->grd_id?>"><?php echo $item->grd_nombre?></option>
                        <?php endif?>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txtObservacion">Observacion</label>
                  <textarea type="text" name="txtObservacion" id="txtObservacion" class="form-control" placeholder="<?php echo $alumno->alm_observacion?>" aria-describedby="helpId"></textarea>
                  <small id="helpObservacion" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <button id='btnEnviarDatos' type="submit" class="btn btn-success">Editar</button>
                    <a href="<?php echo base_url('modulo_alumno/alumno')?>" class="btn btn-info">Atras</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
    $('document').ready(function () {
        $('#formAlumno').on('submit', enviarDatos);
    });

    function enviarDatos(e){
        e.preventDefault();
        if($('#txtNombre').val() == ''){
           $('#txtNombre').val('<?php echo $alumno->alm_nombre ?>');
        }

        if($('#txtEdad').val() == ''){
            $('#txtEdad').val('<?php echo $alumno->alm_edad ?>');
        }

        if($('#txtObservacion').val() == ''){
            $('#txtObservacion').val('<?php echo $alumno->alm_observacion?>')
        }

        this.submit();
    }
</script>