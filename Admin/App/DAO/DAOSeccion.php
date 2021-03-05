<?php

    require_once("DAO.php");
    require_once("../Models/Seccion.php");
        
    class DAOSeccion extends DAO{

        public function queryListar(){
            $query = "SELECT * FROM BlogPHP.Seccion";
            return $query;
        }

        public function metodoListar($resultSet){
			$arrayDeObjetos = array();
			if(!empty($resultSet)){
				foreach($resultSet as $fila){
					$a = new Seccion($fila[0], $fila[1]);
					array_push($arrayDeObjetos, $a);
				}	
			}	
			return $arrayDeObjetos;
		}

        public function queryBuscar(){
            $query = "";
            return $query;
        }	
        
        
        public function metodoBuscar($statement, $parametro){
            $fila = 0;
            /*$statement->execute([$parametro->getEmail(), $parametro->getPassword()]);
            $filas = $statement->rowCount();*/
            return $filas;
        }
       

    }

