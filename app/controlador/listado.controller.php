<?php

//construye la pagina del listado de los proyectos
    
if(!isset($_GET['buscar'])){
    header('location:index.php?ctl=404');
}

$m=new Modelo();

switch ($_GET['buscar'])
{           
    case "t":
        $params= ['proyectos'=>$m->listarTProyectos()];
        $GLOBALS['titulo']="todos los proyectos";
            break;

    case "m":
        if(!isset($_SESSION['id_usuario'])){
            header('location:index.php?ctl=404');
        }
          $params= ['proyectos'=>$m->listarMProyectos($_SESSION['id_usuario'])];
          $GLOBALS['titulo']="mis proyectos";
        break;
}

require("/../vistas/contenido/Listado.php");  

