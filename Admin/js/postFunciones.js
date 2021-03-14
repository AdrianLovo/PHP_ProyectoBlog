import {listarFetch, listarFiltroFetch, agregarFetch, modificarFetch, eliminarFetch} from './UtilFetch.js';

export async function listarTable(){
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerPost.php');

    let table = $('#tablaPost').DataTable({
        data: lista,
        
        "columns": [               
            //Mostrados
            { "data": "IdPost" },
            { "data": "Titulo" },
            { "data": "Descripcion" },
            { "data": "ImagenPortada" },
            { "data": "Fecha" },
            { "data": "IdUsuario" },
            { "data": "IdSeccion" },
            { "data": "IdSubSeccion" },
            { "data": "EmailUsuario" },
            { "data": "NombreSeccion" },
            { "data": "NombreSubSeccion" },
            {
                "className": 'details-delete',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },  
            {
                "className": 'details-edit',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },                                          
        ],
        "order": [[0, 'asc']],
        "columnDefs": [
            {
                "targets": [2,3,5,6,7],
                "visible": false,
                "searchable": false
            }
        ],
        
    });       
    return table;
}

export async function agregarTable(frmPost){
    let respuesta = new Array()
    respuesta = await agregarFetch('../App/Controllers/ControllerPost.php', frmPost);
    
    if(respuesta.length > 0){
        $('#tablaSeccion').dataTable().fnAddData([
            { "IdSeccion": respuesta[0], "Nombre": respuesta[1] }
        ]);            
    }
}

export async function modificarTable(){
    /*let respuesta = new Array()
    let fila = frmSeccionE[1].value;
    respuesta = await modificarFetch('../App/Controllers/ControllerSeccion.php', frmSeccionE);
        
    if(respuesta.length > 0){
        $("#tablaSeccion").DataTable().cell(fila, 1).data(respuesta[1]);  //Nombre        
    }*/
}

export function eliminarTable(table){
    /*$('#tablaSeccion tbody').on('click', 'td.details-delete', function () {
        if(eliminarFetch( 
            "../App/Controllers/ControllerSeccion.php", "IdSeccion", 
            table.row($(this).parents('tr')).data().IdSeccion)
        ){
            table.row($(this).parents('tr')).remove().draw();
        }
    });*/
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