<?php
    
    require_once("../DAO/DAOPost.php");
    require_once("../Models/Post.php");
    
    class ControllerPost{

        private $daoPost;
        private $datos;
        
        public function __construct(){
            $this->daoPost = new DAOPost();
            $this->datos = array();
        }

        public function Listar(){
            $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;  
            $parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;
            $datos = $this->daoPost->listar($filtro, $parametro);
            echo json_encode($datos);	
        }

        public function Eliminar(){
            $IdPost = isset($_POST['IdPost']) ? $_POST['IdPost'] : null;
            $post = new Post($IdPost, null, null, null, null, null, null, null, null, null, null, null, null);        
            echo($this->daoPost->eliminar($post));
        }

        public function Agregar(){   
            $IdUsuario = $_SESSION['IdUsuario'];
            $Imagen = "";
            $Titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;            
            $fecha =  $fecha = date('Y-m-d H:i:s');          
            $Contenido = isset($_POST['ta-1']) ? $_POST['ta-1'] : null;            
            $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : null;       
            $Seccion = isset($_POST['Seccion']) ? $_POST['Seccion'] : null;  
            $Subseccion = isset($_POST['Subseccion']) ? $_POST['Subseccion'] : null; 
            $Descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
            $nombre = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : null;
            $nombreTemp = isset($_FILES['imagen']['tmp_name']) ? $_FILES['imagen']['tmp_name'] : null;
            $destino = $nombre != "" ? "../../../public/img/".date('YmdHis').$nombre : "/Resources/img/default.png";
               
            $post = new Post(null, $Titulo, $Descripcion, $destino, $Contenido, $fecha, $IdUsuario, $Seccion, $Subseccion, null, null, null, $Estado);                            
            $post->setIdPost($this->daoPost->agregar($post));
            
            if($post->getIdPost() > 0){
                $nombre != "" ? move_uploaded_file($nombreTemp, $destino) : null;
                array_push($this->datos, $post->toArray());
                echo json_encode($this->datos);
                
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            $IdUsuario = $_SESSION['IdUsuario'];
            $ImagenAnterior = isset($_POST['ImagenAnterior']) ? $_POST['ImagenAnterior'] : null; 
            $IdPost = isset($_POST['IdPost']) ? $_POST['IdPost'] : null;        
            $Titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;            
            $fecha =  $fecha = date('Y-m-d H:i:s');          
            $Contenido = isset($_POST['ta-1']) ? $_POST['ta-1'] : null;            
            $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : null;       
            $Seccion = isset($_POST['Seccion']) ? $_POST['Seccion'] : null;  
            $Subseccion = isset($_POST['Subseccion']) ? $_POST['Subseccion'] : null; 
            $Descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;  
            $NombreSeccion = isset($_POST['InputSeccion']) ? $_POST['InputSeccion'] : null;  
            $NombreSubSeccion = isset($_POST['InputSubseccion']) ? $_POST['InputSubseccion'] : null;  
            $nombre = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : null;
            $nombreTemp = isset($_FILES['imagen']['tmp_name']) ? $_FILES['imagen']['tmp_name'] : null;
            $destino = $nombre != "" ? "../../../public/img/".date('YmdHis').$nombre : $ImagenAnterior;            
               
            $post = new Post($IdPost, $Titulo, $Descripcion, $destino, $Contenido, $fecha, $IdUsuario, $Seccion, $Subseccion, null, $NombreSeccion, $NombreSubSeccion, $Estado);     
            $filas = $this->daoPost->modificar($post);   
            
            if($filas > 0){
                $nombre != "" ? move_uploaded_file($nombreTemp, $destino) : null;
                array_push($this->datos, $post->toArray());
                echo json_encode($this->datos);
            }else{
                echo json_encode($this->vacio);
            }
        }

    }

    
    //Parametros Post
    session_start();
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerPost();
    $controllerSeccion->$metodo();        //Metodo recibido 