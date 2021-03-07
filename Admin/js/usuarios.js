import {mensaje} from './UtilSweetMessage.js';
import {listarTable, eliminarTable, agregarTable, modificarTable} from './usuarioTable.js';

(async function(){
   
    //INSTANCIAS | ELEMENTOS DOM
    let table;  
    let img = document.getElementById('img');   
    let agregar = document.getElementById('agregar');
    let cancelar = document.getElementById('cancelar');    
    let modificar = document.getElementById('modificar');    
    let imgPrevia = document.getElementById('imgPrevia');
    let frmUsuario = document.getElementById("frmUsuario");
    let frmUsuarioE = document.getElementById('frmUsuarioE');
    
    table = await listarTable();
    eliminarTable(table);
    Modificar();

  
    
   
    //AGREGAR
    agregar.addEventListener("click", async (e) => {
        e.preventDefault();
        agregarTable(frmUsuario);
        imgPrevia.src = "/Resources/img/default.png";
        $("a[href='#pills-listar']").tab("show");
    });

    //MODIFICAR
    function Modificar(){   
        $('#tablaUsuario tbody').on('click', 'td.details-edit', function () {
            frmUsuarioE[5].value = table.row($(this).parents('tr')).data().Tipo;
            frmUsuarioE[4].value = table.row($(this).parents('tr')).data().Email;
            frmUsuarioE[3].value = table.row( this ).index();
            frmUsuarioE[2].value = table.row($(this).parents('tr')).data().Imagen;
            frmUsuarioE[1].value = table.row($(this).parents('tr')).data().IdUsuario;

            if(table.row($(this).parents('tr')).data().Imagen != null){
                document.getElementById("imgPreviaE").src = table.row($(this).parents('tr')).data().Imagen;   
            }

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
        frmUsuarioE.reset();
        document.getElementById("imgPreviaE").src = "/Resources/img/default.png";
        $("#pills-modificar-tab").addClass("disabled");        
        $("a[href='#pills-listar']").tab("show");    
    });

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
                document.getElementById("imgPrevia").src = img;  
            }
        }
    });

    imgE.addEventListener('change', (e) => {
        let file = e.target.files[0];
        let imgE = URL.createObjectURL(file);
        let sizeByte = file.size;
        let siezekiloByte = parseInt(sizeByte / 1024);
        
        if (!(/\.(jpg|png|gif)$/i).test(file.name)) {
            mensaje('Tipo de archivo NO Admitido', 'error');        
        }else{
            if(siezekiloByte > 1024){
                mensaje('Tamaño maximo de archivo 1MB', 'error');        
            }else{
                document.getElementById("imgPreviaE").src = imgE;  
            }
        }
    });

   

})();
