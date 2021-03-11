<?php

    require_once("DAO.php");
    require_once("../Models/Post.php");
        
    class DAOPost extends DAO{

        public function queryBuscar(){
            // $query = "";
            // return $query;
        }

        public function metodoBuscar($statement, $parametro){
            // $filas = 0;
            // return $filas;
        }  

        public function queryListar(){
            // $query = "SELECT * FROM BlogPHP.Seccion";
            // return $query;
        }

        public function metodoListar($resultSet){
            // $arrayDeObjetos = array();
            // if(!empty($resultSet)){
            //     foreach($resultSet as $fila){
            //         $tmp = new Seccion($fila[0], $fila[1]);
            //         array_push($arrayDeObjetos, $tmp);
            //     }    
            // }
            // return $arrayDeObjetos;
        }       

        public function queryEliminar(){
            // $query = "DELETE FROM BlogPHP.Seccion WHERE IdSeccion = ?";
            // return $query;
        }

        public function metodoEliminar($statement, $parametro){
            // $statement->execute([$parametro->getIdSeccion()]);
            // $filasAfectadas = $statement->rowCount();          
            // return $filasAfectadas;
        }

        public function queryAgregar(){
            $query = "INSERT INTO BlogPHP.Seccion (Nombre) VALUES(?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([$datos[1]]);            
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

