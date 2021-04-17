import {mensaje} from './UtilSweetMessage.js';
import {listarFetch, listarPaginasFetch, listarPostFetch} from './UtilFetch.js';

//VARIABLES GLOBALES-MENU
let SECCION = [];
let REPETIDOS = {};

//VARIABLES GLOBALES-POST
let TOTALPAGINAS;
let NUMEROPORPAGINA = 6;
let SECCION_ACTUAL=0;
let SUBSECCION_ACTUAL='';

(async function() {
    cargarMenu();
    
    let pagina = 1;
    let divPaginas = document.getElementById('divPaginas');
    let divPost = document.getElementById('divPost');  
    let loading = document.getElementById('loading');
    
    let totalPaginas = await listarPaginasFetch('../App/Controllers/PostController.php', 'Paginas', SECCION_ACTUAL, SUBSECCION_ACTUAL, NUMEROPORPAGINA, pagina);    
    TOTALPAGINAS = totalPaginas;
    mostrarPaginado(divPaginas, totalPaginas, pagina, SECCION_ACTUAL, SUBSECCION_ACTUAL);

})();



/********************************************FUNCIONES POST*******************************************/
//MOSTRAR PAGINADO Y CARGAR POST
async function mostrarPaginado(divPaginas, totalPaginas, pagina, seccion, subseccion){
    let elementos = [];
    let ul = document.createElement('ul');
    let contenedor = document.createElement('div');
    ul.className = 'pagination';

    //Elemento vacio "..."
    let liVacio = document.createElement('li');
    let aVacio = document.createElement('a');
    liVacio.appendChild(aVacio);
    liVacio.className='page-item';
    aVacio.className='page-link';
    aVacio.innerText = '...';

    //Boton Next
    let liNext = document.createElement('li');
    let aNext = document.createElement('a');
    liNext.appendChild(aNext);
    liNext.className='page-item';
    aNext.className='page-link';
    aNext.innerText = 'Next';
    aNext.id = parseInt(pagina) + 1;
    aNext.addEventListener('click', siguiente);

    //Boton Previus
    let liPrevius = document.createElement('li');
    let aPrevius = document.createElement('a');
    liPrevius.appendChild(aPrevius);
    liPrevius.className='page-item';
    aPrevius.className='page-link';
    aPrevius.innerText = 'Previous';
    aPrevius.id = parseInt(pagina) - 1;
    aPrevius.addEventListener('click', anterior);        

    //GENERAR TODOS
    for(let i=1; i <= totalPaginas; i++){
        let li = document.createElement('li');
        let a = document.createElement('a');
        li.className='page-item';
        a.className='page-link';
        a.innerText = i;
        a.id = i;
        a.addEventListener('click', cambioPagina);
        li.appendChild(a);
        elementos.push(li);
    }     
    ul.appendChild(liPrevius);

    //SIN RESUMIR ELEMENTOS     12345
    if(totalPaginas <= 6){
        for(let i=0; i < elementos.length; i++){
            ul.appendChild(elementos[i]);
        }    
    }

    //RESUMIR ELEMENTOS         12345...N
    if(totalPaginas > 6){
        if((elementos.length - NUMEROPORPAGINA - pagina) > 0){    //Orden Normal
            let x = (0 + parseInt(pagina) -1);
            let y = (NUMEROPORPAGINA - 1 + parseInt(pagina));

            for(let j=x; j < y ; j++ ){
                ul.appendChild(elementos[j]);
            }
            ul.appendChild(liVacio);
            ul.appendChild(elementos[elementos.length -1]);
        }else{
            
            ul.appendChild(elementos[0]);
            ul.appendChild(liVacio);

            let x = (elementos.length - NUMEROPORPAGINA - 1);
            for(let j=x; j < elementos.length ; j++ ){
                ul.appendChild(elementos[j]);
            }
        }
    }

    ul.appendChild(liNext);
    contenedor.append(ul);
    divPaginas.append(contenedor);

    //MOSTRAR POST
    reiniciarPost();
    let listaPost = new Array();
    let totalPost = await listarPostFetch('../App/Controllers/PostController.php', 'Post', seccion, subseccion, NUMEROPORPAGINA, pagina);
    
    if(totalPost != 0){
        mostrarPost(totalPost, divPost);
    }else{
        contenedorVacio(divPost);        
    }
   
}

//MOSTRAR POST
function mostrarPost(totalPost, divPost){
    let elementos = [];
    let contenedor = document.createElement('div');
    contenedor.className = "row justify-content-center";
    
    for(let i =0; i < totalPost.length; i++){
        let div = document.createElement('div');
        div.className="card col-10 col-sm-10 col-md-5 col-lg-5 col-xl-3 mt-2 mr-2";
        div.id=totalPost[i]["IdPost"];
        div.addEventListener('click', redireccionarPost);        
        
        let divBody = document.createElement('div');
        let h5 = document.createElement('h5');
        let p = document.createElement('p');
        let pTime = document.createElement('p');
        let small = document.createElement('small');
        
        divBody.className = "card-body";
        
        p.className = "card-text";
        p.innerText = totalPost[i]["Descripcion"]; 
        p.style.cursor="pointer";
        
        h5.className = "card-title";
        h5.innerText = totalPost[i]["Titulo"];
        h5.style.cursor="pointer";
        
        pTime.className = "card-text";
        small.className = "text-muted";
        small.innerText = "Created at: " + totalPost[i]["Fecha"];
                
        pTime.appendChild(small);
        divBody.appendChild(h5);
        divBody.appendChild(p);
        divBody.appendChild(pTime);                
        
        let img = document.createElement('img');
        let divImg = document.createElement('div');
        divImg.className = "container alignCenter mt-1";
        divImg.style.cursor="pointer";
        img.className="row justify-content-center"
        img.style.width="270px";
        img.style.minWidth="270px";
        img.alt = totalPost[i]["Titulo"];
        img.src = totalPost[i]["ImagenPortada"];
        divImg.appendChild(img);

        div.appendChild(divImg);
        div.appendChild(divBody);
        contenedor.appendChild(div);
    }
   
    divPost.append(contenedor);
    loading.style.display="none";
}

//CAMBIO PAGINA CLICK
function cambioPagina(){
    reiniciarPaginado(divPaginas);
    mostrarPaginado(divPaginas, TOTALPAGINAS, this.id, '', '');
}

//CAMBIO PAGINA SIGUIENTE
function siguiente(){
    if(parseInt(this.id) > 0 && parseInt(this.id) <= TOTALPAGINAS){
        reiniciarPaginado(divPaginas);
        mostrarPaginado(divPaginas, TOTALPAGINAS, this.id, SECCION_ACTUAL, SUBSECCION_ACTUAL);                
    }
}

//CAMBIO PAGINA ANTERIOR
function anterior(){
    if(parseInt(this.id) > 0 && parseInt(this.id) < TOTALPAGINAS){
        reiniciarPaginado(divPaginas);
        mostrarPaginado(divPaginas, TOTALPAGINAS, this.id, SECCION_ACTUAL, SUBSECCION_ACTUAL);        
    }
}

//BORRAR PAGINADO
function reiniciarPaginado(){
    let divPaginas = document.getElementById('divPaginas');
    let contenedor = divPaginas.lastChild;
    contenedor.remove();
}

//BORRAR POSTS
function reiniciarPost(){
    let divCards = document.getElementById('divPost');
    let contenedor = divCards.lastChild;
    contenedor.remove();
    loading.style.display="inline";    
}

//RECARGAR POSTS POR SUBSECCION
async function recargarSubseccion(){
    SECCION_ACTUAL = "";
    SUBSECCION_ACTUAL= this.id;

    reiniciarPaginado(divPaginas);
    let totalPaginas = await listarPaginasFetch('../App/Controllers/PostController.php', 'Paginas', SECCION_ACTUAL, SUBSECCION_ACTUAL, NUMEROPORPAGINA, 1);
    TOTALPAGINAS = totalPaginas;
    mostrarPaginado(divPaginas, TOTALPAGINAS, 1, SECCION_ACTUAL, SUBSECCION_ACTUAL);
    //mostrarPaginado(divPaginas, totalPaginas, pagina, SECCION_ACTUAL, SUBSECCION_ACTUAL);
}

//RECARGAR POST POR SECCION
async function recargarSeccion(){
    SECCION_ACTUAL = this.id;
    SUBSECCION_ACTUAL= "";

    reiniciarPaginado(divPaginas);
    let totalPaginas = await listarPaginasFetch('../App/Controllers/PostController.php', 'Paginas', SECCION_ACTUAL, SUBSECCION_ACTUAL, NUMEROPORPAGINA, 1);    
    TOTALPAGINAS = totalPaginas;
    mostrarPaginado(divPaginas, TOTALPAGINAS, SECCION_ACTUAL, SECCION_ACTUAL, SUBSECCION_ACTUAL);
}

//REDIRECCIONAR POST
function redireccionarPost(){
    window.location="post.php?post="+this.id;
}

//CREAR CONTENEDOR VACIO
function contenedorVacio(){
    loading.style.display="none";
    let contenedor = document.createElement('div');
    divPost.append(contenedor);
}



/********************************************FUNCIONES MENU*******************************************/
//CARGAR MENU
async function cargarMenu(){
    let menu = document.getElementById('menu');
    let listaMenu = await listarFetch('../App/Controllers/MenuController.php', 'Listar'); 

    for(let i=0; i < listaMenu.length; i++){
        SECCION.push(listaMenu[i]['Seccion']);
    }

    SECCION.forEach(function(numero){ REPETIDOS[numero] = (REPETIDOS[numero] || 0) + 1; });
    
    for (let seccion in REPETIDOS){
        let li = crearMenu(seccion, REPETIDOS[seccion], listaMenu);
        menu.appendChild(li);   
    }
}

//CREAR MENU
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
                aDiv.addEventListener('click', recargarSubseccion);
                
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
        li.addEventListener('click', recargarSeccion);
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