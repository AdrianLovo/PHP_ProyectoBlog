import {listarFetch, eliminarFetch, agregarFetch, modificarFetch} from './UtilFetch.js';

export async function listarTable(){
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerSeccion.php');

    let table = $('#tablaSeccion').DataTable({
        data: lista,
        
        "columns": [               
            //Mostrados
            { "data": "IdSeccion" },
            { "data": "Nombre" },
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
                "targets": [],
                "visible": false,
                "searchable": false
            }
        ],
        
    });       
    return table;
}

export function eliminarTable(table){
    $('#tablaSeccion tbody').on('click', 'td.details-delete', function () {
        if(eliminarFetch( "../App/Controllers/ControllerSeccion.php",table.row($(this).parents('tr')).data().IdSeccion)){
            table.row($(this).parents('tr')).remove().draw();
        }
    });
}

export async function agregarTable(){
    let respuesta = new Array()
    respuesta = await agregarFetch('../App/Controllers/ControllerSeccion.php', frmSeccion);
    
    if(respuesta.length > 0){
        $('#tablaSeccion').dataTable().fnAddData([
            { "IdSeccion": respuesta[0], "Nombre": respuesta[1] }
        ]);            
    }
}

export async function modificarTable(){
    let respuesta = new Array()
    respuesta = await modificarFetch('../App/Controllers/ControllerSeccion.php', frmSeccionE);

    console.log("FILA A MODIFICAR" + frmSeccionE[2].value);
        
    if(respuesta.length > 0){
        $("#tablaSeccion").DataTable().cell( frmSeccionE[3].value , 1).data(respuesta[1]);  //Nombre        
    }

}