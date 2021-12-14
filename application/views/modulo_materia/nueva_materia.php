<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Nueva Materia</h3>
            <form id="formMateria" method="post" action="<?php echo base_url('modulo_materia/materia/guardar_materia')?>">
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpNombre" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Enviar">
                    <a class="btn btn-secondary" href="<?php echo base_url('modulo_materia/materia')?>">Regresar</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
    $('document').ready(function () {
        $('#txtNombre').on('input', validar).focusin(validar);
    });

    function validar(e){
        $dato = e.target.value;
        if($dato.length <= 0){
            $('#helpNombre').text('Campo requerido');
            $('input[type=submit]').attr('disabled', true).addClass('disabled');
        }else {
            $('#helpNombre').text('');
            $('input[type=submit]').removeAttr('disabled').removeClass('disabled');
        }
    }


</script>