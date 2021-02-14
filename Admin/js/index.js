import {mensaje} from './SweetMessage.js';

//Funcion anonima auto ejecutable
(function(){

    //INPUTS
    let btnLogin = document.getElementById('btnLogin');
    let inputs = document.querySelectorAll('input.data');
    let inputsArray = [...inputs];
    let valores = [];
    
    //EVENTOS
    btnLogin.addEventListener('click', () => Login());
    inputsArray[1].addEventListener('keypress', (event) => event.keyCode == 13 ? Login() : '' );    //Enter en input password

    //FUNCIONES
    function Autenticar(Email, Password){
        $.ajax({
            url: "../Admin/App/Controllers/ControllerUsuario.php",
            type: "POST",
            data: {"metodo": "Login", "Email": Email, "Password": Password},
            async: true,
            success: function (respuesta) {
                console.log(respuesta);
                if(respuesta == 1){
                    //window.location.href = "informacion";
                    mensaje('Login', 'success');
                }else{
                    mensaje('Los datos ingresados son incorrectos', 'error');  	
                }                
            },error: function() {
                mensaje('Error para conectarse al servidor', 'error');  	
            }
        }); 
    }


    function Login(){
        if(inputsArray[0].value.length > 0 && inputsArray[1].value.length > 0){
            inputsArray.forEach(function(element){   
                valores.push(element.value)
            })         
            Autenticar(valores[0], valores[1]);
        }else{
            mensaje('Existen campos vacios', 'error');         
        }
    }


    






})();


