const crearMesa = async() => {


    const formData = new FormData();


    let resul = await axios({
        method: 'post',
        url: '../controller/crear_mesa_controller.php',
        data: formData
    });
    let padre = document.getElementById('form_crear');

    padre.innerHTML = '';
    let box = `<div>
    
    <p><button class='boton_in' onclick="incidencia(${resul.data.data[0]},'${resul.data.data[1]}')" >Incidencia</button></p>
    </div>
    `;

    padre.innerHTML += box;

}