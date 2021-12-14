<div class="container">
    <h3>Lista Materias</h3>
    <a href="<?php echo base_url('modulo_materia/materia/nueva_materia')?>" class="btn btn-success">Nuevo</a>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($materia as $item):?>
                    <tr>
                        <td scope="row"><?php echo $item->mat_id ?></td>
                        <td><?php echo $item->mat_nombre ?></td>
                        <td>
                            <a class="btn btn-info" href="<?php echo base_url('modulo_materia/materia/editar_materia/').$item->mat_id?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
    </table>
</div>