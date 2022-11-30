<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <p>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Agregar nuevo
                </button>
            </p>
            <div class="collapse mb-4" id="collapseExample">
                <div class="card card-body">
                    <form action="http://127.0.0.1/prueba-tecnica/index.php/tipo/guardar" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" name="tipo" id="tipo" required>
                            <input type="submit" class="btn btn-primary mt-2" value="Guardar">
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
                    </form>
                </div>
            </div>

            <table class="table table-striped " id="tabla">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>   
                <?php 
                    foreach ($tipos as $tipo) {
                        echo "<tr>
                                <td>$tipo->nombre</td>
                                <td>
                                    <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal' onclick='capturarID($tipo->id);'>Modificar</button>
                                    <button class='btn btn-danger' onclick='confirmacionEliminado($tipo->id)'>Eliminar</button>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Modificar Tipo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="tipo/modificar" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="idM" id="IDM" hidden>
                <input type="text" class="form-control" name="tipoM" id="tipoM" required>
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