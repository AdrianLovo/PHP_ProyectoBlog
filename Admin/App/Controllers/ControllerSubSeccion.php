<?php
   
    require_once("../DAO/DAOSubSeccion.php");
    require_once("../Models/SubSeccion.php");
  
    class ControllerSubSeccion{

        private $daoSubseccion;
        private $datos;
        
        public function __construct(){
            $this->daoSubseccion = new DaoSubSeccion();
            $this->datos = array();
        }

        public function Listar(){
            $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;
            $parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;
            $this->datos = $this->daoSubseccion->listar($filtro, $parametro);   
            echo json_encode($this->datos);	
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
            $subseccion = new SubSeccion($Seccion, $SeccionNombre, null, $Nombre);
            $subseccion->setIdSubSeccion($this->daoSubseccion->agregar($subseccion));           

            if($subseccion->getIdSeccion() > 0){
                array_push($this->datos, $subseccion->toArray());
                echo json_encode($this->datos);
            }else{
                echo json_encode($this->datos);
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
                array_push($this->datos, $subseccion->toArray());
                echo json_encode($this->datos); 
            }else{
                echo json_encode($this->datos);
            }
        }

    }

    
    //Parametros Post
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerSubSeccion();
    $controllerSeccion->$metodo();        //Metodo recibido 


