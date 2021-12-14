<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Editar Materia</h3>
            <form id="formMateria" method="post" action="<?php echo base_url('modulo_materia/materia/actualizar_materia')?>">
                <input type="hidden" name="mat_id" value="<?php echo $materia->mat_id?>">
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="<?php echo $materia->mat_nombre?>" aria-describedby="helpId">
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
        $('#formMateria').on('submit', enviarDatos);
    });

    function enviarDatos(e){
        e.preventDefault();
        if($('#txtNombre').val() == ''){
            $('#txtNombre').val('<?php echo $materia->mat_nombre ?>')
        }

        this.submit();
    }
</script>