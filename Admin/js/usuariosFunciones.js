import {listarFetch, eliminarFetch, agregarFetch, modificarFetch} from './UtilFetch.js';

export async function listarTable(){
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerUsuario.php', '', '');

    let table = $('#tablaUsuario').DataTable({
        data: lista,
        
        "columns": [               
            //Mostrados
            { "data": "IdUsuario" },
            { "data": "Email" },
            { "data": "UltimoInicio" },
            { "data": "Tipo" },
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
            //Ocultos
            { "data": "Imagen" }
        ],
        "order": [[0, 'asc']],
        "columnDefs": [
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ],
        
    });       
    return table;
}

export function eliminarTable(table){
    $('#tablaUsuario tbody').on('click', 'td.details-delete', function () {
        if(eliminarFetch( 
            "../App/Controllers/ControllerUsuario.php", "IdUsuario",
            table.row($(this).parents('tr')).data().IdUsuario)){
            table.row($(this).parents('tr')).remove().draw();
        }
    });
}

export async function agregarTable(){
    let respuesta = new Array()
    respuesta = await agregarFetch('../App/Controllers/ControllerUsuario.php', frmUsuario);

    if(respuesta.length > 0){
        $('#tablaUsuario').dataTable().fnAddData([
            { "IdUsuario": respuesta[0]['IdUsuario'], "Email": respuesta[0]['Email'], "UltimoInicio": respuesta[0]['UltimoInicio'], "Tipo": respuesta[0]['Tipo'], "Imagen": respuesta[0]['Imagen'] }
        ]);            
    }
}

export async function modificarTable(){
    let respuesta = new Array()
    let fila = frmUsuarioE[3].value;
    respuesta = await modificarFetch('../App/Controllers/ControllerUsuario.php', frmUsuarioE);
        
    if(respuesta.length > 0){
        $("#tablaUsuario").DataTable().cell( fila, 1).data(respuesta[0]['Email']);  
        $("#tablaUsuario").DataTable().cell( fila, 3).data(respuesta[0]['Tipo']);  
        $("#tablaUsuario").DataTable().cell( fila, 6).data(respuesta[0]['Imagen']);          
    }

}