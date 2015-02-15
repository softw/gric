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
        $clave=  htmlentities(addslashes($_GET['clave']));//determina el tipo de dato a ingresar     
        $GLOBALS['ruta']="Proyecto/detalles/Agregar persona";
        $GLOBALS['titulo']="Nueva Persona";
        require("/../vistas/formularios/crearPersona.form.php");
        break;
    
    case "actividad":
        $GLOBALS['ruta']="proyecto/detalles/Agregar Actividad";
        $GLOBALS['titulo']="Agregar Actividad";
        require("/../vistas/formularios/crearActividad.php");
        break;
    case "resultado":
        $clave = htmlentities(addslashes($_GET['clave']));
        $GLOBALS['ruta']="Proyecto/detalles/Agregar Resultado";
        $GLOBALS['titulo']="Agregar Resultado";
        require ("/../vistas/formularios/nuevo_$clave.php");
        break;
    case "producto":
        $id_resultado= htmlentities(addslashes($_GET['id_resultado']));
        $GLOBALS['ruta']="Proyecto/detalles/Resultado $id_resultado/Agregar producto";
        $GLOBALS['titulo']="Agregar Producto";
        require ("/../vistas/formularios/nuevo_producto.php");
        break;
    case "impacto":
        $GLOBALS['ruta']="proyecto/detalles/Agregar impacto";
        $GLOBALS['titulo']="Agregar Impacto";
        require("/../vistas/formularios/impacto.php");
        break;
    
}

