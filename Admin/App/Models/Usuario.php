<?php

    class Usuario{

        private $IdUsuario;
        private $Email;
        private $Password;
        private $UltimoInicio;
        private $UltimoFin;
        private $Imagen;
        private $Tipo;
        
        public function __construct($IdUsuario, $Email, $Password, $UltimoInicio, $UltimoFin, $Imagen, $Tipo){
            $this->IdUsuario = $IdUsuario;
            $this->Email = $Email;
            $this->Password = $Password;
            $this->UltimoInicio = $UltimoInicio;
            $this->UltimoFin = $UltimoFin;
            $this->Imagen = $Imagen;        
            $this->Tipo = $Tipo;   
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

        public function getTipo(){
            return $this->Tipo;
        }
    
        public function setTipo($Tipo){
            $this->Tipo = $Tipo;
        }

        //Metodo para obtener los datos de los atributos en un array
        public function toArray(){
            $datos = array($this->IdUsuario, $this->Email, $this->Password, $this->UltimoInicio, $this->UltimoFin, $this->Imagen, $this->Tipo);
            return $datos;
        }

        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdUsuario: " . $this->IdUsuario .
                "Email: " . $this->Email .
                "Password: " . $this->Password .
                "UltimoInicio: " . $this->UltimoInicio .
                "UltimoFin: " . $this->UltimoFin .
                "Imagen: " . $this->Imagen .
                "Tipo: " . $this->Tipo 
            );
        }

    }

