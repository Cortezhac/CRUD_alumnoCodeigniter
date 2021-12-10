<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Mantenimiento Alumnos</h3>
                    <a class="btn btn-success" href="<?php echo base_url('modulo_alumno/alumno/nuevo_alumno')?>" role="button">Nuevo</a>
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Grado</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alumno as $item):?>
                                <tr>
                                    <td scope="row">
                                        <?php echo $item->alm_id ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_codigo ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_nombre ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_edad ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_sexo ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_nombre_grd ?>
                                    </td>
                                    <td>
                                        <?php echo $item->alm_observacion ?>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>