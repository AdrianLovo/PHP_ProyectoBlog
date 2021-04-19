<?php
    $IdPost = isset($_GET['post']) ? $_GET['post'] : null;
?>

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
  
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">  
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="Navb">
                        
                    </a>
                </li>
                
            </ul>
        </div>  
            <form class="form-inline my-2 my-lg-0 text-white" id="Email">
                LOGO
            </form>
            <img id="Avatar" src="" class="avatarBarra" title="">
        </div>
    </nav>

    
    <div class="pt-12">
        <!--Header Principal-->  
        <div class="p-md-3 text-dark bg-light text-justify">
            <div class="col-sm-12 col-md-5 cl-lg-12 offset-md-3">
                <h1 id="Titulo" class="font-italic"></h1>
                <p id="Descripcion"></p>                 
                <input id="IdPost" type="text" value="<?php echo($IdPost); ?>" class="hide">
            </div>
        </div>       

        <div class="container">
            <img src="" class="img-fluid alignCenter mt-1" alt="..." id="ImagenPortada" style="max-width:1200px">
        </div>
    </div>
    
    
    <!--Contendor Principal-->
    <div class="container" style="margin-top: 10px" id="Contenido">     


    </div>

    <div class="container">
        <blockquote class="blockquote text-right">
            <p class="blockquote-footer"><cite title="Source Title" id="Seccion"></cite></p>
        </blockquote>
        <blockquote class="blockquote text-right">
            <footer class="blockquote-footer">Publicado: <cite title="Source Title" id="Fecha"></cite></footer>
        </blockquote>
        
    </div>
   
    <!--CSS Main-->
    <link rel="stylesheet" href="/Resources/css/style.css">

    <!--Librerias Jquery > Bootstrap | SweetAlert-->
    <script src="/Resources/js/jquery-3.3.1.min.js"></script>
    <script src="/Resources/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="/Resources/sweet/sweetalert2.min.js"></script>

    <!--Controller-->
    <script type="module" src="App/js/post.js"></script>
   

</body>
</html>