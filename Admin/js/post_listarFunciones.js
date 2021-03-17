import {listarFetch, agregarFetch, modificarFetch, eliminarFetch} from './UtilFetch.js';

export async function listarTable(){
    let lista = new Array();
    lista = await listarFetch('../App/Controllers/ControllerPost.php', '', '');

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
            { "data": "Estado" },
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

export async function eliminarTable(table){
    $('#tablaPost tbody').on('click', 'td.details-delete', function () {        
        if(eliminarFetch( 
            "../App/Controllers/ControllerPost.php", "IdPost", 
            table.row($(this).parents('tr')).data().IdPost)
        ){
            table.row($(this).parents('tr')).remove().draw();
        }
    });
}

export async function modificarTable(table){
    $('#tablaPost tbody').on('click', 'td.details-edit', function () {
        console.log(table.row($(this).parents('tr')).data().IdPost);
        let IdPost = table.row($(this).parents('tr')).data().IdPost;
        let IdSeccion = table.row($(this).parents('tr')).data().IdSeccion;        
        window.location="/Admin/Views/post_modificar.php?IdPost="+IdPost+"&IdSeccion="+IdSeccion;        
    });
}

