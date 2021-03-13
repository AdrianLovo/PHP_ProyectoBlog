<?php

    class Seccion{

		private $IdSeccion;
		private $Nombre;
       
        public function __construct($IdSeccion, $Nombre){
            $this->IdSeccion = $IdSeccion;
            $this->Nombre = $Nombre;           
        }

    	public function getIdSeccion(){
            return $this->IdSeccion;
        }
    
        public function setIdSeccion($IdSeccion){
            $this->IdSeccion = $IdSeccion;
        }
    
        public function getNombre(){
            return $this->Nombre;
        }
    
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }
    
        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdSeccion: " . $this->IdSeccion .
                "Nombre: " . $this->Nombre 
            );
        }

        //Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array(
                'IdSeccion' => $this->IdSeccion, 
                'Nombre' => $this->Nombre
            );
			return $datos;
		}

	}

