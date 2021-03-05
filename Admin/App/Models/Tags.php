<?php

    class Tag{

		private $IdUsuario;
		private $Email;
		private $Password;
        private $UltimoInicio;
        private $UltimoFin;
		private $Imagen;
        
        public function __construct($IdUsuario, $Email, $Password, $UltimoInicio, $UltimoFin, $Imagen){
            $this->IdUsuario = $IdUsuario;
            $this->Email = $Email;
            $this->Password = $Password;
            $this->UltimoInicio = $UltimoInicio;
            $this->UltimoFin = $UltimoFin;
            $this->Imagen = $Imagen;           
        }

    	public function getIdUsuario(){
            return $this->IdUsuario;
        }
    
        public function setIdUsuario($IdUsuario){
            $this->IdUsuario = $IdUsuario;
        }
    
        public function getEmail(){
            return $this->Email;
        }
    
        public function setEmail($Email){
            $this->Email = $Email;
        }
    
        public function getPassword(){
            return $this->Password;
        }
    
        public function setPassword($Password){
            $this->Password = $Password;
        }
    
        public function getUltimoInicio(){
            return $this->UltimoInicio;
        }
    
        public function setUltimoInicio($UltimoInicio){
            $this->UltimoInicio = $UltimoInicio;
        }
    
        public function getUltimoFin(){
            return $this->UltimoFin;
        }
    
        public function setUltimoFin($UltimoFin){
            $this->UltimoFin = $UltimoFin;
        }
    
        public function getImagen(){
            return $this->Imagen;
        }
    
        public function setImagen($Imagen){
            $this->Imagen = $Imagen;
        }

        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdUsuario: " . $this->IdUsuario .
                "Email: " . $this->Email .
                "Password: " . $this->Password .
                "UltimoInicio: " . $this->UltimoInicio .
                "UltimoFin: " . $this->UltimoFin .
                "Imagen: " . $this->Imagen 
            );
        }

	}

