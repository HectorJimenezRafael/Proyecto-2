ListarProductos('', '', '', '');

function mostrar() {
    if (document.getElementById('buscar_dia').style.display == 'none') {
        document.getElementById('buscar_dia').style.display = 'block';
    } else {
        document.getElementById('buscar_dia').style.display = 'none';
    }


    if (document.getElementById('buscar_hora').style.display == 'none') {
        document.getElementById('buscar_hora').style.display = 'block';
    } else {
        document.getElementById('buscar_hora').style.display = 'none';
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





function ListarProductos(buscar_dia, buscar_hora, buscar_correo, buscar_telefono) {

    var resultado = document.getElementById('resultado');

    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    formdata.append('buscar_dia', buscar_dia);
    formdata.append('buscar_hora', buscar_hora);
    formdata.append('buscar_correo', buscar_correo);
    formdata.append('buscar_telefono', buscar_telefono);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_reservas.php');
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
                    str = str + "<td>" + item.correo_res_o + "</td>";
                    str += "<td>" + item.telefono_res_o + "</td>";
                    str += "<td>" + item.dia + "</td>";
                    str += "<td>" + item.hora + "</td>";
                    str += "<td>" + item.id_mesa + "</td>";
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

// filtro
buscar_correo.addEventListener("keyup", () => {
    const valor_dia = buscar_dia.value;
    const valor_hora = buscar_hora.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_hora == "" || buscar_dia == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_dia, valor_hora, valor_correo, valor_telefono);
    }
});


buscar_telefono.addEventListener("keyup", () => {
    const valor_dia = buscar_dia.value;
    const valor_hora = buscar_hora.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_hora == "" || buscar_dia == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_dia, valor_hora, valor_correo, valor_telefono);
    }
});


buscar_dia.addEventListener("change", () => {
    const valor_dia = buscar_dia.value;
    const valor_hora = buscar_hora.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_hora == "" || buscar_dia == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_dia, valor_hora, valor_correo, valor_telefono);
    }
});


buscar_hora.addEventListener("change", () => {
    const valor_dia = buscar_dia.value;
    const valor_hora = buscar_hora.value;
    const valor_correo = buscar_correo.value;
    const valor_telefono = buscar_telefono.value;
    if (buscar_hora == "" || buscar_dia == "" || buscar_correo == "" || buscar_telefono == "") {
        ListarProductos('', '', '', '');
    } else {
        ListarProductos(valor_dia, valor_hora, valor_correo, valor_telefono);
    }
});



// Eliminar

function Eliminar(id) {
    Swal.fire({
        title: '¿Quiere eliminar esta reserva?',
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
            ajax.open('POST', '../cruds/eliminar_reserva.php');
            ajax.onload = function() {
                if (ajax.status === 200) {

                    if (ajax.responseText == "ok") {
                        ListarProductos('', '', '', '');
                        Swal.fire({
                            icon: 'success',
                            title: 'Reserva eliminada correctamente',
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