<?php
   
    require_once("../DAO/DAOSeccion.php");
    require_once("../Models/Seccion.php");

    class ControllerSeccion{

        private $daoSeccion;
        private $vacio;
        
        public function __construct(){
            $this->daoSeccion = new DaoSeccion();
            $this->vacio = array();
        }

        public function Listar(){
            $datosTodos = array();    
            $datosTodos = $this->daoSeccion->listar();
            echo json_encode($datosTodos);	
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
                echo json_encode($seccion->toArray());
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function Modificar(){            
            $Nombre = isset($_POST['NombreE']) ? $_POST['NombreE'] : null;
            $IdSeccion = isset($_POST['IdSeccionE']) ? $_POST['IdSeccionE'] : null;            
            $seccion = new Seccion($IdSeccion, $Nombre);
            $filas = $this->daoSeccion->modificar($seccion);   

            if($filas > 0){
                echo json_encode($seccion->toArray()); 
            }else{
                echo json_encode($this->vacio);
            }
        }

        public function ListarFiltro($filtro, $parametro){
            $datosTodos = array();    
            $datosTodos = $this->daoSeccion->listarFiltro($filtro, $parametro);
            echo json_encode($datosTodos);	
        }
    }

    
    //Parametros Post
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerSeccion();
    $controllerSeccion->$metodo();        //Metodo recibido

    

