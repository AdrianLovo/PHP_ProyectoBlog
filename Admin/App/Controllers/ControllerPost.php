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
            $Titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;            
            $Descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;  
            $Imagen = "";
            $fecha =  $fecha = date('Y-m-d H:i:s');          
            $Contenido = isset($_POST['ta-1']) ? $_POST['ta-1'] : null;            
            $Seccion = isset($_POST['Seccion']) ? $_POST['Seccion'] : null;  
            $Subseccion = isset($_POST['Subseccion']) ? $_POST['Subseccion'] : null;       
               
            $post = new Post(null, $Titulo, $Descripcion, $Imagen, $Contenido, $fecha, $IdUsuario, $Seccion, $Subseccion, null, null, null);                            
            $post->setIdPost($this->daoPost->agregar($post));
            
            if($post->getIdPost() > 0){
                echo json_encode($post->toArray());
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            // $Nombre = isset($_POST['NombreE']) ? $_POST['NombreE'] : null;
            // $IdSeccion = isset($_POST['IdSeccionE']) ? $_POST['IdSeccionE'] : null;            
            // $seccion = new Seccion($IdSeccion, $Nombre);
            // $filas = $this->daoSeccion->modificar($seccion);   

            // if($filas > 0){
            //     echo json_encode($seccion->toArray()); 
            // }else{
            //     echo json_encode($this->vacio);
            // }
        }
    }

    
    //Parametros Post
    session_start();
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerPost();
    $controllerSeccion->$metodo();        //Metodo recibido 