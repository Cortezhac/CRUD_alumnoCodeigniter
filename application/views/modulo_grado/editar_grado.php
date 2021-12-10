<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Editar grado</h3>
                    <form id='editarGrado' action="" method="POST">
                        <div class="form-group">
                            <label for="txtNombre">Nombre</label>
                            <input id="txtNombre" placeholder="<?php echo($grado->grd_nombre) ?>" class="form-control" type="text" name="txtnombre">
                            <small id="helpId" class="text-muted text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Editar">
                            <a class="btn btn-info" href="<?php echo base_url('modulo_grado/grado') ?>">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('document').ready(function(){
        $('#editarGrado').on('submit',enviarDatos);
        $('#txtNombre').on('input', validarInput);
    });

    function enviarDatos(e){
        e.preventDefault();
        txtNombre = $('#txtNombre').val();
        id = '<?php echo $grado->grd_id ?>';
        if(validarDatos(txtNombre)){
            $.ajax({
                method: 'post',
                url: "<?php echo base_url('modulo_grado/grado/actualizar_grado') ?>",
                accepts: 'application/json',
                data: {
                    txtId: id,
                    txtNombre: txtNombre
                },
                success: (data) => {
                    console.log(data)
                },
                error: (jsxhr) => {
                    console.log(jsxhr);
                }
            });
        }
    }

    function validarDatos(nombre){
        if(nombre.length > 0){
            $('#helpid').text('');
            return true;
        }else {
            $('#helpId').text('Introduzca un valor');
            return false;
        }
    }

    function validarInput(e){
        input = e.target.value;
        if(input.length > 0){
            $('#helpId').text('');
        }else {
            $('#helpId').text('Introduzca un valor');
        }
    }
</script>