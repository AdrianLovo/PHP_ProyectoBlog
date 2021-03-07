<?php

    require_once("DAO.php");
    require_once("../Models/Usuario.php");
        
    class DAOUsuario extends DAO{

        public function queryBuscar(){
            $query = "SELECT * FROM BlogPHP.Usuario WHERE Email=? AND Password=? LIMIT 1";
            return $query;
        }

        public function metodoBuscar($statement, $parametro){
            $statement->execute([$parametro->getEmail(), $parametro->getPassword()]);
            $filas = $statement->rowCount();
            return $filas;
        }  

        public function queryListar(){
            $query = "SELECT * FROM BlogPHP.Usuario";
            return $query;
        }

        public function metodoListar($resultSet){
            $arrayDeObjetos = array();
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
                    array_push($arrayDeObjetos, $tmp);
                }    
            }
            return $arrayDeObjetos;
        }       

        public function queryEliminar(){
            $query = "DELETE FROM BlogPHP.Usuario WHERE IdUsuario = ?";
            return $query;
        }

        public function metodoEliminar($statement, $parametro){
            $statement->execute([$parametro->getIdUsuario()]);
            $filasAfectadas = $statement->rowCount();          
            return $filasAfectadas;
        }

        public function queryAgregar(){
            $query = "INSERT INTO BlogPHP.Usuario (Email, Password, UltimoInicio, Imagen, Tipo) VALUES(?, ?, ?, ?, ?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([$datos[1], $datos[2], $datos[3], $datos[5], $datos[6]]);            
        }

        public function queryModificar(){
            $query = "UPDATE BlogPHP.Usuario SET Email=?, Tipo=?, Imagen=? WHERE IdUsuario=?";
            return $query;
        }

        public function metodoModificar($statement, $parametro){
            $filasAfectadas = 0;
            $datos = $parametro->toArray();  
            if($statement->execute([$datos[1],$datos[6], $datos[5], $datos[0]])){
                $filasAfectadas = $statement->rowCount(); 
            }
            return $filasAfectadas;
        }

    }

