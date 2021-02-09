import {mensaje} from './SweetMessage.js';

//Funcion anonima auto ejecutable
(function(){

    //Variables Firebase
    /*firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();
    
    //Validar constantemente si existe usuario Logeado
    auth.onAuthStateChanged(function(user){
        if(user){
            console.log("Usuario logeado")
        }else{
            console.log("No hay usuario logeado")
        }
    })*/

    //INPUTS
    let btnLogin = document.getElementById('btnLogin')
    let inputs = document.querySelectorAll('input.data')
    let inputsArray = [...inputs]
    let valores = []
    
    //EVENTOS
    btnLogin.addEventListener('click', () => login())               
    
    inputsArray[1].addEventListener('keypress', (event) => event.keyCode == 13 ? login() : '' )   

    //FUNCIONES
    function login(){
        if(inputsArray[0].value.length > 0 && inputsArray[1].value.length > 0){
            inputsArray.forEach(function(element){   
                valores.push(element.value)
            })                 
            const auth = new Autenticacion();
            auth.autenticarEmail(valores[0], valores[1]);
        }else{
            mensaje('Existen campos vacios', 'error')             
        }
    }

})();