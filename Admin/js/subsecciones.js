import {mensaje} from './UtilSweetMessage.js';
import {listarTable, eliminarTable, agregarTable, modificarTable, listarSelect} from './subseccionesFunciones.js';

(async function(){
   
    //ELEMENTOS DOM
    let table;  
    let select = document.getElementById('Seccion');
    let selectE = document.getElementById('SeccionE');
    let SeccionNombre = document.getElementById('SeccionNombre');    
    let salir = document.getElementById('salir');
    let agregar = document.getElementById('agregar');
    let cancelar = document.getElementById('cancelar');    
    let modificar = document.getElementById('modificar');    
    let frmSubSeccion = document.getElementById("frmSubSeccion");
    let frmSubSeccionE = document.getElementById('frmSubSeccionE');
    
    table = await listarTable();
    eliminarTable(table);
    listarSelect(select);
    listarSelect(selectE);
    Modificar();

  
    //AGREGAR
    agregar.addEventListener("click", async (e) => {
        e.preventDefault();
        SeccionNombre.value = select.options[select.selectedIndex].innerText;
        agregarTable(frmSubSeccion);
        $("a[href='#pills-listar']").tab("show");
    });

    //MODIFICAR
    function Modificar(){   
        $('#tablaSubSeccion tbody').on('click', 'td.details-edit', function () {
            frmSubSeccionE[1].value = table.row(this).index();  
            frmSubSeccionE[2].value = table.row($(this).parents('tr')).data().SeccionNombre;
            frmSubSeccionE[3].value = table.row($(this).parents('tr')).data().IdSeccion;
            frmSubSeccionE[4].value = table.row($(this).parents('tr')).data().IdSubseccion;
            frmSubSeccionE[5].value = table.row($(this).parents('tr')).data().IdSeccion;
            frmSubSeccionE[6].value = table.row($(this).parents('tr')).data().SubseccionNombre;
            $("#pills-modificar-tab").removeClass("disabled");        
            $("a[href='#pills-modificar']").tab("show");            
        });
    }

    modificar.addEventListener("click", async (e) => {
        e.preventDefault();  
        modificarTable(frmSubSeccionE);
        $("#pills-modificar-tab").addClass("disabled");        
        $("a[href='#pills-listar']").tab("show");
    });    

    cancelar.addEventListener('click', function(e){
        e.preventDefault();
        frmSubSeccionE.reset();
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
