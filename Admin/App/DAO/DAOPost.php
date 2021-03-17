<?php

    require_once("DAO.php");
    require_once("../Models/Post.php");
        
    class DAOPost extends DAO{

        public function __construct(){
            $this->datos = array();
        }

        public function queryBuscarPorId(){
        }

        public function metodoBuscarPorId($statement, $parametro){
        }  

        public function queryListar($filtro){
            $IdUsuario = $_SESSION['IdUsuario'];
            $Tipo = $_SESSION['Tipo'];

            if($Tipo == 'A'){       //ADMIN
                switch ($filtro) {
                    case '':
                        return "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion, A.Estado  FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion";
                    case 'IdPost':
                        return "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion, A.Estado, A.Contenido   FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion WHERE A.IdPost = ?";                    
                    
                }            
            }else{                  //USER
                switch ($filtro) {
                    case '':
                        return "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion, A.Estado  FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion WHERE A.IdUsuario=".$IdUsuario;
                    case 'IdPost':
                        return "SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha, A.IdUsuario, A.IdSeccion, A.IdSubSeccion, B.Email AS EmailUsuario, C.Nombre AS NombreSeccion, D.Nombre AS NombreSubSeccion, A.Estado, A.Contenido   FROM BlogPHP.post A INNER JOIN BlogPHP.Usuario B ON A.IdUsuario = B.IdUsuario INNER JOIN BlogPHP.Seccion C ON A.IdSeccion = C.IdSeccion INNER JOIN BlogPHP.SubSeccion D ON A.IdSubSeccion = D.IdSubSeccion WHERE A.IdPost = ? AND A.IdUsuario=".$IdUsuario;                    
                    
                }            
            }


            
            return "";
        }
       
        public function metodoListar($statement, $parametro){
            if($parametro != ''){
               $statement->execute([$parametro]);
               $resultSet = $statement->fetchAll();            
                if(!empty($resultSet)){
                    foreach($resultSet as $fila){
                        $tmp = new Post($fila['IdPost'], $fila['Titulo'], $fila['Descripcion'], $fila['ImagenPortada'], $fila['Contenido'], $fila['Fecha'], $fila['IdUsuario'], $fila['IdSeccion'], $fila['IdSubSeccion'], $fila['EmailUsuario'], $fila['NombreSeccion'], $fila['NombreSubSeccion'], $fila['Estado']);
                        array_push($this->datos, $tmp->toArray());
                    }    
                }
            }else{
                $statement->execute();
                $resultSet = $statement->fetchAll();            
                if(!empty($resultSet)){
                    foreach($resultSet as $fila){
                        $tmp = new Post($fila['IdPost'], $fila['Titulo'], $fila['Descripcion'], $fila['ImagenPortada'], '', $fila['Fecha'], $fila['IdUsuario'], $fila['IdSeccion'], $fila['IdSubSeccion'], $fila['EmailUsuario'], $fila['NombreSeccion'], $fila['NombreSubSeccion'], $fila['Estado']);
                        array_push($this->datos, $tmp->toArray());
                    }    
                }
            }
            
            return $this->datos;
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
            $query = "INSERT INTO BlogPHP.Post (Titulo, Descripcion, ImagenPortada, Contenido, Fecha, IdUsuario, IdSeccion, IdSubSeccion, Estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([ $datos['Titulo'], $datos['Descripcion'], $datos['ImagenPortada'], $datos['Contenido'], $datos['Fecha'], $datos['IdUsuario'], $datos['IdSeccion'], $datos['IdSubSeccion'], $datos['Estado'] ]);                
        }

        public function queryModificar(){
            $query = "UPDATE BlogPHP.Post SET Titulo=?, Descripcion=?, ImagenPortada=?, Contenido=?, Fecha=?, IdUsuario=?, IdSeccion=?, IdSubSeccion=?, Estado=? WHERE IdPost=?";
            return $query;
        }

        public function metodoModificar($statement, $parametro){
            $filasAfectadas = 0;
            $datos = $parametro->toArray();  
            
            if($statement->execute([
                $datos['Titulo'], $datos['Descripcion'], $datos['ImagenPortada'], $datos['Contenido'], $datos['Fecha'], $datos['IdUsuario'], $datos['IdSeccion'], $datos['IdSubSeccion'], $datos['Estado'], $datos['IdPost']
                ])){
                $filasAfectadas = $statement->rowCount(); 
            }
           
            
            return $filasAfectadas;
        }

    }

