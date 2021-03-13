<?php
   
    require_once("../DAO/DAOUsuario.php");
    require_once("../Models/Usuario.php");

    class ControllerUsuario{

        private $daoUsuario;
        private $vacio;
        
        public function __construct(){
            $this->daoUsuario = new DAOUsuario();
            $this->vacio = array();
        }
       
        public function Login(){            
            $email = isset($_POST['Email']) ? $_POST['Email'] : null;
            $password = isset($_POST['Password']) ? $_POST['Password'] : null;   
            $encriptar = password_hash($password, PASSWORD_DEFAULT);   
            $usuario = new Usuario("", $email, $password, "", "", "", "");            

            $row = $this->daoUsuario->buscarPorId($usuario);
            if(password_verify($password, $row[0][2] )){			
                session_start();	
                $_SESSION['IdUsuario'] = $row[0][0];
                $_SESSION['Email'] = $row[0][1];
                $_SESSION['Tipo'] = $row[0][6];
                echo("ok"); 
            }
        }

        public function Listar(){
            $datosTodos = array();    
            $datosTodos = $this->daoUsuario->listar();
            echo json_encode($datosTodos);	          	
        }

        public function Eliminar(){
            $IdUsuario = isset($_POST['IdUsuario']) ? $_POST['IdUsuario'] : null;
            $usuario = new Usuario($IdUsuario, "", "", "", "", "", "");            
            echo($this->daoUsuario->eliminar($usuario));
        }

        public function Agregar(){       
            $fecha = date('Y-m-d H:i:s');
            $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : null;
            $Email = isset($_POST['Email']) ? $_POST['Email'] : null;
            $Password = isset($_POST['Password']) ? $_POST['Password'] : null;
            $nombre = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : null;
            $nombreTemp = isset($_FILES['imagen']['tmp_name']) ? $_FILES['imagen']['tmp_name'] : null;
            $destino = $nombre != "" ? "../../../public/img/".date('YmdHis').$nombre : "/Resources/img/default.png";
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            
            $usuario = new Usuario(null, $Email, $Password, $fecha, null, $destino, $Tipo);
            $usuario->setIdUsuario($this->daoUsuario->agregar($usuario));
            
            if($usuario->getIdUsuario() > 0){
                $nombre != "" ? move_uploaded_file($nombreTemp, $destino) : null;
                echo json_encode($usuario->toArray());
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            $fecha = date('Y-m-d H:i:s');            
            $Tipo = isset($_POST['TipoE']) ? $_POST['TipoE'] : null;
            $Email = isset($_POST['EmailE']) ? $_POST['EmailE'] : null;
            $IdUsuario = isset($_POST['IdUsuarioE']) ? $_POST['IdUsuarioE'] : null;
            $ImagenEOld = isset($_POST['ImagenEOld']) ? $_POST['ImagenEOld'] : null;
            $nombre = isset($_FILES['imagenE']['name']) ? $_FILES['imagenE']['name'] : null;
            $nombreTemp = isset($_FILES['imagenE']['tmp_name']) ? $_FILES['imagenE']['tmp_name'] : null;
            $destino = "../../../public/img/".date('YmdHis').$nombre;
            $destino = $nombre != "" ? $destino : $ImagenEOld;           
           
            $usuario = new Usuario($IdUsuario, $Email, "", $fecha, "", $destino, $Tipo);  
            $filas = $this->daoUsuario->modificar($usuario);    
            
            if($filas > 0){
                $nombre != "" ? move_uploaded_file($nombreTemp, $destino) : null;
                echo json_encode($usuario->toArray()); 
            }else{
                echo json_encode($this->vacio);
            }
        }
    }

    
    //Parametros Post
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerUsuario = new ControllerUsuario();
    $controllerUsuario->$metodo();        //Metodo recibido 