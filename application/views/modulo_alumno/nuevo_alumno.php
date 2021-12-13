<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Nuevo alumno</h3>
            <form id="formAlumno" method="post">
                <div class="form-group">
                  <label for="txtCodigo">Codigo</label>
                  <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpCodigo" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpNombre" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="txtEdad">Edad</label>
                  <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpEdad" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="selectSexo">Sexo</label>
                  <select class="form-control" name="selectSexo" id="selectSexo">
                    <option value="M">Hombre</option>
                    <option value="F">Mujer</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="selectIdGrd">Grado</label>
                  <select class="form-control" name="selectIdGrd" id="selectIdGrd">
                    <?php foreach($grados as $item): ?>
                        <option value="<?php echo $item->grd_id?>"><?php echo $item->grd_nombre?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txtObservacion">Observacion</label>
                  <textarea type="text" name="txtObservacion" id="txtObservacion" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                  <small id="helpObservacion" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <button id='btnEnviarDatos' type="submit" class="btn btn-success">Enviar</button>
                    <a href="<?php echo base_url('modulo_alumno/alumno')?>" class="btn btn-info">Atras</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    $('document').ready(function() {
        validar();
        $('#formAlumno').on('submit', enviarDatos);
    });

    function enviarDatos(event){
        event.preventDefault();
        $.ajax({
          method: 'post',
          url: "<?php echo base_url('modulo_alumno/alumno/guardar_alumno')?>",
          dataType: 'json',
          accepts: 'application/json',
          data: {
            txtCodigo: $('#txtCodigo').val(),
            txtNombre: $('#txtNombre').val(),
            txtEdad:  $('#txtEdad').val(),
            txtSexo: $('#selectSexo').val(),
            txtIdGrd: $('#selectIdGrd').val(),
            txtObservacion: $('#txtObservacion').val()
          },
          success: function (data){
            if(!data.estado){
              $('#helpCodigo').text(data.errores.txtCodigo);
              $('#helpNombre').text(data.errores.txtNombre);
              $('#helpEdad').text(data.errores.txtEdad);
            } else {
              window.location.replace('<?php echo base_url('modulo_alumno/alumno')?>')
            }
          }
        });
    }

    function validar(){
        $('#txtCodigo').on('input', validarCamposTexto).focus(validarCamposTexto);
        $('#txtNombre').on('input', validarCamposTexto).focus(validarCamposTexto);
        $('#txtEdad').on('input', validarCamposTexto).focus(validarCamposTexto);
    }

    function validarCamposTexto(e){
      let valor = e.target.value;
      if(valor.length > 0){
        $('#btnEnviarDatos').removeAttr('disabled').removeClass('disabled');
        e.target.parentElement.lastElementChild.textContent = '';
      }else {
        $('#btnEnviarDatos').attr('disabled', true).addClass('disabled');
        e.target.parentElement.lastElementChild.textContent = 'Campo requerido';
      }
    }
</script>