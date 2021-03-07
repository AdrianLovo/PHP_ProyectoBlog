<?php

    require_once("Conexion.php");

    abstract class DAO extends Conexion{

        abstract function queryBuscar();        
        abstract function metodoBuscar($statement, $parametro);        
        abstract function queryListar();
        abstract function metodoListar($resultSet);
        abstract function queryEliminar();        
        abstract function metodoEliminar($statement, $parametro);        
        abstract function queryAgregar();
        abstract function metodoAgregar($statement, $parametro);
        abstract function queryModificar();
        abstract function metodoModificar($statement, $parametro);

       /*
        * Metodo para listar todos los elementos de tabla "X"
        * @access: public
        * @return: int de objetos "X" encontrados 
        */
        public function buscar($parametro) {
            $arrayDeObjetos = array();
            $pdo = $this->conectar();
            try {
                $statement = $pdo->prepare($this->queryBuscar());
                $arrayDeObjetos = $this->metodoBuscar($statement, $parametro);
                return $arrayDeObjetos;
            } catch (Exception $e) {
                echo($e);
            }finally{
                $this->desconectar();
            }
        }

        /*
        * Metodo para listar todos los elementos de tabla "X"
        * @access: public
        * @return: array() de objetos "X" 
        */
        public function listar() {
            $arrayDeObjetos = array();
            $pdo = $this->conectar();
            try {
                $resultSet = $pdo->query($this->queryListar());
                $arrayDeObjetos = $this->metodoListar($resultSet);
                return $arrayDeObjetos;
            }catch (Exception $e) {
                echo($e);
            }finally{
                $this->desconectar();
            }
        }
        
        /*
        * Metodo para eliminar registrosa de la tabla "X" segun "id"
        * @access: public
        * @param:  $parametro (int indicando identificado)        
         * @return: $filasAfectadas (int de registros eliminados)
         */
        public function eliminar($parametro) {
            $pdo = $this->conectar();
            try{
                $statement = $pdo->prepare($this->queryEliminar());
                $filasAfectadas = $this->metodoEliminar($statement, $parametro);
                return $filasAfectadas;
            }catch(Exception $e){
                echo($e);
            }finally{
                $this->desconectar();
            }
        }

        /*
        * Metodo para agregar 1 registro a la tabla "X"
        * @access: public
        * @param:  $parametro (Objeto de la clase X)        
         * @return: $filasAfectadas (int de registros agregados)
         */
        public function agregar($parametro){
            $pdo = $this->conectar();
            try{
                $statement = $pdo->prepare($this->queryAgregar());
                $this->metodoAgregar($statement, $parametro);    
                $idGenerado = $pdo->lastInsertId(); 
                return $idGenerado;
            }catch(PDOException $e){
                echo($e);               
            }finally{
                $this->desconectar();
            }
        }


        /*
        * Metodo para modificar registrosa de la tabla "X" segun "id"
        * @access: public
        * @param:  $parametro (Objeto de la clase X)        
         * @return: $filasAfectadas (int de registros modificados)
         */
        public function modificar($parametro){
            $pdo = $this->conectar();
            try{
                $statement = $pdo->prepare($this->queryModificar());
                $filasAfectadas = $this->metodoModificar($statement, $parametro);
                return $filasAfectadas;
            }catch(Exception $e){
                echo($e);               
            }finally{
                $this->desconectar();
            }
        }

    }
