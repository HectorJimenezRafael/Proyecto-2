window.onload = async function() {
    let resul = await axios.get('../controller/lugar_controller.php');
    for (let i = 0; i < resul.data.length; i++) {

        select = document.getElementById('lugar');


        var opt = document.createElement('option');
        opt.value = `%${resul.data[i][0]}%`;
        opt.innerHTML = resul.data[i][0];
        select.appendChild(opt);


    }
}


const getMesas = async() => {

    let resul = await axios.get('../controller/mesa_controller.php');

    let padre = document.getElementById('container-mesas');

    padre.innerHTML = '';

    for (let i = 0; i < resul.data.length; i++) {
        // <p>Mesa: ${resul.data[i][1]}</p>
        // <p>Lugar: ${resul.data[i][4]}</p>
        // <p>Capacidad: ${resul.data[i][2]}</p>
        //<p>Disp.: ${resul.data[i][3]}</p>
        console.log(resul.data[i][4]);
        var comprobar = resul.data[i][4];
        console.log(comprobar);
        // if (comprobar == 'interior') {
        // }
        if (resul.data[i][3] == 'libre') {
            let box = `<div style='background-color:#24F586; ' class='box'>
            <h4 class="flex titulo"> <b> Mesa: ${resul.data[i][1]} </b></h4>
            <p>Lugar: ${resul.data[i][4]}<p>
            <p><img style='width:200px;' onclick="reserva(${resul.data[i][0]})" class='img_estado' src='${resul.data[i][8]} '></p>

            </div>
            `;
            padre.innerHTML += box;
        } else if (resul.data[i][3] == 'mantenimiento') {
            let box = `<div style='background-color:#F6EE64;' class='box'>
            <h4 class="flex titulo"> <b> Mesa: ${resul.data[i][1]} </b></h4>
            <p>Lugar: ${resul.data[i][4]}<p>
            <p><img style='width:200px;' onclick="reserva(${resul.data[i][0]})" class='img_estado' src='${resul.data[i][8]} '></p>

            </div>
            `;
            padre.innerHTML += box;
        } else if (resul.data[i][3] == 'ocupado') {
            let box = `<div style='background-color:#FF4D29;' class='box'>
            <h4 class="flex titulo"> <b> Mesa: ${resul.data[i][1]} </b></h4>
            <p>Lugar: ${resul.data[i][4]}<p>
            <p><img style='width:200px;' onclick="reserva(${resul.data[i][0]})" class='img_estado' src='${resul.data[i][8]} '></p>

            </div>
            `;
            padre.innerHTML += box;
        }




        /* <p><button class='boton_reserva' onclick="reserva(${resul.data[i][0]})" ><div class='sin_encima'>Reservar  <i class="fa-regular fa-bookmark"></i></div><div class='encima'>Reservar <i class="fa-solid fa-bookmark"></i></div></button></p> */


        console.log(resul.data[i]);

    }



}


setInterval(function() {
    getMesas()

}, 1000);


const filtrar = async() => {

    const formData = new FormData();
    formData.append("num", document.getElementById('clientes').value);
    formData.append("lugar", document.getElementById('lugar').value);

    let resul = await axios({
        method: 'post',
        url: '../controller/filtro_mesa_controller.php',
        data: formData
    });

    console.log(resul.data)
    let padre = document.getElementById('container-mesas');

    padre.innerHTML = '';
    if (resul.status == 200 && resul.data.ok === true) {
        for (let i = 0; i < resul.data.data.length; i++) {

            let box = `<div class='box' onclick="reserva(${resul.data.data[i][0]})">
            <h4 class="flex titulo"><b>Mesa: ${resul.data.data[i][1]} </b> </h4>
            <p><img class='img_estado' src='../assets/img/recursos/${resul.data.data[i][4]}_${resul.data.data[i][2]}_${resul.data.data[i][3]}.png'></p>
            </div>
            `;

            padre.innerHTML += box;

            console.log(resul.data.data[i]);

        }
    } else {
        // error(resul.data.ok);
        let box = `<div> No se ha encontrado ning??n resultado</div>
        `;
        padre.innerHTML += box;
    }
}