ListarProductos('', '', '', '');


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


    if (document.getElementById('buscar_apellido').style.display == 'none') {
        document.getElementById('buscar_apellido').style.display = 'block';
    } else {
        document.getElementById('buscar_apellido').style.display = 'none';
    }


    if (document.getElementById('buscar_correo').style.display == 'none') {
        document.getElementById('buscar_correo').style.display = 'block';
    } else {
        document.getElementById('buscar_correo').style.display = 'none';
    }


    if (document.getElementById('buscar_telefono').style.display == 'none') {
        document.getElementById('buscar_telefono').style.display = 'block';
    } else {
        document.getElementById('buscar_telefono').style.display = 'none';
    }

}


function ListarProductos(buscar_nombre, buscar_apellido, buscar_correo, buscar_telefono) {

    var resultado = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    formdata.append('buscar_nombre', buscar_nombre);
    formdata.append('buscar_apellido', buscar_apellido);
    formdata.append('buscar_correo', buscar_correo);
    formdata.append('buscar_telefono', buscar_telefono);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_mantenimiento.php');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var tabla = '';
            json.forEach(function(item) {
                str = "<tr><td>" + item.id + "</td>";
                str = str + "<td>" + item.usuario_nombre + "</td>";
                str += "<td>" + item.Apellido + "</td>";
                str += "<td>" + item.telefono + "</td>";
                str += "<td>" + item.correo + "</td>";
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

        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);




}



window.onload = function() {
    console.log('hola');
    ListarProductos('', '', '', '');


};

// FILTRO
buscar_nombre.addEventListener("keyup", () => {
    const valor_nombre = buscar_nombre.value;
    const valor_apellido = buscar_apellido.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_nombre == "" || buscar_apellido == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_nombre, valor_apellido, valor_correo, valor_telefono);
    }
});

buscar_apellido.addEventListener("keyup", () => {
    const valor_nombre = buscar_nombre.value;
    const valor_apellido = buscar_apellido.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_apellido == "" || buscar_nombre == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_nombre, valor_apellido, valor_correo, valor_telefono);
    }
});


buscar_correo.addEventListener("keyup", () => {
    const valor_nombre = buscar_nombre.value;
    const valor_apellido = buscar_apellido.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_apellido == "" || buscar_nombre == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_nombre, valor_apellido, valor_correo, valor_telefono);
    }
});

buscar_telefono.addEventListener("keyup", () => {
    const valor_nombre = buscar_nombre.value;
    const valor_apellido = buscar_apellido.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_apellido == "" || buscar_nombre == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_nombre, valor_apellido, valor_correo, valor_telefono);
    }
});

// Eliminar

function Eliminar(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed) {



            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../cruds/eliminar_camareros.php');
            ajax.onload = function() {
                if (ajax.status === 200) {

                    if (ajax.responseText == "ok") {
                        ListarProductos('', '', '', '');
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            showConfirmButton: false,
                            timer: 1500
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
    ajax.open('POST', '../cruds/crear_camareros.php');
    ajax.onload = function() {
        if (ajax.status === 200) {

            if (ajax.responseText == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrado',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById('registrar').value = "registrar";
                form.reset();
                ListarProductos('', '', '', '');
            } else if (ajax.responseText == "vacio") {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos vacios',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById('registrar').value = "registrar";
                form.reset();
                ListarProductos('', '', '', '');
            } else if (ajax.responseText == "mal_formato") {
                Swal.fire({
                    icon: 'error',
                    title: 'Mal formato',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById('registrar').value = "registrar";
                form.reset();
                ListarProductos('', '', '', '');
            } else if (ajax.responseText == "repetido") {
                Swal.fire({
                    icon: 'error',
                    title: 'Usuario no creado, ya existe',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById('registrar').value = "registrar";
                form.reset();
                ListarProductos('', '', '', '');
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 1500
                });
                registrar.value = "Registrar";
                idp.value = "";
                ListarProductos('', '', '', '');
                form.reset();
            }
        } else {
            respuesta_ajax.innerText = 'Error';
        }
    }
    ajax.send(formdata);


});



// EDITAR


function Editar(id) {


    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/editar_camareros.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            // alert(json);
            document.getElementById('idp').value = json.id;
            document.getElementById('nombre').value = json.usuario_nombre;
            document.getElementById('apellido').value = json.Apellido;
            document.getElementById('telefono').value = json.telefono;
            document.getElementById('correo').value = json.correo;

            document.getElementById('registrar').value = "Actualizar"
        }
    }
    ajax.send(formdata);



}