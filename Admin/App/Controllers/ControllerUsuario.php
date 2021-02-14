<?php
   
    require_once("../DAO/DAOUsuario.php");
    require_once("../Models/Usuario.php");

    class ControllerUsuario{

        public function Login($parametro){
            $daoUsuario = new DAOUsuario();
            $rows = $daoUsuario->buscar($parametro);
            if($rows > 0){				
                $_SESSION['activo']  = true;			
                echo($rows);
            }
        }

    }

    // $encriptado = crypt("1234", '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    // echo($encriptado);

    //Parametros recibidos de JS
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    $email = isset($_POST['Email']) ? $_POST['Email'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;
    
    
    $controllerUsuario = new ControllerUsuario();
    $parametro = new Usuario("", $email, $password, "", "", "");    
    $controllerUsuario->$metodo($parametro);        //Metodo recibido 



    