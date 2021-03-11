import {mensaje} from './UtilSweetMessage.js';
import {agregarTable} from './postTable.js';
/*import {listarTable, eliminarTable, agregarTable, modificarTable} from './seccionesTable.js';

(async function(){
   
    //INSTANCIAS | ELEMENTOS DOM
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

 

})();*/


(function() {
	let resultado = document.getElementById("resultado");
    let frmPost = document.getElementById("frmPost");

    let $sumNote = $("#ta-1")
		.summernote({
            placeholder: 'Write your content here',
            height: 600,
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

	//get
	$("#btn-get-content").on("click", function() {
		var contenido =$($sumNote.code());	
        for(let i= 0; i < contenido.length; i++){
            console.log(contenido[i]);
        }
	    var x = contenido.find("font").remove();		
		$("#content").text($("#ta-1").val());
	});

    //reset
	$("#btn-reset").on("click", function() {
	    $sumNote.reset();
		$("#content").empty();

        /*var div = document.getElementById('resultado');
        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }*/
	});



    let agregar = document.getElementById("btn-get-content");
    let reiniciar = document.getElementById("btn-reset");

    agregar.addEventListener('click', async function(e){
        e.preventDefault();
        agregarTable(frmPost);
    })
    
    reiniciar.addEventListener('click', function(e){
        e.preventDefault();
    })
    
   
})();