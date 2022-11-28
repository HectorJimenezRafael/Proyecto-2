const reserva = async(id) => {


    const formData = new FormData();
    formData.append("id", id);

    let resul = await axios({
        method: 'post',
        url: '../controller/info_mesa_controller.php',
        data: formData
    });

    if (resul.status == 200 && resul.data.ok === true) {
        console.log(resul.data.data);
        let box
        if (resul.data.data[3] == 'ocupado') {

            box = `<div>
            <p>Lugar <i class='fa-solid fa-map-pin'></i> : ${resul.data.data[4]}</p>
            <p>Estado <i class='fa-solid fa-traffic-light'></i> : ${resul.data.data[3]}</p>
            <p><input type="number" id=coste placeholder="Coste en €"/> </p>
            <p><button class='boton_buscar' onclick="finalizarReserva(${resul.data.data[0]})" > Finalizar Reservar</button></p>
            </div>`

        } else if (resul.data.data[3] == 'libre') {

            box = `<div>
            <p>Lugar <i class='fa-solid fa-map-pin'></i>: ${resul.data.data[4]}</p>
            <p>Capacidad <i class='fa-solid fa-restroom'></i>: ${resul.data.data[2]}</p>
            <p>Estado <i class='fa-solid fa-traffic-light'></i>: ${resul.data.data[3]}</p>
          
            <p><input type="number" id=num_clientes placeholder="" value="${resul.data.data[2]}"/></p>
       
            <p><button class='boton_buscar' onclick="ejecutarReserva(${resul.data.data[0]})" >Ocupar</button></p>
            <p><button class='boton_buscar' onclick="borrar_mesa(${resul.data.data[0]})" >Borrar mesa</button></p>
            <p><button class='boton_in' onclick="incidencia(${resul.data.data[0]},'${resul.data.data[1]}')" >Incidencia</button></p>

            </div>`;
        } else {
            box = `
            <div>
            <h3>La mesa ${resul.data.data[1]} está en mantenimiento <i class='fa-solid fa-triangle-exclamation'></i></h3>
            </div>
            `;
        }



        document.getElementById('content').innerHTML = box



        location.href = "#modal1";
        document.getElementById('titulo').innerText = `MESA: ${resul.data.data[1]}`
        console.log(id)
    } else {
        error(resul.data.ok)
    }

}


const update_sitios = async(id) => {
    const formData = new FormData();
    formData.append("id_mesa", id);
    formData.append("id_", id);

    let resul = await axios({
        method: 'post',
        url: '../controller/actu.php',
        data: formData
    });
    // console.log(resul.data);
    // location.href = "#";
    // getMesas();
}


const borrar_mesa = async(id) => {
    const formData = new FormData();
    formData.append("id_mesa", id);
    formData.append("num_clientes", id);


    let resul = await axios({
        method: 'post',
        url: '../controller/actu.php',
        data: formData
    });
    console.log(resul.data);
    location.href = "#";
    getMesas();
}


const ejecutarReserva = async(id) => {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("user", document.getElementById('user').value)
    formData.append("num_clientes", document.getElementById('num_clientes').value)

    if (!validarNumero(id)) {
        error('ID mesa invalido')
        return;
    }
    if (!validarNumero(document.getElementById('user').value)) {
        error('ID usuario invalido')
        return;
    }

    if (!validarNumero(document.getElementById('num_clientes').value) || document.getElementById('num_clientes').value <= 0) {
        error('Num cliente invalido')
        return;
    }

    let resul = await axios({
        method: 'post',
        url: '../controller/reserva_mesa_controller.php',
        data: formData
    });

    console.log(resul.data);
    if (resul.status === 200 && resul.data.ok === true) {
        location.href = "./mapa.php?recurso=" + id;
    } else {
        error(resul.data.ok)
    }

    //getMesas();
}


const finalizarReserva = async(id) => {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("user", document.getElementById('user').value)
    formData.append("coste", document.getElementById('coste').value)
    if (!validarNumero(id)) {
        error('ID mesa invalido')
        return;
    }
    if (!validarNumero(document.getElementById('user').value)) {
        error('ID usuario invalido')
        return;
    }

    if (!validarNumero(document.getElementById('coste').value) || document.getElementById('coste').value < 0) {
        error('Num Precio invalido')
        return;
    }

    let resul = await axios({
        method: 'post',
        url: '../controller/edit_mesa_controller.php',
        data: formData
    });
    console.log(resul.data);
    if (resul.status === 200 && resul.data.ok === true) {

        location.href = "#";
        getMesas();
        confirm('Mesa desocupada')
    } else {
        error(resul.data.ok)
    }

}


const incidencia = (id, nombre) => {



    let box = `
    <div>
        <p>Incidencia en ${nombre}</p>
        <p><input type='text' id='text_inc'placeholder="Redacta el problema" /></p>
        
        <p><button class='boton_in'  onclick="iniciarIncidecia(${id})" >Registrar</button></p>
    </div>`;

    document.getElementById('content').innerHTML = box;
}

const iniciarIncidecia = async(id) => {

    const formData = new FormData();
    formData.append("id", id);
    formData.append("user", document.getElementById('user').value)
    formData.append("problema", document.getElementById('text_inc').value)
    if (!validarNumero(id) || !validarNumero(document.getElementById('user').value)) {
        error('ID mesa invalido')
        return;
    }


    if (validarTexto(document.getElementById('text_inc').value)) {
        error('Texto invalido')
        return;
    }


    let resul = await axios({
        method: 'post',
        url: '../controller/rota_mesa_controller.php',
        data: formData
    });

    if (resul.status == 200 && resul.data.ok === true) {
        location.href = "#";
        getMesas();
        confirm('Incidencia enviada');
    } else {
        error(resul.data.ok)
    }
}