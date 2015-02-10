<?php

    //form= tipo de formulario
    //cat= si es update, insert o select
    //definir el tipo de formulario para llamar al metodo correspondiente
    $formulario= htmlentities(addslashes($_GET['form']));
    $categoria= htmlentities(addslashes($_GET['cat']));

    switch ($formulario)
    {
        case "nuevo_proyecto":
            $metodo= procesar_form_nuevo_proyecto($categoria);
            break;
        case "nuevo_usuario":
            $metodo= procesar_form_nuevo_usuario($categoria);
            break;
        case "login":
            $metodo= procesar_form_login();
            break;
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


















function procesar_form_nuevo_proyecto()//metodo para insertar un proyecto nuevo en la bd primero se valida
{
    $form_nuevo_proyecto=[];
    $form_nuevo_proyecto['valido'] =FALSE;
    $form_nuevo_proyecto['titulo']=       htmlentities(addslashes($_POST['txtTitulo']));
    $form_nuevo_proyecto['convocatoria']= htmlentities(addslashes($_POST['txtConvocatoria']));
    $form_nuevo_proyecto['programa']=     htmlentities(addslashes($_POST['txtPrograma']));
    $form_nuevo_proyecto['tipo_f']=         htmlentities(addslashes($_POST['txtTipo']));
    $form_nuevo_proyecto['duracion']=     htmlentities(addslashes($_POST['txtDuracion']));
    $form_nuevo_proyecto['lugar']=        htmlentities(addslashes($_POST['txtLugar']));
    $form_nuevo_proyecto['ben_camp']=    htmlentities(addslashes($_POST['beneficia']));
    $form_nuevo_proyecto['descripcion']=       htmlentities(addslashes($_POST['txaDescripcion']));
    $form_nuevo_proyecto['id_usuario']= $_SESSION['id_usuario'];
    
   //la validacion para despues 
   // $formulario_valido= Validar::form_nuevo_proyecto($form_nuevo_proyecto);
    $formulario_valido['valido']= TRUE;
    
    if($formulario_valido['valido'])
    {
        Modelo::insertar_generalidades($form_nuevo_proyecto['id_usuario'],$form_nuevo_proyecto['titulo'], $form_nuevo_proyecto['convocatoria'], $form_nuevo_proyecto['programa'], $form_nuevo_proyecto['tipo_f'], $form_nuevo_proyecto['duracion'], $form_nuevo_proyecto['lugar'], $form_nuevo_proyecto['ben_camp'], $form_nuevo_proyecto['descripcion']);
        header('location: index.php?ctl=Listado&buscar=m');
    }else
    {
        header('location:index.php?ctl=Nuevo_proyecto');
    }
       
}//fin metodo para insertar nuevo proyecto



 