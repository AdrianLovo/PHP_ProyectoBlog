<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Usuarios</title>
    
    <!--Icono | Bootstrap | Sweet-->
    <link rel="shortcut icon" href="/Resources/img/favicon.ico">  
    <link rel="stylesheet" href="/Resources/bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Resources/sweet/sweetalert2.min.css">
    <link rel="stylesheet" href="/Resources/css/style.min.css">


    <!--DataTable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

</head>
<body>

    <!--Menu Principal-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a id="user" class="navbar-brand" href="index.html">Inicio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">                
                
                
                <!-- Audiovisual -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbardrop">
                       Admin/Users
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#" id="navbardrop">
                       Posts
                    </a>                   
                </li>
                <li>
                    <a class="nav-link" href="#" id="navbardrop">
                       Categorias
                    </a>                   
                </li>
                <li>
                    <a class="nav-link" href="#" id="navbardrop">       
                       Tags
                    </a>
                </li>                
            </ul>
        </div>
  
            <!--<form class="form-inline my-2 my-lg-0 text-white">
                LOGO
            </form>-->
        </div>
    </nav>

    
    
    
    <!--Contendor Principal-->
    

    <div class="container col-xl-12 col-lg-12 col-sm-12 col-12 mt-5">
        
        <table id="tablaUsuario" class="table table-bordered"  data-page-length='10' style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th  style="width:5%">Id</th>
                    <th>Email</th>
                    <th>UltimoInicio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
           
            </tbody>        
        </table>

    </div>

    

    <!--DataTable-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!--Librerias  Bootstrap | SweetAlert-->
    <script src="/Resources/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="/Resources/sweet/sweetalert2.min.js"></script>

    <!--Controlador JS -->
    <script type="module" src="/Admin/js/usuarios.js"></script>

</body>
</html>