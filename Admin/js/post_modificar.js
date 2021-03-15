import {mensaje} from './UtilSweetMessage.js';
import {cargarPost, listarSecciones, listarSubSecciones, modificarPost} from './post_modificarFunciones.js';

(async function(){

     //SUMMERNOTE
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
   
    //ELEMENTOS DOM
    let modificar = document.getElementById('modificar');
    let reiniciar = document.getElementById('reiniciar');  
    let cancelar = document.getElementById('cancelar');  
    let frmPost = document.getElementById('frmPost');
    let IdPost = document.getElementById('IdPost');

    let InputSeccion = document.getElementById('InputSeccion');
    let SelectSeccion = document.getElementById('Seccion');
    let InputSubseccion = document.getElementById('InputSubseccion');
    let SelectSubseccion = document.getElementById('Subseccion');

    listarSecciones(SelectSeccion, '../App/Controllers/ControllerSeccion.php', InputSeccion);
    listarSubSecciones(SelectSubseccion, '../App/Controllers/ControllerSubSeccion.php', InputSubseccion, 0, InputSeccion.value);
    
    if(IdPost.value != ''){
        cargarPost(frmPost, '../App/Controllers/ControllerPost.php', 0, IdPost.value, $sumNote);
    }
    
  
    //AGREGAR
    modificar.addEventListener("click", async (e) => {
        e.preventDefault();
        modificarPost(frmPost, $sumNote);        
    });

    //SELECT
    SelectSeccion.addEventListener('change', function(){
        InputSeccion.value = SelectSeccion.options[SelectSeccion.selectedIndex].text;
        while (SelectSubseccion.firstChild) {
            SelectSubseccion.removeChild(SelectSubseccion.firstChild);
        }
        listarSubSecciones(SelectSubseccion, '../App/Controllers/ControllerSubSeccion.php', InputSubseccion, 0, SelectSeccion.options[SelectSeccion.selectedIndex].value);        
    })
     
    //IMAGENES 
    img.addEventListener('change', (e) => {
        let file = e.target.files[0];
        let img = URL.createObjectURL(file);
        let sizeByte = file.size;
        let siezekiloByte = parseInt(sizeByte / 1024);
        
        if (!(/\.(jpg|png|gif)$/i).test(file.name)) {
            mensaje('Tipo de archivo NO Admitido', 'error');        
        }else{
            if(siezekiloByte > 1024){
                mensaje('Tamaño maximo de archivo 1MB', 'error');        
            }else{
                mensaje('Imagen Cargada', 'success');
            }
        }
    });

     //REINICIAR
     reiniciar.addEventListener('click', function(e){
        e.preventDefault();
        $sumNote.reset();
		$("#content").empty();
    })  

    //CANCELAR
    cancelar.addEventListener('click', function(e){
        e.preventDefault();
        window.location="/Admin/views/post_listar.php"; 
    })   

    
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
