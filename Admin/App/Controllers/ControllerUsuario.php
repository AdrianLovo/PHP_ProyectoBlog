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

        public function Listar(){
            $datosTodos = array();
            $daoUsuario = new DAOusuario();
    
            foreach ($daoUsuario->listar() as $usuario) {
                $temp = $usuario->toArray();
                $datos = array(
                    'IdUsuario'     => $temp[0],
                    'Email' 	    => $temp[1],
                    'Password' 	    => "",
                    'UltimoInicio'  => $temp[3],
                    'UltimoFin'     => $temp[4],
                    'Imagen'        => $temp[5]
                );
                $datosTodos[] = $datos;	
            }
            echo json_encode($datosTodos);	
        }

    }

    //Parametros recibidos de JS
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    $email = isset($_POST['Email']) ? $_POST['Email'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;
    
    //Instancia de clases a Utilizar
    $controllerUsuario = new ControllerUsuario();
    $parametro = new Usuario("", $email, $password, "", "", "");    
    
    $controllerUsuario->$metodo($parametro);        //Metodo recibido 