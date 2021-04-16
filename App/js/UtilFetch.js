import {mensaje} from './UtilSweetMessage.js';

export async function listarPaginasFetch(ruta, metodo, seccion, numeroPorPagina, pagina){
    const data = new FormData();
    data.append('metodo', metodo);
    data.append('seccion', seccion);
    data.append('numeroPorPagina', numeroPorPagina);
    data.append('pagina', pagina);
    
    try{
        let response = await fetch(ruta, {
            method: 'POST',
            body: data
        });
        let respuesta = await response.text();
        //console.log(respuesta);
        
        if(respuesta.length > 0){
            return respuesta;
        }
    }catch(error){
        mensaje('Error para conectarse al servidor', 'error');  
        return null;	
    }
} 

export async function listarPostFetch(ruta, metodo, seccion, numeroPorPagina, pagina){
    const data = new FormData();
    data.append('metodo', metodo);
    data.append('seccion', seccion);
    data.append('numeroPorPagina', numeroPorPagina);
    data.append('pagina', pagina);
    
    try{
        let response = await fetch(ruta, {
            method: 'POST',
            body: data
        });
        let respuesta = await response.json()
        //console.log(respuesta);
        
        if(respuesta.length > 0){
            return respuesta;
        }
    }catch(error){
        mensaje('Error para conectarse al servidor', 'error');  
        return null;	
    }
} 

export async function listarFetch(ruta, metodo){
    const data = new FormData();
    data.append('metodo', metodo);
    
    try{
        let response = await fetch(ruta, {
            method: 'POST',
            body: data
        });
        let respuesta = await response.json();
        //console.log(respuesta);
        
        if(respuesta.length > 0){
            return respuesta;
        }
    }catch(error){
        mensaje('Error para conectarse al servidor', 'error');  
        return null;	
    }
} 
