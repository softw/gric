<?php

 if(!isset($_SESSION['usuario'])){
        header("location:index.php?ctl=Login");
}

$GLOBALS['titulo']="Perfil";
$GLOBALS['ruta']="Perfil";
require("/../vistas/contenido/perfil.php"); 

