<?php

    class Post{

		private $IdPost;
		private $Contenido;
		private $Fecha;
        private $IdUsuario;
        private $IdSeccion;
		private $SubSeccion;
        
        public function __construct($IdPost, $Contenido, $Fecha, $IdUsuario, $IdSeccion, $SubSeccion){
            $this->IdPost = $IdPost;
            $this->Contenido = $Contenido;
            $this->Fecha = $Fecha;
            $this->IdUsuario = $IdUsuario;
            $this->IdSeccion = $IdSeccion;
            $this->SubSeccion = $SubSeccion;           
        }

        public function getIDPost(){
            return $this->IdPost;
        }
    
        public function setDPost($IdPost){
            $this->IdPost = $IdPost;
        }
    
        public function getContenido(){
            return $this->Contenido;
        }
    
        public function setContenido($Contenido){
            $this->Contenido = $Contenido;
        }
    
        public function getFecha(){
            return $this->Fecha;
        }
    
        public function setFecha($Fecha){
            $this->Fecha = $Fecha;
        }
    
        public function getIdUsuario(){
            return $this->IdUsuario;
        }
    
        public function setIdUsuario($IdUsuario){
            $this->IdUsuario = $IdUsuario;
        }
    
        public function getIdSeccion(){
            return $this->IdSeccion;
        }
    
        public function setIdSeccion($IdSeccion){
            $this->IdSeccion = $IdSeccion;
        }
    
        public function getSubSeccion(){
            return $this->SubSeccion;
        }
    
        public function setSubSeccion($SubSeccion){
            $this->SubSeccion = $SubSeccion;
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

