import {mensaje} from './UtilSweetMessage.js';
import {listarTable, eliminarTable, agregarTable, modificarTable, listarSelect} from './subseccionesTable.js';

(async function(){
   
    //INSTANCIAS | ELEMENTOS DOM
    let table;  
    let select = document.getElementById('Seccion');
    let selectE = document.getElementById('SeccionE');
    let SeccionNombre = document.getElementById('SeccionNombre');    
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

     

})();
