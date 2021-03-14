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
		private $IdSubSeccion;
        private $EmailUsuario;
        private $NombreSeccion;
        private $NombreSubSeccion;

        
        public function __construct($IdPost, $Titulo, $Descripcion, $ImagenPortada, $Contenido, $Fecha, $IdUsuario, $IdSeccion, $IdSubSeccion, $EmailUsuario, $NombreSeccion, $NombreSubSeccion){
            $this->IdPost = $IdPost;
            $this->Titulo = $Titulo;
            $this->Descripcion = $Descripcion;
            $this->ImagenPortada = $ImagenPortada;
            $this->Contenido = $Contenido;
            $this->Fecha = $Fecha;
            $this->IdUsuario = $IdUsuario;
            $this->IdSeccion = $IdSeccion;
            $this->IdSubSeccion = $IdSubSeccion;
            $this->EmailUsuario = $EmailUsuario;
            $this->NombreSeccion = $NombreSeccion;
            $this->NombreSubSeccion = $NombreSubSeccion;
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
    
        public function getIdSubSeccion(){
            return $this->IdSubSeccion;
        }
    
        public function setIdSubSeccion($IdSubSeccion){
            $this->IdSubSeccion = $IdSubSeccion;
        }
    
        public function getEmailUsuario(){
            return $this->EmailUsuario;
        }
    
        public function setEmailUsuario($EmailUsuario){
            $this->EmailUsuario = $EmailUsuario;
        }
    
        public function getNombreSeccion(){
            return $this->NombreSeccion;
        }
    
        public function setNombreSeccion($NombreSeccion){
            $this->NombreSeccion = $NombreSeccion;
        }
    
        public function getNombreSubSeccion(){
            return $this->NombreSubSeccion;
        }
    
        public function setNombreSubSeccion($NombreSubSeccion){
            $this->NombreSubSeccion = $NombreSubSeccion;
        }

        //Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array(
                'IdPost' => $this->IdPost, 
                'Titulo' => $this->Titulo, 
                'Descripcion' => $this->Descripcion, 
                'ImagenPortada' => $this->ImagenPortada, 
                'Contenido' => $this->Contenido, 
                'Fecha' => $this->Fecha, 
                'IdUsuario' => $this->IdUsuario, 
                'IdSeccion' => $this->IdSeccion, 
                'IdSubSeccion' => $this->IdSubSeccion,
                'EmailUsuario' => $this->EmailUsuario,
                'NombreSeccion' => $this->NombreSeccion,
                'NombreSubSeccion' => $this->NombreSubSeccion,  
            );
			return $datos;
		}    	

        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                'IdPost' . $this->IdPost . 
                'Titulo' . $this->Titulo .
                'Descripcion' . $this->Descripcion .
                'ImagenPortada' . $this->ImagenPortada .
                'Contenido' . $this->Contenido .
                'Fecha' . $this->Fecha .
                'IdUsuario' . $this->IdUsuario .
                'IdSeccion' . $this->IdSeccion .
                'IdSubSeccion' . $this->IdSubSeccion .
                'EmailUsuario' . $this->EmailUsuario .
                'NombreSeccion' . $this->NombreSeccion .
                'NombreSubSeccion' . $this->NombreSubSeccion
            );
        }

	}

