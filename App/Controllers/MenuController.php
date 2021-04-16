<?php

    include_once 'Conexion.php';

    class MenuController extends Conexion{     

        function __construct(){
            parent::__construct();           
        }
        
        function listarMenu(){
            $arrayDeObjetos = array();
            
            $query = $this->connect()->prepare("SELECT A.IdSeccion IdSeccion, A.Nombre Seccion, B.Nombre SubSeccion, B.IdSubSeccion  FROM seccion A LEFT JOIN subseccion B ON B.IdSeccion = A.IdSeccion");
            $query->execute();

            foreach($query as $post){
                $tmp = [
                    "IdSeccion" => $post['IdSeccion'], 
                    "Seccion" => $post['Seccion'], 
                    "IdSubSeccion" => $post['IdSubSeccion'], 
                    "SubSeccion" => $post['SubSeccion']
                ];
                array_push($arrayDeObjetos, $tmp);
            }
        
            echo json_encode($arrayDeObjetos);
        }       
    }


    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    
    if($metodo === "Listar"){
        $menu = new MenuController();
        $menu->listarMenu();
    }

    