<?php
    
    require_once("../DAO/DAOPost.php");
    require_once("../Models/Post.php");
    
    class ControllerPost{

        private $daoPost;
        private $vacio;
        
        public function __construct(){
            $this->daoPost = new DAOPost();
            $this->vacio = array();
        }

        public function Listar(){
            $datosTodos = array();                
            if($_SESSION['Tipo'] == 'A'){   //Mostrar Todo
                $datosTodos = $this->daoPost->listar();
            }else{
                $IdUsuario = $_SESSION['IdUsuario'];     //Mostrar por IdUsuario
                $datosTodos = $this->daoPost->listarFiltro(0, $IdUsuario);
            }            
            echo json_encode($datosTodos);	
        }

        public function Eliminar(){
            $IdPost = isset($_POST['IdPost']) ? $_POST['IdPost'] : null;
            $post = new Post($IdPost, null, null, null, null, null, null, null, null, null, null, null);        
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
                echo json_encode($post->toArray());
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            $IdUsuario = $_SESSION['IdUsuario'];
            $Imagen = "";
            $IdPost = isset($_POST['IdPost']) ? $_POST['IdPost'] : null;        
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
               
            $post = new Post($IdPost, $Titulo, $Descripcion, $destino, $Contenido, $fecha, $IdUsuario, $Seccion, $Subseccion, null, null, null, $Estado);     
            $filas = $this->daoPost->modificar($post);   
            
            if($filas > 0){
                $nombre != "" ? move_uploaded_file($nombreTemp, $destino) : null;
                echo json_encode($post->toArray()); 
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function ListarFiltro(){   
            $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;
            $parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;         
            $datosTodos = array();    
            $datosTodos = $this->daoPost->listarFiltro($filtro, $parametro);
            echo json_encode($datosTodos);	
        }
    }

    
    //Parametros Post
    session_start();
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerPost();
    $controllerSeccion->$metodo();        //Metodo recibido 