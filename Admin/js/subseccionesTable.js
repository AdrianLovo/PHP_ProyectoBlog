import {listarFetch, eliminarFetch, agregarFetch, modificarFetch} from './UtilFetch.js';

export async function listarTable(){
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerSubSeccion.php');

    let table = $('#tablaSubSeccion').DataTable({
        data: lista,
        
        "columns": [               
            //Mostrados
            { "data": "IdSeccion" },
            { "data": "SeccionNombre" },
            { "data": "IdSubseccion" },
            { "data": "SubseccionNombre" },            
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
                "targets": [0,2],
                "visible": false,
                "searchable": false
            }
        ],
        
    });       
    return table;
}

export function eliminarTable(table){
    $('#tablaSubSeccion tbody').on('click', 'td.details-delete', function () {
        if(eliminarFetch( 
            "../App/Controllers/ControllerSubSeccion.php", "IdSubSeccion",
            table.row($(this).parents('tr')).data().IdSubseccion)
        ){
            table.row($(this).parents('tr')).remove().draw();
        }
    });
}

export async function agregarTable(formulario){
    let respuesta = new Array()
    respuesta = await agregarFetch('../App/Controllers/ControllerSubSeccion.php', formulario);
    
    if(respuesta.length > 0){
        $('#tablaSubSeccion').dataTable().fnAddData([
            { "IdSeccion": respuesta[0], "SeccionNombre": respuesta[1], "IdSubseccion": respuesta[2], "SubseccionNombre": respuesta[3] }
        ]);            
    } 
}

export async function modificarTable(){
    /*let respuesta = new Array()
    let fila = frmSeccionE[1].value;
    console.log("FILA A MODIFICAR ", fila);
    respuesta = await modificarFetch('../App/Controllers/ControllerSubSeccion.php', frmSeccionE);
        
    if(respuesta.length > 0){
        $("#tablaSeccion").DataTable().cell(fila, 1).data(respuesta[1]);  //Nombre        
    }*/
}

export async function listarSelect(select){
    let nodos = [];
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerSeccion.php');

    if(lista.length > 0){
        SeccionNombre.value = lista[0].Nombre;
        
        for(let i= 0; i < lista.length; i++){
            let opt = document.createElement("option");    
            opt.value = lista[i].IdSeccion;
            opt.text = lista[i].Nombre;    
            nodos.push(opt);
        }
    }    
    select.append(...nodos);
}