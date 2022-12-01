// window.onload = function() {
//     horario();


// };

fecha.addEventListener("change", () => {
    var fecha = document.getElementById('fecha').value
    document.getElementById('hora').style.display = 'block';

    if (document.getElementById('fecha').value == "") {

        document.getElementById('hora').style.display = 'none';
        horario('');
    } else {
        horario(fecha);
    }

});


function horario(fecha) {

    var formdata = new FormData();

    var hora_Select = document.getElementById('hora')
    formdata.append('fecha', fecha);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../online/horas.php');
    ajax.onload = function() {

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var str = "";
            var tabla = "";
            json.forEach(function(item) {
                str += "<option value=" + item.id + ">" + item.hora + "</option>"

            });
            hora_Select.innerHTML = str;



        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);



}