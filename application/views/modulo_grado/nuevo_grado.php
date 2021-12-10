<div class="container">
    <form id="datosGrados" method="POST" action="<?php echo base_url('modulo_grado/grado/guardar_grado')?>">
        <div class="form-group">
        <label for="grd_nombre">Nombre</label>
        <input type="text" name="grd_nombre" id="txtnombre" class="form-control" placeholder="Nombre grado" aria-describedby="helpId">
        <div class='text-danger'>
            <small id="helpId" class="text-muted"></small>
        </div>
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Enviar">
            <a class='btn btn-danger' href="<?php echo base_url('modulo_grado/grado') ?>">Cancelar</a>
        </div>
    </form>
</div>

<script>
    $('document').ready(function(){
        $('#datosGrados').on('submit', enviarDatos);
        $('#txtnombre').on('input', validarDatos);
    });

    function enviarDatos(e){
        e.preventDefault();
        txtnombre = $('#txtnombre').val();
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('modulo_grado/grado/guardar_grado') ?>",
            dataType: "json",
            accepts: 'application/json',
            data: {
                grd_nombre: txtnombre
            },
            success: (data) => {
                if(data.estado == true){
                    window.location.replace("<?php echo base_url('modulo_grado/grado') ?>");
                }else {
                    $('#helpId').text(data.errores);
                }
            }
        });
    }

    function validarDatos(){
        $txtnombre = $('#txtnombre').val();
        if($txtnombre.length > 0){
            $('input[type=submit]').removeProp('disabled');
            $('input[type=submit]').removeClass('disabled');
        }else {
            $('#helpId').text('Introduzca un valor');
            $('input[type=submit]').prop('disabled', true);
            $('input[type=submit]').addClass('disabled');
        }
    }
</script>