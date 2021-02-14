<?php

    require_once("Conexion.php");

    abstract class DAO extends Conexion{

        abstract function queryBuscar();		
        abstract function metodoBuscar($statement, $parametro);

       /*
        * Metodo para listar todos los elementos de tabla "X"
        * @access: public
        * @return: array() de objetos "X" 
        */
        public function buscar($parametro) {
            $arrayDeObjetos = array();
            $pdo = $this->conectar();
            try {
                //$query = $pdo->query($this->queryBuscar());
                $statement = $pdo->prepare($this->queryBuscar());
                $arrayDeObjetos = $this->metodoBuscar($statement, $parametro);
                $this->desconectar();
                return $arrayDeObjetos;
            } catch (Exception $e) {
                echo($e);
            }finally{
                $this->desconectar();
            }
        }

    }
