<?php

    require_once("DAO.php");
    require_once("../Models/Post.php");
        
    class DAOPost extends DAO{

        public function queryBuscarPorId(){
        }

        public function metodoBuscarPorId($statement, $parametro){
        }  

        public function queryListar(){
            $query = "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion  FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion";
            return $query;
        }
       
        public function metodoListar($resultSet){
            $arrayDeObjetos = array();
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new Post($fila['IdPost'], $fila['Titulo'], $fila['Descripcion'], $fila['ImagenPortada'], '', $fila['Fecha'], $fila['IdUsuario'], $fila['IdSeccion'], $fila['IdSubSeccion'], $fila['EmailUsuario'], $fila['NombreSeccion'], $fila['NombreSubSeccion']);
                    array_push($arrayDeObjetos, $tmp->toArray());
                }    
            }
            return $arrayDeObjetos;
        }       

        public function queryListarFiltro($filtro){
            switch ($filtro) {
                case 0:
                    return "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion   FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion WHERE A.IdUsuario = ?";
            }            
            return "";
        }

        public function metodoListarFiltro($statement, $parametro){
            $arrayDeObjetos = array();            
            $statement->execute([$parametro]);
            $resultSet = $statement->fetchAll();
            
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new Post($fila['IdPost'], $fila['Titulo'], $fila['Descripcion'], $fila['ImagenPortada'], '', $fila['Fecha'], $fila['IdUsuario'], $fila['IdSeccion'], $fila['IdSubSeccion'], $fila['EmailUsuario'], $fila['NombreSeccion'], $fila['NombreSubSeccion']);
                    array_push($arrayDeObjetos, $tmp->toArray());
                }    
            }
            return $arrayDeObjetos;            
        }     

        public function queryEliminar(){
            $query = "DELETE FROM BlogPHP.Post WHERE IdPost = ?";
            return $query;
        }

        public function metodoEliminar($statement, $parametro){
            $statement->execute([$parametro->getIdPost()]);
            $filasAfectadas = $statement->rowCount();          
            return $filasAfectadas;
        }

        public function queryAgregar(){
            $query = "INSERT INTO BlogPHP.Post (Titulo, Descripcion, ImagenPortada, Contenido, Fecha, IdUsuario, IdSeccion, IdSubSeccion) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([ $datos['Titulo'], $datos['Descripcion'], $datos['ImagenPortada'], $datos['Contenido'], $datos['Fecha'], $datos['IdUsuario'], $datos['IdSeccion'], $datos['IdSubSeccion'] ]);                
        }

        public function queryModificar(){
            // $query = "UPDATE BlogPHP.Seccion SET Nombre=? WHERE IdSeccion=?";
            // return $query;
        }

        public function metodoModificar($statement, $parametro){
            // $filasAfectadas = 0;
            // $datos = $parametro->toArray();  
            // if($statement->execute([$datos[1], $datos[0]])){
            //     //var_dump($datos);
            //     $filasAfectadas = $statement->rowCount(); 
            // }
            // return $filasAfectadas;
        }

    }

