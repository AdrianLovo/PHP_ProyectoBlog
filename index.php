<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="shortcut icon" href="Resources/img/favicon.ico"> 

    <!--Bootstrap-->
    <link rel="stylesheet" href="/Resources/bootstrap-4.5.3/css/bootstrap.min.css">
    
    <!--Librerias Sweet-->
    <link rel="stylesheet" href="/Resources/sweet/sweetalert2.min.css">

</head>
<body>

    <!--Menu Principal-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a id="user" class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">                
                
                
                <!-- Audiovisual -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Audiovisual
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Fotoperiodismo</a>
                        <a class="dropdown-item" href="#">Infografías</a>
                        <a class="dropdown-item" href="#">Podcast</a>
                    </div>
                </li>
                <!-- Articulos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Articulos
                    </a>
                    <div class="dropdown-menu">                        
                        <a class="dropdown-item" href="#">Política</a>
                        <a class="dropdown-item" href="#">Sociedad</a>
                        <a class="dropdown-item" href="#">Tecnología</a>                        
                        <a class="dropdown-item" href="#">Reconstrucción de investigaciones</a>                        
                        <a class="dropdown-item" href="#">Colaboraciones</a>                        
                    </div>
                </li>
                <!-- Cultura -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Cultura
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Libros</a>
                        <a class="dropdown-item" href="#">Cine</a>
                        <a class="dropdown-item" href="#">Historia</a>
                        <a class="dropdown-item" href="#">Filosofía</a>
                    </div>
                </li>
                <!-- Escritos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Escritos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Cuentos</a>
                        <a class="dropdown-item" href="#">Poemas</a>
                        <a class="dropdown-item" href="#">Aforismos</a>
                        <a class="dropdown-item" href="#">Experiencias</a>
                    </div>
                </li>
                 <!-- Escritos -->
                 <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbardrop">
                        Ensayos
                    </a>
                </li>
            </ul>
        </div>  
            <!--<form class="form-inline my-2 my-lg-0 text-white">
                LOGO
            </form>-->
        </div>
    </nav>

    
    <div class="pt-12">
        <!--Header Principal-->  
        <div class="p-md-3 text-dark bg-light text-justify">
            <div class="col-sm-12 col-md-5 cl-lg-12 offset-md-3">
                <h1 class="font-italic ">Mimisuelo.com</h1>
                <p class="">SUBTITULO</p>            
            </div>
        </div>
    </div>
    
    
    <!--Contendor Principal-->
    <div class="container" style="margin-top: 10px">

        <div class="alignRight">
            <div id="divPaginas" class="center mt-3">         
            </div>
        </div>

        <div class="alignCenter">
            <div id="loading" class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
              
        <div id="divPost" class="container"> 
        </div>  

    </div>

   
    <!--CSS Main-->
    <link rel="stylesheet" href="/Resources/css/style.css">

    <!--Librerias Jquery > Bootstrap | SweetAlert-->
    <script src="/Resources/js/jquery-3.3.1.min.js"></script>
    <script src="/Resources/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="/Resources/sweet/sweetalert2.min.js"></script>

    <!--Controller-->
    <script type="module" src="App/js/index.js"></script>
   

</body>
</html>