<?php

    class SubSeccion{

		private $IdSeccion;
        private $SeccionNombre;
        private $IdSubseccion;
		private $SubseccionNombre;
		
        public function __construct($IdSeccion, $SeccionNombre, $IdSubseccion, $SubseccionNombre){
            $this->IdSeccion = $IdSeccion;
            $this->SeccionNombre = $SeccionNombre;  
            $this->IdSubseccion = $IdSubseccion;
            $this->SubseccionNombre = $SubseccionNombre;         
        }

        public function getIdSeccion(){
            return $this->IdSeccion;
        }
    
        public function setIdSeccion($IdSeccion){
            $this->IdSeccion = $IdSeccion;
        }
    
        public function getSeccionNombre(){
            return $this->SeccionNombre;
        }
    
        public function setSeccionNombre($SeccionNombre){
            $this->SeccionNombre = $SeccionNombre;
        }
    
        public function getIdSubseccion(){
            return $this->IdSubseccion;
        }
    
        public function setIdSubseccion($IdSubseccion){
            $this->IdSubseccion = $IdSubseccion;
        }
    
        public function getSubseccionNombre(){
            return $this->SubseccionNombre;
        }
    
        public function setSubseccionNombre($SubseccionNombre){
            $this->SubseccionNombre = $SubseccionNombre;
        }
    	
    
        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdSeccion: " . $this->IdSeccion .
                "SeccionNombre: " . $this->SeccionNombre .
                "IdSubseccion: " . $this->IdSubseccion .
                "SubseccionNombre" . $this->SubseccionNombre
            );
        }

        //Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array(
                'IdSeccion' => $this->IdSeccion, 
                'SeccionNombre' => $this->SeccionNombre, 
                'IdSubseccion' => $this->IdSubseccion, 
                'SubseccionNombre' => $this->SubseccionNombre 
            );
			return $datos;
		}

	}

