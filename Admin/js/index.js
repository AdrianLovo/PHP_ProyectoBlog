import {mensaje} from './SweetMessage.js';

//Funcion anonima auto ejecutable
(function(){

    //Elementos DOM
    let btnLogin = document.getElementById('btnLogin');
    let inputs = document.querySelectorAll('input.data');
    let inputsArray = [...inputs];
    let valores = [];
    
    //EVENTOS
    btnLogin.addEventListener('click', () => ValidaCampos());
    inputsArray[1].addEventListener('keypress', (event) => event.keyCode == 13 ? ValidaCampos() : '' );    //Enter en input password


    //FUNCIONES
    function ValidaCampos(){
        if(inputsArray[0].value.length > 0 && inputsArray[1].value.length > 0){
            inputsArray.forEach(function(element){   
                valores.push(element.value)
            })         
            Autenticar(valores[0], valores[1]);
        }else{
            mensaje('Existen campos vacios', 'error');         
        }
    }
    
    async function Autenticar(Email, Password){
        const data = new FormData();
        data.append('metodo', 'Login');
        data.append('Email', Email);
        data.append('Password', Password);
        try{
            let response = await fetch('../Admin/App/Controllers/ControllerUsuario.php', {
                method: 'POST',
                body: data
            });
            let dataRes = await response.text();      

            //console.log(dataRes);
            
            if(dataRes == "1"){
                mensaje('Login', 'success');
                window.location="/Admin/Views/home.php";
            }else{
                mensaje('Los datos ingresados son incorrectos', 'error');  	 	    
            }
        }catch(error){
            mensaje('Error para conectarse al servidor', 'error');  	
        }
    }


    
})();


