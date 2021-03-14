import {mensaje} from './UtilSweetMessage.js';
import {listarTable, agregarTable, listarSecciones} from './postFunciones.js';
//import {listarTable, eliminarTable, agregarTable, modificarTable} from './seccionesTable.js';

(async function() {

    let $sumNote = $("#ta-1")
		.summernote({
            placeholder: 'Write your content here',
            height: 250,
			callbacks: { 
                onPaste: function(e,x,d) { 
                    $sumNote.code(($($sumNote.code()).find("font").remove())); 
            
                }
            },
			dialogsInBody: true,
			dialogsFade: true,
			disableDragAndDrop: true,
			tableClassName: function() {
				$(this).addClass("table table-bordered").attr("cellpadding", 0).attr("cellspacing", 0).attr("border", 1).css("borderCollapse", "collapse").css("table-layout", "fixed").css("width", "100%");
				$(this).find("td").css("borderColor", "#ccc").css("padding", "4px");
			}
	}).data("summernote");

    //BOTONES
    let agregar = document.getElementById("agregar");
    let reiniciar = document.getElementById("reiniciar");
   
    //INPUTS
    let table;
    let SelectSeccion = document.getElementById('Seccion');
    let SelectSubseccion = document.getElementById('Subseccion');    
    let InputSeccion = document.getElementById('InputSeccion');    
    let InputSubseccion = document.getElementById('InputSubseccion');    
    let frmPost = document.getElementById("frmPost");
    let resultado = document.getElementById("resultado");

    table = await listarTable();


    //listarSecciones(SelectSeccion, '../App/Controllers/ControllerSeccion.php', InputSeccion, 'IdSeccion', 1);
    //listarSubSecciones(SelectSubseccion, '../App/Controllers/ControllerSubSeccion.php', InputSubseccion);


    /*SelectSeccion.addEventListener('change', function(){
        console.log(SelectSeccion.options[SelectSeccion.selectedIndex].value);
        console.log(SelectSeccion.options[SelectSeccion.selectedIndex].innerText);
    })

    agregar.addEventListener('click', async function(e){
        e.preventDefault();
        agregarTable(frmPost);
    })
    
    reiniciar.addEventListener('click', function(e){
        e.preventDefault();
        $sumNote.reset();
		$("#content").empty();
        var div = document.getElementById('resultado');
            while (div.firstChild) {
            div.removeChild(div.firstChild);
        }
    })*/


    

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