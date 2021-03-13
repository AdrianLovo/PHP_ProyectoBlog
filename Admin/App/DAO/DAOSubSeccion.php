<?php

    require_once("DAO.php");
    require_once("../Models/SubSeccion.php");
        
    class DAOSubSeccion extends DAO{

        public function queryBuscarPorId(){
        }

        public function metodoBuscarPorId($statement, $parametro){
        }  

        public function queryListar(){
            $query = "SELECT  A.IdSeccion, B.Nombre, A.IdSubseccion, A.Nombre  FROM BlogPHP.SubSeccion A  INNER JOIN BlogPHP.seccion B ON A.IdSeccion = B.IdSeccion";
            return $query;
        }

        public function metodoListar($resultSet){
            $arrayDeObjetos = array();
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new SubSeccion($fila[0], $fila[1], $fila[2], $fila[3]);
                    array_push($arrayDeObjetos, $tmp->toArray());
                }    
            }
            return $arrayDeObjetos;
        }       

        public function queryListarFiltro($filtro){            
        }

        public function metodoListarFiltro($statement, $parametro){
        }   

        public function queryEliminar(){
            $query = "DELETE FROM BlogPHP.SubSeccion WHERE IdSubSeccion = ?";
            return $query;
        }

        public function metodoEliminar($statement, $parametro){
            $statement->execute([$parametro->getIdSubseccion()]);
            $filasAfectadas = $statement->rowCount();          
            return $filasAfectadas;
        }

        public function queryAgregar(){
            $query = "INSERT INTO BlogPHP.SubSeccion (IdSeccion, Nombre) VALUES(?, ?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([$datos['IdSeccion'], $datos['SubseccionNombre']]);            
        }

        public function queryModificar(){
            $query = "UPDATE BlogPHP.SubSeccion SET IdSeccion=?, Nombre=?  WHERE IdSubSeccion=?";
            return $query;
        }

        public function metodoModificar($statement, $parametro){
            $filasAfectadas = 0;
            $datos = $parametro->toArray();  
            if($statement->execute([$datos['IdSeccion'], $datos['SubseccionNombre'], $datos['IdSubseccion']])){
                $filasAfectadas = $statement->rowCount(); 
            }
            return $filasAfectadas;
        }

    }
