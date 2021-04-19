import {mensaje} from './UtilSweetMessage.js';
import {buscarFetch} from './UtilFetch.js';

(async function() {

    console.log("Iniciando");
    let IdPost = document.getElementById('IdPost');
    let Navb = document.getElementById('Navb');
    let Titulo = document.getElementById('Titulo');
    let Descripcion = document.getElementById('Descripcion');
    let Email = document.getElementById('Email');
    let ImagenPortada = document.getElementById('ImagenPortada');
    let Fecha = document.getElementById('Fecha');
    let Contenido = document.getElementById('Contenido');
    let Seccion = document.getElementById('Seccion');
    let Avatar = document.getElementById('Avatar');

    
    
    
    //let container = document.getElementById('container');    
    
    if(IdPost.value != ""){
        let post = await buscarFetch('../App/Controllers/PostMostrarController.php', 'Buscar', IdPost.value); 
        if(post.length != 0){
            
            console.log("Cargando Post");
            Navb.innerText = post[0]['Titulo'];
            Titulo.innerText = post[0]['Titulo'];
            Descripcion.innerText = post[0]['Descripcion'];
            Email.innerText = post[0]['Email'];
            ImagenPortada.src= post[0]['ImagenPortada'];
            Fecha.innerText= post[0]['Fecha'];
            Contenido.innerHTML =post[0]['Contenido'];
            Seccion.innerText = post[0]['Seccion'] +" / " +post[0]['SubSeccion'];
            Avatar.src = post[0]['Avatar'];
        }
    }

})();

