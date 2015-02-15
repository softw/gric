<?php

    //form= tipo de formulario
    //cat= si es update, insert o select
    //definir el tipo de formulario para llamar al metodo correspondiente
    $formulario= htmlentities(addslashes($_GET['form']));
    

    switch ($formulario)
    {
        case "nuevo_proyecto":
            $ejecutar= procesar_form_nuevo_proyecto();
            break;
        case "nuevo_usuario":
            $ejecutar= procesar_form_nuevo_usuario();
            break;
        case "login":
            $ejecutar= procesar_form_login();
            break;
        case "descripciones":
            $clave=  htmlentities(addslashes($_GET['id']));
            $ejecutar=procesar_form_descripciones($clave);
            break;
        case "personas":
            $clave=  htmlentities(addslashes($_GET['clave']));
            $ejecutar=procesar_form_personas($clave);
            break;
        case "actividad":
            $ejecutar = procesar_form_actividad();
            break;
        case "resultado":
            
            $ejecutar = procesar_form_resultados();
            break;
        case "producto":
            $id_resultado= htmlentities(addslashes($_GET['id_resultado']));
            $ejecutar= procesar_form_producto($id_resultado);
            break;
        case "impacto":
            $ejecutar = procesar_form_impacto();
            break;
    }
    
function procesar_form_impacto()
{
    //HACE LA INSERCION PERO NO REDIRIGE?????
    $form_impacto= Procesar:: form_impacto();
    if($form_impacto['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=impactos&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=impacto");
    }
}
   
function procesar_form_producto($id_resultado)
{
    $form_producto= Procesar::form_producto($id_resultado);
    if($form_producto['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=resultados&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=producto&id_resultado=$id_resultado");
    }
}
function procesar_form_resultados($clave)
{
     $form_resultados = Procesar:: form_resultado_resultado();
         
    if($form_resultados['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=resultados&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=resultados");
    }
        
}
    
function procesar_form_actividad()
{
    $form_actividad= Procesar:: form_actividad();
    if($form_actividad['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=cronograma&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=actividad");
    }
}
    
function procesar_form_personas($clave)
{
    switch ($clave)
    {
        case "0":
            $form_persona= Procesar::form_persona_entidad();
            break;
        case "1":
            $form_persona = Procesar::form_persona_basico();
            break;
        case "2":
            $form_persona = Procesar:: form_persona_profesional();
            break;
    }
    
    if($form_persona['ok'])
    {
        $id_proyecto = $_SESSION['id_proyecto'];
        header("location:index.php?ctl=Detalles&cat=personas&id=$id_proyecto");
    }else
    {
        header("location:index.php?ctl=Nuevo&form=personas&clave=$clave");
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



 