<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <p>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Agregar nuevo
                </button>
            </p>
            <div class="collapse mb-4" id="collapseExample">
                <div class="card card-body">
                    <form action="http://127.0.0.1/prueba-tecnica/index.php/Maquina/guardar" method="post" class="needs-validation" novalidate>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="codigo" class="form-label">Código</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                            <div class="col-md-4">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" id="tipo" required>
                                    <option>Seleccione una opcion...</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="d-none" class="mensajesValidacion">
                            <?php
                                if(isset($msgErrores)){
                                    foreach($msgErrores as $msgError){
                                        echo "<p class='m-0'>$msgError</p>";
                                    }
                                }
                             ?>
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="Guardar">
                    </form>
                </div>
            </div>

            <table class="table table-striped " id="tabla">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>   
                <?php 
                    foreach ($maquinas as $maquina) {
                        echo "<tr>
                                <td>$maquina->codigo</td>
                                <td>$maquina->nombre</td>
                                <td>$maquina->tipo</td>
                                <td>$maquina->descripcion</td>
                                <td>
                                    <button class='btn btn-primary btnM' data-bs-toggle='modal' data-bs-target='#modal' onclick='capturarMaquinaID($maquina->id)'>Modificar</button>
                                    <button class='btn btn-danger' onclick='eliminarMaquinaria($maquina->id)'>Eliminar</button>
                                </td>
                            </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Modificar máquina</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="maquina/modificar" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" name="idM" id="IDM" hidden>
                    <input type="text" class="form-control" name="codigoM" id="codigoM">
                </div>
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombreM" id="nombreM">
                </div>
                <div class="col-md-4">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipoM" class="form-select" id="tipoM">
                        <option value="#">Seleccione una opcion...</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcionM" class="form-control" id="descripcionM" cols="30" rows="5"></textarea>
                </div>                    
            </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" data-bs-dismiss="modal" value="Guardar">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>