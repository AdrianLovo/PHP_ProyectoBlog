import {mensaje} from './UtilSweetMessage.js';
import {listarPaginasFetch, listarPostFetch} from './UtilFetch.js';

//VARIABLES GLOBALES
let NUMEROPORPAGINA = 6;
let TOTALPAGINAS;

(async function() {
    let pagina = 1;
    let divPaginas = document.getElementById('divPaginas');
    let divPost = document.getElementById('divPost');  
    let loading = document.getElementById('loading');

    //MOSTRAR PAGINADO
    console.log("Iniciando");
    let totalPaginas = await listarPaginasFetch('../App/Controllers/PostController.php', 'Paginas', 'Post', NUMEROPORPAGINA, pagina);    
    TOTALPAGINAS = totalPaginas;
    mostrarPaginado(divPaginas, totalPaginas, pagina);
})();



//MOSTRAR PAGINADO
async function mostrarPaginado(divPaginas, totalPaginas, pagina){
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
    if(totalPaginas < 6){
        for(let i=0; i < elementos.length; i++){
            ul.appendChild(elementos[i]);
        }    
    }

    //RESUMIR ELEMENTOS         12345...N
    if(totalPaginas > 6){
        if((elementos.length - RANGO - pagina) > 0){    //Orden Normal
            let x = (0 + parseInt(pagina) -1);
            let y = (RANGO - 1 + parseInt(pagina));

            for(let j=x; j < y ; j++ ){
                ul.appendChild(elementos[j]);
            }
            ul.appendChild(liVacio);
            ul.appendChild(elementos[elementos.length -1]);
        }else{
            
            ul.appendChild(elementos[0]);
            ul.appendChild(liVacio);

            let x = (elementos.length - RANGO - 1);
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
    let totalPost = await listarPostFetch('../App/Controllers/PostController.php', 'Post', 'Post', NUMEROPORPAGINA, pagina);  
    mostrarPost(totalPost, divPost); 
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
        div.addEventListener('click', cargarPost);        
        
        let divBody = document.createElement('div');
        let h5 = document.createElement('h5');
        let p = document.createElement('p');
        let pTime = document.createElement('p');
        let small = document.createElement('small');
        
        divBody.className = "card-body";
        
        p.className = "card-text";
        p.innerText = resumenDescripcion(totalPost[i]["Descripcion"]); 
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

//CAMBIO PAGINA SELECCIONADA CLICK
function cambioPagina(){
    reiniciarPaginado(divPaginas);
    mostrarPaginado(divPaginas, TOTALPAGINAS, this.id);
}

//CAMBIO PAGINA SIGUIENTE
function siguiente(){
    if(parseInt(this.id) > 0 && parseInt(this.id) <= TOTALPAGINAS){
        reiniciarPaginado(divPaginas);
        mostrarPaginado(divPaginas, TOTALPAGINAS, this.id);                
    }
}

//CAMBIO PAGINA ANTERIOR
function anterior(){
    if(parseInt(this.id) > 0 && parseInt(this.id) < TOTALPAGINAS){
        reiniciarPaginado(divPaginas);
        mostrarPaginado(divPaginas, TOTALPAGINAS, this.id);        
    }
}

//BORRAR PAGINADO
function reiniciarPaginado(){
    let divPaginas = document.getElementById('divPaginas');
    let contenedor = divPaginas.lastChild;
    contenedor.remove();
}

//BORRAR POST
function reiniciarPost(){
    let divCards = document.getElementById('divPost');
    let contenedor = divCards.lastChild;
    contenedor.remove();
    loading.style.display="inline";
}

//RESUMEN Descripcion
function resumenDescripcion(descripcion){
    if(descripcion.length > 180){
        let resumen = descripcion.substring(0, 180) + "...";
        return resumen;
    }else{
        return descripcion;
    }
}

//CARGAR POST
function cargarPost(){
    window.location="post.php?post="+this.id;
}

function recargarPost(){
    console.log(this.id);
}