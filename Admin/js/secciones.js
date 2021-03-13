import {mensaje} from './UtilSweetMessage.js';
import {listarTable, eliminarTable, agregarTable, modificarTable} from './seccionesFunciones.js';

(async function(){
   
    //ELEMENTOS DOM
    let table;  
    let agregar = document.getElementById('agregar');
    let cancelar = document.getElementById('cancelar');    
    let modificar = document.getElementById('modificar');    
    let frmSeccion = document.getElementById("frmSeccion");
    let frmSeccionE = document.getElementById('frmSeccionE');
    
    table = await listarTable();
    eliminarTable(table);
    Modificar();

  
    //AGREGAR
    agregar.addEventListener("click", async (e) => {
        e.preventDefault();
        agregarTable(frmSeccion);
        $("a[href='#pills-listar']").tab("show");
    });

    //MODIFICAR
    function Modificar(){   
        $('#tablaSeccion tbody').on('click', 'td.details-edit', function () {
            frmSeccionE[2].value = table.row($(this).parents('tr')).data().IdSeccion;
            frmSeccionE[1].value = table.row(this).index();
            frmSeccionE[3].value = table.row($(this).parents('tr')).data().Nombre;
            
            $("#pills-modificar-tab").removeClass("disabled");        
            $("a[href='#pills-modificar']").tab("show");            
        });
    }

    modificar.addEventListener("click", async (e) => {
        e.preventDefault();  
        modificarTable();
        $("#pills-modificar-tab").addClass("disabled");        
        $("a[href='#pills-listar']").tab("show"); 
    });    

    cancelar.addEventListener('click', function(e){
        e.preventDefault();
        frmSeccionE.reset();
        $("#pills-modificar-tab").addClass("disabled");        
        $("a[href='#pills-listar']").tab("show");    
    });

    
    //SALIR
    salir.addEventListener('click', function(e){
        e.preventDefault();
        Salir();
    })

    async function Salir(){
        const data = new FormData();
        data.append('metodo', 'Salir');
        
        try{
            let response = await fetch('../App/Controllers/Controller.php', {
                method: 'POST',
                body: data
            });
            let respuesta = await response.text();

            if(respuesta == "ok"){
                window.location="/Admin/index.php";                
            }           
        }catch(error){
            mensaje('Error para conectarse al servidor', 'error');  	
        }
    }


})();
