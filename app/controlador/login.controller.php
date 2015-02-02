<?php

if(isset($_SESSION['usuario']))
{
    header('location:index.php?ctl=Inicio');
}   
        
$GLOBALS['ruta']="Login/registro";
$GLOBALS['titulo']="Login/registro";
require("/../vistas/contenido/Login.php");

