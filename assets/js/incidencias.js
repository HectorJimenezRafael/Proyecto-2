const info_get_mesas_rotas = async() => {

    let resul = await axios.get('../controller/info_rota_mesa_controller.php');

    let padre = document.getElementById('container-incidencias');

    padre.innerHTML = '';

    console.log(resul.data);

    for (let i = 0; i < resul.data.length; i++) {
        // <p>Mesa: ${resul.data[i][1]}</p>
        // <p>Lugar: ${resul.data[i][4]}</p>
        // <p>Capacidad: ${resul.data[i][2]}</p>
        //<p>Disp.: ${resul.data[i][3]}</p>


        let box = `<div class='box boxInci'>
        <button class='boton_reserva' onclick='mapa(${resul.data[i][4]})' ><i class="fa-solid fa-map-location-dot"></i>  </button> 
       
        <p>  Mesa afectada: ${resul.data[i][3]}</p>
        <p> <i class="fa-solid fa-person"></i>  Realizada por: ${resul.data[i][1]}</p>
       
        <p> <i class="fa-solid fa-stopwatch"></i> Momento de la incidencia: ${resul.data[i][6]}</p>

        <button  onclick="info_problema('${resul.data[i][5]}')" class='boton_reserva'>Información <i class="fa-solid fa-circle-info"></i></button> 
        <br>
        <button  onclick="form_problema('${resul.data[i][4]}')" class='boton_reserva'>Finalizar mantenimiento <i class="fa-solid fa-clipboard-list"></i></button> 
        </div>
        `;

        padre.innerHTML += box;

        console.log(resul.data[i]);

    }
}


const info_problema = (info) => {


    let box = `<div>  ${info} </div>`;
    console.log(info)

    document.getElementById('content').innerHTML = box
    location.href = "#modal1";

    // document.getElementById('titulo').innerText = ` ${resul.data[5]}`


}


const form_problema = async(id) => {
    const formData = new FormData();

    formData.append("user", document.getElementById('user').value)

    let resul = await axios({
        method: 'post',
        url: '../controller/info_rota_mesa_controller.php',
        data: formData
    });

    let box = `<div style="text-align:center;">  
    
    <h3>Solución</h3>
<input id="solucion" type="textarea"placeholder="Solución">
    <br>
    <br>
    <br>
   
    <input type="number" id="coste" placeholder="Coste en €"/>
    <br>
    
    <br>
    <br>
<button onclick="mesa_reparada(${id})" class='boton_reserva' value="">Incidencia resuelta</button>

    </div>`;


    // document.getElementById('titulo').innerText = `Solución `
    document.getElementById('content').innerHTML = box
    location.href = "#modal1";

}



const mesa_reparada = async(id_mesa) => {


    const formData = new FormData();
    formData.append("id_mesa", id_mesa)
    formData.append("user", document.getElementById('user').value)
    formData.append("solucion", document.getElementById('solucion').value)
    formData.append("coste", document.getElementById('coste').value)

    if (!validarNumero(document.getElementById('coste').value)) {
        error('Número de coste no aceptado')
        return;
    }
    if (validarTexto(document.getElementById('solucion').value)) {
        error('Texto invalido')
        return;
    }

    let resul = await axios({
        method: 'post',
        url: '../controller/reparada_mesa_controller.php',
        data: formData
    });

    console.log(resul.data);

    if (resul.status == 200) {
        location.href = '#'
        info_get_mesas_rotas()
    }

}




const getIncidenciasResol = async() => {
    let resul = await axios.get('../controller/incidencias_fin_mesa_controller.php');
    console.log(resul.data);
    let tbody = document.getElementById('tabla-body');
    tbody.innerHTML = '';
    for (let i = 0; i < resul.data.length; i++) {

        tbody.innerHTML += `
    <tr>
      <td class='tbl_inc' >${resul.data[i][0]}</td>
      <td class='tbl_inc' >${resul.data[i][1]}</td>
      <td class='tbl_inc' >${resul.data[i][2]}</td>
      <td class='tbl_inc' >${resul.data[i][3]}</td>
      <td class='tbl_inc' >${resul.data[i][4]}</td>
      <td class='tbl_inc' >${resul.data[i][5]}</td>
      <td class='tbl_inc' >${resul.data[i][6]}</td>
      <td class='tbl_inc' >${resul.data[i][7]}</td>
      <td class='tbl_inc' >${resul.data[i][8]}</td>
    </tr>`;

    }
}

const mapa = (id) => {
    location.href = 'mapa.php?recurso=' + id;
}