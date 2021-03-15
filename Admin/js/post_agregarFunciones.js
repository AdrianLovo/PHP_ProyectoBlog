import {listarFetch, listarFiltroFetch, agregarFetch, modificarFetch, eliminarFetch} from './UtilFetch.js';

export async function agregarTable(frmPost){
    let respuesta = new Array()
    respuesta = await agregarFetch('../App/Controllers/ControllerPost.php', frmPost);    
}

export async function listarSecciones(select, ruta, inputNombre){
    let nodos = [];
    let lista = new Array();
    lista = await listarFetch(ruta);

    if(lista.length > 0){
        inputNombre.value = lista[0].campo;
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
        inputNombre.value = lista[0].campo;        
        for(let i= 0; i < lista.length; i++){
            let opt = document.createElement("option");    
            opt.value = lista[i].IdSubseccion;
            opt.text = lista[i].SubseccionNombre;    
            nodos.push(opt);
        }
    } 
    select.append(...nodos);
}