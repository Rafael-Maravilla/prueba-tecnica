const capturarID = (id) => {
    
    $("#IDM").val(id);

    let form = new FormData();
    form.append('id', id);

    fetch('tipo/obtenerRegistro', {
        method: 'POST', 
        body: form
    })
    .then(respuesta => respuesta.json())
    .then(nombreTipo =>  {
        $("#tipoM").val(nombreTipo[0].nombre);
    })
    .catch(msg => console.log(`Fallo en la promise ${msg}`))
}


const confirmacionEliminado = (id) => {
    event.preventDefault();
    Swal.fire({
        title: '¿Desea eliminar este registro?',
        text: "Si, elimina este registro no podrá recuperarlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo eliminarlo!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `tipo/eliminar/?id=${id}`;
        }
      })
}