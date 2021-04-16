<?php

    include_once 'Conexion.php';

    class PostController extends Conexion{

        private $indice;
        private $totalPaginas;
        private $paginaActual;
        private $numeroResultados;
        private $resultadosPorPagina;
        private $error = false;

        function __construct($nPorPagina){
            parent::__construct();
            $this->resultadosPorPagina = $nPorPagina;
            $this->indice = 0;
            $this->paginaActual = 1;
            $this->calcularPaginas();
        }

        function calcularPaginas(){
            $query = $this->connect()->query('SELECT COUNT(*) AS total FROM BlogPHP.Post A WHERE A.Estado=1');
            $this->numeroResultados = $query->fetch(PDO::FETCH_OBJ)->total;
            $this->totalPaginas = round($this->numeroResultados / $this->resultadosPorPagina);  

            if(($this->numeroResultados % $this->resultadosPorPagina) > 0 &&
                ((($this->numeroResultados / $this->resultadosPorPagina) - floor($this->numeroResultados/$this->resultadosPorPagina)) <= 0.5)
            ){
                $this->totalPaginas++;
            }
                    

            if(isset($_GET['pagina'])){                
                //Validar que pagina sea un numero
                if(is_numeric($_GET['pagina'])){

                    //Validar que pagina sea mayor o igual a 1 y menor o igual a totalPaginas
                    if($_GET['pagina'] >= 1 && $_GET['pagina'] <= $this->totalPaginas){                      
                        $this->paginaActual = $_GET['pagina'];
                        $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);   
                       
                    }else{
                        echo "No existe esa pagina";
                        $this->error = true;
                    }
                }else{
                    echo("Error al mostrar la pagina");
                    $this->error = true;
                }                
            }
        }

        function listarPost(){
            $arrayDeObjetos = array();

            if(!$this->error){
                $query = $this->connect()->prepare('SELECT A.IdPost, A.Titulo, A.Descripcion, A.ImagenPortada, A.Fecha FROM BlogPHP.Post A WHERE A.Estado=1  LIMIT :pos, :n');
                $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);

                foreach($query as $post){
                    $tmp = [
                        "IdPost" => $post['IdPost'], 
                        "Titulo" => $post['Titulo'],
                        "Descripcion" => $post['Descripcion'],
                        "ImagenPortada" => $post['ImagenPortada'],
                        "Fecha" => $post['Fecha'],
                        "Titulo" => $post['Titulo']
                    ];
					array_push($arrayDeObjetos, $tmp);
                }
            }
            echo json_encode($arrayDeObjetos);
        }

        //SET Y GET
        public function getTotalPaginas(){
            return $this->totalPaginas;
        }

        public function setTotalPaginas($totalPaginas){
            $this->totalPaginas = $totalPaginas;
        }

        public function getIndice(){
            return $this->indice;
        }

        public function setIndice($indice){
            $this->indice = $indice;
        }
    }


    $seccion = isset($_POST['seccion']) ? $_POST['seccion'] : null;
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : null;
    $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : null;
    $numeroPorPagina = isset($_POST['numeroPorPagina']) ? $_POST['numeroPorPagina'] : null;

   
    if($metodo === "Paginas"){
         $cards = new PostController($numeroPorPagina);
         echo($cards->getTotalPaginas());
    }

    if($metodo === "Post"){
        $cards = new PostController($numeroPorPagina);
        $cards->setIndice( ($pagina-1) * $numeroPorPagina);
        $cards->listarPost();        
    }
