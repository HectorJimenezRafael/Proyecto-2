window.onload =async function() {
  let resul = await axios.get('../controller/lugar_controller.php');
  for (let i = 0; i < resul.data.length; i++) {

      select = document.getElementById('lugar');

      
      var opt = document.createElement('option');
      opt.value = resul.data[i][0];
      opt.innerHTML = resul.data[i][0];
      select.appendChild(opt);
      
      
  }
}

const getMediaTiempo =async()=>{
    let resul = await axios({
        method: 'get',
        url: '../controller/data_stats_mediamin_controller.php',
       
      });
    document.getElementById('avgMin').innerText=parseFloat(resul.data).toFixed(2)+' Min/Mesa'
    return resul.data;
}

const getMediaGanancias=async()=>{
    let resul = await axios({
        method: 'get',
        url: '../controller/data_stats_mediaganancias_controller.php',
       
      });
    document.getElementById('avgDinero').innerText=parseFloat(resul.data).toFixed(2)+' €/Mesa'
    return resul.data;
}

const getReservas=async()=>{
  const formData = new FormData();
  formData.append("lugar", document.getElementById('lugar').value);
  formData.append("nombre", `%${document.getElementById('recurso').value}%`);

  if(document.getElementById('recurso').value !=""){
    if(validarTexto(document.getElementById('recurso').value)){
      error('Texto invalido')
      return;
    }
  }



  if(document.getElementById('data_fin').value !=''){
    if(!isDate(document.getElementById('data_fin').value)){
      error('Data Fin invalido')
      return;
    }
  }

  if(document.getElementById('data_fin').value !="" && document.getElementById('data_ini').value !=""){
    formData.append("data_fin", document.getElementById('data_fin').value);
    formData.append("data_ini", document.getElementById('data_ini').value);
  }

  let resul = await axios({
      method: 'post',
      data: formData,
      url: '../controller/data_stats_reservas_controller.php',
     
  });
  console.log(resul.data);
  if (resul.status == 200){
    let tbody = document.getElementById('tabla-body');
    tbody.innerHTML = '';
    for (let i = 0; i < resul.data.data.length; i++) {
      
      tbody.innerHTML += `
      <tr>
        <td class='tbl_data' >${resul.data.data[i][0]}</td>
        <td class='tbl_data' >${resul.data.data[i][5]}</td>
        <td class='tbl_data' >${parseFloat(resul.data.data[i][4]).toFixed(2)}</td>
        <td class='tbl_data' >${parseFloat(resul.data.data[i][2]).toFixed(2)}</td>
        <td class='tbl_data' >${parseFloat(resul.data.data[i][3]).toFixed(2)}</td>
        <td class='tbl_data' >${parseFloat(resul.data.data[i][6]).toFixed(2)}</td>
        
      </tr>`;
      
    }
  }else{
    error('No es posible comunicar con el servidor')
  }
  
  
  
}


const getData=async()=>{
    let dinero = await getMediaGanancias();
    let min = await getMediaTiempo();

    document.getElementById('mediaTiempoDinero').innerText=`${parseFloat(dinero/min).toFixed(2)} €/min`
}