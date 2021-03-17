<?php
    echo('
        <li class="nav-item dropdown">
            <a class="nav-link" href="usuarios.php">
                Admin/Users
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Post
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="post_listar.php">Listar</a>
                <a class="dropdown-item" href="post_agregar.php">Agregar</a>
                <a class="dropdown-item disabled" href="post_modificar.php">Modificar</a>
            </div>
        </li>
        <li>
            <a class="nav-link" href="secciones.php">
                Secciones
            </a>                   
        </li>
        <li>
            <a class="nav-link" href="subsecciones.php">       
                SubSecciones
            </a>
        </li>               
        <li>
            <a class="nav-link" href="" id="salir">       
                Salir
            </a>
        </li> 
    ');

