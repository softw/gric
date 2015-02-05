<?php

 if(isset($_GET['salir'])){
        session_destroy();
        session_unset();
        header("location:index.php");
}

$GLOBALS['titulo']="Home";
require("/../vistas/contenido/Inicio.php"); 

