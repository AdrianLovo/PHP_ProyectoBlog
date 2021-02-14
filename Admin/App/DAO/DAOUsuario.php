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

    }

