import {listarFiltroFetch, modificarFetch, listarFetch} from './UtilFetch.js';

export async function cargarPost(frm, ruta, filtro, parametro, summernot){
    let lista = new Array();
    lista = await listarFiltroFetch(ruta, filtro, parametro);

    if(lista.length > 0){
        //frmPost[1].value = 
        frmPost[2].value = lista[0]['NombreSeccion'];
        frmPost[3].value = lista[0]['NombreSubSeccion']
        frmPost[4].value = lista[0]['Titulo'];     
        frmPost[6].value = lista[0]['Descripcion'];   
        frmPost[7].value = lista[0]['IdSeccion'];    
        frmPost[8].value = lista[0]['IdSubSeccion'];
        frmPost[9].value = lista[0]['Estado'];
        frmPost[10].value = lista[0]['Contenido'];
        summernot.code(lista[0]['Contenido']);
    } 
}

export async function modificarPost(frmPost, summernot){
    let respuesta = new Array()
    respuesta = await modificarFetch('../App/Controllers/ControllerPost.php', frmPost);  
    /*if(respuesta.length > 0){
        summernot.reset();
		$("#content").empty();
    } */ 
}

export async function listarSecciones(select, ruta, inputNombre){
    let nodos = [];
    let lista = new Array();
    lista = await listarFetch(ruta);

    if(lista.length > 0){
        inputNombre.value = lista[0].Nombre;
        for(let i= 0; i < lista.length; i++){
            let opt = document.createElement("option");    
            opt.value = lista[i].IdSeccion;
            opt.text = lista[i].Nombre;    
            nodos.push(opt);
        }
    }    
    select.append(...nodos);
}

export async function listarSubSecciones(select, ruta, inputNombre, filtro, parametro){
    let nodos = [];
    let lista = new Array();
    lista = await listarFiltroFetch(ruta, filtro, parametro);

    if(lista.length > 0){
        inputNombre.value = lista[0].SubseccionNombre;        
        for(let i= 0; i < lista.length; i++){
            let opt = document.createElement("option");    
            opt.value = lista[i].IdSubseccion;
            opt.text = lista[i].SubseccionNombre;    
            nodos.push(opt);
        }
    } 
    select.append(...nodos);
}