<?php

    class Post{

		private $IdPost;
        private $Titulo;
        private $Descripcion;
        private $ImagenPortada;
		private $Contenido;
		private $Fecha;
        private $IdUsuario;
        private $IdSeccion;
		private $SubSeccion;
        
        public function __construct($IdPost, $Titulo, $Descripcion, $ImagenPortada, $Contenido, $Fecha, $IdUsuario, $IdSeccion, $SubSeccion){
            $this->IdPost = $IdPost;
            $this->Titulo = $Titulo;
            $this->Descripcion = $Descripcion;
            $this->ImagenPortada = $ImagenPortada;
            $this->Contenido = $Contenido;
            $this->Fecha = $Fecha;
            $this->IdUsuario = $IdUsuario;
            $this->IdSeccion = $IdSeccion;
            $this->SubSeccion = $SubSeccion;
        }

        public function getIdPost(){
            return $this->IdPost;
        }
    
        public function setIdPost($IdPost){
            $this->IdPost = $IdPost;
        }
    
        public function getTitulo(){
            return $this->Titulo;
        }
    
        public function setTitulo($Titulo){
            $this->Titulo = $Titulo;
        }
    
        public function getDescripcion(){
            return $this->Descripcion;
        }
    
        public function setDescripcion($Descripcion){
            $this->Descripcion = $Descripcion;
        }
    
        public function getImagenPortada(){
            return $this->ImagenPortada;
        }
    
        public function setImagenPortada($ImagenPortada){
            $this->ImagenPortada = $ImagenPortada;
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

        //Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array($this->IdPost, $this->Titulo, $this->Descripcion, $this->ImagenPortada, $this->Contenido, $this->Fecha, $this->IdUsuario, $this->IdSeccion, $this->SubSeccion);
			return $datos;
		}    	

        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdPost: " . $this->IdPost .
                "Titulo: " . $this->Titulo .
                "Descripcion: " . $this->Descripcion .
                "ImagenPortada: " . $this->ImagenPortada .
                "Contenido: " . $this->Contenido .
                "Fecha: " . $this->Fecha .
                "IdUsuario: " . $this->IdUsuario .
                "IdSeccion: " . $this->IdSeccion .
                "SubSeccion: " . $this->SubSeccion
            );
        }

	}

