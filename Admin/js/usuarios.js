import {mensaje} from './SweetMessage.js';

(async function(){
    let listaUsuarios = new Array()
    listaUsuarios = await ListarUsuarios()
    llenarTabla(listaUsuarios);


    //FUNCIONES
    async function ListarUsuarios(){
        const data = new FormData();
        data.append('metodo', 'Listar');
        
        try{
            let response = await fetch('../App/Controllers/ControllerUsuario.php', {
                method: 'POST',
                body: data
            });

            let dataRes = await response.json();
            
            if(dataRes.length > 0){
                return dataRes;
            }else{
                mensaje('No existen secciones agregadas', 'error');  	 	    
            }
        }catch(error){
            mensaje('Error para conectarse al servidor', 'error');  	
        }
    }   

    function llenarTabla(lista){        
        var table = $('#tablaUsuario').DataTable( {
            data: lista,
            
            "columns": [               
                //Mostrados
                { "data": "IdUsuario" },
                { "data": "Email" },
                { "data": "UltimoInicio" },
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
            "order": [[2, 'asc']],
            "columnDefs": [
                {
                    "targets": [5],
                    "visible": false,
                    "searchable": false
                }
            ],
            
        });       
    }

    function eliminar(){
        $('#tablaUsuario tbody').on('click', 'td.details-delete', function () {
            alert("Eliminar");
            let respuesta = await productoClass.eliminarProducto(table.row($(this).parents('tr')).data().UID)
            if(respuesta){
                mensajeAlert('Producto Eliminado', 'success') 
                table.row($(this).parents('tr')).remove().draw();
            }else{
                mensajeAlert('Error Eliminando Producto', 'error')  
            }
        });
    }

})();
