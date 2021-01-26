class Autenticacion {
  
    //Autenticar con Email
    autenticarEmail(email, password){
        firebase.auth().signInWithEmailAndPassword(email, password)
        .then((result) => {
            location.href = "/views/home.html";            
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(`${errorCode} - ${errorMessage}`);
        });
    }
    
}