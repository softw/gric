<?php
//crea las paginas donde hay formularios

if(!isset($_GET['form']))
{
    header('location:index.php?ctl=404');
}
$formulario= htmlentities(addslashes($_GET['form']));

switch ($formulario)
{
    case "descripcion":
        $id=  htmlentities(addslashes($_GET['clave']));
        $GLOBALS['ruta']="proyecto/detalles/Agregar $id";
        $GLOBALS['titulo']="Agregar $id";
        require("/../vistas/formularios/crearDescripcion.php");
        break;
    case "personas":
                
        $GLOBALS['ruta']="Proyecto/detalles/Agregar persona";
        $GLOBALS['titulo']="Nueva Persona";
        $uri=  htmlentities(addslashes($_GET['token']));
        require("/../vistas/formularios/crearPersona.form.php");
        break;
    
    case "necesidad":
        break;
}

