function reiniciar() {
    var form = document.getElementById('frm');
    form.reset();
    document.getElementById('registrar').value = "registrar";
}


function mostrar() {
    if (document.getElementById('buscar_nombre').style.display == 'none') {
        document.getElementById('buscar_nombre').style.display = 'block';

    } else {
        document.getElementById('buscar_nombre').style.display = 'none';
    }



}

ListarProductos('');

function ListarProductos(buscar_nombre) {

    var resultado = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    formdata.append('buscar_nombre', buscar_nombre);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_lugares.php');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            if (ajax.responseText == "sin_resultados") {
                console.log("ups");
                var tabla = '';
                resultado.innerHTML = tabla;
                var error = "<br><p style='font-size:23px ; width: 100%;color:white;'>No se han encontado resultados. </p>";
                resultado.innerHTML = error;

            } else {
                var json = JSON.parse(ajax.responseText);
                var tabla = '';
                json.forEach(function(item) {
                    str = "<tr><td>" + item.id + "</td>";
                    str = str + "<td>" + item.lugar_recurso + "</td>";
                    str += "<td>  <img style='width:40px;' src=" + item.img_lugar + " ></td>";

                    str += "<td>";
                    str = str + " <button type='button' style='background-color:#006d6d;' class='btn btn-success' onclick=" + "Editar(" + item.id + ")>Editar</button>";
                    str += "</td> ";
                    str += "<td>";
                    str = str + " <button type='button' style='background-color:#2f414F;'  class='btn btn-danger' onclick=" + "Eliminar(" + item.id + ")>Eliminar</button>";
                    str += "</td> ";
                    str += "</tr>";
                    tabla += str;
                });
                resultado.innerHTML = tabla;
            }
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);




}



// FILTRO
buscar_nombre.addEventListener("keyup", () => {
    const valor_nombre = buscar_nombre.value;

    if (buscar_nombre == "") {
        ListarProductos('', '', '');
    } else {
        ListarProductos(valor_nombre);
    }
});


// Eliminar

function Eliminar(id) {
    Swal.fire({
        title: '¿Quiere eliminar este lugar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3894a3',
        cancelButtonColor: '#2f414F',
        confirmButtonText: 'Si',
        background: '#006d6d',
        color: 'white',
        cancelButtonText: 'Cancelar'

    }).then((result) => {
        if (result.isConfirmed) {



            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../cruds/eliminar_lugares.php');
            ajax.onload = function() {
                if (ajax.status === 200) {

                    if (ajax.responseText == "ok") {
                        ListarProductos('', '', '');
                        Swal.fire({
                            icon: 'success',
                            title: 'Lugar eliminado correctamente',
                            showConfirmButton: false,
                            background: '#006d6d',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 3500
                        })
                    }
                }
            }
            ajax.send(formdata);
        }
    })



}




// CREAR

registrar.addEventListener("click", () => {

    var form = document.getElementById('frm');



    var formdata = new FormData(form);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/crear_lugares.php');
    ajax.onload = function() {
        if (ajax.status === 200) {

            if (ajax.responseText == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Lugar creado correctamente',
                    background: '#006d6d',
                    color: 'white',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 3500
                });
                form.reset();
                ListarProductos('', '', '');
            } else if (ajax.responseText == "campos_vacios") {
                Swal.fire({
                    icon: 'error',

                    title: 'Campos no rellenados',
                    showConfirmButton: false,
                    background: '#006d6d',
                    color: 'white',
                    timerProgressBar: true,
                    toast: true,
                    timer: 3500
                });
                form.reset();
                ListarProductos('', '', '');
            } else if (ajax.responseText == "formato_archivo_mal") {
                Swal.fire({
                    icon: 'error',
                    title: 'Formato del archivo incorrecto',
                    showConfirmButton: false,
                    background: '#006d6d',
                    color: 'white',
                    timerProgressBar: true,
                    toast: true,

                    timer: 3500
                });
                form.reset();
                ListarProductos('', '', '');
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Lugar modificado correctamente',
                    showConfirmButton: false,
                    background: '#006d6d',
                    color: 'white',
                    timerProgressBar: true,
                    timer: 3500
                });
                registrar.value = "Registrar";
                idp.value = "";
                ListarProductos('', '', '');
                form.reset();
            }
        } else {
            respuesta_ajax.innerText = 'Error';
        }
    }
    ajax.send(formdata);


});



function Editar(id) {


    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/editar_lugares.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            // alert(json);
            document.getElementById('idp').value = json.id;
            document.getElementById('nombre').value = json.lugar_recurso;
            // document.getElementById('lugar').value = json.id_lugar;
            // document.getElementById('capacidad').value = json.capacidad;

            document.getElementById('registrar').value = "Actualizar"
        }
    }
    ajax.send(formdata);



}