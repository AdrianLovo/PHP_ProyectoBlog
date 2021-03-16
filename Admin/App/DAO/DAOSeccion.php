<?php
    require_once("DAO.php");
    require_once("../Models/Seccion.php");
        
    class DAOSeccion extends DAO{

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
                    return "SELECT * FROM BlogPHP.Seccion";
            }            
            return "";
        }

        public function metodoListar($statement, $parametro){
            if($parametro != null && $parametro != ''){
                $statement->execute([$parametro]);
            }else{
                $statement->execute();
            }
            $resultSet = $statement->fetchAll();            
            if(!empty($resultSet)){
                foreach($resultSet as $fila){
                    $tmp = new Seccion($fila[0], $fila[1]);
                    array_push($this->datos, $tmp->toArray());
                }    
            }
            return $this->datos;
        }       


        public function queryListarFiltro($filtro){           
        }

        public function metodoListarFiltro($statement, $parametro){
        }


        public function queryEliminar(){
            $query = "DELETE FROM BlogPHP.Seccion WHERE IdSeccion = ?";
            return $query;
        }

        public function metodoEliminar($statement, $parametro){
            $statement->execute([$parametro->getIdSeccion()]);
            $filasAfectadas = $statement->rowCount();          
            return $filasAfectadas;
        }

        public function queryAgregar(){
            $query = "INSERT INTO BlogPHP.Seccion (Nombre) VALUES(?)";            
            return $query;
        }

        public function metodoAgregar($statement, $parametro){
            $datos = $parametro->toArray();
            $statement->execute([$datos['Nombre']]);
        }

        public function queryModificar(){
            $query = "UPDATE BlogPHP.Seccion SET Nombre=? WHERE IdSeccion=?";
            return $query;
        }

        public function metodoModificar($statement, $parametro){
            $filasAfectadas = 0;
            $datos = $parametro->toArray();  
            if($statement->execute([$datos['Nombre'], $datos['IdSeccion']])){
                $filasAfectadas = $statement->rowCount(); 
            }
            return $filasAfectadas;
        }

    }

