<?php

    include_once 'Conexion.php';

    class PostMostrarController extends Conexion{

        function __construct(){
            parent::__construct();
        }      

        function buscarPost($IdPost){
            $arrayDeObjetos = array();
            $query = $this->connect()->prepare("SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Contenido, A.Fecha, B.Nombre Seccion, C.Nombre SubSeccion, D.Email Email, D.Imagen Avatar FROM BlogPHP.Post A INNER JOIN BlogPHP.Seccion B ON B.IdSeccion = A.IdSeccion INNER JOIN BlogPHP.SubSeccion C ON C.IdSubSeccion = A.IdSubSeccion INNER JOIN BlogPHP.Usuario D ON D.IdUsuario = A.IdUsuario WHERE A.IdPost=:IdPost");
            $query->execute(['IdPost' => $IdPost]);

            foreach($query as $post){
                $tmp = [
                    "IdPost" => $post['IdPost'], 
                    "Titulo" => $post['Titulo'],
                    "Descripcion" => $post['Descripcion'],
                    "ImagenPortada" => $post['ImagenPortada'],
                    "Contenido" => $post['Contenido'],
                    "Fecha" => $post['Fecha'],
                    "Seccion" => $post['Seccion'],
                    "SubSeccion" => $post['SubSeccion'],
                    "Email" => $post['Email'],
                    "Avatar" => $post['Avatar']
                    
                ];
                array_push($arrayDeObjetos, $tmp);
            }                   

            echo json_encode($arrayDeObjetos);
        }
      
    }
    
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    $IdPost = isset($_POST['IdPost']) ? $_POST['IdPost'] : null;
     
   
    if($metodo === "Buscar"){
        $mostrar = new PostMostrarController();
        $mostrar->buscarPost($IdPost);
    }

   
  