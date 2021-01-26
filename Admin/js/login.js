//Funcion anonima auto ejecutable
(function(){
    
    //Variables Firebase
    firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();

    //Inputs
    let inputs = document.querySelectorAll('input')
    let inputsArray = [...inputs]
   
    //inputsArray.forEach( element => console.log(element));
    /*inputsArray.forEach( function(element){
        let "{}element.alt)
    })*/


    
    //Inputs
    /*var botonSalir = document.getElementById('botonSalir');
    var botonIngreso = document.getElementById('botonIngreso');
    var inputEmail = document.getElementById('inputEmail')
    var inputPassword = document.getElementById('inputPassword')

    //Boton Ingresar
    botonIngreso.addEventListener('click', function(){
        var email = inputEmail.value;
        var password = inputPassword.value;       

        const auth = new Autenticacion();
        auth.autenticarEmail(email, password);
    });

    //Validar constantemente si existe usuario Logeado
    auth.onAuthStateChanged(function(user){
        if(user){
            console.log("Usuario logeado");           
        }else{
            console.log("No hay usuario logeado");
        }
    });*/

})();