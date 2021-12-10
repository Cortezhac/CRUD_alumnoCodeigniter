<div class="container">
    <h2>Mantenimiento grados</h2>
    <div>
        <a class="btn btn-success" href="<?php echo base_url('modulo_grado/grado/nuevo_grado')?>">Nuevo</a>
    </div>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($grados as $item): ?>
                <tr>
                    <td scope="row"><?php echo $item->grd_id ?></td>
                    <td><?php echo $item->grd_nombre ?></td>
                    <td><a class="btn btn-info" href="<?php echo base_url('modulo_grado/grado/editar_grado/') . $item->grd_id?>">Editar</a></td>
                    <td>
                        <button onclick="asignarDatosModal(this)" id="botonEliminar" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId" data-id="<?php echo $item->grd_id?>">
                        Eliminar
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
    </table>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">sm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="idEliminar" type="button" data-ideliminar="0" class="btn btn-danger">Si, eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('document').ready(function () {
        $('#idEliminar').on('click', (event) => {
            $.ajax({
                method: 'post',
                url: "<?php echo base_url('modulo_grado/grado/eliminar_grado') ?>",
                accepts: 'application/json',
                data: {
                    grd_id: event.target.dataset.ideliminar
                },
                success: (data) => {
                    window.location.reload();
                }
            });
        });
    });

    function asignarDatosModal(input){
        id = input.dataset.id;
        $('#idEliminar').attr('data-ideliminar', id);
    }
</script>