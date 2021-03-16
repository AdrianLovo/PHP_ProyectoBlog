<?php
   
    require_once("../DAO/DAOSeccion.php");
    require_once("../Models/Seccion.php");
  
    class ControllerSeccion{

        private $daoSeccion;
        private $vacio;
        
        public function __construct(){
            $this->daoSeccion = new DaoSeccion();
            $this->datos = array();
        }

        public function Listar(){
            $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;
            $parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;
            $this->datos = $this->daoSeccion->listar($filtro, $parametro);
            echo json_encode($this->datos);	
        }

        public function Eliminar(){
            $IdSeccion = isset($_POST['IdSeccion']) ? $_POST['IdSeccion'] : null;
            $seccion = new Seccion($IdSeccion, null);            
            echo($this->daoSeccion->eliminar($seccion));
        }

        public function Agregar(){       
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;            
            $seccion = new Seccion(null, $Nombre);
            $seccion->setIdSeccion($this->daoSeccion->agregar($seccion));
            
            if($seccion->getIdSeccion() > 0){
                array_push($this->datos, $seccion->toArray());
                echo json_encode($this->datos);
            }else{
                echo json_encode($this->datos);
            }
        }

        public function Modificar(){            
            $Nombre = isset($_POST['NombreE']) ? $_POST['NombreE'] : null;
            $IdSeccion = isset($_POST['IdSeccionE']) ? $_POST['IdSeccionE'] : null;            
            $seccion = new Seccion($IdSeccion, $Nombre);
            $filas = $this->daoSeccion->modificar($seccion);   

            if($filas > 0){
                array_push($this->datos, $seccion->toArray());
                echo json_encode($this->datos); 
            }else{
                echo json_encode($this->vacio);
            }
        }
        
    }

    
    //Parametros Post
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerSeccion();
    $controllerSeccion->$metodo();        //Metodo recibido

    

