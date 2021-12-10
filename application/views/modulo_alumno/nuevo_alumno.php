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
                  <small id="helpCodigo" class="text-muted">Help codigo</small>
                </div>
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpNombre" class="text-muted">Help nombre</small>
                </div>
                <div class="form-group">
                  <label for="txtEdad">Edad</label>
                  <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpEdad" class="text-muted">Help Edad</small>
                </div>
                <div class="form-group">
                  <label for="txtSexo">Sexo</label>
                  <select class="form-control" name="txtSexo" id="txtSexo">
                    <option value="M">Hombre</option>
                    <option value="F">Mujer</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txtId_grd">Grado</label>
                  <select class="form-control" name="txtId_grd" id="txtId_grd">
                    <?php foreach($grados as $item): ?>
                        <option value="<?php echo $item->grd_id?>"><?php echo $item->grd_nombre?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txtObservacion">Observacion</label>
                  <textarea type="text" name="txtObservacion" id="txtObservacion" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                  <small id="helpId" class="text-muted">Help observacion</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    $('document').ready(function() {
        $('#formAlumno').on('submit', enviarDatos);
    });

    function enviarDatos(event){
        event.preventDefault();
        validarCampos();
    }

    function validarCampos(){
        
    }
</script>