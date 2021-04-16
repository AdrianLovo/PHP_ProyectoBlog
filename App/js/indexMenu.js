
import {mensaje} from './UtilSweetMessage.js';
import {listarFetch} from './UtilFetch.js';

let SECCION = [];
let REPETIDOS = {};


(async function() {

    let menu = document.getElementById('menu');
    let listaMenu = await listarFetch('../App/Controllers/MenuController.php', 'Listar'); 

    //Listar secciones
    for(let i=0; i < listaMenu.length; i++){
        SECCION.push(listaMenu[i]['Seccion']);
    }

    //Secciones con la cantidad de subsecciones
    SECCION.forEach(function(numero){
        REPETIDOS[numero] = (REPETIDOS[numero] || 0) + 1;
    });
    
    //Crear Menu
    for (let seccion in REPETIDOS){
        let li = crearMenu(seccion, REPETIDOS[seccion], listaMenu);
        menu.appendChild(li);   
    }


   
})();

function crearMenu(seccion, cantidad, listaMenu){
    let li = document.createElement('li');
    li.className="nav-item dropdown";
    
    //SI posee SubSecciones
    if(cantidad > 1){
    
        let a = document.createElement('a');
        a.className = "nav-link dropdown-toggle"
        a.dataset.toggle="dropdown";
        a.innerText = seccion;        
        li.appendChild(a);
        
        let div = document.createElement('div');
        div.className = "dropdown-menu";

        //Creando SubSecciones
        for(let j=0; j < listaMenu.length; j++){           
            if(seccion == listaMenu[j]['Seccion']){                
                let aDiv = document.createElement('a');
                aDiv.className="dropdown-item";
                aDiv.innerText = listaMenu[j]['SubSeccion'];
                aDiv.id = listaMenu[j]['IdSubSeccion'];
                
                div.appendChild(aDiv);
                li.appendChild(div);
            }    
        }       
        
    //NO posee SubSeccion
    }else{  
        let a = document.createElement('a');
        a.className = "nav-link"
        a.innerText = seccion;        
        li.appendChild(a);
    }

    //Agregar Id a Secciones
    for(let i=0; i < listaMenu.length; i++){
        if(listaMenu[i]['Seccion'] == seccion){
            li.id= listaMenu[i]['IdSeccion'];
            break;
        }
    }   

    return li;
}