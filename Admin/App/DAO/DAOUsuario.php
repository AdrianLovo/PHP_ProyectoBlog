<?php

    require_once("DAO.php");
    require_once("../Models/Usuario.php");
        
    class DAOUsuario extends DAO{

        public function __construct(){
            $this->datos = array();
        }

        public function queryBuscarPorId(){
            $query = "SELECT * FROM BlogPHP.Usuario WHERE Email=? LIMIT 1";
            return $query;
        }

        public function metodoBuscarPorId($statement, $parametro){
            $statement->execute([$parametro->getEmail()]);
            $resultSet = $statement->fetchAll();
            return $resultSet;
        }  

        public function queryListar($filtro){
            switch ($filtro) {
                case '':
                    return "SELECT * FROM BlogPHP.Usuario ORDER BY IdUsuario ASC";
            }            
            return "";
        }

        public function metodoListar($statement, $parametro){
            if($parametro != ''){
                $statement->execute([$parametro]);
            }else{
                $statement->execute();
            }
            $resultSet = $statement->fetchAll();            
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
                    array_push($this->datos, $tmp->toArray());
                }    
            }
            return $this->datos;
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
            $statement->execute([$datos['Email'], $datos['Password'], $datos['UltimoInicio'], $datos['Imagen'], $datos['Tipo']]);            
        }

        public function queryModificar(){
            $query = "UPDATE BlogPHP.Usuario SET Email=?, Tipo=?, Imagen=? WHERE IdUsuario=?";
            return $query;
        }

        public function metodoModificar($statement, $parametro){
            $filasAfectadas = 0;
            $datos = $parametro->toArray();  
            if($statement->execute([$datos['Email'],$datos['Tipo'], $datos['Imagen'], $datos['IdUsuario']])){
                $filasAfectadas = $statement->rowCount(); 
            }
            return $filasAfectadas;
        }

    }

