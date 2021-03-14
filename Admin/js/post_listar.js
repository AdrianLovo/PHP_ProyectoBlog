import {mensaje} from './UtilSweetMessage.js';
import {listarTable, eliminarTable} from './post_listarFunciones.js';

(async function() {

    //BOTONES
    let agregar = document.getElementById("agregar");
    let reiniciar = document.getElementById("reiniciar");
   
    //INPUTS
    let table;
    table = await listarTable();
    eliminarTable(table);

    //SALIR
    salir.addEventListener('click', function(e){
        e.preventDefault();
        Salir();
    })

    async function Salir(){
        const data = new FormData();
        data.append('metodo', 'Salir');
        
        try{
            let response = await fetch('../App/Controllers/Controller.php', {
                method: 'POST',
                body: data
            });
            let respuesta = await response.text();

            if(respuesta == "ok"){
                window.location="/Admin/index.php";                
            }           
        }catch(error){
            mensaje('Error para conectarse al servidor', 'error');  	
        }
    }
   
})();