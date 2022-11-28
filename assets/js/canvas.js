var last =[];
const drawCanvas=async()=>{
    let resul = await axios.get('../controller/mesa_controller.php');

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);


    

    if(JSON.stringify(last) != JSON.stringify(resul.data) ){
        

        let ocupados = resul.data.map(function(data){
            num = 0;
            if(data[3] == 'ocupado'){
                num++
            }
            return num
        }).reduce(function(a, b) { return a + b; }, 0)
    
        let total = resul.data.length;

        let porcent = parseFloat(ocupados/total*100).toFixed(2);
        document.getElementById('ocupacion').innerHTML = `Ocupación al ${porcent}%`;  

        var canv = document.getElementById("mapa_canvas")
        var ctx=canv.getContext("2d");
        ctx.canvas.width  = 1920;
        ctx.canvas.height = 1080;


        //MAPA
        map = new Image();
        map.src = '../assets/img/recursos/mapa/mapa.png';
        map.onload = function(){
            console.log('Mapa: ',map.width, map.height)
            
            ctx.drawImage(map, 0, 0);
            for (let i = 0; i < resul.data.length; i++) {



                window[resul.data[i][1]]=new Image();
                window[resul.data[i][1]].src =`../assets/img/recursos/mapa/mesa_${resul.data[i][2]}_${resul.data[i][3]}.png`;
        
             
        
                window[resul.data[i][1]].onload = function(){
                    ctx.drawImage(window[resul.data[i][1]], resul.data[i][5], resul.data[i][6],window[resul.data[i][1]].width*resul.data[i][7], window[resul.data[i][1]].height*resul.data[i][7]);
                }
    
                if(urlParams.has('recurso')){
                    
                    if(urlParams.get('recurso') == resul.data[i][0]){
                        console.log('OK')
                        flecha=new Image();
                        flecha.src =`../assets/img/recursos/mapa/flecha.png`;
                        flecha.onload = function(){
                            ctx.drawImage(flecha, resul.data[i][5]+(flecha.width/4), resul.data[i][6],100,100);
                        }
                    }
                    
                }
            }
        }

    
 
        console.log(resul.data)
    
    
        

        last = resul.data;

    }

}


setInterval(drawCanvas, 10000)