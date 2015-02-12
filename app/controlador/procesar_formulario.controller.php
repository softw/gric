<?php

    //form= tipo de formulario
    //cat= si es update, insert o select
    //definir el tipo de formulario para llamar al metodo correspondiente
    $formulario= htmlentities(addslashes($_GET['form']));
    

    switch ($formulario)
    {
        case "nuevo_proyecto":
            $metodo= procesar_form_nuevo_proyecto();
            break;
        case "nuevo_usuario":
            $metodo= procesar_form_nuevo_usuario();
            break;
        case "login":
            $metodo= procesar_form_login();
            break;
        case "descripciones":
            $clave=  htmlentities(addslashes($_GET['id']));
            $metodo=procesar_form_descripciones($clave);
            break;
        case "personas":
            $metodo=procesar_form_personas();
    }
    
function procesar_form_personas()
{
    $form_persona= Procesar::form_persona();
    if($form_persona['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=personas&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=personas");
    }
}
    
function procesar_form_descripciones($clave)
{
    $form_descripcion= Procesar:: form_descripcion($clave);
    if($form_descripcion['ctl']=="Detalles")
    {
        $id_proyecto=$_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=descripciones&id=$id_proyecto");
    }
}

function procesar_form_login()
{
    if(isset($_SESSION['id_usuario']))
    {
        header("location:index.php?ctl=Inicio");
    }
    $form_login= Procesar::form_login();
    if($form_login['ctl']=="Inicio")
    {
        header ("location:index.php?ctl=Inicio");
        die();
    }
    if($form_login['ctl']=="Login")
    {
        //los errores estan en el array $form_login
       $GLOBALS['ruta']="Error de inicio de sesión";
       $GLOBALS['titulo']="Error de inicio de Sesión";
       require("/../vistas/contenido/Login.php");
    }
}

function procesar_form_nuevo_usuario()
{
    $form_nuevo_usuario= Procesar::form_nuevo_usuario();
    if($form_nuevo_usuario['ctl']=="Inicio")
    {
        header("location:index.php?ctl=Inicio");
        die();
    }
    if($form_nuevo_usuario['ctl']=="Login")
    {
        //los errores estan en el array $form_nuevo_usuario
        $GLOBALS['ruta']="Error en el formulario de registro";
        $GLOBALS['titulo']="Error";
        require("/../vistas/contenido/Login.php");
        die();
    }
    
}


function procesar_form_nuevo_proyecto()
{
    $form_nuevo_proyecto= Procesar::form_nuevo_proyecto();
    if($form_nuevo_proyecto['ctl']=="Detalles")
    {
        $id_proyecto= $form_nuevo_proyecto['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=generalidades&id=15");
        die();
    }
    if($form_nuevo_proyecto['ctl']=="Nuevo_proyecto")
    {
        //los errores vienen en el array $form_nuevo_proyecto
        $GLOBALS['ruta']="Error en el formulario";
        $GLOBALS['titulo']="Error";
        require ("/../vistas/formularios/crear_proyecto.php");
        die();
    }
       
}//fin metodo para insertar nuevo proyecto



 