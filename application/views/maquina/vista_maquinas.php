<div class="container mt-4">
    <div class="row">
        <div class="card col-md-5">
            <div class="card-body">
                <label for="tipos" class="form-label">Tipos de Máquinas</label>
                <select name="" id="tiposMaquina" class="form-select">
                </select>
            </div>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody id="tablaMaquinas">   
            <?php 
                foreach ($maquinas as $maquina) {
                    echo "<tr>
                            <td>$maquina->id</td>
                            <td>$maquina->codigo</td>
                            <td>$maquina->nombre</td>
                            <td>$maquina->tipo</td>
                            <td>$maquina->descripcion</td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>

