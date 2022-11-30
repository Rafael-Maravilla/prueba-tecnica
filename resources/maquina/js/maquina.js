const capturarMaquinaID = (id) =>{
    $("#IDM").val(id);
    let form = new FormData();
    form.append('id', id);

    fetch('http://127.0.0.1/prueba-tecnica/index.php/maquina/obtenerRegistro', {
        method: 'POST', 
        body: form
    })
    .then(respuesta => respuesta.json())
    .then(datos =>  {
        $("#codigoM").val(datos[0].codigo);
        $("#nombreM").val(datos[0].nombre);
        cargarSelect($("#tipoM"), datos[0].tipo_id);
        $("#descripcionM").val(datos[0].descripcion);
    })
    .catch(msg => console.log(`Fallo en la promise ${msg}`))
}

const cargarSelect = (select, porDefecto=0, filtrar=false,) => {
    fetch("http://127.0.0.1/prueba-tecnica/index.php/tipo/obtenerRegistro")
    .then(respuesta => respuesta.json())
    .then(datos =>  {
        $(select).empty();
        if(filtrar) $(select).append("<option value='todos'>Todos</option>");
        for(dato of datos){
            if(porDefecto==dato.id){
                $(select).append(`<option value='${parseInt(dato.id)}' selected>${dato.nombre}</option>`);
            }else{
                $(select).append(`<option value='${parseInt(dato.id)}'>${dato.nombre}</option>`);
            }
        }
    })
    .catch(msg => console.log(`Fallo en la promise ${msg}`))
}

const eliminarMaquinaria = (id) => {
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
          window.location.href = `maquina/eliminar/?id=${id}`;
        }
      })
}

$("#tiposMaquina").change(function(){
    let filtro = new FormData();
    filtro.append("criterio", $(this).val());
    fetch('filtrar_maquinas',{
        method: 'POST', 
        body: filtro
    })
    .then(respuesta => respuesta.json())
    .then(datos =>  {
        console.log(datos);
        $("#tablaMaquinas").empty();
        for(let dato of datos){
            $("#tablaMaquinas").append(`
                <tr>
                    <td>${dato.id}</td>
                    <td>${dato.codigo}</td>
                    <td>${dato.nombre}</td>
                    <td>${dato.tipo}</td>
                    <td>${dato.descripcion}</td>
                </tr>
            `)
        }
        
    })
    .catch(msg => console.log(`Fallo en la promise ${msg}`))
});

const mostrarValidacion = () => {
    let mensajes = $(".mensajesValidacion").html();
    if(mensajes==""){
        console.log(typeof $("#mensajesValidacion").html());
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Necesitas completar el formulario!',
            html: $("#mensajesValidacion").html()
        });
    }
} 

cargarSelect($("#tipo"));
cargarSelect($("#tiposMaquina"),0,true);
mostrarValidacion();