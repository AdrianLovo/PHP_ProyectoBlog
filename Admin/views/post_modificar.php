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

            <?php
                $IdPost = isset($_GET['IdPost']) ? $_GET['IdPost'] : ''; 
                $IdSeccion = isset($_GET['IdSeccion']) ? $_GET['IdSeccion'] : ''; 
            ?>
                
            <form method="post" action="" id="frmPost" autocomplete="off">  
                <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1">
                        <input type="text" name="IdPost" id="IdPost" value="<?php echo($IdPost); ?>" style="display:none">
                        <input type="text" name="metodo" value="Modificar" style="display:none"> 
                        <input type="text" name="InputSeccion" id="InputSeccion" value="<?php echo($IdSeccion); ?>" style="display:none">
                        <input type="text" name="InputSubseccion" id="InputSubseccion" style="display:none">    
                    </div>
                </div>                          

                <div class="form-row pt-4">
                    <div class="form-group col-md-5 offset-md-1">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" require>                        
                    </div>                   
                    <div class="form-group col-md-5">
                        <label for="img">Imagen Portada</label>
                        <input type="file" name="imagen" id="img" accept=".jpg,.png,jpeg" class="form-control">                            
                    </div>                    
                </div>

                <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" require>
                    </div>                            
                </div>    

                <div class="form-row">
                    <div class="form-group col-md-4 offset-md-1">
                        <label for="Seccion">Seccion</label>
                        <select id="Seccion" name="Seccion" class="form-control" require>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Subseccion">SubSeccion</label>
                        <select id="Subseccion" name="Subseccion" class="form-control" require>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Estado">Estado</label>
                        <select id="Estado" name="Estado" class="form-control" require>
                            <option value="0">Pendiente</option>
                            <option value="1">Publicado</option>
                        </select>
                    </div>                           
                </div>                                                       
                
                <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1">
                        <textarea id="ta-1" name="ta-1"></textarea> 
                    </div> 
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8 offset-md-1">
                        <button class="btn btn-primary" id="modificar">Modificar</button> 
                        <button class="btn btn-dark" id="reiniciar">Borrar Contenido</button>
                    </div>  
                    <div class="form-group col-md-2 offset-md-1">
                        <button class="btn btn-dark" id="cancelar">Cancelar</button>
                    </div>
                </div>

            </form>

                       
           
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
    <script type="module" src="/Admin/js/post_modificar.js"></script>  

</body>
</html>