<?php
   
    require_once("../DAO/DAOSubSeccion.php");
    require_once("../Models/SubSeccion.php");

    class ControllerSubSeccion{

        private $daoSubseccion;
        private $vacio;
        
        public function __construct(){
            $this->daoSubseccion = new DaoSubSeccion();
            $this->vacio = array();
        }

        public function Listar(){
            $datosTodos = array();    
            $datosTodos = $this->daoSubseccion->listar();                
            echo json_encode($datosTodos);	
        }

        public function Eliminar(){
            $IdSubseccion = isset($_POST['IdSubSeccion']) ? $_POST['IdSubSeccion'] : null;
            $subseccion = new SubSeccion(null, null, $IdSubseccion, null);            
            echo($this->daoSubseccion->eliminar($subseccion));
        }

        public function Agregar(){       
            $datosTodos = array(); 
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;    
            $Seccion = isset($_POST['Seccion']) ? $_POST['Seccion'] : null;            
            $SeccionNombre = isset($_POST['SeccionNombre']) ? $_POST['SeccionNombre'] : null;    
            $seccion = new SubSeccion($Seccion, $SeccionNombre, null, $Nombre);
            $seccion->setIdSubSeccion($this->daoSubseccion->agregar($seccion));           

            if($seccion->getIdSeccion() > 0){
                echo json_encode($seccion->toArray());
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            $IdSeccion = isset($_POST['IdSeccionE']) ? $_POST['IdSeccionE'] : null;   
            $SubseccionNombre = isset($_POST['NombreE']) ? $_POST['NombreE'] : null;                        
            $SeccionNombre = isset($_POST['SeccionNombreE']) ? $_POST['SeccionNombreE'] : null;
            $IdSubseccion = isset($_POST['IdSubseccionE']) ? $_POST['IdSubseccionE'] : null;
            
            $subseccion = new SubSeccion($IdSeccion, $SeccionNombre, $IdSubseccion, $SubseccionNombre);
            $filas = $this->daoSubseccion->modificar($subseccion);   

            if($filas > 0){
                echo json_encode($subseccion->toArray()); 
            }else{
                echo json_encode($this->vacio);
            }
        }
    }

    
    //Parametros Post
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerSubSeccion();
    $controllerSeccion->$metodo();        //Metodo recibido 