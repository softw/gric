<?php

if(!isset($_SESSION['usuario']))
{
    header('location:index.php?ctl=Inicio');
}   
        
$GLOBALS['ruta']="Nuevo proyecto";
$GLOBALS['titulo']="Nuevo proyecto";
require("/../vistas/formularios/crearProyecto.php");
