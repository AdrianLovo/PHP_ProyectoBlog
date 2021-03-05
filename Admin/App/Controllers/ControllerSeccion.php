<?php
   
    require_once("../DAO/DAOSeccion.php");
    require_once("../Models/Seccion.php");

    class ControllerSeccion{

        public function Listar(){
            $datosTodos = array();
		    $daoSeccion = new DAOSeccion();

            foreach ($daoSeccion->listar() as $seccion) {
                $temp = $seccion->toArray();
                $datos = array(
                    'IdSeccion' => $temp[0],
                    'Nombre' 	=> $temp[1]
                );
                $datosTodos[] = $datos;	
            }
            echo json_encode($datosTodos);	
        }

    }

    //Parametros recibidos de JS
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    //echo json_encode("Hola");

    
    //Instancia de clases a Utilizar
    $controllerSeccion = new ControllerSeccion();    
    $controllerSeccion->$metodo();        //Metodo recibido 
