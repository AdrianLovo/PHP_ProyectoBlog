<?php
    session_start();	
	if(!$_SESSION["IdUsuario"]){		
		header("location:../index.php");        
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Post</title>
    
    <!--Icono | Bootstrap | Sweet | MyStyle-->
    <link rel="shortcut icon" href="/Resources/img/favicon.ico">  
    <link rel="stylesheet" href="/Resources/sweet/sweetalert2.min.css">
    <link rel="stylesheet" href="/Resources/css/style.min.css">
    <link rel="stylesheet" href="/Resources/bootstrap-4.5.3/css/bootstrap.min.css">

    <!--DataTable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> 

    <!--Summernote-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    
</head>
<body>

    <!--Menu Principal-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a id="user" class="navbar-brand" href="home.php">Inicio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">                
                <?php
                    if($_SESSION['Tipo'] == 'A'){
                        include_once('menu/menu_admin.php');
                    }else{
                        include_once('menu/menu_user.php');
                    }                    
                ?>           
            </ul>
        </div>  
            <!--<form class="form-inline my-2 my-lg-0 text-white">
                LOGO
            </form>-->
        </div>
    </nav>


   
    <div class="container col-xl-12 col-lg-12 col-sm-12 col-12">
        
        <div class="container mt-3">
            <table id="tablaPost" class="table table-bordered"  data-page-length='10' style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>IdPost</th>
                        <th>Titulo</th>
                        <th style="display:none"></th>
                        <th style="display:none"></th>
                        <th>Fecha</th>
                        <th style="display:none"></th>
                        <th style="display:none"></th>
                        <th style="display:none"></th>
                        <th>EmailUsuario</th>
                        <th>NombreSeccion</th>
                        <th>NombreSubSeccion</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                
                </tbody>        
            </table> 
        </div>

    </div>


    <!--DataTable-->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script> 

    <!--Librerias  Bootstrap | SweetAlert-->
    <!-- <script src="/Resources/bootstrap-4.5.3/js/bootstrap.min.js"></script> -->
    <script src="/Resources/sweet/sweetalert2.min.js"></script>

    

    <!--Controlador JS -->
    <script type="module" src="/Admin/js/post_listar.js"></script>  

</body>
</html>