<?php
   
    require_once("../DAO/DAOPost.php");
    require_once("../Models/Post.php");

    class ControllerPost{

        private $daoSeccion;
        private $vacio;
        
        public function __construct(){
            $this->daoPost = new DAOPost();
            $this->vacio = array();
        }

        public function Listar(){
            // $datosTodos = array();    
            // foreach ($this->daoSeccion->listar() as $seccion) {
            //     $temp = $seccion->toArray();
            //     $datos = array( 'IdSeccion' => $temp[0], 'Nombre' => $temp[1] );
            //     $datosTodos[] = $datos;	
            // }
            // echo json_encode($datosTodos);	
        }

        public function Eliminar(){
            // $IdSeccion = isset($_POST['IdSeccion']) ? $_POST['IdSeccion'] : null;
            // $seccion = new Seccion($IdSeccion, null);            
            // echo($this->daoSeccion->eliminar($seccion));
        }

        public function Agregar(){       
            $Contenido = isset($_POST['tab-1']) ? $_POST['tab-1'] : null;            
            echo($Contenido);
            /*$seccion = new Seccion(null, $Nombre);
            $seccion->setIdSeccion($this->daoSeccion->agregar($seccion));
            
            if($seccion->getIdSeccion() > 0){
                echo json_encode($seccion->toArray());
            }else{
                echo json_encode($this->vacio);
            }*/
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
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerPost();
    $controllerSeccion->$metodo();        //Metodo recibido 