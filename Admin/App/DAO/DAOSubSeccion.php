<?php

    require_once("DAO.php");
    require_once("../Models/SubSeccion.php");
        
    class DAOSubSeccion extends DAO{

        public function __construct(){
            $this->datos = array();
        }

        public function queryBuscarPorId(){
        }

        public function metodoBuscarPorId($statement, $parametro){
        }  

        public function queryListar($filtro){
            switch ($filtro) {
                case '':
                    return "SELECT  A.IdSeccion, B.Nombre, A.IdSubseccion, A.Nombre  FROM BlogPHP.SubSeccion A  INNER JOIN BlogPHP.seccion B ON A.IdSeccion = B.IdSeccion";
                case 'IdSeccion':
                    return "SELECT  A.IdSeccion, B.Nombre, A.IdSubseccion, A.Nombre  FROM BlogPHP.SubSeccion A  INNER JOIN BlogPHP.seccion B ON A.IdSeccion = B.IdSeccion WHERE A.IdSeccion = ?"; 
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
                    $tmp = new SubSeccion($fila[0], $fila[1], $fila[2], $fila[3]);
                    array_push($this->datos, $tmp->toArray());
                }    
            }
            return $this->datos;
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
